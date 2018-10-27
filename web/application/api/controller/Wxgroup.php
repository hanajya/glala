<?php
/*
|--------------------------------------------------------------------------
| 群对接
|--------------------------------------------------------------------------
|
| @author zzhq
|
*/
namespace app\api\controller;

use think\Db;
use app\api\controller\Base;
use app\common\model\Wxgroup as WxgroupM;

class Wxgroup extends Base
{
	public function list() {
        $order = input('order/d',0);

		$model = WxgroupM::where('status',1);

		$data['total'] = $model->count();

        switch ($order) {
            case 1: //人气
                $model->order('num_user','desc')->order('sort','desc');
                break;
            case 2: //附近
                //$model->where('name','LIKE','%'.$keywords.'%');
                break;
            default:
                    $model->order('sort','desc')->order('id','desc');
                    break;
        }

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
    public function create()
    {
        if( !request()->isPost() ){
            $this->failed('非法请求');
        }

        $user_id = 3;

        Db::startTrans();
        try
        {
            $data = input('post.');

            $data['user_id'] = $user_id;

            if( $acc = AccountM::where('user_id',$user_id)->order('id','desc')->find() ){
                if( $data['type'] ==1 ){
                    $money = $acc->money + (float)$data['amount'];
                }elseif( $data['type'] ==2 ){
                    $money = $acc->money - (float)$data['amount'];
                }
                
                $da = ['user_id'=>$user_id,
                        'amount'=>(float)$data['amount'],
                        'money' =>$money,
                        'type' =>(int)$data['type'],
                        'tt' =>(int)$data['tt'],
                        'tit' =>$data['tit'],
                        ];
                $acc->create($da);        
            }else{
                $acc = new AccountM;
                $da = ['user_id'=>$user_id,
                        'amount'=>(float)$data['amount'],
                        'money' =>(float)$data['amount'],
                        'type' =>(int)$data['type'],
                        'tt' =>(int)$data['tt'],
                        'tit' =>$data['tit'],
                        ];
                $acc->create($da); 
            }

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