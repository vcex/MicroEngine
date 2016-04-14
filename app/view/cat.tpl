<div class='cats_data'>
	<?php 

	new \MetaFactory('helper','text');

	if((isset($vardata['cats_data'])) && (!empty($vardata['cats_data']))):

	?>
		<?php foreach($vardata['cats_data'] as $cats_data):?>
			<div class='article' id='<?=$cats_data['id']?>'>
				<div class='article-title'>
					<?=$cats_data['title']?>
				</div>
				<div class='article-icon'>
					<img src='<?=UPLOAD_IMG.'/'.$cats_data['img']?>'/>
				</div>
				<div class='article-text'>
					<?=mb_substr($cats_data['text'],0,490,'utf-8');?>
					<div class='both'></div>
				</div>
				<div class='article-tech'>
					<a href='/read/<?=$cats_data['id']?>'>
						<div class='article-more' title='Читать полностью'>
							<img src='<?=IMG.'/read.png'?>' alt='read'/>
						</div>
					</a>
					<div class='article-dt'>
						<?=$cats_data['dt']?>
					</div>
					<div class='article-tags'>
						<?php foreach(Text::arr_to_kwds($cats_data['kwds']) as $kwrd):?>
							<div class='tag'><?=$kwrd?></div>
						<?php endforeach?>
					</div>
				</div>
			</div>
		<?php endforeach?>
	<?php else:?>
		<div class='no-articles'>Записей не обнаружено</div>
	<?php endif?>
	<div class='both'></div>
</div>