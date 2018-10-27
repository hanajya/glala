<?php
/*
|--------------------------------------------------------------------------
| 投诉
|--------------------------------------------------------------------------
|
| @author Hana
|
*/
namespace app\admin\controller;

use think\Db;
use app\admin\controller\Auth;
use app\common\model\Complaints as ComplaintsM;

class Complaints extends Auth
{
	public function list() {
		$model = ComplaintsM::order('id','desc');

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
            ($data = ComplaintsM::find($id)) ? $this->successful('', $data) : $this->notFound();
        }

        Db::startTrans();
        try
        {
            $data = $this->post();
            unset($data['create_time']);
            unset($data['update_time']);

            if (!$model = ComplaintsM::find($id))
                throw new \Exception('修改失败');

            $model->save($data);

            Db::commit();
            $this->successful('修改');
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
        if (!$model = ComplaintsM::find($this->post('id')))
            $this->notFound();

        $model->delete() ? $this->successful('删除了：' . $model->name) : $this->failed('删除失败');
    }

    public function status()
    {	
    	$id = $this->post('id');
        if ( !$model = ComplaintsM::get($id) )
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