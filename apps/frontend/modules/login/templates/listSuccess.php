<?php use_helper('jQuery'); ?>
<div Style="margin:50px 50px 50px 20px " id="listing">
  <table border="1" width="1000px">
    <tr>
    <td colspan="7" align="center">
        <font size="+3">Job's List</font>
    </td>
    </tr>
  <tr>
    <td colspan="7" align="center">
      <font size="+1" color="#006600"> <?php echo $sf_user->getFlash('successMsg')?></font>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="right">
      <?php 
        echo jq_link_to_remote(
            image_tag(
                'up.png', 
                'size=20x20 title= Sort by ascending order'
            ), 
            array(
                'update' => 'listing', 
                'url' => 'login/list?sortBy=ASC'
            )
        );
          
        echo jq_link_to_remote(
            image_tag(
                'down.png', 
                'size=20x20 title= Sort by descending order'
            ), 
            array(
                'update' => 'listing', 
                'url' => 'login/list?sortBy=DESC'
            )
        );
      ?>
    </td>
    <td colspan="5" align="right">
      <form action="<?php echo url_for('login/list')?>" method="post">
     <?php echo link_to('View All', 'login/list', 'title="view all records"'); ?>
      <input type="text" name="find" id="find" value="<?php echo $sf_user->getFlash('notice'); ?>">
    <input type="submit" name="search" value="Search" title="search">
    </form>
    </td>
  </tr>
  <?php if(sizeof($pager)<1):?>
    <tr>
    <td colspan="7" align="center">
        <font size="+1" color="#FF0000">No Record Found</font>
    </td>
    </tr>
<?php else:?> 
   <tr>
    <td align="center" width="20px">
       <font size="+1"> ID </font>
    </td>
    <td align="center" width="100px">
        <font size="+1"> position </font>
    </td>
     <td align="center" width="300px">
        <font size="+1"> company </font>
    </td>
     <td align="center" width="100px">
        <font size="+1"> url </font>
    </td>
     <td align="center" width="400px">
        <font size="+1"> description </font>
    </td>
    <td align="center" width="20px">
        <font size="+1"> EDIT </font>
    </td>
    <td align="center" width="20px">
        <font size="+1"> DELETE </font>
    </td>
    </tr>
  <div id="listing">
    <?php include_partial('list', array('jobs' => $pager)); ?>
  </div>
  <tr>
    <td colspan="7">
     <?php include_partial('paging', array('pager' => $pager)); ?>
    </td>  
  </tr>
   <?php 
     endif;
   ?>
  <tr>
    <td colspan="7">
        <?php echo link_to('Add', 'login/job', 'title="Add new job"'); ?>
    </td>
  </tr>
  </table>  
</div>

