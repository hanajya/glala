<?php
/*
|--------------------------------------------------------------------------
| 流水
|--------------------------------------------------------------------------
|
| @author zzhq
|
*/
namespace app\api\controller;

use think\Db;
use app\api\controller\Base;
use app\common\model\Adv as AdvM;

class Adv extends Base
{
	public function list() {
        $limit = input('limit',5);
		$data = AdvM::where('adv_position_id',AdvM::GROUP_ADV)->order('ords','desc')->order('id','desc')->limit($limit)->select();

		$this->successful('',$data);
	}

	
   

	
}