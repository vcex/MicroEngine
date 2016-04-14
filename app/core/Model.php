<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**
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


class Model
{	
	public $pdo;

	public function __construct()
	{
		
	}

	public function __call($class,$method)
	{
		$f = fopen(CALL,'a+');

		fwrite($f,$class.$method);

		fclose($f);
	}

}