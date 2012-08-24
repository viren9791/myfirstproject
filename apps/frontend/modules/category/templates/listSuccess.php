<div Style="margin:0px 50px 50px 20px; padding-top:30px;min-width:500px; " id="listing">
  <table border="0" style="max-width:500px" width="500px">
  <?php if($sf_user->hasFlash('noRecordFound')): ?>
  <tr>
    <td colspan="4" align="center">
      <font size="+1" color="#FF0000"> <?php echo $sf_user->getFlash('noRecordFound'); ?></font>
    </td>
  </tr>
  <?php 
    else: 
  ?>
  <tr bgcolor="#EDFAFA">
  <?php 
      $temp = 0;  
    
    foreach($product as $data): 
    if($temp == 3): $temp = 0;
  ?>   
      </tr><tr bgcolor="#EDFAFA" >     
  <?php endif; ?>  
    <td align="center" id="image_<?php echo $data['product_id']; ?>">
      <?php
        echo link_to(
            image_tag(
                "/uploads/uploads/".$data['image'], 
                'size=100x80'
            ), 
            'category/productDetails?product_id='.$data['product_id'], 
            'size=100X100 title="view more"'
        );
        echo "Rs.".$data['price'];      
      ?>
    </td> 
    <td align="center">
    <table>
    <tr>
    <td>    
      <?php 
        echo link_to(
            $data['name'], 
            'category/productDetails?product_id='.$data['product_id'], 
            'title="view more"'
        );
      ?>
    </td>
      </tr>   
    <tr>
     </tr>
     <tr>
   <td>     
    <select id="attributevalue" 
      onChange="<?php 
        echo jq_remote_function(
            array(
                'url' => '/category/list/product_id/'.$data['product_id'],
                'update' => 'image_'.$data['product_id'],
                'with'=> "'value_id=' + this.value"
            )
        ); ?>" id="<?php echo $data['product_id']; ?>">
      <?php  foreach($data['ProductAttribute'] as $av): ?>    
      <option value="<?php echo $av['AttributeValues']['id'];?>">
         <?php echo $av['AttributeValues']['value']; ?>
      </option>    
      <?php endforeach; ?>     
    </select>    
  </td>
    </tr> 
  </table>
    </td>
   
  <?php  $temp ++; endforeach; endif;?>
  </tr>
  </table>  
</div>

