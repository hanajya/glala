<?php

namespace app\common\model;
use think\Model;

/**
 * 
 */
class Wxgroup extends Model
{
	protected $pk = 'id';

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'wxgroup';
    protected $autoWriteTimestamp = true;
    protected $json = ['tag'];

    public static function hasName($name)
    {
        return (bool) self::where('name', $name)->count();
    }

    /*public function setTagAttr($value)
    {
        return json_encode($value);
    }*/



}