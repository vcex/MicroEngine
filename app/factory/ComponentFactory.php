<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Component factory
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
*@param String $component - component name
*
*@var ComponentFactory $component
*
*@var String $class
*
**/

class ComponentFactory
{


	public function __construct($component)
	{
		$component = ucfirst($component);

		$class = 'app/component/'.$component.'.php';


		if(file_exists($class))
		{
			require_once $class;

			return new $component;
		}


		if(!file_exists($class))
		{
			new \ErrorHandler(

					404,
					"Component `{$component}` is not exists",
					'ComponentFactory.php',
					50

				);
		}
		
	}

}