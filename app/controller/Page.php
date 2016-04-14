<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Pages controller.
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



class Page extends Controller
{

	public $view;

	public function action_index($param = null)
	{
		new \MetaFactory('model','articles');

		new \MetaFactory('helper','text');

		$articles = new \Articles;

		$args = [

			'news' => $articles -> all(),
		];

		$args = array_merge($this -> args,$args,$param);

		$this -> view -> load('index',$args);
	}
}
//EOF