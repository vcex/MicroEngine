<div class='admin'>
	<div class='mini-box'>
		<form action='/cats/add_cat' method='post'>
			<span>Добавит новую</span>
			<input type='hidden' name='access'  value='<?=crypt("access",SALT)?>'/>
			<input name='cat_name' placeholder='Название' required='required' pattern='^([a-zA-ZА-Яа-я]).*$'/>
			<button>Создать</button>
		</form>
	</div>
	<div class='mini-box'>
		<form action='/cats/del_cat' method='post'>
			<span>Без связей</span>
			<input type='hidden' name='access'  value='<?=crypt("access",SALT)?>'/>
			<input name='cat_name' placeholder='Название' required='required' pattern='^([a-zA-ZА-Яа-я]).*$'/>
			<button>Удалить</button>
		</form>
	</div>
	<div class='mini-box'>
		<form action='/cats/rename_cat' method='post'>
			<?php if(is_array($vardata['cats'])):?>
			<select>
			<?php foreach($vardata['cats'] as $key):?>
				<option value='<?=$key['cat_id']?>'><?=$key['name']?></option>
			<?php endforeach?>
			</select>
			<?php else:?>
				<span>Нет категорий</span>
			<?php endif?>
			<input type='hidden' name='access'  value='<?=crypt("access",SALT)?>'/>
			<input name='cat_name' placeholder='Название' required='required' pattern='^([a-zA-ZА-Яа-я]).*$'/>
			<button>Переименовать</button>
		</form>
	</div>
	<div class='mini-box'>
		<form action='/cats/hide_cat' method='post'>
			<span>Не отображать</span>
			<input type='hidden' name='access'  value='<?=crypt("access",SALT)?>'/>
			<input name='cat_name' placeholder='Название' required='required' pattern='^([a-zA-ZА-Яа-я]).*$'/>
			<button>Скрыть</button>
		</form>
	</div>
	<div class='both'></div>
	<?php if(is_array($vardata['cats'])):?>
		<div class='box'>
		<?php foreach($vardata['cats'] as $key):?>
			<div class='tag'><?=$key['name']?></div>
		<?php endforeach?>
		</div>
	<?php else:?>
		<div class='no-articles red'>Категорий не обнаружено</div>
	<?php endif?>
</div>