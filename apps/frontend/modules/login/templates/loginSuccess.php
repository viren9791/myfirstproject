<form action="<?php echo url_for('login/login')?>" method="post">
<table align="center" width="500px">
  <tr>
    <td colspan="3" align="center">
    <h1> Login </h1>
  </td>
  </tr>
  
  <tr>
    <td width="500px" colspan="3" id="error">
	    <?php if ($sf_user->hasFlash('login_fail')): ?>
                <p id="error"><?php echo $sf_user->getFlash('login_fail') ?><p/>
		<?php endif; ?>        
    </td>
  </tr>
  <tr>
    <td width="150px" >
    <?php echo $userForm['username']->renderLabel() ?>
  </td>
  <td width="150px">
    <?php echo $userForm['username']->render() ?>
  </td>
    <td width="200" id="user">
      <?php echo trim($userForm['username']->renderError()) ?>
  </td>  
  </tr> 
  <tr>
    <tr>
    <td width="150px">
    <?php echo $userForm['password']->renderLabel() ?>
  </td>
  <td width="150px">
    <?php echo $userForm['password']->render() ?>
  </td>
    <td width="200">
      <?php echo $userForm['password']->renderError() ?>
  </td>   
  </tr>
  <tr>
    <td>
  </td>
  <td>
      <input type="submit" name="login" value="<?php echo __('btn_login'); ?>"/>
      <input type="reset" /></form>
  </td>
  </tr>
  <tr>
    <td>
  </td>
    <td>
    <?php echo link_to('Register now','login/registration'); ?>
  </td>
  </tr>
  <tr>
    <td></td>
  <td>
        <?php  
            $ssReturnUrl = "http://".$sf_request->getHost()."/login/facebookAuth/"; 
            $ssUrl = sfGeneral::getFacebookUrl($ssReturnUrl);
            echo link_to( 
                image_tag('/images/Facebook.png'), 
                $ssUrl, 
                array( 
                    'class' => 'facebook', 
                    'title' => 'connect to facebook'
                ) 
            ); 
        ?>      
        <?php  
            $ssReturnUrl = "http://".$sf_request->getHost()."/login/twitterAuth/";
            $ssUrl = sfGeneral::getTwitterUrl($ssReturnUrl);
            echo link_to( 
                image_tag('/images/Twitter.png'), 
                $ssUrl, 
                array( 
                    'class' => 'twitter', 
                    'title' => 'connect to twitter'
                ) 
            ); 
        ?>      
                
  </td>
  </tr>
</table>  