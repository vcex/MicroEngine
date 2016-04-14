<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Table factory
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

class TableFactory
{
	protected $pdo;

	protected $table;

	public function __construct($table)
	{
		$this -> table	= $table;

		$pdo	= new \MPDO();

		$this -> pdo	= $pdo -> get_pdo();
	}

	public function get_pdo()
	{
		return $this -> pdo;
	}
}