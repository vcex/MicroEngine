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



class SubmitForm extends Controller
{
	public function action_login($param = null)
	{
		new \MetaFactory('model','users');

		new \MetaFactory('helper','crypto');

		new \MetaFactory('helper','html');


		$login = strtolower(Html::clear($_POST['login']));

		$pwrd = Html::clear_easy($_POST['password']);

		$crypto = new Crypto;

		$real_pwrd = Crypto::encode($pwrd);

		$users = new Users;

		$true_pwrd = $users -> get_one('pwrd','login','=',"'$login'");

		if($real_pwrd === $true_pwrd)
		{

			setcookie('login',$login,time()+7200,'/',$_SERVER['SERVER_NAME']);

			setcookie('usalt',md5(md5($login)).'auth'.SKEY,time()+7199,'/',$_SERVER['SERVER_NAME']);

			header('Location:/admin');
		}

		else
		{
			header('Location:/admin');
		}

	}
}