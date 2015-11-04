<form action=<?=$_SERVER['REQUEST_URI']?> method="POST">
	 <p>
	  <select name="parent_id">	
		<?php 
			//Вывод списка категорий
			foreach($model as $row){
				echo "<option value='".$row['id']."'>".$row['name']."</option>"; 	
			}
		?>	
	</select>	
	 </p>
<label>Наименование категории:<br/><input name="name"/></label>
<input type="submit" name="sbm_create_category" value="Создать"/>
</form>