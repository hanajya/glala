<?php

namespace app\admin\controller;
use app\admin\model\Config as ConfigModel;
use app\admin\model\Config;
use think\Db;
class Setting extends \app\admin\controller\Auth {
    /**
     * 列表
     */
    public function getList()
    {
        $this->successful('', ConfigModel::getList());
    }

    /**
     * 添加
     */
    public function create()
    {
        if ($this->isGet())
        {
            $groups = ConfigModel::getSetting('config_group');
            $data = [
                'groups' => $groups ? $groups : [],
                'types'  => ConfigModel::$types
            ];
            $this->successful('', $data);
        }

        $data = $this->post();
        if (ConfigModel::hasName($data['name']))
            $this->failed('调用名称已存在');
        $result = DB::name('config')->insert($data, true);
        if ( $result )
        {
            ConfigModel::refreshCache();
            $this->successful('添加了配置：' . $data['name']);
        }
        else
        {
            $this->failed('添加失败');
        }
    }

    /**
     * 保存
     */
    public function save()
    {
        $data = $this->post();
        foreach ($data as $group)
        {
            foreach ($group['settings'] as $v)
            {
                if (is_array($v['value']))
                    $v['value'] = json_encode($v['value']);

                try
                {
                    ConfigModel::where('id', $v['id'])->update(['value' => $v['value']]);
                }
                catch (\Exception $e)
                {
                    $this->failed($e->getMessage());
                }
            }
        }
        ConfigModel::refreshCache();
        $this->successful('保存成功');
    }
}