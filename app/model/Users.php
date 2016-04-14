<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Users model
*
*@package engine
*
*@subpackage app/model
*
*@author 0x00-dev
*
*@link <0x00.dev@gmail.com>
*
*@version 1.0.0
*
**/



class Users extends ORModel
{
	protected $table = 'users';

	public $data;

	public $insert;

	public $truncate;

	public $select;

	public $all;


	function __construct()
	{
		$this -> __construct = parent::__construct($this -> table);
	}
}