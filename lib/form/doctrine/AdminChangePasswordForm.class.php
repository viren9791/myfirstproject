<?php

sfProjectConfiguration::getActive()->loadHelpers('I18N');

/**
 * ChangePasswordForm
 *
 * @package    Myfirtsproject
 * @subpackage Form
 * @author     viren   <virendav.vitrainee@gmail.com>  
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
 
class ChangePasswordForm extends BaseAdminForm
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
       //$this->useFields(array('password', 'Old_password', 'confirm_password'));
	   
       // Set form widgets
       $this->buildWidgetSchema();
  
       // Set form validators
       $this->buildValidatorSchema();
  
       $this->mergePostValidator(
           new sfValidatorSchemaCompare(
                'password', 
                sfValidatorSchemaCompare::IDENTICAL, 
                'confirm_password', array(), 
                array('invalid' => __('msg_confirm_password_invalid'))
            )
       );
       $this->validatorSchema->setOption('allow_extra_fields', true);
       $this->widgetSchema->setNameFormat('ChangePasswordForm[%s]');
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
                        'label' => __('lbl_new_password')
                    ),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'), 'tabindex' => 1
                    )
                ),
                'Old_password' => new sfWidgetFormInputPassword(
                    array(
                        'label' => __('lbl_old_password')
                    ),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'), 'tabindex' => 1
                    )
                ),
                'confirm_password' => new sfWidgetFormInputPassword(
                    array(
                        'label' => __('lbl_confirm_password')
                    ),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'), 'tabindex' => 1
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
                        'required' => __('msg_new_password_blank')
                    )
                ),
                'Old_password' =>  new sfValidatorAnd(
                    array(
                        new sfValidatorString(),  
                        new sfValidatorCallback(
                            array(
                                'callback'=> array($this,'checkOldPassword'),
                                'arguments'=> array()
                            ),
                            array(
                                'invalid'=> __('msg_old_password_invalid')
                            )
                        )
                    ),
                    array(
                        'required' => true, 
                        'trim' => true
                    ),
                    array(
                        'required' => __('msg_old_password_blank')
                    )
                ),
                'confirm_password'   => new sfValidatorString(
                    array(
                        'required' => true, 'trim' => true
                    ),
                    array(
                        'required' => __('msg_confirm_password_blank')
                    )
                )
            )
        );
    } 
      
   
  
   /**
    * Function for check Old Password with inputed Password
    *
    * @param String $validator stores validator value
    * @param String $values    stores value for password
    *
    * @author viren <virendav.vitrainee@gmail.com>    
    * @access public
    *
    * @return String
    */      
  
    public function checkOldPassword($validator, $values)    
    {
        $ssUserName =  sfContext::getInstance()->getUser()->getAttribute('user');
        $oUser      = Doctrine::getTable('admin')->find(trim($ssUserName));               
        if($oUser)  
        {  
            if($oUser->getPassword() == $values)
                return $values;                                                                
            else
                throw new sfValidatorError($validator, 'invalid');                                  
        }
    }    
}
