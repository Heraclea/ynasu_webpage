<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model('home_model');
	}

	public function index(){
		$data = array();
		$data['seo'] = $this->home_model->get_seo();
		
		$data['head'] = $this->load->view('/template/head', $data, true);
		$data['header'] = $this->load->view('/template/header', $data, true);

		$data['banner'] = $this->home_model->get_banner();
		$data['what_we_do'] = $this->home_model->get_what_we_do();
		$data['what_we_do_items'] = $this->home_model->get_what_we_do_items();
		$data['what_you_do'] = $this->home_model->get_what_you_do();
		$data['brands'] = $this->home_model->get_brands();
		$data['testimonials'] = $this->home_model->get_testimonials();
		$data['award'] = $this->home_model->get_award();
		$data['blog'] = $this->home_model->get_featured_blog();

		$data['data_footer'] = $this->home_model->get_footer();
		$data['footer'] = $this->load->view('/template/footer', $data, true);

		$data['section'] = $this->load->view('/home', $data, true); 
		$this->load->view('/template/index', $data);
	}

	public function sendEmail(){
		$config['mailtype'] = 'html';
		$this->email->initialize($config);

		$body =   "
          <html>
	          <body>";
	          foreach ($_POST as $key => $value) {
	            $body .= "<p><b>".str_replace(array('_text', '_'), array('', ' '), $key)."</b>: ".utf8_decode($value)."</p>"; 
	          }
		$body .= "<br></body></html>";

		$this->email->from('web@heraclea.com', 'HeraClea - Página Web');
		$this->email->to($this->home_model->get_seo()->contact_emails);

		$this->email->subject('Formulario de contacto');
		$this->email->message($body);

		$this->email->send();

		if ($this->session->userdata('language') == 'es'){
			echo 'Tu mensaje ha sido enviado exitosamente. Pronto nos comunicaremos contigo.';
		}else{
			echo 'Your message has been sent successfully. We will write to you soon.';
		}
	}
}
