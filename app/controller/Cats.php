<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Categoryes controller.
*
*@package engine
*
*@subpackage app/controller
*
*@author 0x00-dev
*
*@link <0x00.dev@gmail.com>
*
*@version 1.0.0
*
**/



class Cats extends Controller
{
	public $view;

	public function action_add_cat()
	{
		
		if(!isset($_COOKIE['usalt']))
		{
			die(header('Location:/'));
		}


		$login = isset($_COOKIE['login'])?$_COOKIE['login']:null;

		$key = str_replace(md5(md5($login)).'auth','',$_COOKIE['usalt']);


		if($key !== SKEY)
		{
			die(header('Location:/'));
		}


		$access = crypt("access",SALT);

		if(!isset($_POST['access']))
		{
			header('Location:/');
		}

		if(empty($_POST['access']))
		{
			header('Location:/');
		}

		if($_POST['access'] !== $access)
		{
			header('Location:/');
		}

		new \MetaFactory('model','catalogy');

		new \MetaFactory('helper','text');

		new \MetaFactory('helper','html');

		$cats = new Catalogy;

		$cat_name = Html::clear($_POST['cat_name']);

		$cat_id = Text::translate($cat_name);

		$keys = 'name,cat_id';

		$vals = "$cat_name,$cat_id";

		$cats -> insert($keys,$vals);

		header('Location:/admin');
	}

	public function __call($meth,$args)
	{
		unset($args);

		new \MetaFactory('model','catalogy');

		new \MetaFactory('helper','html');

		$cats = new Catalogy;

		$meth = Html::clear(str_replace('action_','',$meth));

		$res = $cats -> get_all('cat_id,name','cat_id','=',"'$meth'");

		$cat_id = $res['cat_id'];

		if(null === $res)
		{
			$this -> view -> load('error/404',array_merge($this -> args,['error' => 'Категория не найдена']));
		}

		else
		{
			new \MetaFactory('model','articles');

			$arts = new \Articles;

			$args = [

				'cats_data' => $arts -> all(1000,"`cat_id` = '$cat_id'"),

				'title' => $res['name'],
			];

			$this -> view -> load('cat',array_merge($this -> args,$args));
		}


	}
}