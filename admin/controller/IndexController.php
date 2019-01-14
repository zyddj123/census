<?php
//非法访问
if (!defined('CO_BASE_CHECK')){
	header('HTTP/1.1 404 Not Found');
	header('Status: 404 Not Found');
	exit;
}

/**
 * census Index_控制器
 *
 * @package
 * @author			B.I.T
 * @copyright		Copyright (c) 2018 - 2019.
 * @license
 * @link
 * @since				Version 1.19
 */
// include_once realpath(__DIR__.'/../').'/core/SELLER_Session.php';
// include_once realpath(__DIR__.'/../').'/core/common.php';
// ------------------------------------------------------------------------
class IndexController extends CO_Controller{
	
	/**
	 * 控制器初始化
	 */
	protected function _init(){
		//mw会话管理包
		$this->session=new CensusSession();
		//检验登录状态
		$this->session->login_check($this->config->app_url_root.'/Login');
		//加载语言包
		// $this->GetLang('sys')->GetLang('user')->GetLang('login');
	}
	
	/**
	 * 默认程序入口
	 */
	function run(){
		$this->index();
	}

    function index(){
        //导航定位
        $this->session->set('left_menu_action', 'census/index');
        $this->Render('Index/index');
    }

    function overview(){
        //导航定位
        $this->session->set('left_menu_action', 'visitor/overview');
        $this->render('visitor/overview');
    }

	function getThemesUrl(){
		return HTTP_ROOT_PATH.'/'.VIEW_THEMES_PATH_NAME.'/'.$this->getThemes();
	}
}
?>