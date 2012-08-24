<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML1.0Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas(); ?>
    <?php include_metas(); ?>
    <?php include_title();?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets(); ?>
    <?php include_javascripts(); ?>
  </head>
  <body bgcolor="#DCF2F8" style="color:#2F818A">
   <?php use_helper('jQuery'); ?>
  <?php use_helper('I18N'); ?>
  
  <div id="top_box_bg">
      <div id="top_box">
            <div id="logo">
              <h2>Dave Shoping Zone</h2>
            </div>
            <div id="menu">
          <?php echo link_to('Home', 'login/home', array('id'=>'anchortag')); ?>
                <?php echo link_to('Gallery', 'login/home', array('id'=>'anchortag')); ?>
                <?php echo link_to('About Us', 'login/home', array('id'=>'anchortag')); ?>
                <?php echo link_to('Contact', 'login/home', array('id'=>'anchortag')); ?>
                <?php if($sf_user->hasAttribute('user')): echo link_to('logout', 'login/logout', array('id'=>'anchortag')); endif; ?> 
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
    </div>
    </div>
    <div id="sky_grad">
      <div id="sky_bg">
          <div id="sky_box">
              <div id="phone"></div>
                <div id="sky_text">
                  <div class="title_sky_box"><span>Welcome to Dave Shoping Zone. </span></div>
                    <p>Welcome <font color="#FFFFFF">Guest!</font> Would you like to   
            <?php echo link_to('log yourself in?', 'login/login'); ?> Or would you prefer to 
          <?php echo link_to('create an account?', 'login/registration'); ?></p>
                   
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="content">
  
      <div id="content_pad">    
    <div 
    	 style="
    	   float:left;position:inherit; 
    	   background-color:#DCF4FC; 
    	   min-width:200px;
    	   min-height:500px;
    	   margin-right:30px">
         <div style="border-color:#3DADD3;color:#000;background-color:#3DADD3;border-style:double">
               <font size="+2">Category</font>
           </div>   
           <div style="border-color:#3DADD3;color:#000;haight:400px;border-style:double">
                <?php
                  $result = Doctrine_Query::create()
                    ->from('Category c')
                    ->where('c.parent_id=0')
                    ->fetchArray();
         
                    $i = 0;
                  foreach($result as $name)
                  {
                    echo '<a href="#" ><font size="+1">'.$name['name']."</font></a><br>";
                    $query = Doctrine_Query::create()
                      ->select('c.name')
                      ->from('Category c')
                      ->where('c.parent_id = ?', $name['category_id'])
                      ->groupBy('c.name')
                      ->fetchArray(); 
                   $result_category[] = $query;  
                   unset($query);
                   foreach($result_category[$i] as $category_name)
                   {       
              ?>     
                <div id='sub_category' style="padding-left:20px">
                <?php 
                  echo link_to(
                      $category_name['name'], 
                      'category/list?category_id='.$category_name['category_id'], 
                      'title="Listing"'
                  ); 
                ?>
              </div>
             <?php
                   }
                   $i++;
                  }
                ?>
     
         </div>
  </div>    
      <div id="listing" style="min-height:500px;  border-style:double">
             <?php echo $sf_content ?>
          </div>           
        </div>
    </div>      
       <div id="footer_bg">            
        <div id="footer">          
            <p><h2>Copyright  2012. Designed by Virtueinfo Web Thechnology Pvt.Ltd </h2></p>           
        </div>
  </div>
  </body>
</html>
