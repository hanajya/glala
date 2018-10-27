<?php

/*
|--------------------------------------------------------------------------
| 用户管理
|--------------------------------------------------------------------------
|
| @author Hana
|
*/

namespace app\admin\model;
use app\common\model\Adv as AdvModel;


class Adv extends AdvModel
{

	CONST GROUP_ADV = 1;
	CONST POSSESS_ADV = 2;

	public static function advType () {

		return array(
			self::GROUP_ADV =>'首页群广告图',
			self::POSSESS_ADV=>'全民代言广告图'
		);
	}
}