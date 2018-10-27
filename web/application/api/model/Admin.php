<?php

/*
|--------------------------------------------------------------------------
| 用户管理
|--------------------------------------------------------------------------
|
| @author Hana
|
*/

namespace app\admin\model;
use app\common\model\Admin as AdminModel;
class Admin extends AdminModel
{

    /**
     * 登录
     *
     * @param  String 	$username   用户名
     * @param  String 	$password   密码
     * @return Object / false
     */
    public static function login($username, $password)
    {
        if (!$username || !$password)
            return false;

        if (!$admin = self::where('username', $username)->find())
            return false;

        if (!self::validatePassword($password, $admin->password))
            return false;

        if ($admin->status == self::STATUS_LOCKED)
            return false;

        unset($admin->password);

        return $admin;
    }

}
