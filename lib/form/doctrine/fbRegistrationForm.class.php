<?php

/**
 * fbRegistrationForm form.
 *
 * @package    Myfirtsproject
 * @subpackage Form
 * @author     viren   <virendav.vitrainee@gmail.com>  
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FbRegistrationForm extends BaseUserForm
{
  
  /**
  * execute configure
  *
  * @author viren   <virendav.vitrainee@gmail.com>    
  * @access public
  *
  * @return none
  */
  
  public function configure()
  {
      $this->useFields(array('password', 'confirm_password'));
  
      // Set form widgets
      $this->buildWidgetSchema();
  
      // Set form validators
      $this->buildValidatorSchema();
      $this->validatorSchema->setOption('allow_extra_fields', true);
      $this->widgetSchema->setNameFormat('fbRegistration[%s]');
  }            
  
  /**
    * Executes buildWidgetSchema function
    * 
    * @author Viren Dave   <viren.virtueinfo@gmail.com.com>     
    * @access public
    * @return void
    *
    */
    public function buildWidgetSchema()
    {
        $this->setWidgets(
            array(
                'password' => new sfWidgetFormInputPassword(
                    array(
                        'label' => __('lbl_password')
                    ),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'), 
                        'tabindex' => 1
                    )
                ),
                'confirm_password' => new sfWidgetFormInputPassword(
                    array(
                        'label' => __('lbl_confirm_password')
                    ),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'), 
                        'tabindex' => 1
                    )
                )
            )
        );
    }

   /**
    * Executes buildValidatorSchema function
    * 
    * @author Viren Dave   <viren.virtueinfo@gmail.com.com>     
    * @access public
    * @return void
    *
    */
    public function buildValidatorSchema()
    {
        $this->setValidators(
            array(            
                'password' => new sfValidatorString(
                    array(
                        'required' => true, 
                        'trim' => true
                    ),
                    array(
                        'required' => __('msg_password_blank')
                    )
                ),
                'confirm_password'   => new sfValidatorString(
                    array(
                        'required' => true, 
                        'trim' => true
                    ),
                    array(
                        'required' => __('msg_confirm_password_blank')
                    )
                )
            )
        ); 
    }
  
  /**
  * execute updateUserdColumn
  *
  * @param String $username stores username
  * @param String $salt                 stores salt value for encrpt password
  * @param String $email                stores email address
  * @param String $snFbUid              stores faceebook user id
  * @param String $snFbAccessToken      stores facebook access token
  * @param String $access_token         stores access token
  * @param String $access_token_secret  stores token secret
  *
  * @author viren   <virendav.vitrainee@gmail.com>    
  * @access public
  *
  * @return none
  */
  
  public function updateUserdColumn(
    $username, $salt, $email, $snFbUid, $snFbAccessToken, 
    $access_token, $access_token_secret)
  {
      $this->getObject()->setUsername($username);
      $this->getObject()->setSalt($salt);
      $this->getObject()->setTw_oauth_token_secrete($access_token_secret);
      $this->getObject()->setTw_oauth_token($access_token);
      $this->getObject()->setEmail($email);
      $this->getObject()->setFb_uid($snFbUid);
      $this->getObject()->setFb_access_token($snFbAccessToken);    
  }
}
