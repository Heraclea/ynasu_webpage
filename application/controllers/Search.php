<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model('home_model');
		$this->load->library('pagination');
	}

	public function index(){
		$data = array();
		$data['seo'] = $this->home_model->get_seo();

		$data['language'] = $this->session->userdata('language');
		$data['head'] = $this->load->view('/template/head', $data, true);
		$data['header'] = $this->load->view('/template/second_header', $data, true);


		$data['data_footer'] = $this->home_model->get_footer();
		$data['footer'] = $this->load->view('/template/second_footer', $data, true);

		$data['associations'] = $this->home_model->get_search();

		$config = array();
		$config["base_url"] = base_url()."search/index";
		$config["total_rows"] = count($data['associations']);
		$config["per_page"] = 9;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = 5;
		$config["uri_segment"] = 3;

		$config['cur_tag_open'] = '<a class="active">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = '<img src="'.base_url().'assets/img/icons/p-n.png">';
		$config['prev_link'] = '<img src="'.base_url().'assets/img/icons/p-p.png">';

		$this->pagination->initialize($config);
		$this->pagination->create_links();

		if($this->uri->segment(3))
			$page = ($this->uri->segment(3))-1;
		else
			$page = 0;

		$data["items"] = $this->home_model->get_search_page($_GET['keyword'], $config["per_page"], $config["per_page"]*$page);
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );


		$data['section'] = $this->load->view('/search', $data, true); 
		$this->load->view('/template/index', $data);
	}
}