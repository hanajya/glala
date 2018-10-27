<?php

namespace app\common\model;
use think\Model;

/**
 * 
 */
class Tags extends Model
{
	protected $pk = 'id';

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'tags';
    protected $autoWriteTimestamp = true;


    public static function hasName($name)
    {
        return (bool) self::where('name', $name)->count();
    }



}