<?php

/**
 * AttributeValues form.
 *
 * @package    Myfirtsproject
 * @subpackage Form
 * @author     viren   <virendav.vitrainee@gmail.com> 
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AttributeValuesForm extends BaseAttributeValuesForm
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
      $this->useFields(array('attribute_id', 'value'));
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
        $attribute = Doctrine::getTable('Attribute')->getAllAttributesOptions();
        $this->setWidgets(
            array(
                'attribute_id' => new sfWidgetFormDoctrineChoice(
                    array(
                        'model' => 'Attribute', 
                        'method'    => 'getName',
                        'query'     => $attribute),
                    array(
                        'label' => __('lbl_attribute'), 
                        'tabindex' => '7',
                        'class'    => 'textbox_standard'
                    )
                ),    
                'value' => new sfWidgetFormInputText(
                    array(
                        'label'     => __('lbl_attribute_value')
                    ),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'), 
                        'tabindex'  => 1
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
                'attribute_id' => new sfValidatorDoctrineChoice(
                    array(
                        'model'    => 'Attribute', 
                        'required' => false
                    )
                ),
                'value' => new sfValidatorString(
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
