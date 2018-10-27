<?php

/*
|--------------------------------------------------------------------------
| 用户管理
|--------------------------------------------------------------------------
|
| @author Hana
|
*/
namespace app\common\model;
use think\Model;

class Admin extends Model {

    /**
     * 状态
     */
    const STATUS_NORMAL = 1;    // 正常
    const STATUS_LOCKED = 0;

    protected $pk = 'id';

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
/*    protected $fillable = [
        'username',
        'password',
        'status',
        'auth',
        'login_at'
    ];*/

    /**
     * Get attribute with login_at
     *
     * @param  string  $value
     * @return void
     */
   /* public function getLoginAtAttribute($value)
    {
        return $value ? date('Y-m-d H:i:s', $value) : $value;
    }*/

    /**
     * 用户名是否已存在
     *
     * @param  string   $username   用户名
     * @return boolean
     */
    public static function hasUsername($username)
    {
        return (bool) self::where('username', $username)->count();
    }

    /**
     * 加密密码
     *
     * @param  string   $password  密码串
     * @return string
     */
    public static function hashPassword($password)
    {
        return sha1($password);
    }

    /**
     * 验证密码
     *
     * @param  string   $password  密码
     * @param  string   $hash      密码后的密码
     * @return boolean
     */
    public static function validatePassword($password, $hash)
    {
        return sha1($password) == $hash ? true : false;

    }

}