<?php

namespace app\common\model;
use think\Model;

/**
 * 
 */
class Withdraw extends Model
{
	protected $pk = 'id';

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'withdraw';
    protected $autoWriteTimestamp = true;


}