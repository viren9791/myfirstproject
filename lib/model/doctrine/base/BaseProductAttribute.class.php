<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ProductAttribute', 'doctrine');

/**
 * BaseProductAttribute
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $product_id
 * @property integer $attribute_id
 * @property integer $attribute_value_id
 * @property integer $price
 * @property varchar $image
 * @property Attribute $Attribute
 * @property AttributeValues $AttributeValues
 * @property Product $Product
 * 
 * @method integer          getId()                 Returns the current record's "id" value
 * @method integer          getProductId()          Returns the current record's "product_id" value
 * @method integer          getAttributeId()        Returns the current record's "attribute_id" value
 * @method integer          getAttributeValueId()   Returns the current record's "attribute_value_id" value
 * @method integer          getPrice()              Returns the current record's "price" value
 * @method varchar          getImage()              Returns the current record's "image" value
 * @method Attribute        getAttribute()          Returns the current record's "Attribute" value
 * @method AttributeValues  getAttributeValues()    Returns the current record's "AttributeValues" value
 * @method Product          getProduct()            Returns the current record's "Product" value
 * @method ProductAttribute setId()                 Sets the current record's "id" value
 * @method ProductAttribute setProductId()          Sets the current record's "product_id" value
 * @method ProductAttribute setAttributeId()        Sets the current record's "attribute_id" value
 * @method ProductAttribute setAttributeValueId()   Sets the current record's "attribute_value_id" value
 * @method ProductAttribute setPrice()              Sets the current record's "price" value
 * @method ProductAttribute setImage()              Sets the current record's "image" value
 * @method ProductAttribute setAttribute()          Sets the current record's "Attribute" value
 * @method ProductAttribute setAttributeValues()    Sets the current record's "AttributeValues" value
 * @method ProductAttribute setProduct()            Sets the current record's "Product" value
 * 
 * @package    symfonypractice
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProductAttribute extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('product_attributes');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('product_id', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             ));
        $this->hasColumn('attribute_id', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             ));
        $this->hasColumn('attribute_value_id', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             ));
        $this->hasColumn('price', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             ));
        $this->hasColumn('image', 'varchar', 255, array(
             'type' => 'varchar',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Attribute', array(
             'local' => 'attribute_id',
             'foreign' => 'attribute_id',
             'cascade' => array(
             0 => 'delete',
             )));

        $this->hasOne('AttributeValues', array(
             'local' => 'attribute_value_id',
             'foreign' => 'id',
             'cascade' => array(
             0 => 'delete',
             )));

        $this->hasOne('Product', array(
             'local' => 'product_id',
             'foreign' => 'product_id',
             'cascade' => array(
             0 => 'delete',
             )));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}