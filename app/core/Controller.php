<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Main controller.
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



class Controller
{
	public $view;

	public function __construct()
	{
		$this -> view = new View;

		new \MetaFactory('model','catalogy');

		$cats = new \Catalogy;

		$this -> args = ['cats' => $cats -> all()];
	}

	public function action_index($param = null)
	{
		$this -> view -> load('index',array_merge($this -> args,$param));
	}

	public function __call($method, $args)
	{
		unset($args);

		$act = explode('/',$_SERVER['REQUEST_URI']);

		$href = isset($act[1])?$act[1]:$act[0];

		$args = [

			'message' => 'Страница не найдена',

			'error' => "<a href='/'>На главную</a>",

			'error_v' => "<a href='/{$href}'>Назад</a>",

			'title' => 404,

			];

		$this -> view -> load('error/404',array_merge($this -> args, $args));
	}
}