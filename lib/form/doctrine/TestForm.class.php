<?php

/**
 * Test form.
 *
 * @package    Myfirtsproject
 * @subpackage Form
 * @author     viren   <virendav.vitrainee@gmail.com>      
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TestForm extends BaseTestForm
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
      $this->useFields(array('chk_1', 'chk_2'));
      // Set form widgets
      $this->buildWidgetSchema();
  
      // Set form validators
      $this->buildValidatorSchema();
      
      $this->validatorSchema->setOption('allow_extra_fields', true);
      $this->widgetSchema->setNameFormat('test[%s]'); 
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
                'chk_1' => new sfWidgetFormInputCheckbox(
                    array(
                        'label' => 'checkbox 1'
                    ),
                    array(
                        'tabindex' => 1
                    )
                ),
                'chk_2' => new sfWidgetFormInputCheckbox(
                    array(
                        'label' => 'check box 2', 
                        'value_attribute_value' => 1
                    ),
                    array(
                        'tabindex' => 1
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
                'chk_1' => new sfValidatorString(
                    array('required' => false)
                ),
                'chk_2' => new sfValidatorString(
                    array('required' => false)
                )
            )
        );  
    }
}
