<?php
/* @var $this yii\web\View */
?>
<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<h1>Платежи на одобрение:</h1>
	<a href="index">Информация о платежных поручениях</a><br>

  <table border="1" width=63%>
    <? $number = 1; ?>
      <tr><th style="display: none;">id</th><th>№</th><th>Название</th><th>Просмотр</th><th>Дата</th><th>Комментарий</th></tr>

          <?php foreach ($payslistupdate as $pay):?>

            <td style="display: none;"><input type=hidden  name=id  value='<?= $pay->id?>'></td>
               <td style="display: none;"><input type=hidden  name=photo  value='<?= $pay->photo?>'></td>
      <td width=1%><?= $number?></td>
            <td width=15%><?= $pay->name?></td>
			 <td width=6%><a href='/temp/<?= $pay->photo?>'  class='atuin-btn'>Открыть</a></td>
            <td width=12%><?= $pay->date?></td>
			<td width=25%><?= $pay->comment?></td>
			<td width=25%><a class="btn-s btn-success" href="<?= Url::toRoute(['pays/allow', 'id'=>$pay->id]);?>">Одобрить</a></td>
              </tr>
              <? $number++;?>
              <?php endforeach;?>
  </table>
