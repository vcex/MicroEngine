<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Main data process
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



class Process
{
	private $data;

	public function __construct()
	{
		$this -> data = new \Data;
	}

	public function add($user_data)
	{
		$this -> data -> offsetSet('public',$user_data);
	}

	public function get()
	{
		$data = $this -> data;

		return $data -> offsetGet('public');
	}

	public function get_as($keys)
	{
		if($keys instanceof ArrayAccess)
		{
			echo 'is array';
		}

		else
		{
			echo 'is not array';
		}
	}
}