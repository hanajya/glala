<?php

/*
|--------------------------------------------------------------------------
| 登录
|--------------------------------------------------------------------------
|
| @author Hana
|
*/
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Admin;
use app\common\controller\Base;
class Login extends Base
{


	/**
	 * 登录
	 */
	public function signin()
	{	
		extract($_POST);
		if ($admin = Admin::login($username, $password))
			$this->successful('欢迎登录 ' . $admin->username, $this->getReturnData($admin));
		else
			$this->failed('登录失败');
	}

	/**
	 * 刷新 Token
	 */
	public function refreshToken()
	{
		if ($this->authToken())
			$this->successful('', $this->getReturnData($this->admin));
		else
			$this->notLogged('需要登录后才能进行操作');
	}

	/**
	 * 统一登录返回数据
	 * 
	 * @param  object  $admin  管理员数据
	 * @return array
	 */
	private function getReturnData($admin)
	{
		// 更新登录时间
		$admin->login_at = $_SERVER['REQUEST_TIME'];
		$admin->save();

		if (!$token = $this->createToken(['uid' => $admin->id, 'ip' => getClientIP()]))
			$this->error('Token创建失败');

		return [
			'admin' => $admin,
			'token' => $token
		];
	}
}