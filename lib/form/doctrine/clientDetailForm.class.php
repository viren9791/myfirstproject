<?php

/**
 * clientDetail form.
 *
 * @package    Myfirtsproject
 * @subpackage Form
 * @author     viren   <virendav.vitrainee@gmail.com> 
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clientDetailForm extends BaseclientDetailForm
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
      //unset($this['id'], $this['id_client']);
      $this->useFields(array('name', 'email', 'address'));
      // Set form widgets
      $this->buildWidgetSchema();
  
      // Set form validators
      $this->buildValidatorSchema();
      $this->validatorSchema->setOption('allow_extra_fields', true);
      $this->widgetSchema->setNameFormat('clientDetail[%s]');

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
                'name' => new sfWidgetFormInputText(
                    array(
                        'label' => __('lbl_name')
                    ),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'),'tabindex' => 1
                    )
                ),
                'email' => new sfWidgetFormInputText(
                    array(
                        'label' => __('lbl_email')
                    ),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'), 'tabindex' => 1
                    )
                ),
                'address' => new sfWidgetFormTextarea(
                    array(
                        'label' => __('lbl_address')
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
                'name' => new sfValidatorString(
                    array(
                        'required' => true, 
                        'trim' => true
                    ),
                    array(
                        'required' => __('msg_name_blank')
                    )
                ),        
                'email' => new sfValidatorString(
                    array(
                        'required' => true, 
                        'trim' => true 
                    ),
                    array(
                        'required' => __('msg_email_blank')
                    )
                ),        
                'address' => new sfValidatorString(
                    array(
                        'required' => true,
                        'trim' => true
                    ),
                    array(
                        'required' => __('msg_address_blank')
                    )
                )
            )
        );
    }
}
