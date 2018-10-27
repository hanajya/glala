<?php
/*
|--------------------------------------------------------------------------
| 系统
|--------------------------------------------------------------------------
|
| @author Hana
|
*/
namespace app\admin\controller;
use app\admin\controller\Auth as AuthController;
use app\admin\model\Admin;
use think\Db;
use think\cache\driver\Redis;
class System extends AuthController
{
    /**
     * 服务器信息
     */
    public function info()
    {
        $data = [
            'wwwroot'             => dirname(dirname(getenv('DOCUMENT_ROOT'))),
            'os'                  => php_uname('s') . '-' . php_uname('r'),
            'service'             => $_SERVER['SERVER_SOFTWARE'],
            'mysql_version'       => DB::query('select VERSION() AS `version`')[0]['version'],
            'php_version'         => PHP_VERSION,
            'zend_version'        => zend_version(),
            'execute_mode'        => php_sapi_name(),
            'timezone'            => date_default_timezone_get(),
            'upload_max_filesize' => get_cfg_var('upload_max_filesize'),
            'max_execution_time'  => get_cfg_var('max_execution_time') . '秒',
            'memory_limit'        => get_cfg_var('memory_limit')
        ];
        $this->successful('', $data);
    }

    /**
     * 清除缓存
     */
    public function flushCache()
    {
        \Cache::clear() ? $this->successful('已清空所有缓存') : $this->failed('清除失败');
    }

    /**
     * 个人信息
     */
    public function profile()
    {
        if ($this->isGet())
        {
            $this->successful('', $this->admin);
        }
        $data = $this->post();
        if (isset($data['password']))
        {
            $data['password'] || $this->failed('密码不能为空');
            $data['password'] = Admin::hashPassword($data['password']);
        }
        unset($this->admin->login_at);
        $this->admin->save($data) ? $this->successful('修改成功，请重新登录') : $this->failed('修改失败');
    }
}