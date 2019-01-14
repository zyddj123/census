<?php
/**
 * census会话session控制类
 *
 * @author			B.I.T
 * @copyright		Copyright (c) 2018 - 2019.
 * @license
 *
 * @see
 * @since				Version 1.19
 */
class CensusSessionHandler extends Session_Handler_To_DB{
	
	protected $_table = 'census_admin_session';
}
?>