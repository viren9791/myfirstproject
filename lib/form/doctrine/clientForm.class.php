<?php

/**
 * client form.
 *
 * @package    Myfirtsproject
 * @subpackage Form
 * @author     viren   <virendav.vitrainee@gmail.com> 
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clientForm extends BaseclientForm
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
      unset($this['id'], $this['created_at'], $this['updated_at']);
      // Set form widgets
      $this->buildWidgetSchema();
  
      // Set form validators
      $this->buildValidatorSchema();
      $clientDetail = new clientDetail();
      $clientDetail->client = $this->getObject();
      $form = new ClientDetailForm($clientDetail);
      $this->embedForm('newForm', $form);
      $this->validatorSchema->setOption('allow_extra_fields', true);
      $this->widgetSchema->setNameFormat('client[%s]'); 
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
                        'label' => 'Username'
                    ),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'), 
                        'tabindex' => 1
                    )
                ),
                'password' => new sfWidgetFormInputPassword(
                    array(
                        'label' => 'Password'
                    ),
                    array(
                        'maxlength' => sfConfig::get('app_maxlength'), 'tabindex' => 1
                    )
                )
            )
        );      
    }

   /**
    * Executes buildWidgetSchema function
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
                        'required' => 'Enter username'
                    )
                ),
                'password' => new sfValidatorString(
                    array(
                        'required' => true, 
                        'trim' => true
                    ),
                    array(
                        'required' => 'Enter password'
                    )
                )
            )
        );  
    }              
}
