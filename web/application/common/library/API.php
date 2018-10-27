<?php
/*
|--------------------------------------------------------------------------
| Base API Controller
|--------------------------------------------------------------------------
| API 接口共用 属性/方法 写到此文件
|
| @author Carmen
|
*/
namespace app\common\library;
use think\Controller;
use think\facade\Request;
class API extends Controller
{
	/**
	 * 状态码
	 */
	const HTTP_STATUS_SUCCESS       = 200;	// 操作成功
	const HTTP_STATUS_ERROR         = 400;	// 操作失败
	const HTTP_STATUS_NO_PERMISSION = 403;	// 没有权限
	const HTTP_STATUS_NOT_FOUND     = 404;	// 404
	const HTTP_STATUS_FAIL          = 500;	// 发生错误
	const HTTP_STATUS_NOT_LOGGED    = 100;	// 未登录

	/**
	 * 初始化
	 */
/*	public function _initialize()
	{
		// 跨域
		TP_ENVIRON == 'develop' && header('Access-Control-Allow-Origin: *');
		// 处理 JSON Body
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && strchr($_SERVER['HTTP_CONTENT_TYPE'] ? $_SERVER['HTTP_CONTENT_TYPE'] : '', 'application/json'))
		{
			$input  = file_get_contents('php://input');
			$params = $input ? json_decode($input, JSON_OBJECT_AS_ARRAY) : [];
			$_POST  = array_merge($_POST, $params);
		}
	}*/

	/**
	 * 生成 Token
	 *
	 * @param  array  $payload  载荷
	 * @return string
	 */
	protected function createToken(array $payload = [])
	{
		try
		{
            $config = config('token');
			$payload = array_merge([
				'iss' => $config['issuer'],
				'iat' => $_SERVER['REQUEST_TIME'],
				'exp' => $_SERVER['REQUEST_TIME'] + $config['expire']
			], $payload);

			return JWT::encode($payload, $config['key'], $config['algorithm']);
		}
		catch (\Exception $e)
		{
			return false;
		}
	}

	/**
	 * 验证 Token
	 * 
	 * @return payload / false
	 */
	protected function authToken()
	{
		try
		{
			$key = config('token')['key'];

			if (
				($jwt = $_SERVER['HTTP_AUTHORIZATION'] ? $_SERVER['HTTP_AUTHORIZATION'] : FALSE)
				&& ($payload = JWT::decode($jwt, $key))
			)
			{
				return $payload;
			}

			return false;
		}
		catch (\Exception $e)
		{
			return false;
		}
	}

	/**
	 * 操作成功
	 * 
	 * @param  string 	$message  响应信息
	 * @param  mixed 	$data     响应数据
	 */
	protected function successful($message = '', $data = null)
	{
		$this->responseJSON(self::HTTP_STATUS_SUCCESS, $message, $data);
	}

	/**
	 * 操作失败
	 * 
	 * @param  string 	$message  响应信息
	 * @param  mixed 	$data     响应数据
	 */
	protected function failed($message = '', $data = null)
	{
		$this->responseJSON(self::HTTP_STATUS_ERROR, $message, $data);
	}

	/**
	 * 未找到数据
	 * 
	 * @param  string 	$message  响应信息
	 * @param  mixed 	$data     响应数据
	 */
	protected function notFound($message = '未找到相关数据', $data = null)
	{
		$this->responseJSON(self::HTTP_STATUS_NOT_FOUND, $message, $data);
	}

	/**
	 * 未登录
	 * 
	 * @param  string 	$message  响应信息
	 * @param  mixed 	$data     响应数据
	 */
	protected function notLogged($message = '未登录', $data = null)
	{
		$this->responseJSON(self::HTTP_STATUS_NOT_LOGGED, $message, $data);
	}

	/**
	 * 没有权限
	 * 
	 * @param  string 	$message  响应信息
	 * @param  mixed 	$data     响应数据
	 */
	protected function noAccess($message = '没有权限', $data = null)
	{
		$this->responseJSON(self::HTTP_STATUS_NO_PERMISSION, $message, $data);
	}

	/**
	 * 发生错误
	 * 
	 * @param  string 	$message  响应信息
	 * @param  mixed 	$data     响应数据
	 */
	protected function fail($message = '发生错误', $data = null)
	{
		$this->responseJSON(self::HTTP_STATUS_FAIL, $message, $data);
	}

	/**
	 * 输出 JSON 响应
	 * 
	 * @param  integer 	$status   响应状态
	 * @param  string 	$message  响应信息
	 * @param  mixed 	$data     响应数据
	 */
	protected function responseJSON($status, $message = '', $data = NULL)
	{
		$response = [
			'status'  => $status,
			'message' => $message
		];

		$data !== NULL && $response['data']  = $data;

		header('Content-type:application/json');
		exit(json_encode($response, JSON_UNESCAPED_UNICODE));
	}

	/**
	 * 获取 GET 参数
	 *
	 * @param  string 	$name 		参数名
	 * @param  mixed 	$default 	默认值
	 * @return mixed
	 */
	protected function get($name = NULL, $default = NULL)
	{
		if (!$name)
			return $_GET;

		return $_GET[$name] ? $_GET[$name] : $default;
	}

	/**
	 * 获取 POST 参数
	 *
	 * @param  string 	$name 		参数名
	 * @param  mixed 	$default 	默认值
	 * @return mixed
	 */
	protected function post($name = NULL, $default = NULL)
	{
		if (!$name)
			return $_POST;

		return $_POST[$name] ? $_POST[$name] : $default;
	}

	/**
	 * 是否GET请求
	 *
	 * @return boolean
	 */
	protected function isGet()
	{
		return Request::isGet();
	}

	/**
	 * 是否POST请求
	 *
	 * @return boolean
	 */
	protected function isPost()
	{
		return Request::isPost();
	}
}
