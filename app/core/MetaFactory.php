<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Meta factory
*
*@package engine
*
*@subpackage app/core
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
*@param String $class
*
*@var MetaFactory $meta
*
*@var String $class
*
**/

class MetaFactory
{


	public function __construct($type,$class)
	{
		$meta = ucfirst($class);

		$factoryName = ucfirst($type).'Factory';

		$factoryClass = FACTORY.'/'.$factoryName.'.php';

		$typeClass = 'app/'.$type.'/'.$class.'.php';


		if(file_exists($factoryClass))
		{
			require_once $factoryClass;

			$returnClass = new $factoryName($class);

			//return new $class;
		}


		if(!file_exists($factoryClass))
		{
			new \ErrorHandler(

					404,
					ucfirst($type)." `{$class}` is not exists",
					'MetaFactory.php',
					50

				);
		}
		
	}

}