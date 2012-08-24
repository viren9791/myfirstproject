 <?php 
   foreach($data as $product): 
 ?> 
  <tr style="background-color:#DCF4FA">
   <td width="100px" align="center">
       <?php echo $product['id']; ?>
    </td>
    <td width="600px" align="center">
       <?php 
     
         for($i=0;$i<sizeof($product['Attribute']);$i++):  
           echo $product['Attribute'][$i]['name']; 
         endfor;     
      ?>
    </td>
     <td width="600px" align="center">
       <?php echo $product['value'];?>
    </td>
    <td width="100px" align="center">
    <?php 
      echo link_to(
          image_tag(
              'edit.png', 
              'size=20x20 title='.__('lbl_edit')
          ), 
          '@attribute_edit?id_edit='.$product['id'], 
          'title='.__('ttl_add_attribute')
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
                 'url' => 'attribute/delete?id_delete='.$product['id']
             )
         );
       ?>
    </td>    
    </tr>
<?php 
  endforeach; 
?>