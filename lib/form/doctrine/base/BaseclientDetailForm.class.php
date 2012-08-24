<?php

/**
 * clientDetail form base class.
 *
 * @method clientDetail getObject() Returns the current form's model object
 *
 * @package    symfonypractice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseclientDetailForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'id_client' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('client'), 'add_empty' => true)),
      'name'      => new sfWidgetFormInputText(),
      'email'     => new sfWidgetFormInputText(),
      'address'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'id_client' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('client'), 'required' => false)),
      'name'      => new sfValidatorPass(array('required' => false)),
      'email'     => new sfValidatorPass(array('required' => false)),
      'address'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('client_detail[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'clientDetail';
  }

}
