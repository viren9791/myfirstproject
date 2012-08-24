 <?php 
   foreach($data as $product):      
 ?>
 
  <tr>
   <td width="100px" align="center">
       <?php echo $product->getProduct_id(); ?>
    </td>

    <td width="600px" align="center">
       <?php echo $product->getName(); ?>
    </td>
     <td width="600px" align="center">
       <?php echo $product->getPrice(); ?>
    </td>
     <td width="600px" align="center">
       <?php echo substr($product->getDescription(), 0, 60); ?>
    </td>
    <td width="600px" align="center">
       <img src="/uploads/uploads/<?php echo $product->getImage();?>" height="100px" width="100px">
    </td>
    <td width="100px" align="center">
    <?php 
      echo link_to(
          image_tag(
              'edit.png', 
              'size=20x20 title= Edit Records'
          ), 
          '@product_edit?id_edit='.$product->getproduct_id(), 
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
                 'url' => 'products/delete?id_delete='.$product->getProduct_id()
             )
         );
       ?>
    </td>    
    </tr>
<?php 
  endforeach; 
?>