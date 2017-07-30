<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class E_book extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Baby Indian';
		$this->load->view('front_include/header', $data);
		$this->load->view('front/e_book');
		$this->load->view('front_include/footer');
	}
}
