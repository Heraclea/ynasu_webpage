<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
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
		$data['footer'] = "";

		$data['home'] = $this->home_model->get_footer();
	

		$data['section'] = $this->load->view('/contact', $data, true); 
		$this->load->view('/template/index', $data);
	}

	public function send(){
		$config['mailtype'] = 'html';
		$this->email->initialize($config);

		$body =   "
          <html>
	          <body>";
	          foreach ($_POST as $key => $value) {
	            $body .= "<p><b>".str_replace(array('_text', '_'), array('', ' '), $key)."</b>: ".utf8_decode($value)."</p>"; 
	          }
		$body .= "<br></body></html>";

		$this->email->from('web@ynasu.com', 'YNASU - Web Page');
		$this->email->to($this->home_model->get_seo()->contact_emails);

		$this->email->subject('Contact Form');
		$this->email->message($body);

		$this->email->send();

		echo 'Your message has been sent successfully. We will write to you soon.';
	}
}
