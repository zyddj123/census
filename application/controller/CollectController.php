<?php
//非法访问
if (!defined('CO_BASE_CHECK')){
	header('HTTP/1.1 404 Not Found');
	header('Status: 404 Not Found');
	exit;
}

/**
 * census application Collect_控制器 采集统计数据
 *
 * @package
 * @author			B.I.T
 * @copyright		Copyright (c) 2018 - 2019.
 * @license
 * @link
 * @since				Version 1.19
 */
// ------------------------------------------------------------------------
class CollectController extends CO_Controller{
	
	/**
	 * 控制器初始化
	 */
	protected function _init(){

	}
	
	/**
	 * 默认程序入口
	 */
	function run(){

	}

    /**
	 * 用户查看模型 插入模型统计信息
	 *
	 * @return void
	 */
	function insert_census(){
		$m_sid = $this->input->post('m_sid');
		$page_time = $this->input->post('page_time');
		$today = date("Y-m-d");
		$data = array(
			'mid'=>$m_sid,
			'nb_visits'=>1,
			'nb_os'=>CensusUtil::get_os(),
			'nb_lang'=>CensusUtil::get_lang(),
			'nb_brower'=>CensusUtil::browse_info(),
			'nb_ip'=>CensusUtil::getIP(),
			'page_time'=>($page_time<1800)?$page_time:1800,
			'visit_time'=>$today
		);
        $visitLogObj = new VisitLog($this->getDb());
        @$visitLogObj->add($data);
		echo true;
	}

    function aaa(){
        echo json_encode($_GET);
    }

	function getThemesUrl(){
		return HTTP_ROOT_PATH.'/'.VIEW_THEMES_PATH_NAME.'/'.$this->getThemes();
	}
}
?>