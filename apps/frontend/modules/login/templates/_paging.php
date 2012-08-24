<?php 
  if($pager->haveToPaginate()): 
?>
  <div class="pagination">
    <a href="<?php echo url_for('login/list', $pager) ?>?page=1">
      <img src="/images/first.png" height="20px" width="20px" alt="First" title="First page"/>    
    </a> 
    <a href="<?php echo url_for('login/list', $pager) ?>?page=<?php echo $pager->getPreviousPage() ?>">
      <img src="/images/left.png" alt="<" height="20px" width="20px" title="Previous page" />
    </a> 
    <?php 
      foreach ($pager->getLinks() as $page): 
        if ($page == $pager->getPage()):
          echo "<font size='+2'>".$page."</font>" 
        else: ?>
        <a href="<?php echo url_for('login/list', $pager) ?>?page=<?php echo $page ?>">
          <?php echo "<font size='+2'>".$page."</font>"; ?>
        </a>
      <?php 
        endif; 
      endforeach; ?> 
    <a href="<?php echo url_for('login/list', $pager) ?>?page=<?php echo $pager->getNextPage() ?>">
      <img src="/images/right.png" alt="Next" height="20px" width="20px" title="Next page" />
    </a> 
    <a href="<?php echo url_for('login/list', $pager) ?>?page=<?php echo $pager->getLastPage() ?>">
      <img src="/images/last.png" alt="Last" height="20px" width="20px" title="Last page" />
    </a>
  </div>
<?php
    endif;
?>