<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Точка входа в приложение
*
*@package engine
*
*@author 0x00-dev
*
*@link <0x00.dev@gmail.com>
*
*@version 1.0.0
*
**/


/**
*
*Developer mode. Show error,etc.
*
**/



define('DEV_MODE',1);

define('SHOW_ERROR',1);


if(!file_exists('app/bootstrap.php'))
{
	die("Application start failed. [bootstrap.php] is not exists!");
}


require_once 'app/bootstrap.php';

function re_error_handler($err_num, $err_str, $err_f, $err_l)
{
	new \ErrorHandler($err_num, $err_str, $err_f, $err_l);
}


set_error_handler("re_error_handler",$error_types = E_ALL|E_STRICT|E_NOTICE|E_ERROR);

$route = new Router();

$route -> run();

die;

//EOF