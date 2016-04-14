<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Model binding
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



class ORModel extends Model
{
	public $pdo;


	function __construct()
	{
		new \MetaFactory('table',$this -> table);

		$orm = new \TableFactory($this -> table);

		$this -> pdo = $orm -> get_pdo();
		
	}



	public function all($limit = 1000,$param = 1)
	{
		$query = "select * from ".$this -> table." where $param limit $limit";

		$data = $this -> pdo -> query($query) -> fetchAll();

		return $data;
	}


	public function get_one($needle, $key, $de, $val, $params = '')
	{
		$tbn = $this -> table;

		$query = "select $needle from $tbn where $key $de $val $params";

		return $this -> pdo -> query($query) -> fetch()[$needle];
	}


	public function get_all($needle, $key, $de, $val, $params = '')
	{
		$tbn = $this -> table;

		$query = "select $needle from $tbn where $key $de $val $params";

		$res = $this -> pdo -> query($query) -> fetchAll()[0];

		return $res;
	}


	public function insert($keys,$vals)
	{
		$tbn = $this -> table;

		new \MetaFactory('helper','html');

		$filter_key = '';

		$filter_val = '';

		if($keys instanceof String)
		{
			$keys = explode(',',$keys);
		}

		if($vals instanceof String)
		{
			$vals = explode(',',$vals);
		}

		foreach($keys as $key)
		{
			$filter_key .= "`$key`,";
		}

		foreach($vals as $val)
		{
			$filter_val .= '"'.Html::clear(str_replace("'NOW()'",'NOW()',$val)).'",';
		}

		$keys = substr($filter_key,0,-1);

		$vals = substr($filter_val,0,-1);

		$query = "insert into $tbn ({$keys})values({$vals})";

		return $this -> pdo -> query("{$query}");
	}


	public function truncate()
	{
		$tbn = $this -> table;

		$query = "truncate table $tbn";

		return $this -> pdo -> query($query);
	}



	public function __toString()
	{
		$val = ob_clean(var_dump($this -> data));

		return $val;
	}

	public function obj()
	{
		return $this -> obj;
	}


}