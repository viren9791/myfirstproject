
<form action="<?php echo url_for('login/fbRegistration'); ?>" method="post">
	
<table align="center" width="450px">
  <tr>
    <td colspan="3" align="center">
    <h1>Registration</h1>
  </td>
  </tr>
  <tr>
    <td width="450px" colspan="3">
    <?php echo ''; ?>
  </td>
  </tr>
  <tr>
    <td width="150px">
    <?php echo $fbRegistrationForm['password']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $fbRegistrationForm['password']->render(); ?>
  </td>
    <td width="150px" style="color:#FF0000">
      <?php echo $fbRegistrationForm['password']->renderError(); ?>
  </td>   
  </tr>
  <tr>
    <tr>
    <td width="150px">
    <?php echo $fbRegistrationForm['confirm_password']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $fbRegistrationForm['confirm_password']->render(); ?>
  </td>
    <td width="150px" style="color:#FF0000">
      <?php echo $fbRegistrationForm['confirm_password']->renderError(); ?>
  </td>   
  </tr>  
  <tr>
    <td>
  </td>
  <td>
      <input type="submit" name="login" value='save' />
    <input type="reset" />
  </td>
  </tr>
</table>  