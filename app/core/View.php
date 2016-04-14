<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Main View controller
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
*View creater
*
*@var array $data @private
*
*@var string $tpl @private
*
*@var string $def @private
*
**/


class View
{
	private $data;

	private $tpl = 'app/view/';

	private $def = 'default';

	/**
	*
	*Create @data object
	*
	*@var array $data
	*
	*@var array $sets
	*
	*@set $this -> data
	*
	*@return void
	*
	**/

	public function __construct()
	{
		$data = new Data;

		$this -> data = array_merge_recursive($data -> offsetGet('page'),$data -> offsetGet('user'));

	}

	/**
	*
	*@private
	*
	*@param string $view - view tpl name to load
	*
	*@param array/null $data - args[]
	*
	*@var string $view
	*
	*@var array $vardata
	*
	*@return View obj [@tpl,@data]/false
	*
	**/

	private function fabrica($view, $data = null)
	{

		if(is_null($data))
		{
			$vardata = $this -> data;
		}

		if(!is_null($data))
		{
			$vardata = array_merge_recursive($this -> data, $data);
		}



		if((is_null($view)) || (empty($view)))
		{
			$view = $this -> def;
		}

		if(strpos($view,','))
		{
			$tpl = [];

			$views = explode(',',$view);

			foreach($views as $key)
			{
				(array)$tpl[$key] = $this -> tpl.$key.'.tpl';
			}
		}

		else
		{
			$tpl = $this -> tpl.$view.'.tpl';
		}

		if(!is_array($tpl))
		{
			if(file_exists($tpl))
			{
				return ['tpl' => $tpl, 'data' => $vardata];
			}

			if(!file_exists($tpl))
			{
				return false;
			}
		}

		else
		{
			$tpl_arr = [];

			foreach($tpl as $key)
			{
				if(file_exists($key))
				{
					array_push($tpl_arr,$key);

					$view_tpl = ['tpl' => $tpl_arr, 'data' => $vardata];
				}

				if(!file_exists($key))
				{
					$view_tpl = false;
				}
			}

			return $view_tpl;
		}
	}



	public function load($view, $data = null)
	{
		$fabrica = $this -> fabrica($view, $data);

		if(!$fabrica)
		{

			new \ErrorHandler(

				404,
				"Template {$view} was not exists",
				"View.php",
				126

				);
			
		}


		if($fabrica)
		{
			$tpl		=	$fabrica['tpl'];

			$vardata	=	$fabrica['data'];
		}

		require_once $this -> tpl.'header.php';

		if(!is_array($tpl))
		{
			require_once $tpl;
		}

		else
		{
			foreach($tpl as $key)
			{
				require_once $key;
			}
		}

		require_once $this -> tpl.'footer.php';
	}
}
//EOF