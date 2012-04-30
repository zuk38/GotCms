<?php
namespace Gc\Mvc\Controller;

use Gc\User\Model,
    Gc\User\Acl,
    Zend\Mvc\Controller\ActionController,
    Zend\Authentication\AuthenticationService,
    Zend\Mvc\MvcEvent,
    Zend\Session\Storage\SessionStorage;

class Action extends ActionController
{
    protected $_auth = NULL;
    protected $_routeMatch = NULL;
    protected $_session = NULL;
    protected $_acl = NULL;

    public function execute(MvcEvent $e)
    {
        $this->_construct();
        $this->init();
        return parent::execute($e);
    }

    public function init()
    {

    }

    protected function _construct()
    {
        $auth = $this->getAuth();
        $module = $this->getRouteMatch()->getParam('module');
        $route_name = $this->getRouteMatch()->getMatchedRouteName();
        if(!$auth->hasIdentity())
        {
            if(!in_array($route_name, array('userLogin', 'userForgotPassword')) and $route_name != 'renderWebsite')
            {
                return $this->redirect()->toRoute('userLogin');
            }
        }
        else
        {
            $user_table = Model::fromId($auth->getIdentity()->id);

            $this->_acl = new Acl($user_table);
            $permissions = $user_table->getRole()->getUserPermissions();

            if(!empty($this->_acl_page) and !$this->_acl->isAllowed($user_table->getRole()->getName(), $this->_acl_page['resource'], $this->_acl_page['permission']))
            {
                //@TODO Do something to specify user has no access
die('here');
            }
        }

        $this->layout()->module = $module;
    }

    public function getRouteMatch()
    {
        if(empty($this->_routeMatch))
        {
            $this->_routeMatch = $this->getEvent()->getRouteMatch();
        }

        return $this->_routeMatch;
    }

    /**
    * @return SessionStorage
    */
    protected function getSession()
    {
        if($this->_session === NULL)
        {
            $this->_session = new SessionStorage($this->getAuth()->getStorage());
        }

        return $this->_session;
    }

    /**
    * @return AuthenticationService
    */
    protected function getAuth()
    {
        if($this->_auth === NULL)
        {
            $this->_auth = new AuthenticationService();
        }

        return $this->_auth;
    }
}