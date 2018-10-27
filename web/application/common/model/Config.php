<?php
/*
|--------------------------------------------------------------------------
| 配置
|--------------------------------------------------------------------------
|
| @author Carmen
|
*/
namespace app\common\model;
use think\Model;
class Config extends Model
{
    /**
     * 缓存名称
     */
    const CACHE_NAME = 'DATABASE_CONFIG';

    /**
     * 类型可选项
     */
    public static $types = [
        'input',
        'number',
        'textarea',
        'select',
        'radio',
        'checkbox',
        'switch',
        'datetime',
        'date',
        'time',
        'image',
        'multi-image',
        'editor',
        'array'
    ];

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'config';

    /**
     * Disabled auto maintain timestamp
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group',
        'type',
        'name',
        'key',
        'value',
        'options',
        'tips',
        'sort'
    ];

    /**
     * Get attribute with Options
     *
     * @param  string  $value
     * @return void
     */
    public function getOptionsAttribute($value)
    {
        if (!$value)
            return $value;

        $value = explode("\n", $value);
        foreach ($value as $k => $v)
        {
            $option = explode('|', $v);
            $value[$k] = ['label' => trim($option[0]), 'value' => trim($option[1])];
        }

        return $value;
    }

    /**
     * 获取配置值
     *
     * @param  string   $name     配置名称
     * @param  mixed    $default  默认值
     * @return mixed
     */
    public static function getSetting($name, $default = null)
    {
        $all = self::getSettings();
        $config = $all->$name;
        return $config ? $config :$default;
    }

    /**
     * 获取所有配置
     *
     * @return object
     */
    public static function getSettings($group = null)
    {
        $data     = self::getResource();
        $settings = [];

        foreach ($data as $v)
        {
            if ($group)
                $group == $v->group && $settings[$v->key] = $v->value;
            else
                $settings[$v->key] = $v->value;
        }
        return (object) $settings;
    }

    /**
     * 获取资源集
     *
     * @return array
     */
    public static function getResource()
    {
        if (!$data = \Cache::get(self::CACHE_NAME))
        {
            $data = self::order('sort')->order('id')->select()->toArray();

            // 过滤字段类型
            foreach ($data as $k => $v)
            {
                $v = (object) $v;
                switch ($v->type)
                {
                    case 'number':
                        $v->value = (strpos($v->value, '.') ? (double) $v->value : (int) $v->value);
                        break;

                    case 'checkbox':
                        $v->value = $v->value ? json_decode($v->value) : [];
                        break;

                    case 'switch':
                        $v->value = $v->value ? $v->value : $v->options[0]['value'];
                        break;

                    case 'datetime':
                        $v->value && $v->value = date('Y-m-d H:i:s', strtotime($v->value));
                        break;

                    case 'date':
                        $v->value && $v->value = date('Y-m-d', strtotime($v->value));
                        break;

                    case 'time':
                        $v->value && $v->value = date('H:i:s', strtotime($v->value));
                        break;

                    case 'multi-image':
                        $v->value && $v->value = json_decode($v->value);
                        break;

                    case 'array':
                        $v->value = $v->value ? (array) json_decode($v->value) : new \StdClass();
                        break;

                    default:

                        break;
                }
                $data[$k] = $v;
            }

            \Cache::set(self::CACHE_NAME, $data);
        }

        return $data;
    }

    /**
     * 检测名称是否已存在
     *
     * @param  string    $name    名称
     * @return boolean
     */
    public static function hasName($name)
    {
        return (bool) self::where('name', $name)->count();
    }

    /**
     * 刷新缓存
     *
     * @return void
     */
    public static function refreshCache()
    {
        \Cache::clear(self::CACHE_NAME);
    }
}