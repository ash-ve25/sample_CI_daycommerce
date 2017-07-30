<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller
{
	public $user_auth;
	public function __construct()
	{
        parent::__construct();
		$this->load->model(array('common_model','user_model'));
		$this->load->library('form_validation');
		// if($this->session->userdata('user_auth'))
		// {
		// 	$user_auth = $this->session->userdata('user_auth');
		// 	$this->user_auth = $this->common_model->getRecords('admin','*',array('admin_id ' => $user_auth['admin_id']),'',true);
		// }
    }

	public function index()
	{
		if($this->session->userdata('user_auth')) {redirect('account');}

		$data['title'] = 'Baby Indian | Sign-in';
		$this->load->view('front_include/header', $data);
		$this->load->view('front/signin');
		$this->load->view('front_include/footer');
	}

	public function login()
	{
		if($this->session->userdata('user_auth')){redirect('dashboard');}

		$this->form_validation->set_rules('email','Email','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim');

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
			$response = $this->user_model->check_login_credentials($data);
			if(!empty($response)){
				if($response['status']==1){
					$this->session->set_userdata('user_auth',$response);
					$this->session->unset_userdata('page_referrer');
					print json_encode(array("success"=>TRUE, "message"=>"Please wait while we redirect!!"));
				}else if($response['status']==0){
					$this->session->set_userdata('user_auth',$response);
					print json_encode(array("success"=>TRUE, "status"=>0, "message"=>"Success...First Reset Login Credentials"));
				}
			}else{
				print json_encode(array("error"=>TRUE, "message"=>"Invalid Login Credentials..!!"));
			}
		}
	}

	function forget_password_submit()
	{
		if($this->session->userdata('user_auth')) {redirect('dashboard');}

		if($this->input->post())
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email','email','required|trim|valid_email|');
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
				$response = $this->common_model->getRecords('ci_user','*',$where,'',true);

				if(!empty($response))
				{
					$token = random_string('nozero', 4).random_string('alnum', 6);
					$data_array['token'] = $token;
					$affacted_rows = $this->common_model->addEditRecords('ci_user', $data_array, $where);

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

	public function submit()
	{
		$this->form_validation->set_rules('email','Email','required|valid_email|trim|is_unique[ci_user.email]');
		$this->form_validation->set_rules('date','Birth/Due Date','required');

		if ($this->form_validation->run() == FALSE)
		{
			$errors = validation_errors();
			print json_encode(array("error"=>TRUE, "message"=>$errors));
			die;
		}
		else
		{
			$data=array(
				'email'=> $this->input->post('email'),
				'password'=> md5(mt_rand(100000, 999999)),
				'birth_due_date'=> $this->input->post('date'),
				'status'=> 0,
				'is_active'=> 0
			);

			$response = $this->common_model->addEditRecords('ci_user', $data);
			if(!empty($response))
			{
				$this->common_model->setMailConfig();
				$this->email->from(FROM_EMAIL, SITE_TITLE);
				$this->email->to($this->input->post('email'));
				$this->email->subject('Welcome to '.SITE_TITLE.'!');
				$link = base_url().'signin';
				$message = 'Welcome to '.SITE_TITLE.',
				<br />
				<br />
				Your register email: '.$this->input->post('email').'
				Your Password: '.$this->input->post('password').'
				<br />'.$link.' Or use below code to verify account
				<br />
				<br />
				<br />
				Thank You.';
				$this->email->message($message);
				$this->common_model->sendEmail();

				$data = $this->common_model->get_single_record('ci_user', 'user_id', $response);

				$this->session->set_userdata('user_auth',$data);
				$this->session->set_userdata('status', 0);
				print json_encode(array("success"=>TRUE, "id"=>$data['user_id'], "message"=>"Thank for subscribe. Please check your mail to get password of your account."));
			}else{
				print json_encode(array("error"=>TRUE, "message"=>"Error"));
			}
		}
	}
}
