<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Admin controller.
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



class Admin extends Controller
{
	public $view;

	private function who_is()
	{
		new \MetaFactory('model','users');

		new \MetaFactory('helper','html');

		if(isset($_COOKIE['login']))
		{
			$user = new Users;

			$login = $user -> get_one('login','login','=',"'".Html::clear($_COOKIE['login'])."'");

			if($_COOKIE['login'] === $login)
			{
				if((isset($_COOKIE['usalt'])))
				{
					$key = str_replace(md5(md5($login)).'auth','',$_COOKIE['usalt']);

					if($key === SKEY)
					{
						return true;
					}

					else
					{
						return false;
					}
				}

				else
				{

					$this -> action_login();

				}

			}

			else
			{

				header('Location:/admin/login');

			}
		}

		else
		{

			header('Location:/admin/login');

		}
	}

	public function action_index($param = null)
	{
		if($this -> who_is())
		{
			$sends = [

				'title'	=>	'Управление', 
			];


			$this -> view -> load('admin/index',array_merge($this -> args,$sends,$param));
		}

		else
		{
			header('Location:/admin/login');
		}
	}


	public function action_cats($param = null)
	{

		new \MetaFactory('model','catalogy');

		$cats = new Catalogy;

		$data = $cats -> all();

		$sets = [

				'cats' => $data,
				'title' => 'Категории',

			];

		$param = array_merge($param,$sets);

		$this -> view -> load('admin/index,admin/cats',$param);
	}

	public function action_login($param = null)
	{
		new \MetaFactory('component','form');

		$form = new Form;

		$sets = [

			'form' => $form,
		];

		$param = array_merge($param,$sets);

		$this -> view -> load('login',$param);
	}

	public function action_arts($param = null)
	{
		if(!$this -> who_is())
		{
			$this -> action_ololo();
		}

		new \MetaFactory('model','articles');

		$arts = new \Articles;

		$args = [

			'arts' => $arts -> all(),
			'title' => 'Записи',
		];
		
		$this -> view -> load('admin/index,admin/arts',array_merge($this -> args,$args));
	}

	public function action_add_art($param = null)
	{
		if(!$this -> who_is())
		{
			$this -> action_ololo();
		}

		new \MetaFactory('model','catalogy');

		$cats = new \Catalogy;

		$args = [

			'cats' => $cats -> all(),
			'args' => 'admin/add_art',
		];
		
		$this -> view -> load('admin/index,admin/add_art',array_merge($this -> args,$args));
	}

	public function action_add_cat_compl($param = null)
	{
		if(!$this -> who_is())
		{
			$this -> action_ololo();
		}

		new \MetaFactory('helper','html');

		$cat_id = Html::clear($_POST['cat_id']);

		$title = Html::clear($_POST['title']);

		$author = Html::clear($_POST['author']);

		$text = Html::clear($_POST['text']);

		$kwds = Html::clear($_POST['kwds']);

		$file = $_FILES['attach'];

		$fname = md5(md5('attach_'.$file['name']));

		$filename = UPLOADS.'/img/'.$fname;

		move_uploaded_file($file['tmp_name'],$filename);

		$keys = [

			'title',
			'author',
			'img',
			'text',
			'cat_id',
			'dt',
			'kwds'
		];

		$vals = [

			$title,
			$author,
			$fname,
			$text,
			$cat_id,
			'NOW()',
			$kwds
		];

		new \MetaFactory('model','articles');

		$arts = new \Articles;

		$res = $arts -> insert($keys,$vals);

		header('Location:/admin/arts');
		
	}

	private function action_ololo()
	{
		header("HTTP/1.1 404 Not Found");

		die($this -> view -> load('error/404',['error' => 'Страница не найдена']));
	}

}
