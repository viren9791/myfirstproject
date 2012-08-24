
<div Style="margin:0px 50px 50px 20px; padding-top:30px;min-width:500px;" id="listing" >
  
<?php 
  foreach($product as $data): 
?>
   <div class="p_heading"> 
      <?php echo $data['name'];  ?>
   </div>
   <div class="p_heading" style="float:right"> 
      <?php echo "Rs.".$data['price'];  ?>
   </div>
   <div class="content" align="justify"> 
     <div class="fix">"<?php echo image_tag('/uploads/uploads/'.$data['image']) ?></div>
      <?php echo $data['description'];  ?>   
   </div>
<?php endforeach; ?>
<div class="p_heading" style="float:right"> 
    <form action="<?php echo url_for('@addtoCart');?>" method="post" enctype="multipart/form-data">
        <input type="submit" name="addToCart" value="Add To Cart">
  </form> 
</div>    
</div>