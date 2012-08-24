<?php

/**
 * User form base class.
 *
 * @method User getObject() Returns the current form's model object
 *
 * @package    symfonypractice
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'username'               => new sfWidgetFormInputText(),
      'password'               => new sfWidgetFormInputText(),
      'image'                  => new sfWidgetFormInputText(),
      'email'                  => new sfWidgetFormInputText(),
      'contact_no'             => new sfWidgetFormInputText(),
      'tw_oauth_token'         => new sfWidgetFormInputText(),
      'tw_oauth_token_secrete' => new sfWidgetFormInputText(),
      'fb_uid'                 => new sfWidgetFormInputText(),
      'fb_access_token'        => new sfWidgetFormInputText(),
      'salt'                   => new sfWidgetFormInputText(),
      'created_at'             => new sfWidgetFormDateTime(),
      'updated_at'             => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'username'               => new sfValidatorString(array('max_length' => 255)),
      'password'               => new sfValidatorString(array('max_length' => 255)),
      'image'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'contact_no'             => new sfValidatorString(array('max_length' => 13, 'required' => false)),
      'tw_oauth_token'         => new sfValidatorString(array('max_length' => 50)),
      'tw_oauth_token_secrete' => new sfValidatorString(array('max_length' => 255)),
      'fb_uid'                 => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'fb_access_token'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'salt'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'             => new sfValidatorDateTime(),
      'updated_at'             => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

}
