<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
	 public function __construct()
	 {
		 parent::__construct();
	 }

	 /************************************  Model Function For Add New User   ************************************/
	public function add_users($data)
	{
		$str = $this->db->insert('admin', $data);
		$id = $this->db->insert_id();
		if($id>0){
		return $id;
		}else{
		return '';
		}
	}

	function change_password($data)
	{
		$this->db->select('admin_id');
		$this->db->from('admin');
		$this->db->where('admin_id', $data['admin_id']);

		if(!empty($data['oldpassword'])){
			$this->db->where('password', $data['oldpassword']);
		}
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data_array['password'] = $data['password'];
			$data_array['status'] = 1;
			$where['admin_id'] = $data['admin_id'];
			$affacted_rows = $this->common_model->addEditRecords('admin', $data_array, $where);
			return json_encode(array("success"=>TRUE, "message"=>"Password Updated Successfully"));
		}else{
			return json_encode(array("error"=>TRUE, "message"=>"Current Password is not correct"));
		}
	}

	public function check_login_credentials($data)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('email', $data['email']);
		$this->db->where('password', $data['password']);

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $row = $query->row_array();
		}else{
			return '';
		}
	}

	function get_product_category_feature($category_id)
	{
		$this->db->select('*');
		$this->db->from('category_feature');
		$this->db->join('feature', 'category_feature.feature_id = feature.feature_id');
		$this->db->where('category_id', $category_id);

		$query = $this->db->get();
		return $row = $query->result_array();
	}

	function get_product_category_table($product_id)
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->join('category', 'product.category_id = category.category_id');
		$this->db->where('product_id', $product_id);

		$query = $this->db->get();
		return $row = $query->row();
	}
}
