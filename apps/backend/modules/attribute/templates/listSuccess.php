
<div Style="margin:0px 0px 50px 20px; id="listing" >
  <table border="0" width="850px" style="margin-top:50px">
    <tr style="background-color:#DCF4FA">
    <td colspan="8" align="center">
        <font size="+3"><?php echo __('lbl_attribute_heading'); ?></font>
    </td>
    </tr>
  <tr style="background-color:#DCF4FA">
    <td colspan="8" align="center">
      <font size="+1" color="#006600"> <?php echo $sf_user->getFlash('successMsg')?></font>
    </td>
  </tr>
  <tr style="background-color:#DCF4FA">
    <td colspan="2" align="right">
      <?php 
        echo jq_link_to_remote(
            image_tag(
                'up.png', 
                'size=20x20 title='.__('lnk_asc')
            ), 
            array(
                'update' => 'listing', 
                'url'    => '@attribute_list?sortBy=ASC'
            )
        );
          
        echo jq_link_to_remote(
            image_tag(
                'down.png', 
                'size=20x20 title='.__('lnk_dsc')
            ), 
            array(
                'update' => 'listing', 
                'url' => '@attribute_list?sortBy=DESC'
            )
        ); 
     ?>
    </td>
    <td colspan="6" align="right">
      <?php 
        echo jq_form_remote_tag(
            array(
                'update' => 'listing',
                'url'=>'@attribute_list'
            ),
            array(
                'name' => 'frmList',
                'id'=>'frmList',
                'method'=>'post',
                'enctype'=>'multipart/form-data'
            )
        );
      ?>
     <?php 
       echo jq_link_to_remote(
           'View All', 
           array(
               'update' => 'listing', 
               'url'    => '@attribute_list?sortBy=ASC'
           )
       ); 
     ?>
      <input type="text" name="find" id="find" value="<?php echo $sf_user->getFlash('notice') ?>">
      <input type="submit" name="search" value="Search" title="search">
    </td>
  </tr>
  <?php 
    if(sizeof($oPager)<1):
  ?>
    <tr style="background-color:#DCF4FA">
    <td colspan="8" align="center">
        <font size="+1" color="#FF0000"><?php echo __('msg_no_record'); ?></font>
    </td>
    </tr>
<?php 
  else:
?> 
   <tr style="background-color:#DCF4FA">
    <td align="center" width="20px">
       <font size="+1"> <?php echo __('lbl_attribute_id');?></font>
    </td>
    <td align="center" width="300px">
        <font size="+1"><?php echo __('lbl_attribute');?></font>
    </td> 
    <td align="center" width="300px">
        <font size="+1"><?php echo __('lbl_attribute_value');?></font>
    </td> 
    <td align="center" width="20px">
        <font size="+1"><?php echo __('lbl_edit');?></font>
    </td>
    <td align="center" width="20px">
        <font size="+1"><?php echo __('lbl_delete');?></font>
    </td>
    </tr>
<?php 
  if ($sf_user->hasFlash('success')): 
?>
  <tr style="background-color:#DCF4FA">
    <td style="color:#009900;" colspan="7">
      <?php echo $sf_user->getFlash('success'); ?>
    </td>
  </tr>
  <?php  endif; ?>
  <div id="listing">
  <?php include_partial('list', array('data' => $listRecords)) ?>
  </div>
  <tr style="background-color:#DCF4FA">
    <td colspan="8">
     <?php include_partial('paging', array('oPager' => $oPager)) ?>
    </td>  
  </tr>
   <?php
     endif;
   ?>
  <tr style="background-color:#DCF4FA">
    <td colspan="8">
      <?php 
        echo link_to('Add', '@attribute_add', 'title='.__('ttl_add_attribute'));
      ?>     
    </td>
  </tr>  
  </table>  
</div>

