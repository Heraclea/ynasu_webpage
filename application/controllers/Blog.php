<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
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

		$data['blog'] = $this->home_model->get_blog();
		

		$data['post'] = $this->home_model->get_post();

		$config = array();
		$config["base_url"] = base_url()."blog/index";
		$config["total_rows"] = count($data['post']);
		$config["per_page"] = 5;
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

		$data["items"] = $this->home_model->get_post_page($config["per_page"], $config["per_page"]*$page);
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );

		$data['section'] = $this->load->view('/blog', $data, true); 
		$this->load->view('/template/index', $data);
	}

	public function show(){
		$data = array();
		$data['seo'] = $this->home_model->get_seo();

		$data['language'] = $this->session->userdata('language');
		$data['head'] = $this->load->view('/template/head', $data, true);
		$data['header'] = $this->load->view('/template/second_header', $data, true);


		$data['data_footer'] = $this->home_model->get_footer();
		$data['footer'] = $this->load->view('/template/second_footer', $data, true);

		$data['article'] = $this->home_model->get_post($this->uri->segment(3));
	

		$data['section'] = $this->load->view('/article', $data, true); 
		$this->load->view('/template/index', $data);
	}
}
