<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Data file
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



class Data implements ArrayAccess
{
	private $settings;

	public function __construct()
	{

		$this -> settings = [

			'page'	=> [

					'def_title'		=>	'Engine',

					'start_page'	=>	'Главная',

				],

			'user' => [

				'name'		=>	'Василий',
				'last_name'	=>	'Васильев',
				'nick'		=>	'bad_nigger'
			],

		];

	}


	public function offsetGet($key)
	{
		return array_key_exists($key, $this -> settings)?$this -> settings[$key]:null;
	}


	public function offsetSet($key,$val)
	{
		if(is_array($key))
		{
			foreach($key as $a => $b)
			{
				$this -> settings[$a] = $b;
			}
		}

		if(is_string($key))
		{
			$this -> settings[$key] = $val;
		}
	}


	public function offsetExists($key)
	{
		return array_key_exists($key, $this -> settings)?true:false;
	}


	public function offsetUnset($key)
	{
		if(array_key_exists($key, $this -> settings))
		{
			$this -> settings[$key] = null;

			return true;
		}

		else
		{
			return false;
		}
	}
}
//EOF