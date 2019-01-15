<?php
/**
 * Census配置文件
 *
 * @package
 * @author			B.I.T
 * @copyright		Copyright (c) 2017 - 2019.
 * @license
 * @link
 * @since				Version 1.18
 */

// ------------------------------------------------------------------------

class CensusConfig{
	/*------------------------------数据库表-------------------------------*/
	//数据库表
	const ADMIN = 'census_admin';
	const VISIT_LOG = 'census_visit_log';

	//数据库视图
	const VIEW_GOODS = 'mall_view_goods';

	/*---------------------------------路径--------------------------------*/
	const UPLOAD_HEAD = '/upload/head/';//头像上传路径
	const BRAND_LOGO = '/upload/brand_logo/';//品牌logo上传路径
	const UPLOAD_GOODS = '/upload/goods/'; //商品图片路径
}