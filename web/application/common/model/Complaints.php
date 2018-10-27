<?php

namespace app\common\model;
use think\Model;

/**
 * 
 */
class Complaints extends Model
{
	protected $pk = 'id';

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'complaints';
    protected $autoWriteTimestamp = true;

    public function wxgroup()
    {
        return $this->belongsTo('wxgroup');
    }


}