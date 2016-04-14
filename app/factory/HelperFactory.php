<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Helper factory
*
*@package engine
*
*@subpackage app/helper
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
*@param String $helper
*
*@var HelperFactory $helper
*
*@var String $class
*
**/

class HelperFactory
{


	public function __construct($helper)
	{
		$helper = ucfirst($helper);

		$class = 'app/helper/'.$helper.'.php';


		if(file_exists($class))
		{
			require_once $class;
		}


		if(!file_exists($class))
		{
			new \ErrorHandler(

					404,
					"Helper `{$helper}` is not exists",
					'HelperFactory.php',
					50

				);
		}

		return new $helper;
		
	}

}