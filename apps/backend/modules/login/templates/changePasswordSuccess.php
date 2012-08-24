
<form action="<?php echo url_for('@Change_password'); ?>" method="post">
  
<table align="center" width="450px">
  <tr>
    <td colspan="3" align="center">
    <h1><?php echo __('lbl_change_psw');?></h1>
  </td>
  </tr>
  <tr>
    <td width="450px" colspan="3">
    <?php echo ''; ?>
  </td>
  </tr>
  <tr>
    <td width="150px">
    <?php echo $adminForm['Old_password']->renderLabel() ?>
  </td>
  <td width="150px">
    <?php echo $adminForm['Old_password']->render() ?>
  </td>
    <td width="150px" style="color:#FF0000">
      <?php echo $adminForm['Old_password']->renderError() ?>
  </td>   
  </tr>
  <tr>
    <td width="150px">
    <?php echo $adminForm['password']->renderLabel() ?>
  </td>
  <td width="150px">
    <?php echo $adminForm['password']->render() ?>
  </td>
    <td width="150px" style="color:#FF0000">
      <?php echo $adminForm['password']->renderError() ?>
  </td>   
  </tr>
  <tr>
    <tr>
    <td width="150px">
    <?php echo $adminForm['confirm_password']->renderLabel() ?>
  </td>
  <td width="150px">
    <?php echo $adminForm['confirm_password']->render() ?>
  </td>
    <td width="150px" style="color:#FF0000">
      <?php echo $adminForm['confirm_password']->renderError() ?>
  </td>   
  </tr>  
  <tr>
    <td>
  </td>
  <td>
      <input type="submit" name="login" value=<?php echo __('btn_save'); ?> />
    <input type="reset" />
  </td>
  </tr>
</table>  