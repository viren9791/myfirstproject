<form action="<?php url_for('products/add');?>" method="post" enctype="multipart/form-data">
<table align="center" width="920px">
  <tr>
    <td colspan="3" align="center">
  <?php 
    if(isset($id_edit)): 
  ?>
      <h1> Edit Product Detail </h1>
  <?php 
    else: 
  ?>  
      <h1>Add Product Detail </h1>
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
    <?php echo $form['category_id']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $form['category_id']->render(); ?>
  </td>
    <td width="400"  style="color:#FF0000">
      <?php echo $form['category_id']->renderError(); ?>
  </td>  
  </tr> 
  <tr>
    <td width="150px">
    <?php echo $productForm['name']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $productForm['name']->render(); ?>
  </td>
    <td width="400"  style="color:#FF0000">
      <?php echo $productForm['name']->renderError(); ?>
  </td>  
  </tr> 
  <tr>
    <td width="150px">
    <?php echo $productForm['price']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $productForm['price']->render(); ?>
  </td>
    <td width="400"  style="color:#FF0000">
      <?php echo $productForm['price']->renderError(); ?>
  </td>  
  </tr> 
  <tr>
    <td width="150px">
    <?php echo $productForm['description']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $productForm['description']->render(); ?>
  </td>
    <td width="400"  style="color:#FF0000">
      <?php echo $productForm['description']->renderError(); ?>
  </td>  
  </tr> 
  <tr>
    <td width="150px">
    <?php echo $productForm['image']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $productForm['image']->render(); ?>
  </td>
    <td width="400"  style="color:#FF0000">
      <?php echo $productForm['image']->renderError(); ?>
  </td>  
  </tr> 
  <tr>
    <td>
  </td>
  <td>
     <?php if(isset($id_edit)): ?>
         <input type="submit" name="update" value="Update" />
       <?php echo button_to('Cancel', '@product_list'); ?>
       <?php else: ?> 
         <input type="submit" name="save" value="Save" />
       <?php echo button_to('Cancel', '@product_list'); ?>
     <?php endif;?> 
  </td>
  </tr>
 </form> 
</table> 
