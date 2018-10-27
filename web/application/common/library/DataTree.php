<?php
/*
|--------------------------------------------------------------------------
| 数据层级树
|--------------------------------------------------------------------------
| 递归数组组合成指定层级结构
|
| @author Carmen
|
*/

class DataTree
{
	/**
	 * 嵌套结构
	 *
	 * @param  array       	$data 	  数据源
	 * @param  integer 		$pid  	  父级ID
	 * @param  string      	$pk   	  主键字段名称
	 * @param  string      	$fk   	  父级ID字段名
	 * @param  string      	$ck   	  子级数据KEY
     * @param  array        $addAs    添加字段别名
	 * @return array
	 */
	public static function cascade(array $data, int $pid = 0, string $pk = 'id', string $fk = 'pid', string $ck = 'children', $addAs = [])
	{
		if (!is_array($data))
			return [];

		$result = [];
		foreach ($data as $v)
		{
            if ($addAs)
            {
                foreach ($addAs as $key => $value)
                {
                    $v[$value] = $v[$key];
                }
            }

			if ($v[$fk] == $pid)
			{
				$v[$ck] = self::cascade($data, $v[$pk], $pk, $fk, $ck, $addAs);
				$result[] = $v;
			}
		}

		return $result;
	}

	/**
     * 单层树结构
     *
     * @param  array   		$data       数据源
     * @param  integer 		$pid        父级ID
     * @param  string  		$pk  		主键字段名称
     * @param  string  		$fk 		父级ID字段名
     * @param  string  		$symbol 	添加字符KEY
     * @param  integer 		$level      级别
     * @return array
     */
    public static function sheet(array $data, int $pid = 0, string $pk = 'id', string $fk = 'pid', string $symbol = 'symbol', int $level = 1)
    {
    	if (!is_array($data))
            return [];

		$result = [];
		foreach ($data as $v)
		{
			if ($v[$fk] == $pid)
			{
                $symbol && $v[$symbol] = $level > 1 ? '└' . str_repeat('─', $level - 1) : '';
				$v['level'] = $level;

				$result[] = $v;
				$result   = array_merge($result, self::sheet($data, $v[$pk], $pk, $fk, $symbol, $level + 1));
			}
		}

		return $result;
    }

    /**
     * 所有子级ID
     *
     * @param  array    	$data       数据源
     * @param  integer  	$pid        父级ID
     * @return array
     */
    public static function childrenID(array $data, int $pid)
    {
        if (!is_array($data))
            return [];

        $result = [];
        foreach ($data as $v)
        {
            if ($v['pid'] == $pid)
            {
                $result[] = $v['id'];
                $result = array_merge($result, self::childrenID($data, $v['id']));
            }
        }

        return $result;
    }
    /** add zzhq
     * 所有父级ID
     *
     * @param  array        $data       数据源
     * @param  integer      $id        ID
     * @return array
     */
    public static function parentID(array $data, int $id)
    {
        if (!is_array($data))
            return [];

        $result = [];
        foreach ($data as $v)
        {
            if ($v['id'] == $id)
            {
                $result[] = $v['parentid'];
                $result = array_merge($result, self::parentID($data, $v['parentid']));
            }
        }

        return $result;
    }

    public static function childID(array $data, array $ids)
    {
        if (!is_array($data))
            return [];

        $result = [];
        foreach ($ids as $v)
        {
            foreach ($data as $vv){
                if( $v == $vv['id']){
                    $result[] = $vv['name'];
                }
            }
        }

        $result = implode('/',$result);
        return $result;
    }

}
