<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**DB connection creater
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
**/



/**
*
*@var string	$host		@private
*
*@var string	$user		@private
*
*@var string	$pwrd		@private
*
*@var string	$dbnm		@private
*
*@var MPDO		$link		@private
*
*@return MPDO	$link
**/


class MPDO
{
	private $host	= 'localhost';

	private $user	= 'root';

	private $pwrd	= '12345';

	private $dbnm	= '0x00_blog';

	private $link;


	public function __construct()
	{
		$this -> link = new \PDO(
			
				'mysql:host='.
				$this->host.';dbname='.
				$this->dbnm.';charset=UTF8',
				$this->user,
				$this->pwrd
				);

		$this -> link -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function get_pdo()
	{
		return $this -> link;
	}

}