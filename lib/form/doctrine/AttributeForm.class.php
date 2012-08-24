<?php

/**
 * Attribute form.
 *
 * @package    Myfirtsproject
 * @subpackage Form
 * @author     viren   <virendav.vitrainee@gmail.com> 
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AttributeForm extends BaseAttributeForm
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
      $this->useFields(array('name'));
      // Set form widgets
      $this->buildWidgetSchema();
  
      // Set form validators
      $this->buildValidatorSchema();
      $this->validatorSchema->setOption('allow_extra_fields', true);
      $this->widgetSchema->setNameFormat('attribute[%s]');  
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
                        'label' => __('lbl_attribute')
                    ),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'), 'tabindex'  => 1
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
                        'trim'     => true
                    ),
                    array(
                        'required' =>  __('msg_product_name_blank')
                    )
                )
            )
        );  
    }
}
