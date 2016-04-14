<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Helper show @data
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



class Show
{
	public function __construct()
	{
		//die(__CLASS__);
	}

	public function get_log()
	{
		new \MetaFactory('library','simple_html_dom');

		$html = new simple_html_dom();

		$html -> load_file(LOG_FILE);

		$data = $html -> find('error_message');

		$block = '';
		
		foreach($data as $e)
		{
			$e = str_replace('/error_message','/div',$e);
			$e = str_replace('/error_time','/div',$e);
			$e = str_replace('/error_line','/div',$e);
			$e = str_replace('/error_str','/div',$e);
			$e = str_replace('/error_file','/div',$e);
			$e = str_replace('/error_num','/div',$e);

			$e = str_replace('error_message','div class="error-block"',$e);
			$e = str_replace('error_time','div class="error-time"',$e);
			$e = str_replace('error_line','div class="error-line"',$e);
			$e = str_replace('error_file','div class="error-file"',$e);
			$e = str_replace('error_str','div class="error-str"',$e);
			$e = str_replace('error_num','div class="error-num"',$e);

			$block .= $e;
		}

		$html -> clear();

		return $block;
		
	}
}

//EOF