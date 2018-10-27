<?php
/*
|--------------------------------------------------------------------------
| 基类控制器
|--------------------------------------------------------------------------
| 所有后台共用方法均写到此文件
|
| @author Carmen
|
*/
namespace app\common\controller;
use app\admin\model\Admin;
use app\common\library\API;
class Base extends API
{

	/**
	 * 当前登录管理员
	 *
	 * @var integer
	 */
	public $admin;

	/**
	 * 验证 Token
	 * 
	 * @return boolean
	 */
	protected function authToken()
	{

		if (
			($payload = parent::authToken())
			&& isset($payload['uid'])
			// && isset($payload['ip'])
		)
		{
			$admin = Admin::find($payload['uid']);
			if (
				$admin
				&& $admin->status != Admin::STATUS_LOCKED
				// && $payload['ip'] == \Helper::getClientIP()
			)
			{
				$this->admin = $admin;
				return true;
			}
		}
		return false;
	}
}