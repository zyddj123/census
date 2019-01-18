<?php
/**
 * 访客日志类.
 *
 * @author			B.I.T
 * @copyright		Copyright (c) 2017 - 2019.
 * @license
 *
 * @see
 * @since				Version 1.19
 */
class VisitLog
{
    public $db = '';
    public $formData = '';
    
    function __construct($db)
    {
        $this->tablePrefix = CensusConfig::VISIT_LOG_PREFIX;
        $this->db = $db;
        $this->formData = array(
            'id',
            'mid',
            'nb_visits',
            'page_time',
            'nb_os',
            'nb_lang',
            'nb_brower',
            'nb_ip',
            'resolution',
            'device_type',
            'referrer',
            'request_url',
            'page_title',
            'visit_time'
        );
    }

    /**
     * 添加数据
     *
     * @param [type] $month  [表名月份 2019-01]
     * @param [type] $data   [数据  数组]
     * @return void
     */
    public function add($month,$data)
    {
        $data = $this->_parseData($data);
        if ($data) {
            return $this->db->insert($this->tablePrefix.$month, $data);
        }
        return false;
    }

    /**
     * 查询数据
     *
     * @param [type] $t_start   [查询开始时间]
     * @param [type] $t_end     [查询结束时间]
     * @param int $mid       [可选参数 要查询的模型id]
     * @return $res
     */
    public function select($t_start,$t_end,$mid="")
    {
        $start_month = date('Y-m',strtotime($t_start));  //开始月份
		$end_month = date('Y-m',strtotime($t_end));      //结束月份

		$monthArr = $this->dateMonths($start_month,$end_month);  //开始结束月份之间的月份数组

        $sql = "";
		foreach ($monthArr as $key => $value) {
			//判断是否存在这张表  存在继续  不存在 跳出本次循环
			if(!$this->db->query("show tables like '".$this->tablePrefix.$value."'")){continue;}

			//采用union联合查询查询数据  判断是否是查询第一个月份数组数据
			if($sql==""){
				$sql .= "select * from `".$this->tablePrefix.$value."` WHERE ";
                if($mid!=""){
                    $sql .= " `mid` = ".$mid." AND ";
                }
                $sql .= " `visit_time` BETWEEN '{$t_start}' AND '{$t_end}' ";	
			}else{
				$sql .= " UNION ALL select * from `".$this->tablePrefix.$value."` WHERE ";
                if($mid!=""){
                    $sql .= " `mid` = ".$mid." AND ";
                }
                $sql .= " `visit_time` BETWEEN '{$t_start}' AND '{$t_end}' ";
			}
		}
        $res = false;
		if($sql!=""){
			$res = $this->db->getAll($sql);
		}
        return $res;
    }

    /**
     * 自定义语句查询
     *
     * @param [type] $sql   [sql语句]
     * @return void
     */
    public function select_sql($sql)
    {
        return $this->db->GetAll($sql);
    }

    /**
     * 查询是否存在当月数据表
     *
     * @param [type] $month     [表名月份  2019-01]
     * @return boolean
     */
    public function isset_table($month)
    {
        return $this->db->query("show tables like '".$this->tablePrefix.$month."'");
    }

    /**
     * 建当月数据表
     *
     * @param [type] $month     [表名月份  2019-01]
     * @return void
     */
    public function create_table($month)
    {
        $sql = "CREATE TABLE `".$this->tablePrefix.$month."` (
                    `id` bigint(20) NOT NULL AUTO_INCREMENT,
                    `mid` int(11) NOT NULL,
                    `nb_visits` int(11) NOT NULL,
                    `page_time` varchar(255) NOT NULL COMMENT '页面停留时间',
                    `nb_os` varchar(255) NOT NULL,
                    `nb_lang` varchar(255) NOT NULL,
                    `nb_brower` varchar(255) NOT NULL,
                    `nb_ip` varchar(255) NOT NULL,
                    `resolution` varchar(255) NOT NULL COMMENT '设备分辨率',
                    `device_type` varchar(255) NOT NULL COMMENT '设备类型',
                    `referrer` varchar(255) NOT NULL COMMENT '访问来源',
                    `request_url` varchar(255) NOT NULL COMMENT '页面url',
                    `page_title` varchar(255) NOT NULL COMMENT '页面标题',
                    `visit_time` date NOT NULL,
                    PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=".date('Ym',strtotime($month))."1 DEFAULT CHARSET=utf8;";

        return $this->db->query($sql);
    }

    /**
     * 过滤一下字段.
     *
     * @param [type] $data
     */
    protected function _parseData($data)
    {
        $ret = array();
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                if (in_array($key, $this->formData)) {
                    $ret[$key] = $value;
                }
            }

            return $ret;
        } else {
            return false;
        }
    }

    /**
	 * 计算出两个日期之间的月份
	 * @author ERIC
	 * @param  [type] $start_date [开始日期，如2018-03]
	 * @param  [type] $end_date   [结束日期，如2019-01]
	 * @return [type]             [返回是两个月份之间所有月份字符串]
	 */
	function dateMonths($start_date,$end_date){
		//判断两个时间是不是需要调换顺序
		$start_int = strtotime($start_date);
		$end_int = strtotime($end_date);
		if($start_int>$end_int){
			$tmp = $start_date;
			$start_date = $end_date;
			$end_date = $tmp;
		}
		//结束时间月份+1，如果是13则为新年的一月份
		$start_arr = explode('-',$start_date);
		$start_year = intval($start_arr[0]);
		$start_month = intval($start_arr[1]);

		$end_arr = explode('-',$end_date);
		$end_year = intval($end_arr[0]);
		$end_month = intval($end_arr[1]);

		$data = array();
		$data[] = $start_date;

		$tmp_month = $start_month;
		$tmp_year = $start_year;

		//如果起止不相等，一直循环
		while (!(($tmp_month == $end_month) && ($tmp_year == $end_year))) {
			$tmp_month ++;
			//超过十二月份，到新年的一月份
			if($tmp_month > 12){
				$tmp_month = 1;
				$tmp_year++;
			}
			$data[] = $tmp_year.'-'.str_pad($tmp_month,2,'0',STR_PAD_LEFT);
		}
		return $data;
	}

}
