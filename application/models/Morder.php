<?php
/**
 * Morder.php
 * ==============================================
 * Copy right 2017 http://www.texmall.com
 * ==============================================
 * @author: zoudong
 * @date: 2017年6月13日
 */
class Morder extends CI_Model{
	private $table = 'order';        
	
	/**
	 * @获取总条数
	 * */
	public function total($search)
	{
	    $this->db->select('id');
	    $this->db->from($this->table);
	    if (!empty($search['order_state'])) {
	        $this->db->where(array('order_state'=>$search['order_state']));
	    }
	    if (!empty($search['order_status'])) {
	        $this->db->where(array('order_status'=>$search['order_status']));
	    }
	    if (!empty($search['sta_time'])) {
	        $this->db->where(array('time >'=>strtotime($search['sta_time'])));
	    }
	    if (!empty($search['end_time'])) {
	        $this->db->where(array('time <'=>strtotime($search['end_time'])));
	    }
	    if (!empty($search['item'])) {
	        $this->db->group_start();
	        $this->db->like('platform_code', $search['item']);
	        $this->db->or_like('buyer_name', $search['item']);
	        $this->db->or_like('username', $search['item']);
	        $this->db->group_end();
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
	    if (!empty($search['order_state'])) {
	        $this->db->where(array('order_state'=>$search['order_state']));
	    }
	    if (!empty($search['order_status'])) {
	        $this->db->where(array('order_status'=>$search['order_status']));
	    }
	    if (!empty($search['sta_time'])) {
	        $this->db->where(array('time >'=>strtotime($search['sta_time'])));
	    }
	    if (!empty($search['end_time'])) {
	        $this->db->where(array('time <'=>strtotime($search['end_time'])));
	    }
	    if (!empty($search['item'])) {
	        $this->db->group_start();
	        $this->db->like('platform_code', $search['item']);
	        $this->db->or_like('buyer_name', $search['item']);
	        $this->db->or_like('username', $search['item']);
	        $this->db->group_end();
	    }
	    $this->db->order_by($order);
	    if ($perpage) $this->db->limit($perpage, $perpage*$page);
	    return $this->db->get();
	}
	
	
	
}

/** End of file Morder.php */
/** Location: ./application/models/Morder.php */