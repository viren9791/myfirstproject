
<font size="+2" color="#009900">
	
<?php   
  if ($sf_user->hasFlash('success')): 
    echo $sf_user->getFlash('success');
  endif;
?>
</font>
<font size="+2" color="#FF0000">
<?php
  if ($sf_user->hasFlash('error')): 
    echo $sf_user->getFlash('error');
  endif;
?>
</font>
 