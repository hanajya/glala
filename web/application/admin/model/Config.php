<?php

namespace app\admin\model;
use app\common\model\Config as ConfigModel;

class Config extends ConfigModel {

    /**
     * 获取配置列表
     *
     * @return array
     */
    public static function getList()
    {
        $group    = self::getSetting('config_group');

        $resource = self::getResource();

        foreach ($group as $k => $v)
            $data[$k] = ['name' => $v, 'settings' => []];

        foreach ($resource as $v)
            $data[$v->group]['settings'][] = $v;

        return $data;
    }
}