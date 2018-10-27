<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// [ 应用入口文件 ]

namespace think;
	
// 加载基础文件
require __DIR__ . '/../thinkphp/base.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers:Content-Type,TOKEN,FILENAME,XFILECATEGORY,XFILESIZE,Authorization");
if($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && strchr($_SERVER['HTTP_CONTENT_TYPE'] ? $_SERVER['HTTP_CONTENT_TYPE'] : '', 'application/json'))
{
	$input  = file_get_contents('php://input');
	$params = $input ? json_decode($input, JSON_OBJECT_AS_ARRAY) : [];
	$_POST  = array_merge($_POST, $params);
}

Container::get('app')->run()->send();
