 <?php
 
 foreach($jobs as $job): ?>
  <tr>
   <td width="100px" align="center">
       <?php print_r($job->getId()); ?>
    </td>
    <td width="100px" align="center">
       <?php print_r($job->getPosition()); ?>
    </td>
    <td width="100px" align="center">
       <?php print_r($job->getCompany()); ?>
    </td>
    <td width="100px" align="center">
       <?php print_r($job->getUrl()); ?>
    </td>
    <td width="100px" align="center">
       <?php print_r($job->getDescription()); ?>
    </td>
    <td width="100px" align="center">
    <?php 
      echo link_to(
          image_tag('edit.png', 'size=20x20'), 
          'login/job?id_edit='.$job->getId(), 
          'title="Edit Records"'
      );
    ?>
    </td>
    <td width="100px" align="center">
       <?php 
         echo jq_link_to_remote(
             image_tag('delete.png', 'size=20x20 title= Delete Records'), 
             array(
                 'update' => 'listing', 
                 'url' => 'login/delete?id_delete='.$job->getId()
             )
         );
       ?>
    </td>    
    </tr>
<?php
    endforeach; 
?>