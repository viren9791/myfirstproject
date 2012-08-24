<?php
sfProjectConfiguration::getActive()->loadHelpers('I18N');
/**
 * Content form.
 *
 * @package    Myfirtsproject
 * @subpackage Form
 * @author     viren   <virendav.vitrainee@gmail.com> 
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContentForm extends BaseContentForm
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
      $this->useFields(array('content_type', 'enable'));
      // Set form widgets
      $this->buildWidgetSchema();
  
      // Set form validators
      $this->buildValidatorSchema();
      $this->embedI18n(array('en', 'fi'));
      $this->validatorSchema->setOption('allow_extra_fields', true);
      $this->widgetSchema->setNameFormat('Content[%s]'); 
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
                'content_type' => new sfWidgetFormInputText(
                    array(
                        'label' => 'Content Type'
                    ),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'), 'tabindex'  => 1
                    )
                ),      
                'enable' => new sfWidgetFormInputCheckbox(
                    array(
                        'label' => 'Content status'
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
                'content_type' => new sfValidatorString(
                    array(
                        'required' => true, 
                        'trim' => true
                    ),
                    array(
                        'required' => 'Please enter Type'
                    )
                )
            )
        ); 
    } 
}
