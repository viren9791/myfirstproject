<?php

/**
 * ProductAttribute form.
 *
 * @package    Myfirtsproject
 * @subpackage Form
 * @author     viren   <virendav.vitrainee@gmail.com>    
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProductAttributeForm extends BaseProductAttributeForm
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
      $this->useFields(array('product_id', 'attribute_id', 'attribute_value_id', 'price', 'image'));
	  // Set form widgets
      $this->buildWidgetSchema();
  
      // Set form validators
      $this->buildValidatorSchema();     
      $this->validatorSchema->setOption('allow_extra_fields', true);
      $this->widgetSchema->setNameFormat('productAttributes[%s]');  
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
        $product = Doctrine::getTable('Product')->getAllProductOptions();
        $attribute = Doctrine::getTable('Attribute')->getAllAttributesOptions();
        $attributeValues = Doctrine::getTable('AttributeValues')->getAllAttributeOptions();
        $this->setWidgets(
            array(
                'product_id' => new sfWidgetFormDoctrineChoice(
                    array(
                        'model'=>'Product', 
                        'method'=>'getName', 
                        'query'=>$product
                    ),
                    array(
                        'tabindex'=>'7', 
                        'class'=>'textbox_standard'
                    )
                ),
                'attribute_id' => new sfWidgetFormDoctrineChoice(
                    array(
                        'model'=>'Attribute', 
                        'method'=>'getName', 
                        'query'=>$attribute
                    ),
                    array(
                        'tabindex'=>'7', 
                        'class'=>'textbox_standard'
                    )
                ),
                'attribute_value_id' => new sfWidgetFormDoctrineChoice(
                    array(
                        'model'=>'AttributeValues', 
                        'method'=>'getValue', 
                        'query'=>$attributeValues
                    ),
                    array(
                        'tabindex'=>'7',
                        'class'=>'textbox_standard'
                    )
                ),
                'price' => new sfWidgetFormInputText(
                    array(
                        'label' => __('lbl_price')
                    ),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'), 
                        'tabindex' => 1
                    )
                ),
                'image' => new sfWidgetFormInputFileEditable(
                    array(
                        'edit_mode'   => false, 
                        'with_delete' => false, 
                        'file_src'    => ''
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
                'product_id' => new sfValidatorDoctrineChoice(
                    array(
                        'model' => 'Product',
                        'required' => false
                    )
                ),
                'attribute_id' => new sfValidatorDoctrineChoice(
                    array(
                        'model' => 'Attribute', 
                        'required' => false
                    )
                ),
                'attribute_value_id' => new sfValidatorDoctrineChoice(
                    array(
                        'model' => 'AttributeValues', 
                        'required' => false
                    )
                ),
                'price' => new sfValidatorString(
                    array(
                        'required' => true, 
                        'trim' => true
                    ),
                    array(
                        'required' => __('msg_price_blank')
                    ) 
                ),
                'image' => new sfValidatorFile(
                    array(
                        'max_size'             => sfConfig::get('app_max_size'),
                        'mime_types'           => sfConfig::get('app_mime_types'),
                        'path'                 => sfConfig::get('sf_upload_dir').'/uploads/',
                        'required'             => true,        
                        'validated_file_class' => 'sfValidatedFileCustom'
                    ),
                    array(
                        'required'=>__('msg_image_blank')
                    )
                )
            )
        );
    }
}
