<?php
/*
|--------------------------------------------------------------------------
| 会员
|--------------------------------------------------------------------------
|
| @author zzhq
|
*/
namespace app\api\controller;

use think\Db;
use app\api\controller\Auth;
use app\common\model\User as UserM;
use app\common\model\Userinfo as UserinfoM;
use app\common\model\Account as AccountM;
use app\common\model\Wxgroup as WxgroupM;
use app\common\model\Order as OrderM;
use app\common\model\Complaints as ComplaintsM;

class User extends Auth
{
	public function home() {
        $user_id = $this->user->id;

        $data = UserM::get($user_id);

        $money1 = 0;
        $money2 = 0;
        $money3 = 0;
        if( $money = AccountM::where('user_id',$user_id)->order('id','desc')->find() ){
            $money1 = $money->money;
            if( $m1 = AccountM::where('user_id',$user_id)->where('tt',1)->select() ){
                foreach($m1 as $v){
                    $money2 += $v->amount;
                }
            }
            if( $m2 = AccountM::where('user_id',$user_id)->where('tt',2)->select() ){
                foreach($m2 as $v){
                    $money3 += $v->amount;
                }
            }
        }


        $data['money1'] = $money1;
        $data['money2'] = $money2;
        $data['money3'] = $money3;

		$this->successful('',$data);
	}

	public function wxgroup(){
        $user_id = $this->user->id;
        $model = WxgroupM::where('user_id',$user_id)->order('id','desc');

        $data['total'] = $model->count();

        if ($page = input('page',1))
        {
            $limit = input('limit', 10);
            $model->page($page,$limit);
        }

        $data['list'] = $model->select();
        $this->successful('',$data);
    }
    //查看编辑
    public function wxgroup_detail(){
        $user_id = $this->user->id;
        $id = input('id/d',0);
        if( !$id ){
            $this->failed('ID不能为空');
        }

        if( !$data = WxgroupM::where('user_id',$user_id)->where('id',$id)->find() ){
            $this->failed('没有找到');
        }

        $this->successful('',$data);
    }
    //保存
    public function wxgroup_save(){
        if( !request()->isPost() ){
            $this->failed('非法请求');
        }
        $user_id = $this->user->id;
        $id = input('id/d',0);
        if( !$id ){
            $this->failed('ID不能为空');
        }

        $name = input('name');
        $con = input('con');
        $lordid = input('lordid');
        $lorder = input('lorder');

        if( $model = WxgroupM::where('user_id',$user_id)->where('id',$id)->find() ){
            $model->name = $name;
            $model->con = $con;
            $model->lordid = $lordid;
            $model->lorder = $lorder;
            $model->save();
        }else{
            $this->failed('没有找到');
        }

        $this->successful('',1);
    }

    //加群
    public function wxgroup_add(){
        if( !request()->isPost() ){
            $this->failed('非法请求');
        }
        $user_id = $this->user->id;
        $id = input('id/d',0);
        if( !$id ){
            $this->failed('ID不能为空');
        }

        if( $one = WxgroupM::where('id',$id)->find() ){
            $price = $one->price;
        }else{
            $this->failed('没有找到');
        }

        if( $model = OrderM::where('user_id',$user_id)->where('wxgroup_id',$id)->find() ){
            if( $model->status == 0 ){
                //去支付
            }
        }else{
            $no = date('ymdHis').rand(100,999);
            $da = ['no'=>$no,
                    'user_id'=>$user_id,
                    'wxgroup_id'=>$id,
                    'price'=>$price,
                    'pay'=>1,
                ];
            OrderM::create($da);
        }

        $this->successful('',1);
    }
    //已加入的群
    public function wxgrouplist(){
        $user_id = $this->user->id;
        $model = OrderM::where('user_id',$user_id)->where('status',1)->order('id','desc');

        $data['total'] = $model->count();

        if ($page = input('page',1))
        {
            $limit = input('limit', 10);
            $model->page($page,$limit);
        }

        $data['list'] = $model->with('wxgroup')->select();
        $this->successful('',$data);
    }
    //投诉群
    public function ts_add(){
        if( !request()->isPost() ){
            $this->failed('非法请求');
        }
        $user_id = $this->user->id;
        $id = input('id/d',0);
        if( !$id ){
            $this->failed('ID不能为空');
        }

        if( $one = WxgroupM::where('id',$id)->find() ){
            $wxuser_id = $one->user_id;
            $da=['user_id'=>$user_id,
                'wxuser_id'=>$wxuser_id,
                'wxgroup_id'=>$id,
                'con'=>input('con'),
                ];
            ComplaintsM::create($da);
        }else{
            $this->failed('没有找到');
        }
        $this->successful('',1);
    }
    //我的投诉
    public function ts(){
        $user_id = $this->user->id;
        $model = ComplaintsM::where('user_id',$user_id)->order('id','desc');

        $data['total'] = $model->count();

        if ($page = input('page',1))
        {
            $limit = input('limit', 10);
            $model->page($page,$limit);
        }

        $data['list'] = $model->with('wxgroup')->select();
        $this->successful('',$data);
    }
    //被投诉
    public function ts2(){
        $user_id = $this->user->id;
        $model = ComplaintsM::where('wxuser_id',$user_id)->order('id','desc');

        $data['total'] = $model->count();

        if ($page = input('page',1))
        {
            $limit = input('limit', 10);
            $model->page($page,$limit);
        }

        $data['list'] = $model->with('wxgroup')->select();
        $this->successful('',$data);
    }
    //群主信息
    public function all(){
        $user_id = $this->user->id;
        $one = UserM::get($user_id);
        $data['one'] = $one;

        $model = WxgroupM::where('user_id',$user_id)->where('status',1)->order('id','desc');

        $data['total'] = $model->count();

        if ($page = input('page',1))
        {
            $limit = input('limit', 10);
            $model->page($page,$limit);
        }

        $data['list'] = $model->select();
        $this->successful('',$data);
    }
    //完善个人信息
    public function edit()
    {   
        $user_id = $this->user->id;
        if( request()->isGet() ){
            $data = UserM::with('userinfo')->get($user_id);
            $this->successful('',$data);
            exit();
        }

        $data = input('post.');
        unset($data['create_time']);
        unset($data['update_time']);

       
        Db::startTrans();
        try {
            $one = UserM::get($user_id);
            !empty($data['username']) ? ($one->username =  $data['username']) : '';
            !empty($data['avatar'])   ? ($one->avatar =  $data['avatar']) : '';
            !empty($data['gender'])   ? ($one->gender =  $data['gender']) : '';
            !empty($data['con'])      ? ($one->con =  $data['con']) : '';

            $one->save();

            $two = UserinfoM::where('user_id',$user_id)->find();
            !empty($data['provice'])  ? ($two->provice =  $data['provice']) : '';
            !empty($data['city'])     ? ($two->city =  $data['city']) : '';
            !empty($data['district']) ? ($two->district =  $data['district']) : '';
            !empty($data['industry_id']) ? ($two->industry_id =  $data['industry_id']) : '';
            !empty($data['source'])   ? ($two->source =  $data['source']) : '';
            !empty($data['need_source']) ? ($two->need_source =  $data['need_source']) : '';
            !empty($data['education']) ? ($two->education =  $data['education']) : '';
            !empty($data['profession']) ? ($two->profession =  $data['profession']) : '';

            $two->save();

            Db::commit();
            $this->successful('',1);
        } catch ( \Expection $e ) {
            Db::rollback();
        }
        
    }

	
}