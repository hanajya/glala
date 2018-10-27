<?php
/*
|--------------------------------------------------------------------------
| 提现管理
|--------------------------------------------------------------------------
|
| @author zzhq
|
*/
namespace app\admin\controller;

use think\Db;
use app\admin\controller\Auth;
use app\common\model\Withdraw as WithdrawM;
use app\common\model\Account as AccountM;

class Withdraw extends Auth
{
	public function list() {
		$model = WithdrawM::order('id','desc');

		$data['total'] = $model->count();

		if ($page = $this->get('page',1))
        {
            $limit = $this->get('limit', 10);
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

        Db::startTrans();
        try
        {
            $data = $this->post();
            unset($data['create_time']);
            unset($data['update_time']);
            $data['user_id'] = 3;

            if (Wxgroupmodel::hasName($data['name']))
                throw new \Exception('群名称已存在');
            $model = new Wxgroupmodel;
           	$model->save($data);

            Db::commit();
            $this->successful('新增：' . $data['name']);
        }
        catch (\Exception $e)
        {
            Db::rollback();
            $this->failed($e->getMessage());
        }
    }

    /**
     * 修改
     */
    public function update($id)
    {
        if ($this->isGet())
        {
            ($data = WithdrawM::find($id)) ? $this->successful('', $data) : $this->notFound();
        }

        Db::startTrans();
        try
        {
            $data = $this->post();
            unset($data['create_time']);
            unset($data['update_time']);

            if (!$model = WithdrawM::find($id))
                throw new \Exception('修改失败');

            if ($model->name != $data['name'] && WithdrawM::hasName($data['name']))
                throw new \Exception('用户名已存在');

            $model->save($data);

            Db::commit();
            $this->successful('修改了：' . $model->name);
        }
        catch (\Exception $e)
        {
            Db::rollback();
            $this->failed($e->getMessage());
        }
    }

    /**
     * 删除
     */
    public function delete()
    {
        if (!$model = WithdrawM::find($this->post('id')))
            $this->notFound();

        $model->delete() ? $this->successful('删除了：' . $model->name) : $this->failed('删除失败');
    }

    public function ok()
    {	
    	$id = $this->post('id');
        if ( !$model = WithdrawM::get($id) )
            $this->notFound();

        $user_id = $model->user_id;
        $money   = $model->money;

        if( $one = AccountM::where('user_id',$user_id)->order('id','desc')->find() ){
            if( $one->money < $money  ){
                $this->failed('余额不够提现');
            }
        }else{
            $this->failed('没有可提现的');
        }

        $act = ['user_id'=>$user_id,
                'amount'=>$money,
                'money'=>$one->money - $money,
                'type'=>2,
                'tt'=>6,
                'tit'=>'提现'.$money.'元',
                ];
        AccountM::create($act);

		$model->status = 1;

		$model->save();
        $this->successful('更新成功');
    }
    //驳回
    public function no()
    {   
        $id = $this->post('id');
        if ( !$model = WithdrawM::get($id) )
            $this->notFound();

        $model->status = -1;
        $model->save();
        $this->successful('更新成功');
    }

	
}