
<div Style="margin:0px 0px 50px 20px; id="listing">
  <table border="1" width="850px">
    <tr>
    <td colspan="8" align="center">
        <font size="+3"><?php echo __('lbl_content_heading'); ?></font>
    </td>
    </tr>
  <tr>
    <td colspan="8" align="center">
      <font size="+1" color="#006600"> <?php echo $sf_user->getFlash('successMsg'); ?></font>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="right">
      <?php 
        echo jq_link_to_remote(
            image_tag(
                'up.png', 
                'size=20x20 title='.__('lnk_asc')
            ), 
            array(
                'update' => 'listing', 
                'url' => '@content?sortBy=ASC'
            )
        );
        echo jq_link_to_remote(
            image_tag(
                'down.png', 
                'size=20x20 title='.__('lnk_dsc')
            ), 
            array(
                'update' => 'listing', 
                'url' => '@content?sortBy=DESC'
            )
        );
      ?>
    </td>
    <td colspan="6" align="right">
      <?php 
        echo jq_form_remote_tag(
            array(
                'update' => 'listing',
                'url'=>'@content'
            ),
            array(
                'name' => 'frmList',
                'id'=>'frmList',
                'method'=>'post','enctype'=>'multipart/form-data'
            )
        );
      ?>
      <?php 
        echo jq_link_to_remote(
            'View All', 
            array(
                'update' => 'listing', 
                'url' => '@content?sortBy=ASC'
            )
        );
      ?>
      <input type="text" name="find" id="find" value="<?php echo $sf_user->getFlash('notice') ?>">
      <input type="submit" name="search" value="Search" title="search">
    </td>
  </tr>
  <?php if(sizeof($oPager)<1): ?>
    <tr>
    <td colspan="8" align="center">
        <font size="+1" color="#FF0000">No Record Found</font>
    </td>
    </tr>
<?php else:?> 
   <tr>
    <td align="center" width="20px">
       <font size="+1"> <?php echo __('lbl_content_type'); ?></font>
    </td>
    <td align="center" width="300px">
        <font size="+1"><?php echo __('lbl_content_title'); ?></font>
    </td> 
    <td align="center" width="300px">
        <font size="+1"><?php echo __('lbl_image'); ?></font>
    </td> 
    <td align="center" width="300px">
        <font size="+1"><?php echo __('lbl_content_enabled'); ?></font>
    </td>    
    <td align="center" width="20px">
        <font size="+1"><?php echo __('lbl_edit');  ?></font>
    </td>
    <td align="center" width="20px"> 
        <font size="+1"><?php echo __('lbl_delete'); ?></font>
    </td>
    </tr>
  <?php if ($sf_user->hasFlash('success')): ?>
  <tr>
    <td style="color:#009900;" colspan="7">
      <?php echo $sf_user->getFlash('success'); ?>
    </td>
  </tr>
  <?php  endif; ?>
  <div id="listing">
  <?php include_partial('list', array('data' => $oPager)) ?>
  </div>
  <tr>
    <td colspan="8">
     <?php include_partial('paging', array('oPager' => $oPager)) ?>
    </td>  
  </tr>
   <?php endif;?>
  <tr>
    <td colspan="8">
    <?php /*echo jq_link_to_remote('Add New', array(
           'update' => 'listing',
           'url'    => 'products/add',
       'method' => 'get'
            ))*/?>

     <?php echo link_to('Add', '@content_add', 'title='.__('lnk_add'));?>
      
    </td>
  </tr>
  
  </table>  
</div>

