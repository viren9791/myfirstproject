<?php

/**
* DummyCart form.
*
* @package    Myfirtsproject
* @subpackage Form
* @author     viren   <virendav.vitrainee@gmail.com>  
* @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
*/
  
class DummyCartForm extends BaseDummyCartForm
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
        unset(
            $this['id'], 
            $this['price'], 
            $this['product_id'], 
            $this['user_id'], 
            $this['quantity'], 
            $this['created_at'], 
            $this['updated_at']
        );
        $this->validatorSchema->setOption('allow_extra_fields', true);
        $this->widgetSchema->setNameFormat('DummyCart[%s]'); 
     }
}
