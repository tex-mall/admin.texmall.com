<?php
/**
 * Msupplier_buyer.php
 * ==============================================
 * Copy right 2017 http://www.texmall.com
 * ==============================================
 * @author: zoudong
 * @date: 2017年6月13日
 */
class Msupplier_buyer extends CI_Model{
	private $table = 'supplier_buyer';        
	
	/**
	 * @获取总条数
	 * */
	public function total($search)
	{
	    $this->db->select('id');
	    $this->db->from($this->table);
	    if (!empty($search['platform_name'])) {
	        $this->db->where(array('platform_name'=>$search['platform_name']));
	    }
	    if (!empty($search['component'])) {
	        $this->db->where(array('component'=>$search['component']));
	    }
	    if (!empty($search['is_sale'])) {
	        $this->db->where(array('is_sale'=>$search['is_sale']));
	    }
	    if (!empty($search['is_check'])) {
	        $this->db->where(array('is_check'=>$search['is_check']));
	    }
	    if (!empty($search['platform_grade'])) {
	        $this->db->where(array('platform_grade'=>$search['platform_grade']));
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
	        $this->db->or_like('supplier_name', $search['item']);
	        $this->db->or_like('supplier_code', $search['item']);
	        $this->db->or_like('tech_composed', $search['item']);
	        $this->db->or_like('style', $search['item']);
	        $this->db->or_like('category', $search['item']);
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
	public function grid($page, $perpage, $search, $order='platform_name desc, id desc')  
	{
	    $this->db->select('*');
	    $this->db->from($this->table);
	if (!empty($search['platform_name'])) {
	        $this->db->where(array('platform_name'=>$search['platform_name']));
	    }
	    if (!empty($search['component'])) {
	        $this->db->where(array('component'=>$search['component']));
	    }
	    if (!empty($search['is_sale'])) {
	        $this->db->where(array('is_sale'=>$search['is_sale']));
	    }
	    if (!empty($search['is_check'])) {
	        $this->db->where(array('is_check'=>$search['is_check']));
	    }
	    if (!empty($search['platform_grade'])) {
	        $this->db->where(array('platform_grade'=>$search['platform_grade']));
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
	        $this->db->or_like('supplier_name', $search['item']);
	        $this->db->or_like('supplier_code', $search['item']);
	        $this->db->or_like('tech_composed', $search['item']);
	        $this->db->or_like('style', $search['item']);
	        $this->db->or_like('category', $search['item']);
	        $this->db->group_end();
	    }
	    $this->db->order_by($order);
	    if ($perpage) $this->db->limit($perpage, $perpage*$page);
	    return $this->db->get();
	}
	
	
}

/** End of file Msupplier_buyer.php */
/** Location: ./application/models/Msupplier_buyer.php */