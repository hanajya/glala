<?php
/*
|--------------------------------------------------------------------------
| 广告管理
|--------------------------------------------------------------------------
|
| @author Hana
|
*/
namespace app\admin\controller;
use app\admin\model\Adv as AdvModel;
use think\Db;
class Adv extends \app\admin\controller\Auth
{
	/**
	 * [lists description]
	 * @return [type] [广告列表]
	 */
	public function lists() {
		$model = AdvModel::order('created_at', 'DESC');

        if (($keywords = $this->get('keywords')) != '')
        {
            $keywords = htmlspecialchars($keywords);

            switch ($this->get('search_case'))
            {
                case 'id':
                    $model->where('id', $keywords);
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
	 * [getAdvType description]
	 * @return [type] [获取广告图类型]
	 */
	public function getAdvType() {
		if ( !$data = AdvModel::AdvType() ) 
			$this->notFound();
		$this->successful('',$data);
	}

	/**
	 * [create description]
	 * @return [type] [create]
	 */
	public function create() {
		try
		{
			DB::startTrans();

			$data = $this->post();
			$advArr = AdvModel::AdvType();
			if (array_key_exists($data['adv_position_id'],$advArr ) ) {
				$data['title'] = $advArr[$data['adv_position_id']];
			}
			AdvModel::create($data);
			DB::commit();
			$this->successful($data['title'].'添加成功');
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
	public function update($id=0)
	{
		if ($this->isGet())
		{
			($data = AdvModel::find($id)) ? $this->successful('', $data) : $this->notFound();
		}

		try
		{
			DB::startTrans();

			$data = $this->post();

			if($id){
				//修改
				if (!$model = AdvModel::find($id))
				throw new \Exception('修改失败');

				if (!$model->save($data))
					throw new \Exception('修改失败');

				$msg = '修改了：' . $model->id;
			}else{
				//新增
				AdvModel::create($data);
				$msg = '添加成功';
			}

			DB::commit();
			$this->successful($msg);
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
		if ( !$model = AdvModel::find($this->post('id')) )
			$this->notFound();
		$model->delete() ? $this->successful('删除了：' . $model->id) : $this->failed('删除失败');
	}
	
}