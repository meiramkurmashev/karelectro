<?php

			if(isset($_POST["ok"])):?>





		       	<? //$items=[1=>'asd',2=>'123']?>

		       	 Выбранный тип:<input> <?= $type?>
		        </select>

		        <select id="<? $type ?>" name="car1" >
		         <option disabled selected class="hid"></option>
					<?php foreach ($names as $name):?>
		          <option value=<?= $name?>><?= $name?></option>
			      <?php endforeach;?>
		        </select>
		    <?php endif;?>

