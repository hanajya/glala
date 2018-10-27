<?php
/*
|--------------------------------------------------------------------------
| 用户管理
|--------------------------------------------------------------------------
|
| @author Hana
|
*/
namespace app\admin\controller;

use think\Db;
use app\admin\controller\Auth;
use app\common\model\User as Usermodel;

class User extends Auth
{
	public function list() {
		$model = Usermodel::order('id','desc');

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

            if (Usermodel::hasUsername($data['username']))
                throw new \Exception('用户名已存在');
            $model = new Usermodel;
           	$model->save($data);

            Db::commit();
            $this->successful('新增：' . $data['username']);
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
            if( $data = Usermodel::get($id) ){
                $data['money'] = $data->money;
                $this->successful('', $data);
            }else{
                $this->notFound();
            }
        }

        Db::startTrans();
        try
        {
            $data = $this->post();
            unset($data['create_time']);
            unset($data['update_time']);

            if (!$model = Usermodel::find($id))
                throw new \Exception('修改失败');

            if ($model->username != $data['username'] && Usermodel::hasUsername($data['username']))
                throw new \Exception('用户名已存在');

            $model->save($data);

            Db::commit();
            $this->successful('修改了：' . $model->username);
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
        if (!$model = Usermodel::find($this->post('id')))
            $this->notFound();

        $model->delete() ? $this->successful('删除了：' . $model->username) : $this->failed('删除失败');
    }

    public function status()
    {	
    	$id = $this->post('id');
        if ( !$model = Usermodel::get($id) )
            $this->notFound();

        if ( $model->status ) {
			$model->status = 0;
		} else {
			$model->status = 1;
		}
		$model->save();
        $this->successful('更新成功');
    }

	
}