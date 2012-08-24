<?php

  sfProjectConfiguration::getActive()->loadHelpers('I18N');
  
  /**
  * content actions.
  *
  * @package    Myfirstproject
  * @subpackage Content
  * @author     viren   <virendav.vitrainee@gmail.com>     
  * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
  */
  
class contentActions extends sfActions
{
    /**
    * Executes index action
    *
    * @param sfRequest $request A request object
    *
    * @return none
    */
    
    public function executeIndex(sfWebRequest $request)
    {
      echo $this->getUser()->getCulture();exit;
    }
    
    /**
    * Executes add action
    *
    * @param sfRequest $request A request object
    *
    * @return none
    */
    
    public function executeAdd(sfWebRequest $request)
    {
      $id_edit = $request->getParameter('id_edit');
      if($id_edit)
      {
        $data = Doctrine_Core::getTable('content')->find($id_edit);
        $this->ContentTranslationForm = new ContentForm($data);
      }
      else
        $this->ContentTranslationForm = new ContentForm();
      if($request->isMethod('post'))
      { 
        if(!empty($id_edit))
          $this->getUser()->setFlash('success', __('msg_edit_success'));         
        else
          $this->getUser()->setFlash('success', __('msg_insert_success'));
          
       $this->ContentTranslationForm->bind(
           $request->getParameter($this->ContentTranslationForm->getName()),
           $request->getFiles($this->ContentTranslationForm->getName())
       );
       if ($this->ContentTranslationForm->isValid())
       {
         $this->ContentTranslationForm->save();
         $this->redirect('@content');
       }
      } 
    }
    
    /**
    * Executes list action
    *
    * @param sfRequest $request A request object
    *
    * @return none
    */
    
    public function executeList(sfWebRequest $request)
    {
      if(!$this->getUser()->hasAttribute('user'))
        $this->redirect('@login');   
      else
      {   
       $this->getUser()->setCulture('en');
       $culture = $this->getUser()->getCulture();
       $this->oPager = new sfDoctrinePager('Content', 2);
       if($request->getParameter('sortBy'))
         $sortBy = $request->getParameter('sortBy');
       else 
          $sortBy = 'ASC';   
          
       if($request->getParameter('find'))
       {
         $attributes = Doctrine_Core::getTable('Content')
            ->listingContent($sortBy, $request->getParameter('find'), $culture);      
         $this->oPager->setQuery($attributes);
       }  
       else
       { 
         $attributes = Doctrine_Core::getTable('Content')
           ->listingContent($sortBy, '', $culture);  
         $this->oPager->setQuery($attributes);     
       }  
       $this->oPager->setPage($this->getRequestParameter('page', 1));
       $this->oPager->init();
      }   
    }
    
    /**
    * Executes delete action
    *
    * @param sfRequest $request A request object
    *
    * @return none
    */
    
    public function executeDelete(sfWebRequest $request)
    {
      $content = new Content();
      $id = $request->getParameter('id_delete');
      $content->delete_dataContent($id);
      $this->getUser()->setFlash('success', __('msg_delete_success'));
      $this->redirect('@content');
    } 
}
