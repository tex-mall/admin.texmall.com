<?php

class Madmin_log extends CI_Model{
	private $table = 'admin_log';        
	
	/**
	 * @获取总条数
	 * */
	public function total($search)
	{
	    $this->db->select('id');
	    $this->db->from($this->table);
	    if (!empty($search['sta_time'])) {
	        $this->db->where(array('time >'=>strtotime($search['sta_time'])));
	    }
	    if (!empty($search['end_time'])) {
	        $this->db->where(array('time <'=>strtotime($search['end_time'])));
	    }
	    if (!empty($search['item'])) {
	        $this->db->like('log', $search['item']);
	    }
	    return $this->db->count_all_results();
	}
	
	/**
	 * @分页
	 * @param number $page:页码
	 * @param number $perpage:每页数量
	 * @param array $search:查找条件
	 * @param string $order:排序
	 * */
	public function grid($page, $perpage, $search, $order='id desc')  
	{
	    $this->db->select('*');
	    $this->db->from($this->table);
	    if (!empty($search['sta_time'])) {
	        $this->db->where(array('time >'=>strtotime($search['sta_time'])));
	    }
	    if (!empty($search['end_time'])) {
	        $this->db->where(array('time <'=>strtotime($search['end_time'])));
	    }
	    if (!empty($search['item'])) {
	        $this->db->like('log', $search['item']);
	    }
	    $this->db->order_by($order);
	    if ($perpage) $this->db->limit($perpage, $perpage*$page);
	    return $this->db->get();
	}
	
	
}

/** End of file Madmin_log.php */
/** Location: ./application/models/Madmin_log.php */