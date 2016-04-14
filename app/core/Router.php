<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Site router.
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
*Main site router.
*
*@var string $url;
*
*@var string $def_c;
*
*@var string $def_m;
*
*@var timestamp/null $start;
*
*@var array/null $load_t
*
**/

class Router
{
	private $url;

	private $def_c = "Page";

	private $def_m = "index";

	private $start ;

	private $load_t;

	/**
	*
	*Parse url && prepare route
	*
	*@set $start
	*
	*@set load_t
	*
	*@set url
	*
	*@return void
	*
	**/

	public function __construct()
	{
		$this -> start = microtime();

		$this -> load_t = ['load_time' => ''];

		$this -> url = parse_url($_SERVER['REQUEST_URI']);
	}

	/**
	*
	*Application enter point.
	*
	**Create route
	*
	**Execute route
	*
	*@var string $dir
	*
	*@var string $path
	*
	*@var string $data
	*
	*@var string $contr
	*
	*@var string $meth
	*
	*@var string $controller
	*
	*@return void
	*
	**/

	public function run()
	{

		$dir		= 'app/controller/';

		$path		= explode('/',$this -> url['path']);

		if(count($path >= 3))
		{
			$path = array_unique($path);
		}


		$data		= isset($this -> url['query'])?$this -> url['query']:null;

		$contr		= ucfirst(empty($path[1])?$this -> def_c:$path[1]);

		$meth		= isset($path[2])?$path[2]:$this -> def_m;

		$meth		= empty($meth)?$this -> def_m:$meth;

		$meth		= 'action_'.$meth;

		
		$controller	= $dir.$contr.'.php';

		/**
		*
		*If not exists $controller
		*
		*try use $controller as method on default controller
		*
		*@set $controller
		*
		*@set $meth
		*
		*@set $contr
		*
		**/

		if(!file_exists($controller))
		{
			$controller	= $dir.$this -> def_c.'.php';

			$meth		= 'action_'.lcfirst($contr);

			$contr		= $this -> def_c;

		}



		/**
		*
		*@set @load_t
		*
		**/

		$this -> load_t['load_time'] = $this -> start;

		/**
		*
		*if method have not args
		*
		*@var array $inject
		*
		*@set $inject @load_t
		*
		**/

		if(is_null($data))
		{
			$inject = $this -> load_t;
		}

		/**
		*
		*if method have args
		*
		*@var array $inject
		*
		*@set $inject array_merge(@data,@load_t)
		*
		**/



		else
		{
			if(!is_null($data))
			{
				$data = ['act' => $data];
			}

			$inject = array_merge($data,$this -> load_t);
		}

		/**
		*
		*Call to route
		*
		*@contr::@method(@inject)
		*
		**/

		require_once $controller;

		$class = new $contr;

		$class -> $meth($inject);

	}
}
//EOF