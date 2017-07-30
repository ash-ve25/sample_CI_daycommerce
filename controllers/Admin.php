<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public $admin_auth;
	public function __construct()
	{
        parent::__construct();
		$this->load->model(array('common_model','admin_model', 'recipe_model'));
		if($this->session->userdata('admin_auth'))
		{
			$admin_auth = $this->session->userdata('admin_auth');
			$this->admin_auth = $this->common_model->getRecords('admin','*',array('admin_id ' => $admin_auth['admin_id']),'',true);
		}
    }

	public function index()
	{
		if($this->admin_auth ){redirect('admin/dashboard');}
		$data['title'] = 'Baby Indian Admin';
		$this->load->view('login', $data);
	}

	public function dashboard()
	{
		if(empty($this->admin_auth)){redirect('admin/index');}

		$data['breadcrumb'] = $this->create_breadcrumb();

		$data['title'] = 'Baby Indian Admin';
		$this->load->view('admin_include/header', $data);
		$this->load->view('admin_include/sidebar');
		$this->load->view('dashboard');
		$this->load->view('admin_include/right_sidebar');
		$this->load->view('admin_include/footer');
	}

	public function users()
	{
		if(empty($this->admin_auth)){redirect('admin/index');}

		$data['breadcrumb'] = $this->create_breadcrumb();
		$data['title'] = 'Baby Indian Admin';

		$this->load->view('admin_include/header', $data);
		$this->load->view('admin_include/sidebar');
		$this->load->view('site_users');
	}

	function users_data()
    {
		if(empty($this->admin_auth)){redirect('admin/index');}

		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    	{
			$this->load->model('Common_model');

			$datatables  = $_POST;
			$datatables['table']    = 'users';
			$datatables['id_table'] = 'user_id';

            $datatables['col_display'] = array('email', 'birth_due_date'); // Column display data

            //$datatables['join']    = 'INNER JOIN position ON position = id_position';
			$datatables['join'] = ''; // Joint Query

			$list = $this->Common_model->Datatables($datatables);

			$data = array();
			$view = $list['data'];

	        foreach($view as $coulmn)
			{
				$id = $coulmn->user_id;
				$row = array();
				$row[] = $coulmn->email;
	            $row[] = $coulmn->birth_due_date;
				$row[] = $this->load->view('datatables_view/action', ['id' => $id], true);

	            $data[] = $row;
	        }
	        $output = array("draw" => $list['draw'], "recordsTotal" => $list['recordsTotal'], "recordsFiltered" => $list['recordsFiltered'], "data" => $data);
			echo json_encode($output);
    	}
    }

	public function ingredients()
	{
		if(empty($this->admin_auth)){redirect('admin/index');}

		$data['breadcrumb'] = $this->create_breadcrumb();

		$data['title'] = 'Baby Indian Admin';
		$this->load->view('admin_include/header', $data);
		$this->load->view('admin_include/sidebar');
		$this->load->view('ingredients');
	}

	public function ingredients_edit($id)
	{
		if(empty($this->admin_auth)){redirect('admin/index');}

		$data = $this->common_model->get_single_record('ingredients', 'ingredient_id', $id);
		echo json_encode($data);
	}

	public function ingredients_create()
	{
		if(empty($this->admin_auth)){redirect('admin/index');}

		$this->form_validation->set_rules('ingredient','Ingredient','required|trim');
		// $this->form_validation->set_rules('recipe_title','Description','required|trim');

		if ($this->form_validation->run() == FALSE)
		{
			 $errors = validation_errors();
			 print json_encode(array("error"=>TRUE, "message"=>$errors));die;
		}
		else
		{
			$data=array(
				'ingredient'=>$this->input->post('ingredient'),
				// 'description'=> $this->input->post('description'),
			);
			$response = $this->common_model->addEditRecords('ingredients', $data);
			if(!empty($response))
			{
				print json_encode(array("message"=>"Add Record Successfully!!"));die;
			}
		}
	}

	public function ingredients_update()
	{
		if(empty($this->admin_auth)){redirect('admin/index');}

		$this->form_validation->set_rules('ingredient','ingredient','required|trim');

		if ($this->form_validation->run() == FALSE)
		{
			 $errors = validation_errors();
			 print json_encode(array("error"=>TRUE, "message"=>$errors));
			 die;
		}
		else
		{
			$id = $this->input->post('id');
			$where = 'ingredient_id = '.$id;
			$data=array(
				'ingredient'=>$this->input->post('ingredient'),
			);
			$response = $this->common_model->addEditRecords('ingredients', $data, $where);
			if(!empty($response))
			{
				print json_encode(array("message"=>"Update Record Successfully!!"));
				die;
			}
		}
	}

	public function ingredients_delete($id)
	{
		if(empty($this->admin_auth)){redirect('admin/index');}

		$where = 'ingredient_id = '.$id;

		$response = $this->common_model->deleteRecords('ingredients', $where);
		if(!empty($response))
		{
			print json_encode(array("message"=>"Delete Record Successfully!!"));
			die;
		}
	}

	function ingredients_data()
    {
		if(empty($this->admin_auth)){redirect('admin/index');}

    	if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    	{
			$this->load->model('Common_model');

			$datatables  = $_POST;
            $datatables['table']    = 'ingredients';
    		$datatables['id_table'] = 'ingredient_id';

            $datatables['col_display'] = array('ingredient_id', 'ingredient'); // Column display data

            //$datatables['join']    = 'INNER JOIN position ON position = id_position';
			$datatables['join'] = ''; // Joint Query

			$list = $this->Common_model->Datatables($datatables);

			$data = array();
			$view = $list['data'];

	        foreach($view as $coulmn)
			{
				$id = $coulmn->ingredient_id;
				$row = array();
				$row[] = $coulmn->ingredient_id;
				$row[] = $coulmn->ingredient;
				$row[] = $this->load->view('datatables_view/action', ['id' => $id], true);

	            $data[] = $row;
	        }
	        $output = array("draw" => $list['draw'], "recordsTotal" => $list['recordsTotal'], "recordsFiltered" => $list['recordsFiltered'], "data" => $data);
			echo json_encode($output);
    	}
    }

	public function recipe_cat()
	{
		if(empty($this->admin_auth)){redirect('admin/index');}

		$data['breadcrumb'] = $this->create_breadcrumb();

		$data['title'] = 'Baby Indian Admin';
		$this->load->view('admin_include/header', $data);
		$this->load->view('admin_include/sidebar');
		$this->load->view('recipe_category');
	}

	public function recipe_cat_edit($id)
	{
		if(empty($this->admin_auth)){redirect('admin/index');}

		$data = $this->common_model->get_single_record('recipe_category', 'recipe_category_id', $id);
		echo json_encode($data);
	}

	public function recipe_cat_create()
	{
		if(empty($this->admin_auth)){redirect('admin/index');}

		$this->form_validation->set_rules('category','Category','required|trim');
		$this->form_validation->set_rules('description','Description','required|trim');

		if ($this->form_validation->run() == FALSE)
		{
			 $errors = validation_errors();
			 print json_encode(array("error"=>TRUE, "message"=>$errors));die;
		}
		else
		{
			$data=array(
				'category'=>$this->input->post('category'),
				'description'=> $this->input->post('description'),
			);
			$response = $this->common_model->addEditRecords('recipe_category', $data);
			if(!empty($response))
			{
				print json_encode(array("message"=>"Add Record Successfully!!"));die;
			}
		}
	}

	public function recipe_cat_update()
	{
		if(empty($this->admin_auth)){redirect('admin/index');}

		$this->form_validation->set_rules('category','Category','required|trim');
		$this->form_validation->set_rules('description','Description','required|trim');

		if ($this->form_validation->run() == FALSE)
		{
			 $errors = validation_errors();
			 print json_encode(array("error"=>TRUE, "message"=>$errors));
			 die;
		}
		else
		{
			$id = $this->input->post('id');
			$where = 'recipe_category_id = '.$id;
			$data=array(
				'category'=>$this->input->post('category'),
				'description'=> $this->input->post('description'),
			);
			$response = $this->common_model->addEditRecords('recipe_category', $data, $where);
			if(!empty($response))
			{
				print json_encode(array("message"=>"Update Record Successfully!!"));
				die;
			}
		}
	}

	public function recipe_cat_delete($id)
	{
		if(empty($this->admin_auth)){redirect('admin/index');}

		$where = 'recipe_category_id = '.$id;

		$response = $this->common_model->deleteRecords('recipe_category', $where);
		if(!empty($response))
		{
			print json_encode(array("message"=>"Delete Record Successfully!!"));
			die;
		}
	}

	function recipe_cat_data()
    {
		if(empty($this->admin_auth)){redirect('admin/index');}

    	if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    	{
			$this->load->model('Common_model');

			$datatables  = $_POST;
            $datatables['table']    = 'recipe_category';
    		$datatables['id_table'] = 'recipe_category_id';

            $datatables['col_display'] = array('recipe_category_id', 'category', 'description'); // Column display data

            //$datatables['join']    = 'INNER JOIN position ON position = id_position';
			$datatables['join'] = ''; // Joint Query

			$list = $this->Common_model->Datatables($datatables);

			$data = array();
			$view = $list['data'];

	        foreach($view as $coulmn)
			{
				$id = $coulmn->recipe_category_id;
				$row = array();
				$row[] = $coulmn->recipe_category_id;
				$row[] = $coulmn->category;
	            $row[] = $coulmn->description;
				$row[] = $this->load->view('datatables_view/action', ['id' => $id], true);

	            $data[] = $row;
	        }
	        $output = array("draw" => $list['draw'], "recordsTotal" => $list['recordsTotal'], "recordsFiltered" => $list['recordsFiltered'], "data" => $data);
			echo json_encode($output);
    	}
    }

	public function autocomplete_ingredients()
	{
		$where = $_POST['term'];
		$ingredients = $this->recipe_model->getIngredients($where);
		echo json_encode($ingredients);
	}

	public function get_ingredient_units()
	{
		$units = $this->common_model->getRecords('ingredient_unit');
		echo json_encode($units);
	}

	public function recipe()
	{
		if(empty($this->admin_auth)){redirect('admin/index');}

		$data['breadcrumb'] = $this->create_breadcrumb();

		$data['title'] = 'Baby Indian Admin';
		$data['categories'] = $this->common_model->getRecords('recipe_category');
		$data['units'] = $this->common_model->getRecords('ingredient_unit');

		$this->load->view('admin_include/header', $data);
		$this->load->view('admin_include/sidebar');
		$this->load->view('recipe');
	}

	public function recipe_edit($id)
	{
		if(empty($this->admin_auth)){redirect('admin/index');}

		$data = $this->common_model->get_single_record('recipe', 'recipe_id', $id);
		echo json_encode($data);
	}

	public function recipe_create()
	{
		if(empty($this->admin_auth)){redirect('admin/index');}

		$use_ingradients = array();

		$this->form_validation->set_rules('recipe_title','Recipe Title','required|trim');
		$this->form_validation->set_rules('recipe_intro','Recipe Title','required|trim');
		$this->form_validation->set_rules('preparation_steps','Prepration Steps','required|trim');
		$this->form_validation->set_rules('recipe_category_id','Recipe Category','required|trim');
		$this->form_validation->set_rules('author','Author','required|trim');

		$this->form_validation->set_rules('ingredient[]','Ingredient','required|trim');
		$this->form_validation->set_rules('quantity[]','Quantity','required|trim');
		$this->form_validation->set_rules('unit[]','Unit','required|trim');

		if ($this->form_validation->run() == FALSE)
		{
			 $errors = validation_errors();
			 print json_encode(array("error"=>TRUE, "message"=>$errors));die;
		}
		else
		{
			$upload_name = $this->upload_files('./assets/upload/', $_FILES['image']);
			$filename = implode (", ", $upload_name);

			$ingredient = $this->input->post('ingredient');
			$quantity = $this->input->post('quantity');
			$unit = $this->input->post('unit');
			foreach($ingredient as $k=>$v)
			{
				$use_ingradients[$k]['ingredient'] = $v;
				$use_ingradients[$k]['quantity'] = $quantity[$k];
				$use_ingradients[$k]['unit'] = $unit[$k];
			}

			$data=array(
				'recipe_img'=> $filename,
				'recipe_title'=> $this->input->post('recipe_title'),
				'recipe_intro'=> $this->input->post('recipe_intro'),
				'preparation_steps'=> $this->input->post('preparation_steps'),
				'recipe_category_id'=> $this->input->post('recipe_category_id'),
				'author'=> $this->input->post('author'),
				'use_ingradients'=> json_encode($use_ingradients),
			);
			$response = $this->common_model->addEditRecords('recipe', $data);
			if(!empty($response))
			{
				print json_encode(array("message"=>"Add Record Successfully!!"));die;
			}
		}
	}

	public function recipe_update()
	{
		if(empty($this->admin_auth)){redirect('admin/index');}

		$use_ingradients = array();

		$this->form_validation->set_rules('recipe_title','Recipe Title','required|trim');
		$this->form_validation->set_rules('recipe_intro','Recipe Title','required|trim');
		$this->form_validation->set_rules('preparation_steps','Prepration Steps','required|trim');
		$this->form_validation->set_rules('recipe_category_id','Recipe Category','required|trim');
		$this->form_validation->set_rules('author','Author','required|trim');

		$this->form_validation->set_rules('ingredient[]','Ingredient','required|trim');
		$this->form_validation->set_rules('quantity[]','Quantity','required|trim');
		$this->form_validation->set_rules('unit[]','Unit','required|trim');

		if ($this->form_validation->run() == FALSE)
		{
			 $errors = validation_errors();
			 print json_encode(array("error"=>TRUE, "message"=>$errors));
			 die;
		}
		else
		{
			$id = $this->input->post('id');
			$where = 'recipe_id = '.$id;

			$ingredient = $this->input->post('ingredient');
			$quantity = $this->input->post('quantity');
			$unit = $this->input->post('unit');
			foreach($ingredient as $k=>$v)
			{
				$use_ingradients[$k]['ingredient'] = $v;
				$use_ingradients[$k]['quantity'] = $quantity[$k];
				$use_ingradients[$k]['unit'] = $unit[$k];
			}

			if(isset($_FILES['image']))
			{
				$upload_name = $this->upload_files('./assets/upload/', $_FILES['image']);
				$filename = implode (", ", $upload_name);

				$data=array(
					'recipe_img'=> $filename,
					'recipe_title'=> $this->input->post('recipe_title'),
					'recipe_intro'=> $this->input->post('recipe_intro'),
					'preparation_steps'=> $this->input->post('preparation_steps'),
					'recipe_category_id'=> $this->input->post('recipe_category_id'),
					'author'=> $this->input->post('author'),
					'use_ingradients'=> json_encode($use_ingradients),
				);
			}
			else
			{
				$data=array(
					'recipe_title'=> $this->input->post('recipe_title'),
					'recipe_intro'=> $this->input->post('recipe_intro'),
					'preparation_steps'=> $this->input->post('preparation_steps'),
					'recipe_category_id'=> $this->input->post('recipe_category_id'),
					'author'=> $this->input->post('author'),
					'use_ingradients'=> json_encode($use_ingradients),
				);
			}

			$response = $this->common_model->addEditRecords('recipe', $data, $where);
			if(!empty($response))
			{
				print json_encode(array("message"=>"Update Record Successfully!!"));
				die;
			}
		}
	}

	public function recipe_delete($id)
	{
		if(empty($this->admin_auth)){redirect('admin/index');}

		$where = 'recipe_id = '.$id;

		$response = $this->common_model->deleteRecords('recipe', $where);
		if(!empty($response))
		{
			print json_encode(array("message"=>"Delete Record Successfully!!"));
			die;
		}
	}

	function recipe_data()
    {
		if(empty($this->admin_auth)){redirect('admin/index');}

    	if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    	{
			$this->load->model('Common_model');
			$ingredient_list = '';
			$datatables  = $_POST;
            $datatables['table']    = 'recipe';
    		$datatables['id_table'] = 'recipe_id';

            $datatables['col_display'] = array('recipe_img', 'recipe_title', 'recipe_intro', 'recipe_category_id', 'preparation_steps', 'use_ingradients', 'author'); // Column display data

            //$datatables['join']    = 'INNER JOIN position ON position = id_position';
			$datatables['join'] = ''; // Joint Query

			$list = $this->Common_model->Datatables($datatables);

			$data = array();
			$view = $list['data'];

	        foreach($view as $coulmn)
			{
				$id = $coulmn->recipe_id;
				foreach(json_decode($coulmn->use_ingradients) as $ingredients)
				{
					$ingredient_list .= "<li>".$ingredients->ingredient." | ".$ingredients->quantity." ".$ingredients->unit."</li>";
				}
				$where = array('recipe_category_id'=>$coulmn->recipe_category_id);
				$name = $this->common_model->getRecords('recipe_category','category', $where, '', true);

				$row = array();
				$row[] = $coulmn->recipe_id;
				$row[] = $this->load->view('datatables_view/image', ['imgs' => $coulmn->recipe_img], true);;
				$row[] = $coulmn->recipe_title.' - (<strong>'.$name['category'].'</strong>)<br><br>'.$coulmn->recipe_intro;
				$row[] = $coulmn->preparation_steps;
				$row[] = $ingredient_list;
	            $row[] = $coulmn->author;
				$row[] = $this->load->view('datatables_view/action', ['id' => $id], true);

	            $data[] = $row;
				$ingredient_list = '';
	        }
	        $output = array("draw" => $list['draw'], "recordsTotal" => $list['recordsTotal'], "recordsFiltered" => $list['recordsFiltered'], "data" => $data);
			echo json_encode($output);
    	}
    }

	function profile()
	{
		if(empty($this->admin_auth)){redirect('admin/index');}

		$id = $this->admin_auth['admin_id'];
		$data['rows'] = $this->common_model->get_single_record('admin', 'admin_id', $id);
		$data['title'] = "Profile";

		$this->load->view('admin_include/header', $data);
		$this->load->view('admin_include/sidebar');
		$this->load->view('profile');
		$this->load->view('admin_include/right_sidebar');
		$this->load->view('admin_include/footer');
	}

	function profile_update()
	{
		if(empty($this->admin_auth)){redirect('admin/index');}

		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim');
		$this->form_validation->set_rules('phone','Phone','required|trim|min_length[10]|max_length[12]');

		if ($this->form_validation->run() == FALSE)
		{
			 $errors = validation_errors();
			 print json_encode(array("error"=>TRUE, "message"=>$errors));
			 die;
		}
		else
		{
			$data=array(
				'admin_id'=>$this->admin_auth['admin_id'],
				'name'=> $this->input->post('name'),
				'email'=> $this->input->post('email'),
				'phone'=>  $this->input->post('phone'),
			);
			$where = 'admin_id='.$this->admin_auth['admin_id'];
			$response = $this->common_model->addEditRecords('admin', $data, $where);

			print json_encode(array("message"=>"Profile Update Successfully!!"));
			die;
		}
	}

	function change_password()
	{
		if(empty($this->admin_auth)){redirect('admin/index');}

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
				'admin_id'=>$this->admin_auth['admin_id'],
				'oldpassword'=>md5($this->input->post('oldpassword')),
				'password'=> md5($this->input->post('password')),
				'cpassword'=> md5($this->input->post('cpassword')),
			);
			echo $response = $this->admin_model->change_password($data);
			die;
		}
	}

	public function login_submit()
	{
		if($this->admin_auth){redirect('');}

		$this->form_validation->set_rules('email','Email','required|trim');
		$this->form_validation->set_rules('password','Password','required|min_length[4]|trim');

		if ($this->form_validation->run() == FALSE)
		{
			$errors = validation_errors();
			print json_encode(array("error"=>TRUE, "message"=>$errors));
			die;
		}
		else
		{
			$data=array(
				'email'=>$this->input->post('email'),
				'password'=> md5($this->input->post('password')),
			);
			$response = $this->admin_model->check_login_credentials($data);
			if(!empty($response)){
				if($response['status']==1){
					$this->session->set_userdata('admin_auth',$response);
					$this->session->unset_userdata('page_referrer');
					print json_encode(array("success"=>TRUE, "message"=>"Success"));
				}else if($response['status']==0){
					$this->session->set_userdata('admin_auth',$response);
					print json_encode(array("success"=>TRUE, "status"=>0, "message"=>"Success...First Reset Login Credentials"));
				}
			}else{
				print json_encode(array("error"=>TRUE, "message"=>"Invalid Login Credentials..!!"));
			}
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

	function forget_password_submit()
	{
		if($this->input->post())
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email','email','required|trim|valid_email');
			if ($this->form_validation->run() == FALSE)
			{
				$errors = validation_errors();
				print json_encode(array("error"=>TRUE, "message"=>$errors));
				die;
			}
			else
			{
				$where=array(
					'email'=>$this->input->post('email'),
				);
				$response = $this->common_model->getRecords('users','*',$where,'',true);

				if(!empty($response))
				{
					$token = random_string('nozero', 4).random_string('alnum', 6);
					$data_array['token'] = $token;
					$affacted_rows = $this->common_model->addEditRecords('users', $data_array, $where);

					$this->common_model->setMailConfig();
					$this->email->from(FROM_EMAIL, SITE_TITLE);
					$this->email->to($where['email']);
					$this->email->subject('Welcome to '.SITE_TITLE.'!');
					$link = site_url("admin/reset_password/".$response['unique_id']."/".$token);
					$message = 'Welcome to '.SITE_TITLE.',
					<br />
					<br />
					Please click the following link to verify your account:
					<br />'.$link.' Or use below code to verify account
					<br />
					<br />
					<br />
					Thank You.';
					$this->email->message($message);
					$this->common_model->sendEmail();

					$response_msg = "Please check your email we have sent a verification link on it. Please click on it and verify your email or copy verification code and verify your account.";
					print json_encode(array("success"=>TRUE, "message"=>"$response_msg"));
				}
			}
		}

	}

	function reset_password()
	{
		if($this->admin_auth){redirect('admin');}
		if(!$this->input->post())
		{
			$data['unique_id'] = $where['unique_id'] = $this->uri->segment(3);
			$data['token'] = $where['token'] = $this->uri->segment(4);
			$response = $this->common_model->getRecords('users','*',$where,'',true);

			if(!empty($response))
			{
				$data['title'] = "Reset Password -:Revointeractive Admin";
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/reset_password');
				$this->load->view('admin/includes/footer');
			}
			else
			{
				redirect('admin');
			}
		}
		else
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('password','Password','required|trim|min_length[6]|max_length[20]|matches[rpassword]');
			$this->form_validation->set_rules('rpassword','Confirm Password','required|trim');

			if ($this->form_validation->run() == FALSE)
			{
				 $errors = validation_errors();
				 print json_encode(array("error"=>TRUE, "message"=>$errors));
				 die;
			}
			else
			{
				$data=array(
					'password'=> md5($this->input->post('password')),
					'token'=> '',
				);
				$where['unique_id'] = $this->input->post('unique_id');
				$where['token'] = $this->input->post('token');

				$affacted_rows = $this->common_model->addEditRecords('users', $data, $where);
				if($affacted_rows>0)
				{
					$response_msg = "Password reset successfully";
					print json_encode(array("success"=>TRUE, "message"=>"$response_msg"));
				}
				else
				{
					print json_encode(array("error"=>TRUE, "message"=>"error"));
				}
				die;
			}
		}
	}

	function verify($token)
	{
		$data['title'] = "Verify Account";
		$condition['token'] = $token;
		$response = $this->common_model->getRecords('users', 'id', $condition,"", true);
		if(!empty($response)){
			$where['id'] =$response['id'];
			$data_array['token']='';
			$data_array['status']=1;
			$affacted_rows = $this->common_model->addEditRecords('users', $data_array, $where);

			if($affacted_rows>0) {
				$flashMsg = "Congratulations !! Your account has been verified.!! Please <a href=".site_url('admin').">Click here</a> to login";
				$this->session->set_flashdata('msg', $flashMsg);
				redirect('admin/success');
			}
		}else{
			redirect('admin');
		}
	}

	function success()
	{
		if(!$this->session->flashdata('msg' )) {redirect('admin');}
		$data['title'] = "Success Revointeractive";
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/success');
		$this->load->view('admin/includes/footer');
	}

	public function logout()
	{
		if(!empty($this->admin_auth)){
			$data['title'] = "Logout from Revointeractive";
			$this->session->unset_userdata('admin_auth');
			redirect($this->agent->referrer());
		}else{
			redirect('admin');
		}
	}

	// Common functions

	public function upload_files($path, $files)
    {
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|gif|png',
            'overwrite'     => 1,
        );

        $this->load->library('upload', $config);
        $images = array();

        foreach($files['name'] as $key => $image)
		{
            $_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];
            $_FILES['images[]']['size']= $files['size'][$key];

			$fileName = time().$image;
            $images[] = $fileName;

            $config['file_name'] = $fileName;
			$name[] = $config['file_name'];
            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]'))
			{
                $this->upload->data();
            } else {
                $data = array('error' => $this->upload->display_errors());
            }
        }
		return $name;
    }

	function create_breadcrumb()
	{
		$ci = & get_instance();
		$i = 1;
		$uri = $ci->uri->segment($i);
		$link = '<ul class="page-breadcrumb">';
		while ($uri != '')
		{
			$prep_link = '';
			for ($j = 1; $j <= $i; $j++)
			{
				$prep_link.= $ci->uri->segment($j) . '/';
			}

			if ($ci->uri->segment($i + 1) == '')
			{
				$link.= '<li><a href="' . site_url($prep_link) . '">';
				$link.= $ci->uri->segment($i) . '</a> / </li> ';
			}
			else
			{
				$link.= '<li><a href="' . site_url($prep_link) . '">';
				$link.= $ci->uri->segment($i) . '</a> / </li> ';
			}

			$i++;
			$uri = $ci->uri->segment($i);
		}

		$link.= '</ul>';
		return $link;
	}

	//General Use Functions
	public function check_default($array)
	{
	  foreach($array as $element)
	  {
	    if($element == '0')
	    {
	      return FALSE;
	    }
	  }
	 return TRUE;
	}

	function alpha_dash_space($str_in)
	{
		if (! preg_match("/^([-a-z0-9_ ])+$/i", $str_in))
		{
			$this->form_validation->set_message('alpha_dash_space', 'The %s field may only contain alpha-numeric characters, spaces, underscores, and dashes.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}
