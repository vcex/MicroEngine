<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Helper show @data
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



class Html
{
	public static function clear($str)
	{
		$str = trim($str);

		$str = htmlspecialchars($str);

		$str = stripcslashes($str);

		$str = htmlentities($str);

		return $str;
	}

	public static function clear_easy($str)
	{
		$str = trim($str);

		$str = stripcslashes($str);

		return $str;
	}
}