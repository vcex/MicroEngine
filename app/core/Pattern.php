<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**FormEntry model.
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

class Pattern
{
	public static function mail()
	{
		return '^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$';
	}

	public static function h1($val)
	{
		return "<h1>$val</h1>";
	}

	public static function dt()
	{
		return 'NOW()';
	}
}