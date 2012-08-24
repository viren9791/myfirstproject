<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  
  </head>
  <body bgcolor="#DCF2F8" style="color:#2F818A">
  <?php use_helper('jQuery') ?>
  <?php use_helper('I18N') ?>
  
  <?php if(!$sf_user->hasAttribute('user')): echo $sf_content; else:?> 
  
  <table border='1' width="80%" height="500px" align="center">
  <tr>
    <td colspan="2">
    <blink>
          <font size="+2"> Welcome, <?php echo $sf_user->getAttribute('username') ?></font>
        </blink>
  </td>
  </tr>
  <tr>
    <td width="200px">
      <div style="float:left" > 
            <div id="firstpane" class="menu_list">
            <p class="menu_head">Category Management</p>
            <div class="menu_body">
                <?php echo link_to('View Category', '@category_list', 'title="Manage catagory"');?>
                    <?php echo link_to('Add Category', '@category_add', 'title="add catagory"');?>
            </div>  
        <p class="menu_head">Product Management</p>
            <div class="menu_body">
                <?php echo link_to('View Products', '@product_list', 'title="Manage Product"');?>
          <?php echo link_to('Add Products', '@product_add', 'title="add Product"');?>
          <?php echo link_to('Set Products Attribute', '@product_attribute', 'title="Set Product attribute"');?>
            </div>  
        <p class="menu_head">Attribute Management</p>
            <div class="menu_body">
                <?php echo link_to('View Attribute Values', '@attribute_list', 'title="Manage attribute"');?>
          <?php echo link_to('Add Attribute Values', '@attribute_add', 'title="add attribute"');?>
          <?php echo link_to('View Attribute', '@AttributeList', 'title="Manage attribute"');?>
          <?php echo link_to('Add Attribute', '@AttributeAdd', 'title="add attribute"');?>
            </div>  
        <p class="menu_head">Account Setting</p>
            <div class="menu_body">
                <?php echo link_to('Change password', '@Change_password', 'title="Change password"');?>
                <?php echo link_to('Logout', 'login/logout', 'title="Logout"');?>
            </div>  
        <p class="menu_head">Gallary</p>
            <div class="menu_body">
                <?php echo link_to('Open Gallary', '@gallary', 'title="Open gallary"');?>
            </div>  
        <p class="menu_head">Multi language Content</p>
            <div class="menu_body">
                <?php echo link_to('Content management', '@content', 'title="Content management"');?>
          <?php echo link_to('Add Content', '@content_add', 'title="Add Content "');?>
            </div>  
        <p class="menu_head">Merge Forms</p>
            <div class="menu_body">
                <?php echo link_to('Demo', '@mergeForms');?>
            </div>  
            </div> 
        </div>
  </td>
  <td>
    <div id="listing" style=" background:#FFF; height:500px; width:100%" >
       <?php echo $sf_content ?>
    </div>
  </td> 
  </tr>
</table>
<?php endif;?>
  </body>
</html>
