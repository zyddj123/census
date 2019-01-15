<?php
//非法访问
if (!defined('CO_BASE_CHECK')){
	header('HTTP/1.1 404 Not Found');
	header('Status: 404 Not Found');
	exit;
}

/**
 * census application Index_控制器
 *
 * @package
 * @author			B.I.T
 * @copyright		Copyright (c) 2018 - 2019.
 * @license
 * @link
 * @since				Version 1.19
 */
// ------------------------------------------------------------------------
class IndexController extends CO_Controller{
	
	/**
	 * 控制器初始化
	 */
	protected function _init(){

	}
	
	/**
	 * 默认程序入口
	 */
	function run(){
		$this->view();
	}

    function view(){
        $id=$this->input->get('id');
        $db = $this->getDb();
        $res = $db->SelectOne('test_data',array('id'=>$id));
        $this->render('view',array('res'=>$res));
    }

	function getThemesUrl(){
		return HTTP_ROOT_PATH.'/'.VIEW_THEMES_PATH_NAME.'/'.$this->getThemes();
	}
}
?>