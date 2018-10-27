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
namespace app\api\controller;
use app\common\model\User;
use app\common\library\API;
class Base extends API
{

	/**
	 * 当前登录管理员
	 *
	 * @var integer
	 */
	public $user;

	/**
	 * 验证 Token
	 * 
	 * @return boolean
	 */
	protected function authToken()
	{

		if (
			($payload = parent::authToken())
			&& isset($payload['user_id'])
			// && isset($payload['ip'])
		)
		{
			$user = User::find($payload['user_id']);
			if (
				$user
				&& $user->status != 0
				// && $payload['ip'] == \Helper::getClientIP()
			)
			{
				$this->user = $user;
				return true;
			}
		}
		return false;
	}
}