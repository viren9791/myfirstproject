<?php

/**
 * ContentTranslation form base class.
 *
 * @method ContentTranslation getObject() Returns the current form's model object
 *
 * @package    symfonypractice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseContentTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_content'    => new sfWidgetFormInputHidden(),
      'content_title' => new sfWidgetFormInputText(),
      'image'         => new sfWidgetFormInputText(),
      'lang'          => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id_content'    => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_content', 'required' => false)),
      'content_title' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'image'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lang'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'lang', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('content_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContentTranslation';
  }

}
