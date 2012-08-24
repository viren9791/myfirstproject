<form action="<?php echo url_for('login/test')?>" method="post">
<table align="center" width="500px">
  <tr>
    <td colspan="3" align="center">
	  <h1> TEST </h1>
	</td>
  </tr>
  <tr>
    <td width="500px" colspan="3">
	  <?php echo ''; ?>
	</td>
  </tr>
  <tr>
    <td width="150px">
	  <?php echo $testForm['chk_1']->renderLabel() ?>
	</td>
	<td width="150px">
	  <?php echo $testForm['chk_1']->render() ?>
	</td>
    <td width="200">
      <?php echo $testForm['chk_1']->renderError() ?>
	</td>  
  </tr>	
  <tr>
    <tr>
    <td width="150px">
	  <?php echo $testForm['chk_2']->renderLabel() ?>
	</td>
	<td width="150px">
	  <?php echo $testForm['chk_2']->render() ?>
	</td>
    <td width="200">
      <?php echo $testForm['chk_2']->renderError() ?>
	</td>   
  </tr>
  <tr>
    <td>
	   
	</td>
	<td>
	    <input type="submit" name="login" value="<?php echo __('btn_login'); ?>"/>
		<input type="reset" />
	</td>
  </tr>
</table>  