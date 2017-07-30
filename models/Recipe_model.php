<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recipe_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	/************************************  Model Function For Add New User   ************************************/
	// public function getRecipe()
	// {
	// 	$this->db->from('recipe');
	// 	$this->db->join('recipe_like_dislike', 'recipe_like_dislike.recipe_id = recipe.recipe_id');
	// 	return $this->db->get()->result_array();
	// }

	public function getIngredients($where)
	{
		$this->db->select('ingredient, ingredient_id');
		$this->db->from('ingredients');
		$this->db->like('ingredient', $where);
		return $this->db->get()->result_array();
	}

	public function getAllComments($where)
	{
		$this->db->select('*');
		$this->db->from('recipe_comments');
		$this->db->join('ci_user', 'recipe_comments.user_id = ci_user.user_id');
		$this->db->where($where);
		return $this->db->get()->result_array();
	}
}
