<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Baby extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Baby Indian';
		$this->load->view('front_include/header', $data);
		$this->load->view('front/baby');
		$this->load->view('front_include/footer');
	}
}
