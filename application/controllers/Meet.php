<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meet extends CI_Controller {
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

		$data['meet'] = $this->home_model->get_meet();
		$data['associations'] = $this->home_model->get_associations();

		$config = array();
		$config["base_url"] = base_url()."meet/index";
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

		$data["items"] = $this->home_model->get_associations_page($config["per_page"], $config["per_page"]*$page);
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );


		$data['section'] = $this->load->view('/meet', $data, true); 
		$this->load->view('/template/index', $data);
	}

	public function show(){
		$data = array();
		$data['seo'] = $this->home_model->get_seo();

		$data['required_login'] = false;
		/*if (!$this->session->has_userdata('view')) {
			$this->session->set_userdata('view', true);
			$this->session->set_userdata('association', $this->uri->segment(3));
		}else{
			if ($this->uri->segment(3) == $this->session->association) {
				$data['required_login'] = false;
			}else if (!$this->session->has_userdata('visitor')) {
				$this->session->unset_userdata('association');
				$data['required_login'] = true;
			}
		}*/

		$data['language'] = $this->session->userdata('language');
		$data['head'] = $this->load->view('/template/head', $data, true);
		$data['header'] = $this->load->view('/template/second_header', $data, true);


		$data['data_footer'] = $this->home_model->get_footer();
		$data['footer'] = $this->load->view('/template/second_footer', $data, true);

		$data['item'] = $this->home_model->get_associations($this->uri->segment(3));
	

		$data['section'] = $this->load->view('/association', $data, true); 
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

		$this->email->from('web@ynasu.com', 'Ynasu - Web Page');
		$this->email->to($this->home_model->get_seo()->contact_emails);

		$this->email->subject('Comment Form');
		$this->email->message($body);

		$this->email->send();

		echo 'Your message has been sent successfully.';
	}

	public function order(){
		$config['mailtype'] = 'html';
		$this->email->initialize($config);

		$body =   "
          <html>
	          <body>";
	          foreach ($_POST as $key => $value) {
	            $body .= "<p><b>".str_replace(array('_text', '_'), array('', ' '), $key)."</b>: ".utf8_decode($value)."</p>"; 
	          }
		$body .= "<br></body></html>";

		$this->email->from('web@ynasu.com', 'Ynasu - Web Page');
		$this->email->to($this->home_model->get_seo()->contact_emails);

		$this->email->subject('Order a Simple Form');
		$this->email->message($body);

		$this->email->send();

		echo 'Your message has been sent successfully. We will write to you soon.';
	}

	public function validate(){
	    if (isset($_POST['email_registered']) && !empty($_POST['email_registered'])) {
	    	$email_registered = $_POST['email_registered'];
	    	$response = $this->home_model->validate_visitor($email_registered);

	    	if ($response == "Thank you for verifying your email.")
	    		$this->session->set_userdata('visitor', true);
	    	
	    	echo $response;
	    }else{
	    	unset($_POST['email_registered']);
	    	$visitor = $this->home_model->set_visitor($_POST);

			if ($visitor == 'Thank you for registering your information.') {
				$this->session->set_userdata('visitor', true);

				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				
				$this->email->clear();

		    	if ($_POST['type_text'] == 'Buyer') {
		    		$body =  $this->templateBuyer($_POST['name_text']);
		    	}

		    	if ($_POST['type_text'] == 'Seller') {
		    		$body =  $this->templateSeller($_POST['name_text']);
		    	}

		    	if ($_POST['type_text'] == 'Other') {
		    		$body =  $this->templateOther($_POST['name_text']);
		    	}

		    	$this->email->from('info@ynasu.com', 'Ynasu');
				$this->email->to($_POST['email_text']);

				$this->email->subject('Welcome to the Ynasu network!');
				$this->email->message($body);

				$this->email->send();
			
			}

			echo $visitor;
	   
	    }
	}

	function templateBuyer($name){
		$data = array();
		$data['name'] = $name;
		$data['section'] = $this->load->view('email/buyer', $data, true); 

		return $data['section'];
	}

	function templateSeller($name){
		$data = array();
		$data['name'] = $name;
		$data['section'] = $this->load->view('email/seller', $data, true); 

		return $data['section'];
	}

	function templateOther($name){
		$data = array();
		$data['name'] = $name;
		$data['section'] = $this->load->view('email/other', $data, true); 

		return $data['section'];
	}


}
