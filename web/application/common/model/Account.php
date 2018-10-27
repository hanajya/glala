<?php

namespace app\common\model;
use think\Model;

/**
 * 
 */
class Account extends Model
{
	protected $pk = 'id';

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'account';
    protected $autoWriteTimestamp = true;


}