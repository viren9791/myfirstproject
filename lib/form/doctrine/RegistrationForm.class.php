<?php
sfProjectConfiguration::getActive()->loadHelpers('I18N');
/**
 * RegistrationForm form.
 *
 * @package    Myfirtsproject
 * @subpackage Form
 * @author     viren   <virendav.vitrainee@gmail.com>      
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
 
class RegistrationForm extends BaseUserForm
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
      //unset($this['id'], $this['created_at'], $this['updated_at']); 
      $this->useFields(array('username', 'password', 'image', 'email', 'contact_no'));
      // Set form widgets
      $this->buildWidgetSchema();
  
      // Set form validators
      $this->buildValidatorSchema();	
            
      $this->validatorSchema->setOption('allow_extra_fields', true);
      $this->widgetSchema->setNameFormat('user[%s]');
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
                'username' => new sfWidgetFormInputText(
                    array('label' => 'Username'),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'), 
                        'tabindex' => 1
                    )
                ),
                'password' => new sfWidgetFormInputPassword(
                    array('label' => 'Password'),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'), 
                        'tabindex' => 1
                    )
                ),
                'image' => new sfWidgetFormInputFileEditable(
                    array(
                        'edit_mode'=>false, 
                        'with_delete' => false, 
                        'file_src' => ''
                    )
                ),        
                'email' => new sfWidgetFormInputText(
                    array('label' => 'Email'),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'), 
                        'tabindex' => 1
                    )
                ),
                'contact_no' => new sfWidgetFormInputText(
                    array('label' => 'Contact No'),
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
                'username' => new sfValidatorString(
                    array(
                        'required' => true, 
                        'trim' => true
                    ),
                    array('required' => __('msg_username_blank'))
                ),
                'username' => new sfValidatorDoctrineUnique(
                    array(
                        'model'    => 'User', 
                        'column' => 'username'
                    ),
                    array('invalid'  => 'already exists.')
                ),  
                'password' => new sfValidatorString(
                    array(
                        'required' => true, 
                        'trim' => true
                    ),
                    array('required' => __('msg_password_blank'))
                ),
                'image' => new sfValidatorFile(
                    array(
                        'max_size'             => sfConfig::get('app_max_size'),
                        'mime_types'           => sfConfig::get('app_mime_types'),
                        'path'                 => sfConfig::get('sf_upload_dir').'/uploads/',
                        'required'             => true,        
                        'validated_file_class' => 'sfValidatedFileCustom'
                    ),
                    array('required'=> __('msg_image_blank'))
                ),
                'email' => new sfValidatorString(
                    array(
                        'required' => true, 
                        'trim' => true
                    ),
                    array('required' => __('msg_email_blank'))
                ),
                'contact_no' => new sfValidatorString(
                    array(
                        'required' => true, 
                        'trim' => true
                    ),
                    array('required' => __('msg_contact_blank'))
                )
            )
        );
    }
}

