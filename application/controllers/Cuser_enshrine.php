<?php 
/**
 * Cuser_enshrine.php
 * ==============================================
 * Copy right 2017 http://www.texmall.com
 * ==============================================
 * @author: zoudong
 * @date: 2017年6月13日
 */
 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cuser_enshrine extends TM_Controller {
    private $table = 'user_enshrine';
    
    function _init()
	{
		header("Content-type: text/html; Charset=utf-8");
		$this->load->model('Muser_enshrine');
	}
	
	/**
	 * @收藏列表
	 * */
	public function grid($pg = 1)
	{
	    $this->checkAction(__METHOD__);
	
	    $this->load->library('pagination');
	    $config['per_page']   = 2;
	    $config['uri_segment'] = 3;
	    $config['suffix']     = $this->get_page_param($this->input->get());
	    $config['total_rows'] = $this->Muser_enshrine->total($this->input->get());
	    $config['first_url']  = base_url('Cuser_enshrine/grid').$this->get_page_param($this->input->get());
	    $config['base_url']   = base_url('Cuser_enshrine/grid');
	    $this->pagination->initialize($config);
	    $data['link']       = $this->pagination->create_links();
	    $data['res']        = $this->Muser_enshrine->grid($pg-1, $config['per_page'], $this->input->get())->result();
	    $data['sum']        = $config['total_rows'];
	    $data['per_page']   = $config['per_page'];
	    $data['one_level'] = '用户管理';
	    $data['two_level'] = '收藏';
	    $this->load->view('user_enshrine/vgrid', $data);
	}
	
    /**
	 * @用户收藏
	 * */
	public function user_grid($uid = 0)
	{ 
	    $data['res'] = $this->Base_model->getWhere($this->table, array('uid'=>$uid))->result();
        
        $this->load->view('user_enshrine/vuser_grid', $data);
	}
	
	/**
	 * @删除
	 * */
	public function delete($id = 0)
	{
	    $this->checkAction(__METHOD__);
	
	    $res = $this->Base_model->delete($this->table, array('id'=>$id));
	    if ($res>0) {
	        alert_msg('操作成功', 'Cuser_enshrine/grid');
	    }else{
	        alert_msg('操作失败');
	    }
	}
	
}

/** End of file Cuser_enshrine.php */
/** Location: ./application/controllers/Cuser_enshrine.php */
