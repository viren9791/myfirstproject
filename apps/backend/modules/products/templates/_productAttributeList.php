 <?php 
   foreach($data as $product):      
 ?> 
  <tr>
   <td width="100px" align="center">
       <?php echo $product['id']; ?>
    </td>

    <td width="600px" align="center">
       <?php echo $product['Product']['name']; ?>
    </td>
      <td width="600px" align="center">
       <?php echo $product['price']; ?>
    </td>
    <td width="600px" align="center">
    <?php echo image_tag('/uploads/uploads/'.$product['image'], 'size=50x50 title= Delete Records'); ?>
    </td>
     <td width="600px" align="center">
       <?php echo $product['Attribute']['name']; ?>
    </td>
    <td width="600px" align="center" >
        <?php echo $product['AttributeValues']['value']; ?>  
    </td>
    <td width="100px" align="center">
    <?php 
      echo link_to(
          image_tag('edit.png', 'size=20x20 title= Edit Records'), 
          '@product_edit?id_edit='.$product['product_id'], 
          'title="Add new job"'
      );
    ?>        
    </td>
    <td width="100px" align="center">
       <?php 
         echo jq_link_to_remote(
             image_tag('delete.png', 'size=20x20 title= Delete Records'), 
             array(
                 'update' => 'listing', 
                 'url' => 'products/delete?id_delete='.$product['product_id']
             )
         );
       ?>
    </td>    
    </tr>
<?php 
  endforeach; 
?>