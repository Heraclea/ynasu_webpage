<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HowItWorks extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model('home_model');
	}

	public function index(){
		$data = array();
		$data['seo'] = $this->home_model->get_seo();

		$data['language'] = $this->session->userdata('language');
		$data['head'] = $this->load->view('/template/head', $data, true);
		$data['header'] = $this->load->view('/template/second_header', $data, true);


		$data['data_footer'] = $this->home_model->get_footer();
		$data['footer'] = $this->load->view('/template/second_footer', $data, true);

		$data['work'] = $this->home_model->get_work();
	

		$data['section'] = $this->load->view('/how-it-works', $data, true); 
		$this->load->view('/template/index', $data);
	}
}
