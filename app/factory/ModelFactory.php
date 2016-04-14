<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Model factory
*
*@package engine
*
*@subpackage app/factory
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
*@param String $model
*
*@var Model $model
*
*@var String $class
*
**/

class ModelFactory
{


	public function __construct($model)
	{
		$model = ucfirst($model);

		$class = 'app/model/'.$model.'.php';


		if(file_exists($class))
		{
			require_once $class;

			return new $model;
		}


		if(!file_exists($class))
		{
			new \ErrorHandler(

					404,
					"Model `{$model}` is not exists",
					'ModelFactory.php',
					50

				);
		}
		
	}

}