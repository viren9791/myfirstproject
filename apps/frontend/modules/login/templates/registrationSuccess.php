
<form action="<?php url_for('login/registration');?>" method="post" enctype="multipart/form-data">
  
<table align="center" width="500px">
  <tr>
    <td colspan="3" align="center">
    <h1> Registration Detail </h1>
  </td>
  </tr>
  <tr>
    <td width="500px" colspan="3">
    <?php echo ''; ?>
  </td>
  </tr>
  <tr>
    <td width="150px">
    <?php echo $userForm['username']->renderLabel() ?>
  </td>
  <td width="150px">
    <?php echo $userForm['username']->render() ?>
  </td>
    <td width="200">
      <?php echo $userForm['username']->renderError() ?>
  </td>  
  </tr> 
  <tr>
    <td width="150px">
    <?php echo $userForm['password']->renderLabel() ?>
  </td>
  <td width="150px">
    <?php echo $userForm['password']->render() ?>
  </td>
    <td width="200">
      <?php echo $userForm['password']->renderError() ?>
  </td>   
  </tr>
  <tr>
    <td width="150px">
    <?php echo $userForm['confirmPassword']->renderLabel() ?>
  </td>
  <td width="150px">
    <?php echo $userForm['confirmPassword']->render() ?>
  </td>
    <td width="200">
      <?php echo $userForm['confirmPassword']->renderError() ?>
  </td>   
  </tr>
  <tr>
    <td width="150px">
    <?php echo $userForm['image']->renderLabel() ?>
  </td>
  <td width="150px">
    <?php echo $userForm['image']->render() ?>
  </td>
    <td width="200">
      <?php echo $userForm['image']->renderError() ?>
  </td>   
  </tr>
  <tr>
    <td width="150px">
    <?php echo $userForm['email']->renderLabel() ?>
  </td>
  <td width="150px">
    <?php echo $userForm['email']->render() ?>
  </td>
    <td width="200">
      <?php echo $userForm['email']->renderError() ?>
  </td>   
  </tr>
  <tr>
    <td width="150px">
    <?php echo $userForm['contact_no']->renderLabel() ?>
  </td>
  <td width="150px">
    <?php echo $userForm['contact_no']->render() ?>
  </td>
    <td width="200">
      <?php echo $userForm['contact_no']->renderError() ?>
  </td>   
  </tr>
  <tr>
    <td>
  </td>
  <td>
      <input type="submit" name="save" value="Save" />
    <?php echo button_to('Cancel', 'login/index') ?>
  </td>
  </tr>
</table>  