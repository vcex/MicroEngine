<div class='error'>
	<div class='error-img'>
		<img src='<?=IMG?>/error_bg.png'/>
	</div>
	<div class='error-title'>
		<h2><?=isset($vardata['message'])?$vardata['message']:''?></h2>
		<h3><?=isset($vardata['error'])?$vardata['error']:''?></h3>
		<h4><?=isset($vardata['error_v'])?$vardata['error_v']:''?></h4>
	</div>
</div>