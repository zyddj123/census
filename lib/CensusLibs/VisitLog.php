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
class VisitLog extends D_Model
{
    public function init()
    {
        $this->table = CensusConfig::VISIT_LOG;
        $this->formData = array(
            'id',
            'mid',
            'nb_visits',
            'nb_os',
            'nb_lang',
            'nb_brower',
            'nb_ip',
            'visit_time',
            'page_time',
        );
    }

    public function add($data)
    {
        return $this->_add($data);
    }

    public function delete($where)
    {
        return $this->_delete($where);
    }

    public function update($where, $data)
    {
        return $this->_update($where, $data);
    }

    public function getInfo($where)
    {
        $data = $this->_select($where);

        return $data[0];
    }

    public function select($where)
    {
        return $data = $this->_select($where);
    }

    public function select_or($select,$sql)
    {
        return $this->_select_or($select,$sql);
    }
}
