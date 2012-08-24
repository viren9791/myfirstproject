
<form action="<?php url_for('@content_add');?>" method="post" enctype="multipart/form-data" id="frm_content">
	
<table align="center" width="600px">
  <tr>
    <td colspan="3" align="center">
  <?php if(isset($id_edit)): ?>
      <h1> <?php echo __('lbl_content_heading_edit'); ?> </h1>
  <?php else: ?>  
      <h1><?php echo __('lbl_content_heading_add'); ?> </h1></h1>
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
    <?php echo $ContentTranslationForm['content_type']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $ContentTranslationForm['content_type']->render(); ?>
  </td>
    <td width="400"  style="color:#FF0000">
      <?php echo $ContentTranslationForm['content_type']->renderError(); ?>
  </td>  
  </tr>
  <tr>
    <td width="150px">
    <?php echo $ContentTranslationForm['enable']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $ContentTranslationForm['enable']->render(); ?>
  </td>
    <td width="400"  style="color:#FF0000">
      <?php echo $ContentTranslationForm['enable']->renderError();?>
  </td>  
  </tr>
   <tr>
    <td colspan="3" width="500px" colspan="3">
      <input type='button' name='btn_en'  onClick="show('en')"  
    style="background-repeat:no-repeat; width:78px;height:35px;background-image:url('/images/en.png')"> 
     <input type='button' name='btn_fi'  onClick="show('fi')"  id="btn_fi"
    style="background-repeat:no-repeat; width:77px;height:35px;background-image:url('/images/fi.png')">   
     <hr width="623px"></hr>
  </td>
  </tr>  
  
</table>  
<fieldset style="border:double; width:600px; margin-left:150px;"  id="en"> 
  <legend> <font size="+2"> en </font></legend>
<table align="center" width="600px">
  <tr>
    <td width="150px">
    <?php echo $ContentTranslationForm['en']['content_title']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $ContentTranslationForm['en']['content_title']->render(); ?>
  </td>
    <td width="400"  style="color:#FF0000">
      <?php echo $ContentTranslationForm['en']['content_title']->renderError(); ?>
  </td>  
  
  </tr> 
  <tr>
    <td width="150px">
    <?php echo $ContentTranslationForm['en']['image']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $ContentTranslationForm['en']['image']->render(); ?>
  </td>
    <td width="400"  style="color:#FF0000">
      <?php echo $ContentTranslationForm['en']['image']->renderError();?>
  </td>  
  
  </tr> 
</table></fieldset>
<fieldset style="border:double;  width:600px; margin-left:150px;"  id="fi"> 
  <legend> <font size="+2">fi</font></legend>
<table align="center" width="600px">
 <tr>
    <td width="150px">
    <?php echo $ContentTranslationForm['fi']['content_title']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $ContentTranslationForm['fi']['content_title']->render(); ?>
  </td>
    <td width="400"  style="color:#FF0000">
      <?php echo $ContentTranslationForm['fi']['content_title']->renderError(); ?>
  </td>  
  
  </tr> 
  <tr>
    <td width="150px">
    <?php echo $ContentTranslationForm['fi']['image']->renderLabel(); ?>
  </td>
  <td width="150px">
    <?php echo $ContentTranslationForm['fi']['image']->render(); ?>
  </td>
    <td width="400"  style="color:#FF0000">
      <?php echo $ContentTranslationForm['fi']['image']->renderError(); ?>
  </td>  
  
  </tr> 
</table></fieldset> 
<table align="center" width="600px">  
  <tr>
    <td>
  </td>
  <td>
     <?php if(isset($id_edit)): ?>
         <input type="submit" name="update" value="Update" />
       <?php echo button_to('Cancel', '@content'); ?>
       <?php else: ?> 
         <input type="submit" name="save" value="Save" />
       <?php echo button_to('Cancel', '@content'); ?>
     <?php endif;?> 
  </td>
  </tr>
</table>

 </form> 