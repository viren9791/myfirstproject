<?php

/**
 * Product form base class.
 *
 * @method Product getObject() Returns the current form's model object
 *
 * @package    symfonypractice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProductForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'product_id'  => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'price'       => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormInputText(),
      'image'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'product_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'product_id', 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 50)),
      'price'       => new sfValidatorInteger(array('required' => false)),
      'description' => new sfValidatorPass(),
      'image'       => new sfValidatorString(array('max_length' => 50)),
    ));

    $this->widgetSchema->setNameFormat('product[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Product';
  }

}
