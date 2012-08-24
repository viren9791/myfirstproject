<?php

/**
 * Language form base class.
 *
 * @method Language getObject() Returns the current form's model object
 *
 * @package    symfonypractice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseLanguageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'enabled'       => new sfWidgetFormChoice(array('choices' => array('yes' => 'yes', 'no' => 'no'))),
      'language_name' => new sfWidgetFormInputText(),
      'culture'       => new sfWidgetFormInputText(),
      'def'           => new sfWidgetFormChoice(array('choices' => array('yes' => 'yes', 'no' => 'no'))),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'enabled'       => new sfValidatorChoice(array('choices' => array(0 => 'yes', 1 => 'no'), 'required' => false)),
      'language_name' => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'culture'       => new sfValidatorString(array('max_length' => 10)),
      'def'           => new sfValidatorChoice(array('choices' => array(0 => 'yes', 1 => 'no'), 'required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('language[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Language';
  }

}
