<?php
/*
|--------------------------------------------------------------------------
| 登录验证控制器
|--------------------------------------------------------------------------
| 此控制器做登录验证，所有后台需要登录操作的接口均应继承此控制器
|
| @author Hana
|
*/
namespace app\api\controller;
use app\api\controller\Base as BaseController;
class Auth extends BaseController
{
	/**
	 * 初始化
	 */
	public function initialize()
    {
    	parent::initialize();

        if (!$this->authToken())
            $this->notLogged('需要登录后才能进行操作');
    }
}