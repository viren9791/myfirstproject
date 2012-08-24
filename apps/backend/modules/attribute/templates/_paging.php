<?php 
  if ($oPager->haveToPaginate()): 
?>
  <div class="pagination">
    <?php 
      echo jq_link_to_remote(
          image_tag('first.png', 'size=20x20 title='.__('lbl_first')), 
          array(
              'update' => 'listing', 
              'url' => '@attribute_list?page= 1'
          )
      );
        
      echo jq_link_to_remote(
          image_tag('left.png', 'size=20x20 title='.__('lbl_previeous')), 
          array(
              'update' => 'listing', 
              'url' => '@attribute_list?page='.$oPager->getPreviousPage()
          )
      );
      foreach ($oPager->getLinks() as $page): 
        if ($page == $oPager->getPage()):
           echo "<font size='+2'>".$page."</font>"; 
        else: 
           echo jq_link_to_remote(
               $page, 
               array(
                   'update' => 'listing', 
                   'url' => '@attribute_list?page='.$page
               )
           );
        endif; 
      endforeach;
        echo jq_link_to_remote(
            image_tag('right.png', 'size=20x20 title='.__('lbl_next')), 
            array(
                'update' => 'listing', 
                'url' => '@attribute_list?page='.$oPager->getNextPage()
            )
        );
        
        echo jq_link_to_remote(
            image_tag('last.png', 'size=20x20 title='.__('lbl_last')), 
            array(
                'update' => 'listing', 
                'url' => '@attribute_list?page='.$oPager->getLastPage()
            )
        );
    ?>
  </div>
<?php 
  endif; 
?>