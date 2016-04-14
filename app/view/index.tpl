<div class='news'>
	<?php 

	new \MetaFactory('helper','text');

	if((isset($vardata['news'])) && (!empty($vardata['news']))):

	?>
		<?php foreach($vardata['news'] as $news):?>
			<div class='article' id='<?=$news['id']?>'>
				<div class='article-title'>
					<?=$news['title']?>
				</div>
				<div class='article-icon'>
					<img src='<?=UPLOAD_IMG.'/'.$news['img']?>'/>
				</div>
				<div class='article-text'>
					<?=mb_substr($news['text'],0,490,'utf-8');?>
					<div class='both'></div>
				</div>
				<div class='article-tech'>
					<a href='/read/<?=$news['id']?>'>
						<div class='article-more' title='Читать полностью'>
							<img src='<?=IMG.'/read.png'?>' alt='read'/>
						</div>
					</a>
					<div class='article-dt'>
						<?=$news['dt']?>
					</div>
					<div class='article-tags'>
						<?php foreach(Text::arr_to_kwds($news['kwds']) as $kwrd):?>
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