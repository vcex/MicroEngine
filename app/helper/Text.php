<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Pages controller.
*
*@package engine
*
*@subpackage app/controller
*
*@author 0x00-dev
*
*@link <0x00.dev@gmail.com>
*
*@version 1.0.0
*
**/



class Text
{
	public static function arr_to_kwds($text)
	{
		$arr = explode(',',$text);

		return $arr;
	}

	public static function translate($str)
	{		
		$rus = array
		
		(
			'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж',
			'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с',
			'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь',
			'э', 'ю', 'я',' '
		);
	
    $lat = array
	
	(
		'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y',
		'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h',
		'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya','_'
	
	);
	
	$nstr = mb_strtolower($str,'utf-8');
	
    return str_replace($rus, $lat, $nstr);
  }
}