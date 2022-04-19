<?php
/* @var $this yii\web\View */
?>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<h1>Новая платежка:</h1>

		<a href="index">Информация о платежных поручениях</a><br>
<?php $form = ActiveForm::begin();?>

		<?php echo $form->field($model, 'name')->label('Название') ?>
		<?php echo $form->field($model, 'photo')->fileinput()->label('Фото'); ?>
		<?php echo $form->field($model, 'date')->input('date'); ?>
		<?php echo $form->field($model, 'comment')->label('Комментарий'); ?>
		<input  type=submit name=enter value="Внести">

<?php ActiveForm::end() ?>
</body>
</html>
<?php
/*
if(isset($_POST["enter"]))
{
	include("db.php");
	mysql_query("SET NAMES 'utf8';");
	mysql_query("SET CHARACTER SET 'utf8';");
	mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
	//echo $_FILES['photo']['tmp_name'];
	$name = $_POST["name"];
	if (empty($name)){echo "<b><span style='font-size: 20px;color:#ce1212'>! Введите имя платежа</span></b>";exit;}
	if (!empty($_FILES["photo"]["tmp_name"]))
	{
		if ($_FILES['photo']['size'] > 2*1024*1024){echo "<b><span style='font-size: 20px;color:#ce1212'>! Файл большого размера</span></b>";exit;}
		//move_uploaded_file($_FILES['photo']['tmp_name'], 'temp/'.$_FILES['photo']['name']);

		$photo = pathinfo($_FILES['photo']['name'], PATHINFO_FILENAME);

		$extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

		$date = date('Y-m-d!H:i:s');

		$photofinish = $photo . '-' . $date . '.' . $extension;
		move_uploaded_file($_FILES['photo']['tmp_name'], 'temp/'.$photofinish);
       	//$photo=$_FILES["photo"]["name"];

    } else {echo "<b><span style='font-size: 20px;color:#ce1212'>! Выберете файл</span></b>";exit;}


	$date = $_POST["date"];
	$comment = $_POST["comment"];


	if (empty($date)){echo "<b><span style='font-size: 20px;color:#ce1212'>! Введите дату</span></b>";exit;}

	mysql_query("insert into pays(name,photo,date,comment) values('$name','$photofinish','$date','$comment')")or die (mysql_error());
	echo "<b><span style='font-size: 20px;color:#33e61e'>Добавлено!</span></b>";
	echo "<script>setTimeout('location=\"pays.php\"',1000)</script>";

}
*/
?>

