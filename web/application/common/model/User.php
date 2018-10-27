<?php

namespace app\common\model;
use think\Model;
use app\common\model\Account as AccountM;
/**
 * 
 */
class User extends Model
{
	protected $pk = 'id';

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'user';
    protected $autoWriteTimestamp = true;

    public static function hasUsername($username)
    {
        return (bool) self::where('username', $username)->count();
    }

    public function getMoneyAttr($value,$data)
    {
        if($one = AccountM::where('user_id',$data['id'])->order('id','desc')->find()){
            return $one->money;
        }else{
            return 0;
        }
    }

    public static function getuserByOpenid($openid){
        if(!$user = self::where('openid', $openid)->find())
        {
            return false;
        }

        return $user;
    }

    public static function getuserByPhone($phone){
        if( empty($phone) ){
            return false;
        }
        if(!$user = self::where('mobile', $phone)->find())
        {
            return false;
        }

        return $user;
    }

    public static function getuserById($id){
        if(!$user = self::where('id', $id)->first())
        {
            return false;
        }

        return $user;
    }

    public function userinfo()
    {
        return $this->hasOne('userinfo');
    }


}