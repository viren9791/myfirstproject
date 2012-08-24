<?php

  echo link_to(
      image_tag(
          "/uploads/uploads/".$img, 
          'size=100x80'
      ),
      'category/productDetails?product_id='.$productId, 
      'size=100X100 title="view more"'
  );
  echo "Rs.".$price; 
?>