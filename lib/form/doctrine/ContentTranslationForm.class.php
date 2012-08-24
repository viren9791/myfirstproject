<?php
/**
 * ContentTranslation form.
 *
 * @package    Myfirtsproject
 * @subpackage Form
 * @author     viren   <virendav.vitrainee@gmail.com> 
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContentTranslationForm extends BaseContentTranslationForm
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
      $this->useFields(array('content_title', 'image'));
      // Set form widgets
      $this->buildWidgetSchema();
  
      // Set form validators
      $this->buildValidatorSchema();   
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
                'content_title' => new sfWidgetFormInputText(
                    array(
                        'label' => __('lbl_content_title')
                    ),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'),
                        'tabindex'  => 1
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
                'content_title' => new sfValidatorString(
                    array(
                        'required' => true, 
                         'trim' => true
                    ),
                    array(
                       'required' => 'Please enter Title'
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
