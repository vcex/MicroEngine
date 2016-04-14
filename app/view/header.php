<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Header template
*
*@package engine
*
*@subpackage app
*
*@author 0x00-dev
*
*@link <0x00.dev@gmail.com>
*
*@version 1.0.0
*
**/

?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset='utf-8'/>
			<title><?=isset($vardata['title'])?$vardata['title']:$vardata['def_title']?></title>
			<link rel='stylesheet' type='text/css' href='<?=CSS?>/def.css'/>
			<script language='javascript' src='<?=JS?>/jquery.min.js'></script>
			<script language='javascript' src='<?=JS?>/site.js'></script>
			<link rel='icon' type='image/vnd.microsoft.icon' href='./favicon.ico'>
			<base href="<?=HTTPADDR?>" target="_self"/>
		</head>
		<body>
			<div class='content'>
				<div class='main'>
						<div class='cats-panel'>
							<div class='author'>
								<div class='author-img-cont'>
									<img src='<?=IMG.'/author.png'?>' alt='author'/>
								</div>
								<div class='author-name'>
									<?=$vardata['name']?>
								</div>
								<div class='author-name'>
									<?=$vardata['last_name']?>
								</div>
								<div class='author-nick'>
									@<?=$vardata['nick']?>
								</div>
								<div class='both'></div>
							</div>
							<?php if(array_key_exists('cats',$vardata)):?>
								<?php foreach($vardata['cats'] as $key):?>
									<a href='/cats/<?=$key['cat_id']?>'><div class='cat'><?=$key['name']?></div></a>
								<?php endforeach?>
							<?php else:?>
								<span class='red'>Пока пусто..</span>
							<?php endif?>
							<div class='cat home-lnk'>
								<a href='/'>Главная</a>
							</div>
						</div>
					<div class='user-content'>
<!--end header block-->