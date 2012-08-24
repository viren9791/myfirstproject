<?php 
  foreach($data as $catagory):
?>
  <tr>
   <td width="100px" align="center">
       <?php print_r($catagory->getCategory_id()); ?>
    </td>
    <td width="100px" align="center">
       <?php print_r($catagory->getName()); ?>
    </td>
    <td width="100px" align="center">
       <?php print_r($catagory->getParent_category()); ?>
    </td>
    <td width="100px" align="center">
      <?php 
         echo link_to(
             image_tag(
                 'edit.png', 
                 'size=20x20'
             ), 
             '@category_edit?id_edit='.$catagory->getCategory_id(), 
             'title='.__('lbl_edit')
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
                 'url' => 'catagory/delete?id_delete='.$catagory->getCategory_id()
             )
         );
       ?>
    </td>
    
    </tr>
<?php 
  endforeach; 
?>