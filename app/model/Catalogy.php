<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Categoryes model
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



class Catalogy extends ORModel
{
	protected $table = 'catalogy';


	function __construct()
	{
		$this -> __construct = parent::__construct($this -> table);
	}
}