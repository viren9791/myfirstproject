
<form action="<?php url_for('login/index'); ?>" method="post" enctype="multipart/form-data">
<table align="center" width="500px">
  <tr>
    <td colspan="3" align="center">
  <?php 
    if(isset($id_edit)): 
  ?>
      <h1> Job Detail </h1>
  <?php 
    else: 
  ?>  
      <h1> Job Detail </h1>
 <?php 
   endif;
 ?>  
  </td>
  </tr>
  <tr>
    <td width="500px" colspan="3">
    <?php echo ''; ?>
  </td>
  </tr>
  <tr>
    <td width="150px">
    <?php echo $oJobForm['position']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $oJobForm['position']->render(); ?>
  </td>
    <td width="400">
      <?php echo $oJobForm['position']->renderError(); ?>
  </td>  
  </tr> 
  <tr>
    <td width="150px">
    <?php echo $oJobForm['company']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $oJobForm['company']->render(); ?>
  </td>
    <td width="400">
      <?php echo $oJobForm['company']->renderError(); ?>
  </td>   
  </tr>
  <tr>
    <td width="150px">
    <?php echo $oJobForm['url']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $oJobForm['url']->render();?>
  </td>
    <td width="400">
      <?php echo $oJobForm['url']->renderError(); ?>
  </td>   
  </tr>
  <tr>
    <td width="150px">
    <?php echo $oJobForm['description']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $oJobForm['description']->render(); ?>
  </td>
    <td width="400">
      <?php echo $oJobForm['description']->renderError(); ?>
  </td>   
  </tr>
  
  <tr>
    <td width="150px">
    <?php echo $oJobForm['dob']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $oJobForm['dob']->render();?>
  </td>
    <td width="400">
      <?php echo $oJobForm['dob']->renderError();?>
  </td>   
  </tr>
  <tr>
    <td>
  </td>
  <td>
     <?php if(isset($id_edit)): ?>
         <input type="submit" name="update" value="Update" />
       <?php echo button_to('Cancel', 'login/list') ?>
       <?php else: ?> 
         <input type="submit" name="save" value="Save" />
       <?php echo button_to('Cancel', 'login/list') ?>
     <?php endif;?> 
  </td>
  </tr>
</table> 
 