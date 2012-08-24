
<form action="<?php url_for('demos/index'); ?>" method="post" enctype="multipart/form-data">
	
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
    <?php echo $clientForm['newForm']['name']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $clientForm['newForm']['name']->render(); ?>
  </td>
    <td width="200">
      <?php echo $clientForm['newForm']['name']->renderError();?>
  </td>  
  </tr> 
  <tr>
    <td width="150px">
    <?php echo $clientForm['newForm']['email']->renderLabel();?>
  </td>
  <td width="150px">
    <?php echo $clientForm['newForm']['email']->render();?>
  </td>
    <td width="200">
      <?php echo $clientForm['newForm']['email']->renderError(); ?>
  </td>  
  </tr> 
  <tr>
    <td width="150px">
    <?php echo $clientForm['newForm']['address']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $clientForm['newForm']['address']->render(); ?>
  </td>
    <td width="200">
      <?php echo $clientForm['newForm']['address']->renderError(); ?>
  </td>  
  </tr> 
  
  <tr>
    <td width="150px">
    <?php echo $clientForm['username']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $clientForm['username']->render(); ?>
  </td>
    <td width="200">
      <?php echo $clientForm['username']->renderError(); ?>
  </td>   
  </tr>
  <tr>
    <td width="150px">
    <?php echo $clientForm['password']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $clientForm['password']->render();?>
  </td>
    <td width="200">
      <?php echo $clientForm['password']->renderError(); ?>
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