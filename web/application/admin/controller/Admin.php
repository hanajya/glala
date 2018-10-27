<?php
/*
|--------------------------------------------------------------------------
| 管理员管理
|--------------------------------------------------------------------------
|
| @author Hana
|
*/
namespace app\admin\controller;
use app\admin\model\Admin as AdminModel;
use think\Db;
use think\Request;

class Admin extends \app\admin\controller\Auth {
    /**
     * 列表
     */
    public function lists()
    {
        $model = AdminModel::order('login_at', 'DESC');

        if (($keywords = $this->get('keywords')) != '')
        {
            $keywords = htmlspecialchars($keywords);

            switch ($this->get('search_case'))
            {
                case 'id':
                    $model->where('id', $keywords);
                    break;

                case 'username':
                    $model->where('username', 'LIKE', '%' . $keywords . '%');
                    break;

                default:

                    break;
            }
        }

        $data['total'] = $model->count();

        if ($page = $this->get('page'))
        {
            $limit = $this->get('limit', 20);
            $skip  = ($page - 1) * $limit;
            $model->page($skip,$limit);
        }

        $data['list'] = $model->select();
        $this->successful('', $data);
    }

    /**
     * 添加
     */
    public function create()
    {
        DB::startTrans();
        try
        {
            $data = $this->post();

            if (AdminModel::hasUsername($data['username']))
                throw new \Exception('用户名已存在');

            $data['password'] = AdminModel::hashPassword($data['password']);
            $data['login_at'] = $data['created_at'] = $_SERVER['REQUEST_TIME'];
            $model = DB::name('admin')->insert($data, true);

            DB::commit();
            $this->successful('新增：' . $model['username']);
        }
        catch (\Exception $e)
        {
            DB::rollback();
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
            ($data = AdminModel::find($id)) ? $this->successful('', $data) : $this->notFound();
        }

        try
        {
            DB::startTrans();
            $data = $this->post();

            if (!$model = AdminModel::find($id))
                throw new \Exception('修改失败');

            if ($model->username != $data['username'] && AdminModel::hasUsername($data['username']))
                throw new \Exception('用户名已存在');
            // 修改了密码
            if ($model->password != $data['password'])
                $data['password'] = AdminModel::hashPassword($data['password']);

            if (isset($data['login_at']))
                unset($data['login_at']);

            $data['updated_at'] = $_SERVER['REQUEST_TIME'];
            if (!$model->save($data))
                throw new \Exception('修改失败');

            DB::commit();
            $this->successful('修改了：' . $model->username);
        }
        catch (\Exception $e)
        {
            DB::rollback();
            $this->failed($e->getMessage());
        }
    }

    /**
     * 删除
     */
    public function delete()
    {
        if (!$model = AdminModel::find($this->post('id')))
            $this->notFound();

        $model->delete() ? $this->successful('删除了：' . $model->username) : $this->failed('删除失败');
    }

}