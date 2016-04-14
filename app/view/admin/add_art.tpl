<div class='both'></div>
<div class='box add-art-form'>
	<form name='add_art' action='/admin/add_cat_compl' method='post' enctype='multipart/form-data'>
		<?php if(is_array($vardata['cats'])):?>
			<select name='cat_id'>
			<?php foreach($vardata['cats'] as $key):?>
				<option value='<?=$key['cat_id']?>'><?=$key['name']?></option>
			<?php endforeach?>
			</select>
			<?php else:?>
				<span>Нет категорий</span>
			<?php endif?>
		<input type='text' name='title' required='required' placeholder='Заголовок'/>
		<input type='text' name='author' placeholder='Автор' required='required' value='<?=$_COOKIE['login']?>'/>
		<input type='text' name='kwds' placeholder='Теги через запятую'/>
		<input type='file' name='attach'/>
		<textarea name='text' placeholder='Текст записи'></textarea>
		<br/>
		<button>Добавить запись</button>
	</form>
</div>