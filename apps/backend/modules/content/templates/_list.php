 <?php
  foreach($data as $product):
 ?> 
  <tr>
   <td width="100px" align="center">
       <?php echo $product['content_title'];?>
    </td>
    <td width="600px" align="center">
       <?php        
        echo $product['content_type'];     
      ?>
    </td>
    <td width="600px" align="center">
       <?php        
        echo image_tag('/uploads/uploads/'.$product['image'],'size=50x50');      
      ?>
    </td>
     <td width="600px" align="center">
       <?php echo $product['enable']; ?>
    </td>
    <td width="100px" align="center">
    <?php 
      echo link_to(
          image_tag(
              'edit.png', 
              'size=20x20 title='.__('lbl_edit')
          ), 
          '@content_edit?id_edit='.$product['id_content'], 
          'title="Add new job"'
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
                'update'  => 'listing',
                'url'     => 'content/delete?id_delete='.$product['id_content'],
                'confirm' => "Are you sure?"
            )
        );
     ?>
    </td>
    
    </tr>
<?php 
  endforeach; 
?>