<?php
/* @var $this yii\web\View */
?>
<?php
use yii\helpers\Html;
?>
<h1>Информация о платежках:</h1>


  <table border="1" width=63%>
    <? $number = 1; ?>
      <tr><th style="display: none;">id</th><th>№</th><th>Название</th><th>Просмотр</th><th>Дата</th><th>Комментарий</th></tr>

          <?php foreach ($payslist as $pay):?>

            <td style="display: none;"><input type=hidden  name=id  value='<?= $pay->id?>'></td>
               <td style="display: none;"><input type=hidden  name=photo  value='<?= $pay->photo?>'></td>
      <td width=1%><?= $number?></td>
            <td width=15%><?= $pay->name?></td>
			 <td width=6%><a href='/temp/<?= $pay->photo?>'  class='atuin-btn'>Открыть</a></td>
            <td width=12%><?= $pay->date?></td>
			<td width=25%><?= $pay->comment?></td>
			<?php if ($pay->solution=='N') {echo "<td style='text-align:right;background-color:#fc4444' width=25%>$pay->solution";}?>
      <?php if ($pay->solution=='Y') {echo "<td style='text-align:right;background-color:#3dfc3a' width=25%>$pay->solution";}?>

              </tr>
              <? $number++;?>
              <?php endforeach;?>
  </table>
