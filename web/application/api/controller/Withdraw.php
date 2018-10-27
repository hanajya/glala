<?php
/*
|--------------------------------------------------------------------------
| 提现
|--------------------------------------------------------------------------
|
| @author zzhq
|
*/
namespace app\api\controller;

use think\Db;
use app\api\controller\Auth;
use app\common\model\Withdraw as WithdrawM;
use app\common\model\Account as AccountM;

class Withdraw extends Auth
{
	public function list() {
        $user_id = $this->user->id;
		$model = WithdrawM::where('user_id',$user_id)->where('status',1)->order('id','desc');

		$data['total'] = $model->count();

		if ($page = input('page',1))
        {
            $limit = input('limit', 10);
            $model->page($page,$limit);
        }

        $data['list'] = $model->select();
		$this->successful('',$data);
	}

	/**
     * 添加
     */
    public function add()
    {
        if( !request()->isPost() ){
            $this->failed('非法请求');
        }

        $user_id = $this->user->id;

        $money = (float)input('post.money');

        if( $money<=0 ){
            $this->failed('请输入提现金额');
        }

        if( $one = AccountM::where('user_id',$user_id)->order('id','desc')->find() ){
            if( $one->money < $money  ){
                $this->failed('余额不够提现');
            }
            //冻结中
            $dong =0 ;
            if( $two =  WithdrawM::where('user_id',$user_id)->where('status',0)->select() ){
                foreach($two as $v){
                    $dong += $v->money;
                }
            }
            if( $dong>0 ){
                if( ($one->money-$dong) < $money  ){
                    $this->failed('余额不够提现le');
                }   
            }
        }else{
            $this->failed('没有可提现的');
        }

        Db::startTrans();
        try
        {
            $data['user_id'] = $user_id;

            $acc = new WithdrawM;
            $da = ['user_id'=>$user_id,
                    'money' =>$money,
                    ];
            $acc->create($da); 

            Db::commit();
            $this->successful('',1);
        }
        catch (\Exception $e)
        {
            Db::rollback();
            $this->failed($e->getMessage());
        }
    }

   

	
}