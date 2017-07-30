<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public $user_auth;
	public function __construct()
	{
        parent::__construct();
		$this->load->model(array('common_model','user_model','recipe_model'));
		// if($this->session->userdata('user_auth'))
		// {
		// 	$user_auth = $this->session->userdata('user_auth');
		// 	// $this->user_auth = $this->common_model->getRecords('ci_user','*',array('user_id ' => $user_auth['user_id']),'',true);
		// }
    }

	public function index()
	{
		if(empty($this->session->userdata('user_auth'))){redirect('');}

		$data['all_data'] = $this->user_model->getallwppost();
		$data['user'] = $this->session->userdata('user_auth');
		$data['active'] = 'dashboard';

		// $url = API_URL.'wp-json/wp/v2/media?id=22';
        // $ch=curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $cexecute=curl_exec($ch);
        // curl_close($ch);
        // $result = json_decode($cexecute,true);
		// echo '<pre>';
		// print_r($result);die;

		$this->load->view('front_include/header', $data);
		$this->load->view('front/dashboard');
		$this->load->view('front_include/footer');
	}

	public function select_membership()
	{
		if(empty($this->session->userdata('user_auth'))){redirect('');}

		$user = $this->session->userdata('user_auth');
		$member_type = $this->input->post('member_type');

		$data = array('subscription_status' => $member_type);
		$where = array('user_id' => $user['user_id']);

		$response = $this->common_model->addEditRecords('ci_user', $data, $where);

		if($member_type == 1)
		{
			print json_encode(array("message"=>'Membership 1 selected'));
		}
		else
		{
			print json_encode(array("message"=>'Membership 2 selected'));
		}
	}

	public function recipe($id)
	{
		if(empty($this->session->userdata('user_auth'))){redirect('');}
		$data['user'] = $this->session->userdata('user_auth');

		$data['active'] = 'recipe';

		$where = array('recipe_id' => $id);
		$data['recipe'] = $this->common_model->getRecords('recipe', '', $where);

		$data['allrecipes'] = $this->common_model->getRecords('recipe');
		$data['comments'] = $this->recipe_model->getAllComments($where);

		$data['nutritions'] = $this->db->field_data('ingredients');

		$ingredients = json_decode($data['recipe'][0]['use_ingradients']);

		$common_nutritions = array(
            'Energ_Kcal'=>'Energy',
            'Protein_(g)'=>'Protein',
            'Carbohydrt_(g)'=>'Carbohydrate',
            'Fiber_TD_(g)'=>'Fiber',
            'Sugar_Tot_(g)'=>'Sugar',
            'Calcium_(mg)'=>'Calcium',
            'Iron_(mg)'=>'Iron',
            'Magnesium_(mg)'=>'Magnesium',
            'Phosphorus_(mg)'=>'Phosphorus',
            'Potassium_(mg)'=>'Potassium',
            'Sodium_(mg)'=>'Sodium',
            'Zinc_(mg)'=>'Zinc',
            'Copper_mg)'=>'Copper',
            'Manganese_(mg)'=>'Manganese',
            'Selenium_(µg)'=>'Selenium',
            'Vit_C_(mg)'=>'Vitamin C',
            'Thiamin_(mg)'=>'Thiamin',
            'Riboflavin_(mg)'=>'Riboflavin',
            'Niacin_(mg)'=>'Niacin',
            'Vit_B6_(mg)'=>'Vitamin B6',
            'Folate_Tot_(µg)'=>'Folate',
            'Folic_Acid_(µg)'=>'Folic Acid',
            'Vit_B12_(µg)'=>'Vitamin B12',
            'Vit_A_IU'=>'Vitamin A',
            'Beta_Carot_(µg)'=>'Beta Carotin',
            'Vit_E_(mg)'=>'Vitamin E',
            'Vit_D_µg'=>'Vitamin D',
            'Vit_K_(µg)'=>'Vitamin K',
            'Cholestrl_(mg)'=>'Cholesterol'
		);

		foreach($ingredients as $k => $v)
		{
			$where1 = array('ingredient_id' => $v->ingredient);
			$ingredient_values = $this->common_model->getRecords('ingredients', '', $where1);

			foreach($common_nutritions as $key => $value)
			{
				if($v->unit == 'gms')
				{
					$nutrition_values[$k][$value] = ($v->quantity/100) * $ingredient_values[0][$key];
				}

				if($v->unit == 'ml')
				{
					$nutrition_values[$k][$value] = ($v->quantity/95) * $ingredient_values[0][$key];
				}
			}
		}

		foreach ($nutrition_values as $k => $sum_array)
		{
			foreach ($sum_array as $id => $val)
			{
				$sum_array[$id] += $val;
			}
		}

		$data['all_nutritions'] = $sum_array;

		$this->load->view('front_include/header', $data);
		$this->load->view('front/recipe');
		$this->load->view('front_include/footer');
	}

	public function post_recipe_comment()
	{
		$user = $this->session->userdata('user_auth');

		$this->form_validation->set_rules('comment','Comment','required|trim');

		if ($this->form_validation->run() == FALSE)
		{
			 $errors = validation_errors();
			 print json_encode(array("error"=>TRUE, "message"=>$errors));
			 die;
		}
		else
		{
			if(!empty($this->input->post('parent_comment_id')))
			{
				$parent_comment_id = $this->input->post('parent_comment_id');
			}
			else
			{
				$parent_comment_id = 0;
			}

			$data=array(
				'comment'=>$this->input->post('comment'),
				'user_id'=>$user['user_id'],
				'recipe_id'=>$this->input->post('recipe_id'),
				'parent_comment_id'=>$parent_comment_id
			);

				$response = $this->common_model->addEditRecords('recipe_comments', $data);
			if(!empty($response))
			{
				print json_encode(array("message"=>"Comment Successfully!!"));die;
			}
		}
	}

	public function recipe_list()
	{
		if(empty($this->session->userdata('user_auth'))){redirect('');}

		$data['user'] = $this->session->userdata('user_auth');
		$data['active'] = 'recipe';

		$data['recipes'] = $this->common_model->getRecords('recipe', 'recipe_id, recipe_title, recipe_intro, recipe_img');

		foreach($data['recipes'] as $k => $v)
		{
			$where = array(
					'recipe_id' => $v['recipe_id'],
					'user_id' => $data['user']['user_id'],
			);
			$response = $this->common_model->getRecords('recipe_like_dislike','', $where, '', true);
			if(!empty($response))
			{
				$data['recipes'][$k]['like_dislike'] = $response;
			}
		}

		$this->load->view('front_include/header', $data);
		$this->load->view('front/recipe_list');
		$this->load->view('front_include/footer');
	}

	public function recipe_like_dislike()
	{
		if(empty($this->session->userdata('user_auth'))){redirect('');}

		$user = $this->session->userdata('user_auth');

		$data = array(
			'recipe_id' => $this->input->post('recipe_id'),
			'user_id' => $user['user_id'],
			'like_dislike' => $this->input->post('status'),
		);

		$where = array(
				'recipe_id' => $this->input->post('recipe_id'),
				'user_id' => $user['user_id'],
		);
		$response = $this->common_model->getRecords('recipe_like_dislike','like_dislike_id', $where);

		if(!empty($response))
		{
			$where = array('like_dislike_id' => $response[0]['like_dislike_id']);
			$this->common_model->addEditRecords('recipe_like_dislike', $data, $where);
		}
		else
		{
			$this->common_model->addEditRecords('recipe_like_dislike', $data);
		}

		if($this->input->post('status') == 0)
			print json_encode(array("success"=>TRUE, "message"=>"Rejected this recipe!!"));
		if($this->input->post('status') == 1)
			print json_encode(array("success"=>TRUE, "message"=>"Liked this recipe!!"));

	}

	public function personalise()
	{
		if(empty($this->session->userdata('user_auth'))){redirect('');}

		$data['user'] = $this->session->userdata('user_auth');
		$data['active'] = 'personalise';

		$data['preferences_cat'] = $this->common_model->getRecords('preferences_list','','','','','pref_category');
		$data['preferences_list'] = $this->common_model->getRecords('preferences_list');
		$data['user_preferences'] = $this->common_model->getRecords('user_preferences', 'pref_id', array('user_id' => $data['user']['user_id']), '', true);
		$data['user_h_w'] = $this->common_model->getRecords('ci_user', 'height,weight', array('user_id' => $data['user']['user_id']), '', true);

		$data['user_preferences'] = json_decode($data['user_preferences']['pref_id']);

		$this->load->view('front_include/header', $data);
		$this->load->view('front/preferences');
		$this->load->view('front_include/footer');
	}

	public function personalise_update()
	{
		if(empty($this->session->userdata('user_auth'))){redirect('');}

		$user = $this->session->userdata('user_auth');
		$user_preference = $this->input->post('user_preference');
		$user_preference = json_encode($user_preference);

		$where = array('user_id'=>$user['user_id']);
		$response = $this->common_model->getRecords('user_preferences','*',$where);

		if(!empty($response))
		{
			$this->common_model->deleteRecords('user_preferences', $where);
		}

		$data = array('user_id'=>$user['user_id'], 'pref_id'=>$user_preference);
		$this->common_model->addEditRecords('user_preferences', $data);

		print json_encode(array("success"=>TRUE, "message"=>"Update user preferences successfully!!"));
	}

	public function update_user_w_h()
	{
		if(empty($this->session->userdata('user_auth'))){redirect('');}

		$user = $this->session->userdata('user_auth');

		$this->form_validation->set_rules('height','Height','required|trim');
		$this->form_validation->set_rules('weight','Weight','required|numeric|trim');

		if ($this->form_validation->run() == FALSE)
		{
			 $errors = validation_errors();
			 print json_encode(array("error"=>TRUE, "message"=>$errors));
			 die;
		}
		else
		{
			$data = array(
					'height'=> $this->input->post('height'),
					'weight'=> $this->input->post('weight'),
			);

			$where = array('user_id'=>$user['user_id']);
			$this->common_model->addEditRecords('ci_user', $data, $where);

			print json_encode(array("message"=>'Update Successfully!!'));
			die;
		}
	}

	public function yoga()
	{
		if(empty($this->session->userdata('user_auth'))){redirect('');}

		$data['user'] = $this->session->userdata('user_auth');
		$data['active'] = 'yoga';

		$this->load->view('front_include/header', $data);
		$this->load->view('front/yoga');
		$this->load->view('front_include/footer');
	}

	public function history()
	{
		if(empty($this->session->userdata('user_auth'))){redirect('');}

		$data['user'] = $this->session->userdata('user_auth');
		$data['active'] = 'history';

		$this->load->view('front_include/header', $data);
		$this->load->view('front/history');
		$this->load->view('front_include/footer');
	}

	function setting()
	{
		if(empty($this->session->userdata('user_auth'))){redirect('');}

		$data['user'] = $this->session->userdata('user_auth');
		$where = array('user_id' => $data['user']['user_id']);
		$data['details'] = $this->common_model->getRecords('ci_user', '', $where);

		$this->load->view('front_include/header', $data);
		$this->load->view('front/setting');
		$this->load->view('front_include/footer');
	}

	function update_profile()
	{
		if(empty($this->session->userdata('user_auth'))){redirect('');}

		$user = $this->session->userdata('user_auth');

		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim');
		$this->form_validation->set_rules('address','Address','required|trim');
		$this->form_validation->set_rules('city','City','required|trim');
		$this->form_validation->set_rules('state','State','required|trim');
		$this->form_validation->set_rules('dob','Date of Birth','required|trim');

		if ($this->form_validation->run() == FALSE)
		{
			 $errors = validation_errors();
			 print json_encode(array("error"=>TRUE, "message"=>$errors));
			 die;
		}
		else
		{
			$data = array(
					'name'=> $this->input->post('name'),
					'email'=> $this->input->post('email'),
					'address'=> $this->input->post('address'),
					'city'=> $this->input->post('city'),
					'state'=> $this->input->post('state'),
					'dob'=> $this->input->post('dob'),
			);

			$where=array('user_id'=>$user['user_id']);
			$response = $this->common_model->addEditRecords('ci_user',$data,$where);

			if($response){
				print json_encode(array("success"=>TRUE, "message"=>"Profile update successfully!!"));
			}
			else{
				print json_encode(array("error"=>TRUE, "message"=>"Something wrong with that please update later"));
			}
		}
	}

	function change_password()
	{
		if(empty($this->session->userdata('user_auth'))){redirect('');}

		$user = $this->session->userdata('user_auth');

		$this->form_validation->set_rules('oldpassword','Old Password','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim|min_length[6]|max_length[20]|matches[cpassword]');
		$this->form_validation->set_rules('cpassword','Confirm Password','required|trim');

		if ($this->form_validation->run() == FALSE)
		{
			 $errors = validation_errors();
			 print json_encode(array("error"=>TRUE, "message"=>$errors));
			 die;
		}
		else
		{
			$data=array(
				'user_id'=>$user['user_id'],
				'oldpassword'=>md5($this->input->post('oldpassword')),
				'password'=> md5($this->input->post('password')),
				'cpassword'=> md5($this->input->post('cpassword')),
			);
			echo $response = $this->user_model->change_password($data);
			die;
		}
	}

	function check_alpha_space($str)
	{
		if(!preg_match('/^[a-zA-Z0-9 \-]+$/i', $str)){
			$this->form_validation->set_message('check_alpha_space', '%s can contain only letters, numbers and spaces!');
			return false;
		}else
			 return true;
	}

	function verify($token)
	{
		$data['title'] = "Verify Account";
		$condition['token'] = $token;
		$response = $this->common_model->getRecords('ci_user', 'id', $condition,"", true);
		if(!empty($response)){
			$where['id'] =$response['id'];
			$data_array['token']='';
			$data_array['status']=1;
			$affacted_rows = $this->common_model->addEditRecords('ci_user', $data_array, $where);

			if($affacted_rows>0) {
				$flashMsg = "Congratulations !! Your account has been verified.!! Please <a href=".site_url('admin').">Click here</a> to login";
				$this->session->set_flashdata('msg', $flashMsg);
				redirect('admin/success');
			}
		}else{
			redirect('admin');
		}
	}

	public function logout()
	{
		if(!empty($this->session->userdata('user_auth'))){
			$data['title'] = "Logout from Baby Indian";
			$this->session->unset_userdata('user_auth');
			redirect($this->agent->referrer());
		}else{
			redirect('account');
		}
	}
}
