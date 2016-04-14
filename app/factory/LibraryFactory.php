<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Library factory
*
*@package engine
*
*@subpackage app/lib
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
*@param String $lib
*
*@var LibraryFactory $lib
*
*@var String $class
*
**/

class LibraryFactory
{


	public function __construct($lib)
	{
		$lib = ucfirst($lib);

		$class = 'app/lib/'.$lib.'.php';


		if(file_exists($class))
		{
			require_once $class;
		}


		if(!file_exists($class))
		{
			new \ErrorHandler(

					404,
					"Library `{$lib}` is not exists",
					'LibraryFactory.php',
					50

				);

		}

		return new $lib;
		
	}

}