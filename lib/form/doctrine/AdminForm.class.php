<?php
sfProjectConfiguration::getActive()->loadHelpers('I18N');
/**
 * Admin form.
 *
 * @package    Myfirtsproject
 * @subpackage Form
 * @author     viren   <virendav.vitrainee@gmail.com>  
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdminForm extends BaseAdminForm
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
      //unset($this['id']);  
      $this->useFields(array('username', 'password'));
      // Set form widgets
      $this->buildWidgetSchema();
  
      // Set form validators
      $this->buildValidatorSchema();
      $this->validatorSchema->setOption('allow_extra_fields', true);
      $this->widgetSchema->setNameFormat('admin[%s]');
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
                    array(
                        'label' => __('lbl_username')
                    ),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'),'tabindex' => 1
                    )
                ),
                'password' => new sfWidgetFormInputPassword(
                    array(
                        'label' => __('lbl_password')
                    ),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'),'tabindex' => 1
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
                    array(
                        'required' => __('msg_username_blank')
                    )
                ),
                'password' => new sfValidatorString(
                    array(
                        'required' => true, 
                        'trim' => true
                    ),
                    array(
                        'required' => __('msg_password_blank')
                    )
                )
            )
        );  
    }
}
