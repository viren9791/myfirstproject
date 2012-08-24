<?php 
  if ($oPager->haveToPaginate()): 
?>
  <div class="pagination">
    <?php 
      echo jq_link_to_remote(
          image_tag('first.png', 'size=20x20 title='.__('lbl_first')), 
          array('update' => 'listing', 'url' => '@product_attribute?page= 1', 'method'=>'GET'));
      echo jq_link_to_remote(
          image_tag(
              'left.png', 
              'size=20x20 title='.__('lbl_previeous')
          ), 
          array(
              'update' => 'listing', 
              'url' => '@product_attribute?page='.$oPager->getPreviousPage(), 
              'method'=>'GET'
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
                  'url' => '@product_attribute?page='.$page, 
                  'method'=>'GET'
              )
          );
        endif; 
      endforeach;
      echo jq_link_to_remote(
          image_tag('right.png', 'size=20x20 title='.__('lbl_next')), 
          array(
              'update' => 'listing', 
              'url' => '@product_attribute?page='.$oPager->getNextPage(), 
              'method'=>'GET'
          )
      );
      echo jq_link_to_remote(
          image_tag('last.png', 'size=20x20 title='.__('lbl_last')),
          array(
              'update' => 'listing', 
              'url' => '@product_attribute?page='.$oPager->getLastPage(), 
              'method'=>'GET'
          )
      );
    ?>
  </div>
<?php 
  endif; 
?>