<?php
/*
|--------------------------------------------------------------------------
| 群管理
|--------------------------------------------------------------------------
|
| @author Hana
|
*/
namespace app\admin\controller;

use think\Db;
use app\admin\controller\Auth;
use app\common\model\Wxgroup as Wxgroupmodel;

class Wxgroup extends Auth
{
	public function list() {
		$model = Wxgroupmodel::order('id','desc');

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
            ($data = Wxgroupmodel::find($id)) ? $this->successful('', $data) : $this->notFound();
        }

        Db::startTrans();
        try
        {
            $data = $this->post();
            unset($data['create_time']);
            unset($data['update_time']);

            if (!$model = Wxgroupmodel::find($id))
                throw new \Exception('修改失败');

            if ($model->name != $data['name'] && Wxgroupmodel::hasName($data['name']))
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
        if (!$model = Wxgroupmodel::find($this->post('id')))
            $this->notFound();

        $model->delete() ? $this->successful('删除了：' . $model->name) : $this->failed('删除失败');
    }

    public function status()
    {	
    	$id = $this->post('id');
        if ( !$model = Wxgroupmodel::get($id) )
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