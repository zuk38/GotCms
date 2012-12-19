<?php
namespace Datatypes\Textrich;

use Gc\Datatype\Model as DatatypeModel;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-10-17 at 20:42:12.
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 * @group Datatypes
 */
class PrevalueEditorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PrevalueEditor
     */
    protected $_object;

    /**
     * @var DatatypeModel
     */
    protected $_datatype;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {

        $this->_datatype = DatatypeModel::fromArray(array(
            'name' => 'TextrichTest',
            'prevalue_value' => '',
            'model' => 'Textrich',
        ));
        $this->_datatype->save();
        $datatype = new Datatype();
        $datatype->load($this->_datatype);
        $this->_object = $datatype->getPrevalueEditor();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        $this->_datatype->delete();
        unset($this->_datatype);
        unset($this->_object);
    }

    /**
     * @covers Datatypes\Textrich\PrevalueEditor::save
     */
    public function testSave()
    {
        $this->assertNull($this->_object->save());
    }

    /**
     * @covers Datatypes\Textrich\PrevalueEditor::load
     */
    public function testLoad()
    {
        $this->assertTrue(is_string($this->_object->load()));
    }
}
