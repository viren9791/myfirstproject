<form action="<?php url_for('attribute/add');?>" method="post" enctype="multipart/form-data">
<table align="center" width="920px">
  <tr>
    <td colspan="3" align="center">
  <?php if(isset($id_edit)): ?>
      <h1> <?php echo __('lbl_attribute_heading_edit'); ?> </h1>
  <?php else: ?>  
      <h1><?php echo __('lbl_attribute_heading_add'); ?> </h1></h1>
  <?php endif;?>  
  </td>
  </tr>
  <tr>
    <td width="500px" colspan="3">
    <?php echo ''; ?>
  </td>
  </tr>
  <tr>
    <td width="150px">
    <?php echo $Attribute_Values['attribute_id']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $Attribute_Values['attribute_id']->render(); ?>
  </td>
    <td width="400"  style="color:#FF0000">
      <?php echo $Attribute_Values['attribute_id']->renderError(); ?>
  </td>  
  </tr> 
  <tr>
    <td width="150px">
    <?php echo $Attribute_Values['value']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $Attribute_Values['value']->render(); ?>
  </td>
    <td width="400"  style="color:#FF0000">
      <?php echo $Attribute_Values['value']->renderError(); ?>
  </td>  
  </tr> 
  <tr>
    <td>
  </td>
  <td>
     <?php if(isset($id_edit)): ?>
         <input type="submit" name="update" value="Update" />
       <?php echo button_to('Cancel', '@attribute_list'); ?>
       <?php else: ?> 
         <input type="submit" name="save" value="Save" />
       <?php echo button_to('Cancel', '@attribute_list'); ?>
     <?php endif;?> 
  </td>
  </tr>
 </form> 
</table> 
