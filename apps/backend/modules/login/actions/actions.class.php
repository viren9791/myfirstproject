<?php

  require_once dirname(__FILE__).'/../lib/loginGeneratorConfiguration.class.php';
  require_once dirname(__FILE__).'/../lib/loginGeneratorHelper.class.php';
  sfProjectConfiguration::getActive()->loadHelpers('I18N');
  
  /**
  * login actions.
  *
  * @package    Myfirstproject
  * @subpackage Login
  * @author     viren   <virendav.vitrainee@gmail.com>     
  * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
  */
  
class loginActions extends autoLoginActions
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
      $this->redirect('@login'); 
    }
    
    /**
    * Executes executeLogin action
    *
    * @param sfRequest $request A request object
    *
    * @return none
    */
    
    public function executeLogin(sfWebRequest $request)
    {  
      $this->adminForm = new AdminForm();
      if ($request->isMethod('post'))
      {         
        $this->adminForm->bind($request->getParameter($this->adminForm->getName()));
        if ($this->adminForm->isValid())
        { 
          $username = $request->getPostParameter('admin[username]'); 
          $password = $request->getPostParameter('admin[password]'); 
          $admin = new Admin();
          $this->userData = $admin->loginAdmin($username, $password);
          if(sizeof($this->userData)>0)
          {
            $this->getUser()->setAttribute('username', $username);
            $admin = Doctrine_Core::getTable('admin')->find(1);
            foreach($this->userData as $data)
            {
              $this->getUser()->setAttribute('user', $data->getId());
              $this->getUser()->setFlash('success', __('msg_success_login'));
            }
            $this->redirect('@home'); 
          }  
          else
          {
            $this->getUser()->setFlash('loginFail', __('msg_fail_login'));
            $this->redirect('@login');    
          }
        }
      }   
    }
    
    /**
    * Executes executeChangePassword action
    *
    * @param sfRequest $request A request object
    *
    * @return none
    */
    
    public function executeChangePassword($request)
    {  
      if(!$this->getUser()->hasAttribute('user'))
        $this->redirect('login/index'); 
      else
      {
        $admin = Doctrine_Core::getTable('admin')->find($this->getUser()->getAttribute('user'));
        $this->adminForm  = new ChangePasswordForm($admin);
        if ($request->isMethod('post'))
        {
          $this->password = $request->getPostParameter('ChangePasswordForm[Old_password]');
          $this->adminForm->bind($request->getParameter($this->adminForm->getName()));
          if ($this->adminForm->isValid())
          {
            if($admin->getPassword() == $this->password )
            {
              $this->getUser()->setFlash('success', __('msg_success_changepassword'));
              $this->adminForm->save();    
              $this->redirect('@home');    
            }
            else
            {
              $this->getUser()->setFlash('error', __('msg_fail_changepassword'));
              $this->redirect('@home');  
            }   
          }
        }
      }  
    }
    
   /**
    * Executes executeTest action
    *
    * @param sfRequest $request A request object
    *
    * @return none
    */
    
    public function executeTest($request)
    {  
      $this->testForm  = new testForm();
      if ($request->isMethod('post'))
      {
        $data = $request->getParameter($this->testForm->getName());
        if(isset($data['chk_1']) && $data['chk_1'] == 'on')
          $data['chk_1'] = 'yes';
        else
          $data['chk_1'] = 'no';      
        if(isset($data['chk_2']) && $data['chk_2'] == 'on')
          $data['chk_2'] = 1;
        else
          $data['chk_2'] = 0;
        $this->testForm->bind($data);
        if ($this->testForm->isValid())
          $this->testForm->save();                
      }
    }
    
   /**
    * Executes executeHome action
    *
    * @param sfRequest $request A request object
    *
    * @return none
    */
    
    public function executeHome($request)
    {  
       if(!$this->getUser()->hasAttribute('user'))
       {
         $this->redirect('@login'); 
       }   
    }
    
   /**
    * Executes executeLogout action
    *
    * @param sfRequest $request A request object
    *
    * @return none
    */
    
    public function executeLogout($request)
    {  
      $this->getUser()->getAttributeHolder()->clear();
      $this->redirect('@login');  
    }
}
