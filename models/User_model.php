<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getallwppost()
 	{
		$arr = array();
		$arr1 = array();
 		$this->db->select('*')
 				->from('wp_term_relationships')
				->join('wp_term_taxonomy', 'wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id', 'left')
				->join('wp_terms', 'wp_term_taxonomy.term_taxonomy_id = wp_terms.term_id', 'left')
				->where('wp_term_taxonomy.taxonomy', 'category')
				->group_by('wp_term_taxonomy.term_id');

		$query = $this->db->get();
		$rows = $query->result();

		foreach($rows as $k=>$v)
		{
			$this->db->select('*')
	 				->from('wp_posts')
					->join('wp_term_relationships', 'wp_posts.ID = wp_term_relationships.object_id', 'left')
					->join('wp_term_taxonomy', 'wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id', 'left')
					->join('wp_postmeta', 'wp_posts.ID = wp_postmeta.post_id', 'left')
					->where('wp_term_taxonomy.taxonomy', 'category')
					->where('wp_term_taxonomy.term_id', $v->term_id)
					->where('wp_postmeta.meta_key', '_thumbnail_id')
					->where('wp_posts.post_status', 'publish')
					->where('post_type', 'post')
					->group_by('wp_posts.ID')
					->order_by('ID');

			$query1 = $this->db->get();
			$rows1 = $query1->result();
			// echo '<pre>';
			// print_r($rows1);
			foreach($rows1 as $k1=>$v1)
			{
				$arr1[$k1]['post_title'] = $v1->post_title;
				$arr1[$k1]['post_content'] = $v1->post_content;
				$arr1[$k1]['post_status'] = $v1->post_status;
				$arr1[$k1]['guid'] = $v1->guid;
			}
			$arr[$k]['term_id'] = $v->term_id;
			$arr[$k]['name'] = $v->name;
			$arr[$k]['category_post'] = $arr1;
		}
		// die;
 		return $arr;
 	}

	public function check_login_credentials($data)
 	{
 		$this->db->select('*');
 		$this->db->from('ci_user');
 		$this->db->where('email', $data['email']);
 		$this->db->where('password', $data['password']);

 		$query = $this->db->get();
 		if ($query->num_rows() > 0) {
 			return $row = $query->row_array();
 		}else{
 			return '';
 		}
 	}

	function change_password($data)
	{
		$this->db->select('user_id');
		$this->db->from('ci_user');
		$this->db->where('user_id', $data['user_id']);

		if(!empty($data['oldpassword'])){
			$this->db->where('password', $data['oldpassword']);
		}
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data_array['password'] = $data['password'];
			$data_array['status'] = 1;
			$where['user_id'] = $data['user_id'];
			$affacted_rows = $this->common_model->addEditRecords('ci_user', $data_array, $where);
			return json_encode(array("success"=>TRUE, "message"=>"Password Updated Successfully"));
		}else{
			return json_encode(array("error"=>TRUE, "message"=>"Current Password is not correct"));
		}
	}
}
