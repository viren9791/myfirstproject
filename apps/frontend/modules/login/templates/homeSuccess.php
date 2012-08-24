
<blink><p>
    <?php 
      if ($sf_user->hasFlash('login_success')): 
           echo $sf_user->getFlash('login_success');
      endif;
	     ?>  
</p></blink>
 <?php
     echo "<pre>";
     //print_r($categories); 
	// echo "<br>";
    // print_r($products); 
 ?>
 <h1>WELCOME USER</h1>