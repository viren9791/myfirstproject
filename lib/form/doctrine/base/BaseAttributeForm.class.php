<?php

/**
 * Attribute form base class.
 *
 * @method Attribute getObject() Returns the current form's model object
 *
 * @package    symfonypractice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAttributeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'attribute_id' => new sfWidgetFormInputHidden(),
      'name'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'attribute_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'attribute_id', 'required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 50)),
    ));

    $this->widgetSchema->setNameFormat('attribute[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Attribute';
  }

}
