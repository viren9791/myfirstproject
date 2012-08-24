<?php

/**
 * Content form base class.
 *
 * @method Content getObject() Returns the current form's model object
 *
 * @package    symfonypractice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseContentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_content'   => new sfWidgetFormInputHidden(),
      'content_type' => new sfWidgetFormInputText(),
      'enable'       => new sfWidgetFormChoice(array('choices' => array('yes' => 'yes', 'no' => 'no'))),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_content'   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_content', 'required' => false)),
      'content_type' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'enable'       => new sfValidatorChoice(array('choices' => array(0 => 'yes', 1 => 'no'), 'required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('content[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Content';
  }

}
