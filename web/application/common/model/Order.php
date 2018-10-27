<?php

namespace app\common\model;
use think\Model;

/**
 * 
 */
class Order extends Model
{
	protected $pk = 'id';

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'order';

    public function wxgroup()
    {
        return $this->belongsTo('wxgroup');
    }

}