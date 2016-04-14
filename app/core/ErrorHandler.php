<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Table CRUD creater 
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
*Main Error handler class
*
*@var int/string $error_int @private
*
*@var string $error_str @private
**/


class ErrorHandler
{
	private $err_str;

	private $err_num;

	private $err_f;

	private $err_l;

	private $err_data;

	private $msg;


	/**
	*
	*Prepare response && show crash page
	*
	*@param int/string $error_int @private
	*
	*@param string $error_str @private
	*
	*@return void
	*
	**/


	public function __construct($err_num, $err_str, $err_f, $err_l)
	{

		$this -> err_str = $err_str;

		$this -> err_num = $err_num;

		$this -> err_f   = $err_f;

		$this -> err_l   = $err_l;

		$this -> err_data = [

			'err_str'	=> $err_str,
			'err_num'	=> $err_num,
			'err_f'		=> $err_f,
			'err_l'		=> $err_l,
		];


		$this -> write_log();
		

		$this -> crash_redirect();
	}


	/**
	*
	*Write error to local error log file.
	*
	**Easy parse thiw SimpleHtmlDom.
	*
	*@param int/string $error_int @private
	*
	*@param string $error_str @private
	*
	*@var descriptor $f;
	*
	*@var string msg_to_write
	*
	*@return void
	*
	**/


	private function write_log()
	{

		$msg_to_write = '

		<error_message>
			<error_time>'.date("Y.m.d h:s:i").'</error_time>
			<error_file>'.$this -> err_f.'</error_file>
			<error_line>'.$this -> err_l.'</error_line>
			<error_num>'.$this -> err_num.'</error_num>
			<error_str>'.$this -> err_str.'</error_str>
		</error_message>';


		$f = fopen(LOG_FILE,'a+');

		fwrite($f, $msg_to_write);

		fclose($f);
	}

	/**
	*
	*Show user crash page if error
	*
	*@var View $v
	*
	*@return void
	*
	**/


	private function crash_redirect()
	{
		if(!DEV_MODE)
		{
			$v = new View();

			$v -> load('error/crash',['message' => 'На сервере ведутся технические работы']);

			die();
		}

		else
		{


			foreach($this -> err_data as $err)
			{
				$this -> msg .= $err.'<br/>';
			}

			$data = new \Data;

			$data -> offsetSet(['page','message'],$this -> msg);
		}

		if(SHOW_ERROR)
		{
			!empty($this -> msg)?$this -> msg:print_r(error_get_last());
		}
		
	}

}
//EOF