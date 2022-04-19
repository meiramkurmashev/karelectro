<?php
use yii\helpers\Html;

use yii\widgets\ActiveForm;

?>
<?php

 /*
if($_COOKIE["login"]!="dir"){echo "Please, <a href='index.php'>login</a>";exit;} */
?>
<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');
?>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>


<?= Html::beginForm('ooo') ?>
		<select <?php if(isset($_POST['ok'])){ echo "style='display:none'"; } ?> name="object" class="select-test-1">
				<option disabled selected class="hid">Выберите объект</option>
				<?php foreach ($objects as $object):?>
		          <option value='<?= $object?>'><?= $object?></option>
			      <?php endforeach;?>

		</select><br>
		<button type="submit" <?php if(isset($_POST['ok'])){ echo "style='display:none'"; } ?> name="ok">показать</button>
		<script>
			$('document').ready(function() {
				$('select').on('change',function(){

						var object=$('select[name="object"]').val();

						$.ajax({
	  						method: "POST",
	  						url: "/site/ooo",
	  						data: { object: object }
							})
	 						 .done(function( msg ) {
	 						  	//alert( "Data Saved: " + msg );
	 						 });
					})
				});

		</script>
<?= Html::endForm() ?>
