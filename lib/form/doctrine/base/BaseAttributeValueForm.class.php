<?php

/**
 * AttributeValue form base class.
 *
 * @method AttributeValue getObject() Returns the current form's model object
 *
 * @package    symfonypractice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAttributeValueForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'attribute_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Attribute'), 'add_empty' => true)),
      'value'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'attribute_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Attribute'), 'required' => false)),
      'value'        => new sfValidatorString(array('max_length' => 50)),
    ));

    $this->widgetSchema->setNameFormat('attribute_value[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AttributeValue';
  }

}
