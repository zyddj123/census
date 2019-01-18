<?php

/**
 * Census工具类.
 *
 * @author			B.I.T
 * @copyright		Copyright (c) 2017 - 2019.
 * @license
 *
 * @see
 * @since				Version 1.1
 */
class CensusUtil
{
    /**
     * 获得访客操作系统
     */
    public static function get_os()
    {
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $os = false;
        if (preg_match('/win/i', $agent) && preg_match('/windows nt 6.0/i', $agent)) {
            $os = 'Windows Vista';
        } elseif (preg_match('/win/i', $agent) && preg_match('/windows nt 6.1/i', $agent)) {
            $os = 'Windows 7';
        } elseif (preg_match('/win/i', $agent) && preg_match('/windows nt 6.2/i', $agent)) {
            $os = 'Windows 8';
        } elseif (preg_match('/win/i', $agent) && preg_match('/windows nt 10.0/i', $agent)) {
            $os = 'Windows 10';
        } elseif (preg_match('/win/i', $agent) && preg_match('/windows nt 5.1/i', $agent)) {
            $os = 'Windows XP';
        } elseif (preg_match('/win/i', $agent) && preg_match('/windows nt 5/i', $agent)) {
            $os = 'Windows 2000';
        } elseif (preg_match('/win/i', $agent) && preg_match('/windows nt/i', $agent)) {
            $os = 'Windows NT';
        } elseif (preg_match('/win/i', $agent) && preg_match('/windows 32/i', $agent)) {
            $os = 'Windows 32';
        } elseif (preg_match('/iphone/i', $agent)) {
            $os = 'IOS';
        } elseif (preg_match('/android/i', $agent)) {
            $os = 'Android';
        } elseif (preg_match('/linux/i', $agent)) {
            $os = 'Linux';
        } elseif (preg_match('/unix/i', $agent)) {
            $os = 'Unix';
        } elseif (preg_match('/sun/i', $agent) && preg_match('/os/i', $agent)) {
            $os = 'SunOS';
        } elseif (preg_match('/ibm/i', $agent) && preg_match('/os/i', $agent)) {
            $os = 'IBM OS/2';
        } elseif (preg_match('/Mac/i', $agent) && preg_match('/PC/i', $agent)) {
            $os = 'Macintosh';
        } elseif (preg_match('/PowerPC/i', $agent)) {
            $os = 'PowerPC';
        } elseif (preg_match('/AIX/i', $agent)) {
            $os = 'AIX';
        } elseif (preg_match('/HPUX/i', $agent)) {
            $os = 'HPUX';
        } elseif (preg_match('/NetBSD/i', $agent)) {
            $os = 'NetBSD';
        } elseif (preg_match('/BSD/i', $agent)) {
            $os = 'BSD';
        } elseif (preg_match('/OSF1/i', $agent)) {
            $os = 'OSF1';
        } elseif (preg_match('/IRIX/i', $agent)) {
            $os = 'IRIX';
        } elseif (preg_match('/FreeBSD/i', $agent)) {
            $os = 'FreeBSD';
        } elseif (preg_match('/teleport/i', $agent)) {
            $os = 'teleport';
        } elseif (preg_match('/flashget/i', $agent)) {
            $os = 'flashget';
        } elseif (preg_match('/webzip/i', $agent)) {
            $os = 'webzip';
        } elseif (preg_match('/offline/i', $agent)) {
            $os = 'offline';
        } else {
            $os = '未知操作系统';
        }

        return $os;
    }

    /**
     * 获得访问者浏览器.
     */
    public static function browse_info()
    {
        $sys = $_SERVER['HTTP_USER_AGENT'];  //获取用户代理字符串
        if (stripos($sys, 'Firefox/') > 0) {
            preg_match("/Firefox\/([^;)]+)+/i", $sys, $b);
            $exp[0] = 'Firefox';
            $exp[1] = $b[1];  //获取火狐浏览器的版本号
        } elseif (stripos($sys, 'Maxthon') > 0) {
            preg_match("/Maxthon\/([\d\.]+)/", $sys, $aoyou);
            $exp[0] = '傲游';
            $exp[1] = $aoyou[1];
        } elseif (stripos($sys, 'MSIE') > 0) {
            preg_match("/MSIE\s+([^;)]+)+/i", $sys, $ie);
            $exp[0] = 'IE';
            $exp[1] = $ie[1];  //获取IE的版本号
        } elseif (stripos($sys, 'OPR') > 0) {
            preg_match("/OPR\/([\d\.]+)/", $sys, $opera);
            $exp[0] = 'Opera';
            $exp[1] = $opera[1];
        } elseif (stripos($sys, 'Edge') > 0) {
            //win10 Edge浏览器 添加了chrome内核标记 在判断Chrome之前匹配
            preg_match("/Edge\/([\d\.]+)/", $sys, $Edge);
            $exp[0] = 'Edge';
            $exp[1] = $Edge[1];
        } elseif (stripos($sys, 'Chrome') > 0) {
            preg_match("/Chrome\/([\d\.]+)/", $sys, $google);
            $exp[0] = 'Chrome';
            $exp[1] = $google[1];  //获取google chrome的版本号
        } elseif (stripos($sys, 'rv:') > 0 && stripos($sys, 'Gecko') > 0) {
            preg_match("/rv:([\d\.]+)/", $sys, $IE);
            $exp[0] = 'IE';
            $exp[1] = $IE[1];
        } else {
            $exp[0] = '未知浏览器';
            $exp[1] = '';
        }
        // return $exp[0].'('.$exp[1].')'; //版本号未保留一位小数
         return $exp[0].'('.sprintf('%.1f', (float) (floor($exp[1] * 10) / 10)).')'; //去两位小数
    }

    /**
     * 获得访问者浏览器语言
     */
    public static function get_lang()
    {
        if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
            $lang = substr($lang, 0, 5);
            if (preg_match('/zh-cn/i', $lang)) {
                $lang = 'Simplified Chinese';
            } elseif (preg_match('/zh/i', $lang)) {
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
    public static function getIP()
    {
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ip = getenv('HTTP_FORWARDED_FOR');
        } elseif (getenv('HTTP_FORWARDED')) {
            $ip = getenv('HTTP_FORWARDED');
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

    //获取设备类型

    public static function is_mobile()
    {
        // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
        if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
            return true;
        }
        // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
        if (isset($_SERVER['HTTP_VIA'])) {
            return stristr($_SERVER['HTTP_VIA'], 'wap') ? true : false;
        }
        // 野蛮方法，判断手机发送的客户端标志,兼容性有待提高
        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            $clientkeywords = array('nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-', 'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu', 'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile');
            // 从HTTP_USER_AGENT中查找手机浏览器的关键字
            if (preg_match('/('.implode('|', $clientkeywords).')/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
                return true;
            }
        }
        // 协议法，因为有可能不准确，放到最后判断
        if (isset($_SERVER['HTTP_ACCEPT'])) {
            // 如果只支持wml并且不支持html那一定是移动设备
            // 如果支持wml和html但是wml在html之前则是移动设备
            if ((false !== strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml')) && (false === strpos($_SERVER['HTTP_ACCEPT'], 'text/html') || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
                return true;
            }
        }

        return false;
    }
}
