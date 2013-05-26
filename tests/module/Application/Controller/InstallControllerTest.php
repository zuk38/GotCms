<?php
/**
 * This source file is part of GotCms.
 *
 * GotCms is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * GotCms is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with GotCms. If not, see <http://www.gnu.org/licenses/lgpl-3.0.html>.
 *
 * PHP Version >=5.3
 *
 * @category Gc_Tests
 * @package  ZfModules
 * @author   Pierre Rambaud (GoT) <pierre.rambaud86@gmail.com>
 * @license  GNU/LGPL http://www.gnu.org/licenses/lgpl-3.0.html
 * @link     http://www.got-cms.com
 */

namespace Application\Controller;

use Gc\Core\Config as CoreConfig;
use Gc\Registry;
use Gc\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;
use Zend\Session\Container as SessionContainer;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-03-15 at 23:51:25.
 *
 * @group    ZfModules
 * @category Gc_Tests
 * @package  ZfModules
 */
class InstallControllerTest extends AbstractHttpControllerTestCase
{
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    public function setUp()
    {
        $this->init();
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::init
     * @covers Application\Controller\InstallController::checkInstall
     * @covers Application\Controller\InstallController::indexAction
     *
     * @return void
     */
    public function testIndexAction()
    {
        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'en_GB'
            )
        );

        $this->dispatch('/install');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('install');
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::init
     * @covers Application\Controller\InstallController::checkInstall
     * @covers Application\Controller\InstallController::indexAction
     *
     * @return void
     */
    public function testIndexActionWithPostData()
    {
        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'en_GB'
            )
        );

        $this->dispatch(
            '/install',
            'POST',
            array(
                'lang' => 'en_GB'
            )
        );
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('install');
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::init
     * @covers Application\Controller\InstallController::checkInstall
     * @covers Application\Controller\InstallController::indexAction
     *
     * @return void
     */
    public function testIndexActionWithInvalidPostData()
    {
        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'en_GB'
            )
        );

        $this->dispatch(
            '/install',
            'POST',
            array(
                'lang' => ''
            )
        );
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('install');
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::init
     * @covers Application\Controller\InstallController::checkInstall
     * @covers Application\Controller\InstallController::licenseAction
     *
     * @return void
     */
    public function testLicenseAction()
    {
        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'en_GB'
            )
        );

        $this->dispatch('/install/license');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('installLicense');
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::init
     * @covers Application\Controller\InstallController::checkInstall
     * @covers Application\Controller\InstallController::licenseAction
     *
     * @return void
     */
    public function testLicenseActionWithPostData()
    {
        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'en_GB'
            )
        );

        $this->dispatch(
            '/install/license',
            'POST',
            array(
                'accept-license' => '1'
            )
        );
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('installLicense');
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::init
     * @covers Application\Controller\InstallController::checkInstall
     * @covers Application\Controller\InstallController::licenseAction
     *
     * @return void
     */
    public function testLicenseActionWithInvalidPostData()
    {
        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'en_GB'
            )
        );

        $this->dispatch(
            '/install/license',
            'POST',
            array(
                'accept-license' => ''
            )
        );
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('installLicense');
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::init
     * @covers Application\Controller\InstallController::checkInstall
     * @covers Application\Controller\InstallController::checkConfigAction
     *
     * @return void
     */
    public function testCheckConfigAction()
    {
        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'en_GB'
            )
        );

        $this->dispatch('/install/check-server-configuration');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('installCheckConfig');
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::init
     * @covers Application\Controller\InstallController::checkInstall
     * @covers Application\Controller\InstallController::checkConfigAction
     *
     * @return void
     */
    public function testCheckConfigActionWithPostData()
    {
        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'en_GB'
            )
        );

        $this->dispatch(
            '/install/check-server-configuration',
            'POST',
            array(
            )
        );
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('installCheckConfig');
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::init
     * @covers Application\Controller\InstallController::checkInstall
     * @covers Application\Controller\InstallController::databaseAction
     *
     * @return void
     */
    public function testDatabaseAction()
    {
        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'en_GB'
            )
        );

        $this->dispatch('/install/database-configuration');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('installDatabase');
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::init
     * @covers Application\Controller\InstallController::checkInstall
     * @covers Application\Controller\InstallController::databaseAction
     *
     * @return void
     */
    public function testDatabaseActionWithPostData()
    {
        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'en_GB'
            )
        );

        $this->dispatch(
            '/install/database-configuration',
            'POST',
            array(
                'driver' => GC_DATABASE_DRIVER,
                'username' => GC_DATABASE_USERNAME,
                'dbname' => GC_DATABASE_DATABASE,
                'hostname' => GC_DATABASE_HOSTNAME,
                'password' => GC_DATABASE_PASSWORD,
            )
        );
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('installDatabase');
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::init
     * @covers Application\Controller\InstallController::checkInstall
     * @covers Application\Controller\InstallController::databaseAction
     *
     * @return void
     */
    public function testDatabaseActionWithPostDataAndWrongIdentity()
    {
        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'en_GB'
            )
        );

        $this->dispatch(
            '/install/database-configuration',
            'POST',
            array(
                'driver' => GC_DATABASE_DRIVER,
                'username' => GC_DATABASE_USERNAME,
                'dbname' => 'fakedatabase',
                'hostname' => 'localhost',
                'password' => '',
            )
        );
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('installDatabase');
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::init
     * @covers Application\Controller\InstallController::checkInstall
     * @covers Application\Controller\InstallController::databaseAction
     *
     * @return void
     */
    public function testDatabaseActionWithInvalidPostData()
    {
        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'en_GB'
            )
        );

        $this->dispatch(
            '/install/database-configuration',
            'POST',
            array(
            )
        );
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('installDatabase');
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::init
     * @covers Application\Controller\InstallController::checkInstall
     * @covers Application\Controller\InstallController::configurationAction
     *
     * @return void
     */
    public function testConfigurationAction()
    {
        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'en_GB',
                'db' => array(
                    'driver' => GC_DATABASE_DRIVER,
                    'username' => GC_DATABASE_USERNAME,
                    'dbname' => GC_DATABASE_DATABASE,
                    'hostname' => GC_DATABASE_HOSTNAME,
                    'password' => GC_DATABASE_PASSWORD,
                )
            )
        );

        $this->dispatch('/install/configuration');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('installConfiguration');
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::init
     * @covers Application\Controller\InstallController::checkInstall
     * @covers Application\Controller\InstallController::configurationAction
     *
     * @return void
     */
    public function testConfigurationActionWithPostData()
    {
        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'en_GB',
                'db' => array(
                    'driver' => GC_DATABASE_DRIVER,
                    'username' => GC_DATABASE_USERNAME,
                    'dbname' => GC_DATABASE_DATABASE,
                    'hostname' => GC_DATABASE_HOSTNAME,
                    'password' => GC_DATABASE_PASSWORD,
                )
            )
        );

        $this->dispatch(
            '/install/configuration',
            'POST',
            array(
                'site_name' => 'GotCms',
                'admin_firstname' => 'Pierre',
                'admin_lastname' => 'Rambaud',
                'admin_email' => 'pierre.rambaud86@gmail.com',
                'admin_login' => 'Got',
                'admin_password' => 'test',
                'site_is_offline' => '0',
                'template' => 'default',
            )
        );
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('installConfiguration');
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::init
     * @covers Application\Controller\InstallController::checkInstall
     * @covers Application\Controller\InstallController::configurationAction
     *
     * @return void
     */
    public function testConfigurationActionWithInvalidPostData()
    {
        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'en_GB',
                'db' => array(
                    'driver' => GC_DATABASE_DRIVER,
                    'username' => GC_DATABASE_USERNAME,
                    'dbname' => GC_DATABASE_DATABASE,
                    'hostname' => GC_DATABASE_HOSTNAME,
                    'password' => GC_DATABASE_PASSWORD,
                )
            )
        );

        $this->dispatch(
            '/install/configuration',
            'POST',
            array(
            )
        );
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('installConfiguration');
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::init
     * @covers Application\Controller\InstallController::checkInstall
     * @covers Application\Controller\InstallController::completeAction
     *
     * @return void
     */
    public function testCheckInstallSecondStep()
    {
        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
            )
        );

        $this->dispatch('/install/configuration');
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('installConfiguration');
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::init
     * @covers Application\Controller\InstallController::checkInstall
     * @covers Application\Controller\InstallController::completeAction
     *
     * @return void
     */
    public function testCheckInstallThirdStep()
    {
        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'en_GB',
            )
        );

        $this->dispatch('/install/configuration');
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('installConfiguration');
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::init
     * @covers Application\Controller\InstallController::checkInstall
     * @covers Application\Controller\InstallController::completeAction
     *
     * @return void
     */
    public function testCheckInstallFifthStep()
    {
        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'en_GB',
                'db' => array(
                    'driver' => GC_DATABASE_DRIVER,
                    'username' => GC_DATABASE_USERNAME,
                    'dbname' => GC_DATABASE_DATABASE,
                    'hostname' => GC_DATABASE_HOSTNAME,
                    'password' => GC_DATABASE_PASSWORD,
                )
            )
        );

        $this->dispatch('/install/complete');
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('installComplete');
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::init
     * @covers Application\Controller\InstallController::checkInstall
     * @covers Application\Controller\InstallController::completeAction
     *
     * @return void
     */
    public function testCheckInstallSixthStep()
    {
        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'en_GB',
                'db' => array(
                    'driver' => GC_DATABASE_DRIVER,
                    'username' => GC_DATABASE_USERNAME,
                    'dbname' => GC_DATABASE_DATABASE,
                    'hostname' => GC_DATABASE_HOSTNAME,
                    'password' => GC_DATABASE_PASSWORD,
                ),
                'configuration' => array(
                    'fakeData'
                )
            )
        );

        $this->dispatch('/install/complete');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('installComplete');
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::completeAction
     *
     * @return void
     */
    public function testCompleteActionDatabase()
    {
        $dbAdapter     = Registry::get('Db');
        $configuration = Registry::get('Configuration');

        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'fr_FR',
                'db' => array(
                    'driver' => GC_DATABASE_DRIVER,
                    'username' => GC_DATABASE_USERNAME,
                    'dbname' => GC_DATABASE_DATABASE,
                    'hostname' => GC_DATABASE_HOSTNAME,
                    'password' => GC_DATABASE_PASSWORD,
                ),
                'configuration' => array(
                    'site_name' => 'GotCms',
                    'site_is_offiline' => 0,
                    'admin_email' => 'pierre.rambaud86@gmail.com',
                    'admin_firstname' => 'Pierre',
                    'admin_lastname' => 'Rambaud'
                )
            )
        );

        $this->getRequest()->getHeaders()->addHeaderLine('X_REQUESTED_WITH: XMLHttpRequest');
        $this->dispatch(
            '/install/complete',
            'POST',
            array(
                'step' => 'c-db'
            )
        );
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('installComplete');

        Registry::set('Db', $dbAdapter);
        GlobalAdapterFeature::setStaticAdapter($dbAdapter);
        Registry::set('Configuration', $configuration);
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::completeAction
     *
     * @return void
     */
    public function testCompleteActionData()
    {
        $dbAdapter     = Registry::get('Db');
        $configuration = Registry::get('Configuration');

        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'fr_FR',
                'db' => array(
                    'driver' => GC_DATABASE_DRIVER,
                    'username' => GC_DATABASE_USERNAME,
                    'dbname' => GC_DATABASE_DATABASE,
                    'hostname' => GC_DATABASE_HOSTNAME,
                    'password' => GC_DATABASE_PASSWORD,
                ),
                'configuration' => array(
                    'site_name' => 'GotCms',
                    'site_is_offline' => 0,
                    'admin_email' => 'pierre.rambaud86@gmail.com',
                    'admin_firstname' => 'Pierre',
                    'admin_lastname' => 'Rambaud'
                )
            )
        );

        $config    = CoreConfig::getInstance();
        $oldValues = $config->getValues();
        $config->delete('1 = 1');
        $this->getRequest()->getHeaders()->addHeaderLine('X_REQUESTED_WITH: XMLHttpRequest');
        $this->dispatch(
            '/install/complete',
            'POST',
            array(
                'step' => 'i-d'
            )
        );

        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('installComplete');

        foreach ($oldValues as $value) {
            $identifier = $config->fetchRow($config->select(array('identifier' => $value['identifier'])));
            if (empty($identifier)) {
                unset($value['id']);
                $config->insert($value);
            }
        }

        Registry::set('Db', $dbAdapter);
        GlobalAdapterFeature::setStaticAdapter($dbAdapter);
        Registry::set('Configuration', $configuration);
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::completeAction
     *
     * @return void
     */
    public function testCompleteActionTemplate()
    {
        $dbAdapter     = Registry::get('Db');
        $configuration = Registry::get('Configuration');

        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'fr_FR',
                'db' => array(
                    'driver' => GC_DATABASE_DRIVER,
                    'username' => GC_DATABASE_USERNAME,
                    'dbname' => GC_DATABASE_DATABASE,
                    'hostname' => GC_DATABASE_HOSTNAME,
                    'password' => GC_DATABASE_PASSWORD,
                ),
                'configuration' => array(
                    'site_name' => 'GotCms',
                    'site_is_offiline' => 0,
                    'admin_email' => 'pierre.rambaud86@gmail.com',
                    'admin_firstname' => 'Pierre',
                    'admin_lastname' => 'Rambaud',
                    'template' => 'photoartwork',
                )
            )
        );

        $this->getRequest()->getHeaders()->addHeaderLine('X_REQUESTED_WITH: XMLHttpRequest');
        $this->dispatch(
            '/install/complete',
            'POST',
            array(
                'step' => 'it'
            )
        );
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('installComplete');

        Registry::set('Db', $dbAdapter);
        GlobalAdapterFeature::setStaticAdapter($dbAdapter);
        Registry::set('Configuration', $configuration);
    }

    /**
     * Test
     *
     * @covers Application\Controller\InstallController::completeAction
     *
     * @return void
     */
    public function testCompleteActionConfiguration()
    {
        $dbAdapter     = Registry::get('Db');
        $configuration = Registry::get('Configuration');

        $session = new SessionContainer();
        $session->offsetSet(
            'install',
            array(
                'lang' => 'fr_FR',
                'db' => array(
                    'driver' => GC_DATABASE_DRIVER,
                    'username' => GC_DATABASE_USERNAME,
                    'dbname' => GC_DATABASE_DATABASE,
                    'hostname' => GC_DATABASE_HOSTNAME,
                    'password' => GC_DATABASE_PASSWORD,
                ),
                'configuration' => array(
                    'site_name' => 'GotCms',
                    'site_is_offiline' => 0,
                    'admin_email' => 'pierre.rambaud86@gmail.com',
                    'admin_firstname' => 'Pierre',
                    'admin_lastname' => 'Rambaud'
                )
            )
        );

        $this->getRequest()->getHeaders()->addHeaderLine('X_REQUESTED_WITH: XMLHttpRequest');
        $this->dispatch(
            '/install/complete',
            'POST',
            array(
                'step' => 'c-cf'
            )
        );
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Application');
        $this->assertControllerName('InstallController');
        $this->assertControllerClass('InstallController');
        $this->assertMatchedRouteName('installComplete');

        Registry::set('Db', $dbAdapter);
        GlobalAdapterFeature::setStaticAdapter($dbAdapter);
        Registry::set('Configuration', $configuration);
    }
}
