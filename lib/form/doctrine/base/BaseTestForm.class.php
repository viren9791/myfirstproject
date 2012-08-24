<?php

/**
 * Test form base class.
 *
 * @method Test getObject() Returns the current form's model object
 *
 * @package    symfonypractice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTestForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'    => new sfWidgetFormInputHidden(),
      'chk_1' => new sfWidgetFormChoice(array('choices' => array('yes' => 'yes', 'no' => 'no'))),
      'chk_2' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'    => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'chk_1' => new sfValidatorChoice(array('choices' => array(0 => 'yes', 1 => 'no'))),
      'chk_2' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('test[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Test';
  }

}
