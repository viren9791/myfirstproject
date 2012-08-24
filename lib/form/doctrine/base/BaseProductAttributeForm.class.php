<?php

/**
 * ProductAttribute form base class.
 *
 * @method ProductAttribute getObject() Returns the current form's model object
 *
 * @package    symfonypractice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProductAttributeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'product_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Product'), 'add_empty' => true)),
      'attribute_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Attribute'), 'add_empty' => true)),
      'attribute_value_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AttributeValues'), 'add_empty' => true)),
      'price'              => new sfWidgetFormInputText(),
      'image'              => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'product_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Product'), 'required' => false)),
      'attribute_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Attribute'), 'required' => false)),
      'attribute_value_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AttributeValues'), 'required' => false)),
      'price'              => new sfValidatorInteger(array('required' => false)),
      'image'              => new sfValidatorPass(array('required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('product_attribute[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductAttribute';
  }

}
