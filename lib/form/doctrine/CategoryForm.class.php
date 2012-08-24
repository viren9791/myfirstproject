<?php
sfProjectConfiguration::getActive()->loadHelpers('I18N');
/**
 * Category form.
 *
 * @package    Myfirtsproject
 * @subpackage Form
 * @author     viren   <virendav.vitrainee@gmail.com> 
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CategoryForm extends BaseCategoryForm
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
      //unset($this['category_id']);
      $this->useFields(array('name', 'parent_id'));
      // Set form widgets
      $this->buildWidgetSchema();
  
      // Set form validators
      $this->buildValidatorSchema();
      $this->validatorSchema->setOption('allow_extra_fields', true);
      $this->widgetSchema->setNameFormat('category[%s]'); 
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
        $ocategory = Doctrine::getTable('category')->getAllCategoryOptions();  
        $this->setWidgets(
            array(
                'name' => new sfWidgetFormInputText(
                    array(
                        'label' => __('lbl_category_name')
                    ),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'), 'tabindex' => 1
                    )
                ),
                'parent_id' => new sfWidgetFormDoctrineChoice(
                    array(
                        'model'=>'category', 
                        'method'=>'getName',
                        'add_empty'=> "Main",
                        'query'=>$ocategory
                    ),
                    array(
                        'tabindex'=>'7',
                        'class'=>'textbox_standard'
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
                        'required' => __('msg_category_blank')
                    )
                ),
                'parent_id' => new sfValidatorDoctrineChoice(
                    array(
                        'model' => 'category', 
                        'required' => false
                    )
                )
            )
        );  
    }
}
