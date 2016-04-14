<div class='admin'>
	<div class='admin-top-panel'>
		<a href='/admin/add_art'><button>Добавить запись</button></a>
	</div>
	<div class='both'></div>
	<?php if((isset($vardata['arts']))&&(null !== $vardata['arts'][0])):?>
		<div class='box'>
		<?php foreach($vardata['arts'] as $key):?>
			<div class='art'><?=$key['title']?></div>
		<?php endforeach?>
		</div>
	<?php else:?>
		<div class='no-articles'>Записей не обнаружено</div>
	<?php endif?>
</div>