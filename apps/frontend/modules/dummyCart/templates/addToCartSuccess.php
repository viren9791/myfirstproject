<table>
<tr>
  <td>
    <h2> What's In My Cart? </h2>
  </td>
</tr>
<tr>
  <td>
    <h3><u> Product(s) </u></h3>  
  </td>
</tr>
<?php 
  $netAmount = 0; 
  foreach($products as $data): 
?>
<tr>
  <td>
    <?php echo image_tag('/uploads/uploads/'.$data['Product']['image'], 'size=100x100'); ?>
  </td>
  <td>
  <td>
    <table>
    <tr>
      <td colspan="3">
        <?php  echo $data['Product']['name']; ?>
      </td>
      </tr>
      <tr>
        <td>
        <input type="text" name="txt_quantity" id="txt_quantity" value="<?php echo $data['quantity']; ?>">
      </td>
      <td>
        <?php 
        echo jq_link_to_remote(
            image_tag(
                'edit.png', 
                'size=20x20 title= Update'
            ), 
            array(
                'update' => 'listing',
                'url'    => 'dummyCart/addToCart?id_edit='.$data['product_id'],
                'with'=> "'quantity=' + $('#txt_quantity').val()"
            )
        );
        ?>
        </td>
        <td>
        <?php 
        echo jq_link_to_remote(
            image_tag(
                'delete.png', 
                'size=20x20 title= Delete'
            ), 
            array(
                'update' => 'listing', 
                'url' => 'dummyCart/delete?id_delete='.$data['product_id']
            )
        ); 
        ?>
        </td>
      </tr>
   </table> 
  </td>
  <td align="right" width="200px">
  <?php echo "Rs.".$data['price']; ?>
  </td>
  <td align="right" width="200px">
  <?php 
      
      $netAmount += $data['price']*$data['quantity']; 
      echo "Rs.".$data['price']*$data['quantity']; 
  ?>
  </td>
  </tr>
 <?php endforeach; ?>
 <tr>
    <td colspan="5" align="right">
   <blink><b> <?php echo "Total Amount Rs.".$netAmount; ?></b></blink>
  </td>
 </tr>
 <tr>
    <td colspan="5" align="right">
    <div class="clear">&nbsp;</div>
        <div class="fright">
            <div class="buttonLeft" style="margin:0px;">
                <?php echo html_entity_decode($ssPaypalButton); ?>
         </div>
</div> 

  </td>
 </tr>
</table>