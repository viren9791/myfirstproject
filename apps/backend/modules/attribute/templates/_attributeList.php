<?php 
  foreach($data as $product): 
?> 
  <tr style="background-color:#DCF4FA">
    <td width="100px" align="center">
       <?php echo $product['attribute_id']; ?>
  </td>
  <td width="600px" align="center">
       <?php echo $product['name']; ?>
  </td>
  <td width="100px" align="center">
     <?php 
       echo link_to(
           image_tag(
               'edit.png', 
               'size=20x20 title='.__('lbl_edit')
           ), 
           '@AttributeEdit?id_edit='.$product['attribute_id'], 
           'title='.__('ttl_edit_attribute')
       ); 
     ?>  
    </td>
  <td width="100px" align="center">
       <?php 
         echo jq_link_to_remote(
             image_tag(
                 'delete.png', 
                 'size=20x20 title='.__('lbl_delete')
             ), 
             array(
                 'update' => 'listing', 
                 'url' => 'attribute/attributeDelete?id_delete='.$product['attribute_id']
             )
         );
       ?>
  </td>   
    </tr>
<?php 
  endforeach; 
?>