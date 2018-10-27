<?php
/*
|--------------------------------------------------------------------------
| Hash Password
|--------------------------------------------------------------------------
| use PHPass
| see https://github.com/hautelook/phpass
| 
| @author Carmen
|
*/

use Hautelook\Phpass\PasswordHash;

class Password
{
	/**
	 * PHPass object
	 * @var object
	 */
	private static $_instance;

	/**
	 * private construct
	 */
	private function __construct()
	{

	}

	/**
	 * Instance of PHPass
	 * @return object
	 */
	public static function getInstance()
	{
		is_null(self::$_instance) && self::$_instance = new PasswordHash(8,false);
		return self::$_instance;
	}

	/**
	 * Hash Password
	 * @param  string 	$secret   password
	 * @return string
	 */
	public static function hash(string $secret)
	{
		return self::getInstance()->HashPassword($secret);
	}

	/**
	 * Validate Password
	 * @param  string 	$secret   	password
	 * @param  string 	$password 	password hash
	 * @return boolean
	 */
	public static function validate(string $secret, string $password)
	{
		return self::getInstance()->CheckPassword($secret, $password);
	}
}