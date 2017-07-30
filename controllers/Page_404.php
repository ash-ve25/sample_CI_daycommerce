<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_404 extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Baby Indian';
		$this->load->view('front_include/header', $data);
		$this->load->view('front/page_404');
		$this->load->view('front_include/footer');
	}
}
