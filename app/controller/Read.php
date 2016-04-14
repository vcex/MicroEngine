<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Read controller.
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



class Read extends Controller
{
	public $view;

	private $art;

	public function action_index()
	{
		$this -> view -> load('index',null);
	}

	public function __call($method, $param)
	{
		$meth = explode('_',$method);

		if(isset($meth[1]))
		{
			if(!is_int((int)$meth[1]))
			{
				$this -> view -> load('error/404',['message'=>'','error'=>'Запись не найдена1']);
			}

			else
			{
				$art_id = (int)$meth[1] - 1;

				new \MetaFactory('model','articles');

				$article = new Articles;

				$articles = $article -> all();

				if(isset($articles[$art_id]))
				{
					$this -> art = $articles[$art_id];

					$args = [

						'article_id' => $art_id,

						'title' => $this -> art['title'],

						'text'	=> $this -> art['text'],

						];

					$this -> view -> load('read',array_merge($this -> args,$args,$param));
				}

				else
				{
					$this -> view -> load('error/404',['message'=>'','error'=>'Запись не найдена2']);
				}
			}
		}

	else
	{
		$this -> view -> load('error/404',['message'=>'','error'=>'Запись не найдена3']);
	}
}
}