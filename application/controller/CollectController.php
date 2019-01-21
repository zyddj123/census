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
		$m_sid = $this->input->post('m_sid'); //模型id
		$page_time = $this->input->post('page_time'); //页面停留时间
		$resolution = $this->input->post('resolution'); //设备分辨率
		$referrer = $this->input->post('referrer');	//来源
		$request_url = $this->input->post('request_url'); //页面url
		$page_title = $this->input->post('page_title'); //页面标题
		$datetime = date("Y-m-d H:i:s");
		$month = date("Y-m");
		$data = array(
			'mid'=>$m_sid,
			'nb_visits'=>1,
			'nb_os'=>CensusUtil::get_os(),
			'nb_lang'=>CensusUtil::get_lang(),
			'nb_brower'=>CensusUtil::browse_info(),
			'nb_ip'=>CensusUtil::getIP(),
			'resolution'=>$resolution,
			'device_type'=>CensusUtil::is_mobile()?"移动端":"桌面端",
			'referrer'=>($referrer=="")?"直接连接":$referrer,
			'request_url'=>$request_url,
			'page_title'=>$page_title,
			'page_time'=>($page_time<1800)?$page_time:1800,
			'week'=>date("w"),
			'visit_time'=>$datetime
		);
        $visitLogObj = new VisitLog($this->getDb());

		if($visitLogObj->isset_table($month)){
			//存在本月这张表
			$visitLogObj->add($month,$data);
		}else{
			//不存在本月这张表  创建一张本月的数据表
			$flag = $visitLogObj->create_table($month);
			if($flag){
				//创建成功  则添加数据
				$visitLogObj->add($month,$data);
			}else{
				//创建失败
			}
		}
		
		echo true;
	}


	function getThemesUrl(){
		return HTTP_ROOT_PATH.'/'.VIEW_THEMES_PATH_NAME.'/'.$this->getThemes();
	}
}
?>