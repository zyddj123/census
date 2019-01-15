<?php


/**
 * Census(session)管理类
 * 会话数据作用在$_SESSION['census']范围内
 * 与其它系统插件会话不冲突
 *
 * @package
 * @author			B.I.T
 * @copyright		Copyright (c) 2017 - 2019.
 * @license
 * @link
 * @since				Version 1.1
 */

@include_once 'CensusConfig.php';
//--------------------------------------------------------------------------
class CensusSession extends CO_Session{
	
	public $uid;
	
	/**
	 * 构造函数
	 */
	function __construct(){
		parent::__construct();
		$this->uid=$this->_session['census']['id'];
	}
	
	/**
	 * 获取session值
	 * @return	mixed 数值
	 */
	function get($key){
		return $this->_session['census'][$key];
	}
	
	/**
	 * 设置session值
	 * @param	key string 键
	 * @param	val string 值
	 * @return	object 当前对象
	 */
	function set($key, $val){
		$this->_session['census'][$key]=$val;
		return $this;
	}
	
	/**
	 * 是否登录
	 */
	 function is_login(){
		if( !isset($this->_session) || !isset($this->_session['census']['id'])) return false;
		return true;
	}
	
	/**
	 * 登录验证,如果未登录则跳转到指定页面
	 * @param	redirect_url string 跳转页面
	 * @return	boolean
	 */
	function login_check($redirect_url){
		if(!$this->is_login()){
			header('location:'.$redirect_url);
			return false;
		}
		return true;
	}
	
	/**
	 * 登录重定向
	 * @param	redirect_path string 重定向路径
	 */
	function login_redirect($redirect_path=''){
		if($redirect_path=='') $redirect_path='/login';
		header('location:'.$redirect_path);
		exit;
	}
	
	/**
	 * 创建session
	 */
	function makeSession($uid,$name,$status){
		try {
			
			$this->uid = $uid;
			$this->set('id', $uid);
			$this->set('name', $name);
			$this->set('status', $status);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}
	
	/**
	 * 是否管理员
	 * @return	boolean
	 */
	function is_admin(){
		return $this->get('is_admin')=='1';
	}
	
	/**
	 * 销毁会话
	 * @see CO_Session::Destroy()
	 * @return	boolean
	 */
	function Destroy(){
		unset($this->_session['census']);
		return true;
	}
	
}
?>