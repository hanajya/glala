<?php

namespace app\api\controller;
use app\common\model\User as UserModel;
use app\common\model\Userinfo as UserinfoModel;
use app\api\controller\Base as BaseController;
use think\Db;

class Login extends BaseController
{
	private $appid  ='';
	private $secret ='';

	public function initialize()
	{
        $this->appid = '';
        $this->secret = '';
	}

	public function wxlogin()
	{
		$code = input('code');
		if(!$code){
			$this->failed('code不能为空');
		}

		/////////
		if( $code == '123' ){
			$openid = "owc2G5BTQUPZ-VjCBcNyaCn4h3l4";
			$dat = ['openid'=>$openid,'unionid'=>'','session_key'=>''];
			$this->successful('',$dat);
		}
		/*
		*/
		////////
		$url = 'https://api.weixin.qq.com/sns/jscode2session?appid='.$this->appid.'&secret='.$this->secret.'&js_code='.$code.'&grant_type=authorization_code';

		$result = httpGet($url);
		//$log = date('Y-m-d H:i:s')." - ".$url."\r\n".json_encode($result);
        //logw($log,'wxapp');
		if(isset($result['openid'])){
			$openid = $result['openid'];
		}

		$dat = ['openid'=>$openid,'unionid'=>$result['unionid'],'session_key'=>$result['session_key']];
		$this->successful('',$dat);
	}

	public function wxsetuserinfo()
	{	
		if( !request()->isPost() ){
            $this->failed('非法请求');
        }

		$openid = input('openid');
		$unionid = input('unionid',0);
		$username = input('nickname');
		$avatar = input('avatarurl');
		$gender = input('gender');
		$province = input('province');
		$city = input('city');

		if( !$openid || $openid == 'null' ){
			$this->failed('OpenID不能为空');
		}

		/*if (!$this->authToken())
            $this->notLogged('需要登录后才能进行操作');*/
		Db::startTrans();
		try {
			if( !$user = UserModel::getuserByOpenid($openid) ){
				$dt=[];
				$dt = [
					'openid'    =>$openid,
					'username'  =>$username,
					'avatar'    =>$avatar,
					'gender'    =>$gender,
					];
				$adduser = UserModel::create($dt);
				$user_id = $adduser->id;
			}else{
				//更新 时间
				$user_id = $user->id;
			}
			if( !$userinfo = UserinfoModel::where('user_id',$user_id)->find() ){
				$dt2 = [
					'user_id'   =>$user_id,
				];
				UserinfoModel::create($dt2);
			}
			Db::commit();
			$this->successful('',$this->getReturnData($user_id));
		} catch ( \Expection $e ) {
			Db::rollback();
			$this->error('权限登录失败');
		}
		
	}

	

	function getyzm(){
		/*$phone = $this->get('phone');
		if( !isphone($phone) ){
			$this->error('手机号码格式有误');
		}
		
		if( $one = common\models\YzmModel::where('phone',$phone)->where('status',0)->orderBy('id','desc')->first() ){
			$yzm = $one->code;
		}else{
			$yzm = rand(1000,9999);
			$dat = ['phone'=>$phone,'code'=>$yzm];
			common\models\YzmModel::create($dat);
		}

		$c = \Helper::send($phone,$yzm);

		$this->success('',$c);*/
		echo '111';
	}

	//判断是否绑定了手机号码了
	public function isbind(){
		$openid = $this->get('openid');
		$unionid = $this->get('unionid',0);
		$data = 0;

		if( empty($openid) ){
			$this->error('openid不能为空');
		}

		if( $one = UserModel::getuserByOpenid($openid) ){
			if( !empty($one->phone) ){
				$data = 1;
				$this->success('',$this->getReturnData($one->id));
			}
		}

		$this->success('',$data);
	}



	private function getReturnData($user_id)
	{

		if (!$token = $this->createToken(['user_id' => $user_id]))
			$this->error('Token创建失败');

		return [
			'user_id' => $user_id,
			'token' => $token
		];
	}

}