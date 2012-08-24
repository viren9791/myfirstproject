<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Language', 'doctrine');

/**
 * BaseLanguage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property enum $enabled
 * @property string $language_name
 * @property string $culture
 * @property enum $def
 * 
 * @method enum     getEnabled()       Returns the current record's "enabled" value
 * @method string   getLanguageName()  Returns the current record's "language_name" value
 * @method string   getCulture()       Returns the current record's "culture" value
 * @method enum     getDef()           Returns the current record's "def" value
 * @method Language setEnabled()       Sets the current record's "enabled" value
 * @method Language setLanguageName()  Sets the current record's "language_name" value
 * @method Language setCulture()       Sets the current record's "culture" value
 * @method Language setDef()           Sets the current record's "def" value
 * 
 * @package    symfonypractice
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLanguage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('language');
        $this->hasColumn('enabled', 'enum', 3, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'yes',
              1 => 'no',
             ),
             'default' => 'yes',
             'length' => 3,
             ));
        $this->hasColumn('language_name', 'string', 30, array(
             'type' => 'string',
             'length' => 30,
             ));
        $this->hasColumn('culture', 'string', 10, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 10,
             ));
        $this->hasColumn('def', 'enum', 3, array(
             'type' => 'enum',
             'fixed' => 0,
             'values' => 
             array(
              0 => 'yes',
              1 => 'no',
             ),
             'default' => 'no',
             'length' => 3,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}