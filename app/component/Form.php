<?php
/*
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
*/


/*
*
*Form creater
*
*/


class Form
{

	public static $name;

	public static $data = null;

	/*
	*
	*Prepare arguments method
	*
	*@param link &$args
	*
	*@return void
	*/

	private static function prepare(&$args)
	{
		self::$name = parse_url($_SERVER['REQUEST_URI'])['path'];

		unset($args['name']);

		unset($args['form']);
	}

	/*
	*
	*Pattern replace method
	*
	*@param string $obj
	*
	*@return string
	*/

	public static function pattern($obj)
	{
		$matches = preg_match("/(\@[a-z]*\@)/",$obj,$n);

		if($matches > 0)
		{

			$method = str_replace("@",'',$n[0]);

			if(method_exists("Pattern",$method))
			{
				$obj = str_replace($n[0],Pattern::$method(), $obj);
			}
		}

		return $obj;
	}

	/*
	*
	*Initialise form creater method
	**Prepare .json or array data
	*
	*@param string/array $args
	*
	*@return void
	*/

	private static function init($argv)
	{
		if(!file_exists(CT."/form"))
		{
			mkdir(CT."/form");
		}

		if(is_string($argv))
		{
			$json_rep = CT."/form/{$argv}.json";

			if(file_exists($json_rep))
			{
				$f = fopen($json_rep,'r+');

				$json_src = fread($f,filesize($json_rep));

				fclose($f);

				self::$data = json_decode($json_src,true);
			}

			if(!file_exists($json_rep))
			{
				new \ErrorHandler(

						404,
						"Component Form {$argv} not found",
						__FILE__,
						__LINE__
						
					);
			}

		}

		if(is_array($argv))
		{
			$json_rep = CT."/form/{$argv['name']}.json";

			if(file_exists($json_rep))
			{
				$f = fopen($json_rep,'r+');

				$json_src = fread($f,filesize($json_rep));

				fclose($f);

				self::$data = json_decode($json_src,true);
			}

			if(!file($json_rep))
			{
				$data = json_encode($argv);

				$f = fopen($json_rep,'w+');

				fwrite($f,$data);

				fclose($f);

				self::$data = $data;
			}
		}
	}


	private static function openForm($args)
	{
		if(!isset($args['name']))
		{
			$args['name'] = 'default';
		}

		$action = isset($args['action'])?$args['action']:"/SubmitForm";

		$form = '
		<form action="'.$action.'"';

		if(!$args)
		{
			return false;
		}

		foreach($args as $key => $val)
		{
			$form .= ' '.$key.'='."'".$val."'";
		}

		$form .= '>
		';

		echo self::pattern($form);
	}

	private static function input($args)
	{
		$input = '<input';

		if(!$args)
		{
			return false;
		}

		foreach($args as $key => $val)
		{
			$input .= ' '.$key.'='."'".$val."'";
		}

		$input .= '/>
		';
		
		echo self::pattern($input);
	}

	public static function inputHidden()
	{
		$hidden_sets = [

				'type' => 'hidden',
				'value'	=> self::$name,
				'name'	=> 'request_method',
		];

		echo self::input($hidden_sets);
	}

	private static function button($args)
	{
		$button = '<button';

		if(!$args)
		{
			return false;
		}

		foreach($args as $key => $val)
		{
			$button .= ' '.$key.'='."'".$val."'";
		}

		$button .= '>'.$args['value'].'</button>
		';

		echo self::pattern($button);
	}

	private static function area($args)
	{
		$area = '<textarea';

		if(!$args)
		{
			return false;
		}

		foreach($args as $key => $val)
		{
			$area .= ' '.$key.'='."'".$val."'";
		}

		$area .= '></textarea>
		';

		echo self::pattern($area);
	}

	private static function closeForm()
	{
		echo '</form>
		';
	}

	public static function createForm($argv)
	{
		self::init($argv);

		$args = self::$data;

		self::openForm($args['form']);

		self::prepare($args);

		self::inputHidden();

			foreach($args as $key => $val)
			{
				$key2 = $key;

				$key = preg_replace("/([0-9].*).*$/",'',$key);

				self::$key($args[$key2]);
			}

		self::closeForm();

	}
}