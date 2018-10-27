<?php

/*
|--------------------------------------------------------------------------
| 用户管理
|--------------------------------------------------------------------------
|
| @author Hana
|
*/
namespace app\common\model;
use think\Model;

class Adv extends Model
{
	protected $pk = 'id';

	/**
     * Table name
     *
     * @var string
     */
    protected $table = 'adv';

    CONST GROUP_ADV = 1;
	CONST POSSESS_ADV = 2;
    
}