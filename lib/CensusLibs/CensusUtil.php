<?php 
/**
 * Census工具类
 *
 * @package
 * @author			B.I.T
 * @copyright		Copyright (c) 2017 - 2019.
 * @license
 * @link
 * @since				Version 1.1
 */

class CensusUtil{
    /**
	 * 获得访客操作系统
	 */
	static function get_os() {
		if (!empty($_SERVER['HTTP_USER_AGENT'])) {
			$os = $_SERVER['HTTP_USER_AGENT'];
			if (preg_match('/win/i', $os)) {
				$os = 'Windows';
			} else if (preg_match('/mac/i', $os)) {
				$os = 'MAC';
			} else if (preg_match('/linux/i', $os)) {
				$os = 'Linux';
			} else if (preg_match('/unix/i', $os)) {
				$os = 'Unix';
			} else if (preg_match('/bsd/i', $os)) {
				$os = 'BSD';
			} else {
				$os = 'Other';
			}
			return $os;
		} else {
			return 'unknow';
		}
	}

	/**
	 * 获得访问者浏览器
	 */
	static function browse_info() {
		if (!empty($_SERVER['HTTP_USER_AGENT'])) {
			$br = $_SERVER['HTTP_USER_AGENT'];
			if (preg_match('/MSIE/i', $br)) {
				$br = 'MSIE';
			} else if (preg_match('/Firefox/i', $br)) {
				$br = 'Firefox';
			} else if (preg_match('/Chrome/i', $br)) {
				$br = 'Chrome';
			} else if (preg_match('/Safari/i', $br)) {
				$br = 'Safari';
			} else if (preg_match('/Opera/i', $br)) {
				$br = 'Opera';
			} else {
				$br = 'Other';
			}
			return $br;
		} else {
			return 'unknow';
		}
	}

	/**
	 * 获得访问者浏览器语言
	 */
	static function get_lang() {
		if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
			$lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
			$lang = substr($lang, 0, 5);
			if (preg_match('/zh-cn/i',$lang)) {
				$lang = 'Simplified Chinese';
			} else if (preg_match('/zh/i',$lang)) {
				$lang = 'Traditional Chinese';
			} else {
				$lang = 'English';
			}
			return $lang;
		} else {
			return 'unknow';
		}
	}

	//获取IP
	static function getIP() {
		if (getenv('HTTP_CLIENT_IP')) {
			$ip = getenv('HTTP_CLIENT_IP');
		}
		elseif (getenv('HTTP_X_FORWARDED_FOR')) {
			$ip = getenv('HTTP_X_FORWARDED_FOR');
		}
		elseif (getenv('HTTP_X_FORWARDED')) {
			$ip = getenv('HTTP_X_FORWARDED');
		}
		elseif (getenv('HTTP_FORWARDED_FOR')) {
			$ip = getenv('HTTP_FORWARDED_FOR');

		}
		elseif (getenv('HTTP_FORWARDED')) {
			$ip = getenv('HTTP_FORWARDED');
		}
		else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
}

?>