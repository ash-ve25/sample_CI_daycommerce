<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
	public $admin_auth;
	public function __construct()
	{
        parent::__construct();
		$this->load->model(array('common_model'));
		// $this->load->model(array('common_model','admin_model'));
		// if($this->session->userdata('admin_auth'))
		// {
		// 	$admin_auth = $this->session->userdata('admin_auth');
		// 	$this->admin_auth = $this->common_model->getRecords('admin','*',array('admin_id ' => $admin_auth['admin_id']),'',true);
		// }
    }

	public function index()
	{
		$data['title'] = 'Baby Indian';
		$this->load->view('front_include/header', $data);
		$this->load->view('front/home');
		$this->load->view('front_include/footer');
	}

	public function subscribe()
	{
		$data['title'] = 'Baby Indian';
		$this->load->view('front_include/header', $data);
		$this->load->view('front/subscribe');
		$this->load->view('front_include/footer');
	}
}
