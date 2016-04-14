<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Подключение core файлов. Подготовка системы
*
*@package engine
*
*@subpackage CORE
*
*@author 0x00-dev
*
*@link <0x00.dev@gmail.com>
*
*@version 1.0.0
*
**/

require_once 'app/core/GlobalDefines.php';

require_once 'app/core/ErrorDefines.php';


/**
*
*Построение списка подключений.
*
*Псевдоним => Путь. При ошибке отображается Псевдоним
*
**/


$requ_arr = [
	
	'View'				=>	CORE.'/View.php',

	'Controller'		=>	CORE.'/Controller.php',

	'Router'			=>	CORE.'/Router.php',

	'Data'				=>	CORE.'/Data.php',

	'ErrorHandler'		=>	CORE.'/ErrorHandler.php',

	'MPDO'				=>	CORE.'/MPDO.php',

	'Model'				=>	CORE.'/Model.php',

	'ORModel'			=>	CORE.'/ORModel.php',

	'Pattern'			=>	CORE.'/Pattern.php',

	'MetaFactory'		=>	CORE.'/MetaFactory.php',

];


/**
*
*Реверс массива. Путь => Псевдоним
*
*Для вывода псевдонима пути
*
**/

$requ_arr_re = array_flip($requ_arr);



/**
*
*Подключение файлов. Обработка исключений
*
**/

foreach($requ_arr as $require)
{
	if(!file_exists($require))
	{
		if(DEV_MODE)
		{
			echo "Bootstrap error: [".

				$require//;

			."] not found!</br>";
		}

		if(!DEV_MODE)
		{
			die("Bootstrap error: [".

				$requ_arr_re[$require]//;

			."] not found!</br>");
		}
	}

	else
	{
		require_once $require;
	}
}


/**
*Enable to exists LOG dir and LOG file
*
**if not - created
*
**/

if(!file_exists(LOG))
{
	mkdir(LOG);
}

if(!file_exists(LOG_FILE))
{
	touch(LOG_FILE);
}

/**
*
*Если нет favicon.ico - создаем дефолтную из первой буквы доменого имени
*
**/

if(!file_exists('./favicon.ico'))
{
	$let = strtoupper($_SERVER['HTTP_HOST'][0]);

	$im = imagecreatetruecolor(640,640);

	$im2 = imagecreatetruecolor(64,64);

	$bg = imagecolorallocatealpha($im,55,55,55,0.5);

	$fg = imagecolorallocate($im,255,255,255);

	//imagefilledellipse($im, 640/2, 640/2, 620, 620, $bg);

	imagettftext($im,400,0,150,500,999999, _PUBLIC.'/_fonts/Verdana_Bold.ttf', $let);

	imagecolortransparent($im,000000);

	imagecolortransparent($im2,000000);

	imagecopyresized($im2,$im,0,0,0,0,64,64,640,640);

	imagepng($im2,'favicon.ico',0);

	imagedestroy($im);

	die();
}

//EOF