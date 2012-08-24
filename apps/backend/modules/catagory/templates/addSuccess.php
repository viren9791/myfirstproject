<?php use_helper('I18N') ?>
<?php use_helper('jQuery') ?> 
<form action="<?php url_for('@category_add');?>" method="post" enctype="multipart/form-data">
<table align="center" width="920px">
  <tr>
    <td colspan="3" align="center">
	<?php if(isset($id_edit)): ?>
	    <h1><?php echo __('lbl_edit_category'); ?></h1>
	<?php else: ?>	
	    <h1><?php echo __('lbl_add_category'); ?></h1>
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
	  <?php echo $CategoryForm['parent_id']->renderLabel() ?>
	</td>
	<td width="150px">
	  <?php echo $CategoryForm['parent_id']->render() ?>
	</td>
    <td width="400">
      <?php echo $CategoryForm['parent_id']->renderError() ?>
	</td>  
  </tr>	
  <tr>
    <td width="150px">
	  <?php echo $CategoryForm['name']->renderLabel() ?>
	</td>
	<td width="150px">
	  <?php echo $CategoryForm['name']->render() ?>
	</td>
    <td width="400">
      <?php echo $CategoryForm['name']->renderError() ?>
	</td>  
  </tr>	
  
  <tr>
    <td>
	</td>
	<td>
	   <?php if(isset($id_edit)): ?>
	       <input type="submit" name="update" value="<?php echo __('btn_update'); ?>" />
		   <?php echo button_to('Cancel', '@category_list') ?>
       <?php else: ?>	
	       <input type="submit" name="save" value="<?php echo __('btn_save'); ?>" />
		   <?php echo button_to('Cancel', '@category_list') ?>
	   <?php endif;?>	
	</td>
  </tr>
</table> 
</form>
 