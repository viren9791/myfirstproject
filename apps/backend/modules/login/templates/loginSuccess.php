
<form action="<?php echo url_for('@login'); ?>" method="post">
	
<table align="center" width="500px">
  <tr>
    <td colspan="3" align="center">
    <h1> <?php echo __('lbl_login_heading'); ?> </h1>
  </td>
  </tr>
  <tr>
    <td width="500px" colspan="3" style="color:#FF0000">
   <?php echo $sf_user->getFlash('loginFail'); ?>
  </td>
  </tr>
  <tr>
    <td width="150px">
    <?php echo $adminForm['username']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $adminForm['username']->render(); ?>
  </td>
    <td width="200" style="color:#FF0000">
      <?php 
        if (!$adminForm->hasErrors()):
          echo "*";
      else:   
            echo $adminForm['username']->renderError(); 
      endif;    
    ?>
  </td>  
  </tr> 
  <tr>
    <tr>
    <td width="150px">
    <?php echo $adminForm['password']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $adminForm['password']->render(); ?>
  </td>
    <td width="200"style="color:#FF0000">
      <?php  
        if (!$adminForm->hasErrors()):
          echo "*";
      else:   
            echo $adminForm['password']->renderError(); 
      endif;     
    ?>
  </td>   
  </tr>
  <tr>
    <td>
     
  </td>
  <td>
      <input type="submit" name="login" value="<?php echo __('btn_login'); ?>"/>
    <input type="reset" />
  </td>
  </tr>
  <tr>
    <td colspan="2">
 
  </td>
  </tr>
</table>  