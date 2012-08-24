
<div Style="margin:0px 0px 50px 20px; id="listing">
  <table border="0" width="900px">
   <tr style="background-color:#F1D7C5">
    <td align="center" width="100px">
       <font size="+1"> <?php echo __('lbl_product_id'); ?></font>
    </td>
    <td align="center" width="250px">
        <font size="+1"><?php echo __('lbl_product_name'); ?></font>
    </td> 
    <td align="center" width="150px">
        <font size="+1"><?php echo __('lbl_product_price'); ?></font>
    </td> 
    <td align="center" width="150px">
        <font size="+1"><?php echo __('lbl_image'); ?></font>
    </td> 
    <td align="center" width="250px">
        <font size="+1"><?php echo __('lbl_attribute'); ?></font>
    </td> 
    <td align="center" width="100px">
        <font size="+1"><?php echo __('lbl_attribute_value'); ?></font>
    </td> 
   <td align="center" width="50px">
        <font size="+1"><?php echo __('lbl_edit'); ?></font>
    </td>
    <td align="center" width="50px">
        <font size="+1"><?php echo __('lbl_delete'); ?></font>
    </td>
    </tr>
  <tr>
    <td colspan="8" align="center">
      <font size="+1" color="#006600"> <?php echo $sf_user->getFlash('successMsg'); ?></font>
    </td>
  </tr>
  
  <div id="listing">
  <?php 
    if(sizeof($listRecords)>0):
      include_partial('productAttributeList', array('data' => $listRecords)); 
    endif; 
  ?>
  </div>
   <tr style="background-color:#F1D7C5">
    <td align="center" width="20px">
    <form action="<?php url_for('@product_attribute_add');?>" method="post" enctype="multipart/form-data">
       <font size="+1"> </font>
    </td>
    <td align="center" width="300px">
        <font size="+1"><?php echo $ProductAttributeForm['product_id']->render(); ?></font>
    </td> 
    <td align="center" width="300px">
        <font size="+1"><?php echo $ProductAttributeForm['price']->render(); ?></font>
    </td> 
    <td align="center" width="300px">
        <font size="+1"><?php echo $ProductAttributeForm['image']->render(); ?></font>
    </td> 
    
    <td align="center" width="300px">
     <font size="+1">
      <?php 
        echo $ProductAttributeForm['attribute_id']->render(
            array(
                'onchange' => jq_remote_function(
                    array(
                        'url'    => 'products/listAttributeValue',
                        'update' => 'value',
                        'with'   => "'attribute_id=' + this.value"
                    )
                )
            )
        );             
      ?>
     </font>
    </td> 
    <td align="center" width="300px" id="value">
        <font size="+1"><?php echo $ProductAttributeForm['attribute_value_id']->render(); ?></font>
    </td> 
    <td colspan="2" align="center" width="30px">
        <input type="submit" name="insert" value="Insert"></form>
    </td>
    </tr>
    <tr>
    <td colspan="8">
     <?php 
       if(sizeof($listRecords)>0): 
         include_partial('productAttributePaging', array('oPager' => $oPager));
       endif; 
     ?> 
    </td>  
  </tr>
  
  </table>  
</div>

