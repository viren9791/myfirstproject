<?php

sfProjectConfiguration::getActive()->loadHelpers('I18N');

/**
 * Product form.
 *
 * @package    Myfirtsproject
 * @subpackage Form
 * @author     viren   <virendav.vitrainee@gmail.com>      
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProductForm extends BaseProductForm
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
      $this->useFields(array('name', 'price', 'description', 'image'));
      // Set form widgets
      $this->buildWidgetSchema();
  
      // Set form validators
      $this->buildValidatorSchema();
  
      $this->validatorSchema->setOption('allow_extra_fields', true);
      $this->widgetSchema->setNameFormat('product[%s]');  
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
        $product = Doctrine::getTable('category')->getAllCategoryOptions();
        $this->setWidgets(
            array(            
                'name' => new sfWidgetFormInputText(
                    array(
                        'label' => __('lbl_product_name')
                    ),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'), 'tabindex'  => 1
                    )
                ),
                'price' => new sfWidgetFormInputText(
                    array(
                        'label' =>  __('lbl_price')
                    ),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'), 'tabindex'  => 1
                    )
                ),
                'description' => new sfWidgetFormTextarea(
                    array(
                        'label' =>  __('lbl_description')
                    ),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'), 'tabindex'  => 1
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
                'name' => new sfValidatorString(
                    array(
                        'required' => true, 
                        'trim'     => true
                    ),
                    array(
                        'required' =>  __('msg_product_name_blank')
                    )
                ),
                'price' => new sfValidatorString(
                    array(
                        'required' => true, 
                        'trim'     => true
                    ),
                    array(
                        'required' => __('msg_price_blank')
                    )
                ),
                'description' => new sfValidatorString(
                    array(
                        'required' => true, 
                        'trim'     => true
                    ),
                    array(
                        'required' => __('msg_description_blank')
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
