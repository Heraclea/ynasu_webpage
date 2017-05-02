<?php
Class Home_model extends CI_Model {

	function get_banner() {
		$this->db->select('*');
	
		$this->db->from('banner_home');
		$query = $this->db->get();
		return $query->row();
	}

	function get_what_we_do() {
		$this->db->select('*');
		
		$this->db->from('what_we_do');
		$query = $this->db->get();
		return $query->row();
	}

	function get_what_we_do_items() {
		$this->db->select('*');
	
		$this->db->from('what_we_do_items');
		$query = $this->db->get();
		return $query->result();
	}

	function get_what_you_do() {
		$this->db->select('*');
		
		$this->db->from('what_you_do');
		$query = $this->db->get();
		return $query->row();
	}

	function get_brands() {
		$this->db->select('*');
	
		$this->db->from('brands');
		$query = $this->db->get();
		return $query->result();
	}

	function get_testimonials() {
		$this->db->select('*');
	
		$this->db->from('testimonials');
		$query = $this->db->get();
		return $query->row();
	}

	function get_award() {
		$this->db->select('*');
	
		$this->db->from('award');
		$query = $this->db->get();
		return $query->row();
	}

	function get_footer() {
		$this->db->select('*');
		
		$this->db->from('contact');
		$query = $this->db->get();
		return $query->row();
	}

	function get_featured_blog() {
		$this->db->select('*');
		
		$this->db->from('articles');
		
		$this->db->order_by('created_at', 'DESC');
		$this->db->where('actived_radio', 'Si');
	
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}


	function get_history(){
		$this->db->select('*');
		
		$this->db->from('history');
		$query = $this->db->get();
		return $query->row();
	}
	
	function get_mission(){
		$this->db->select('*');
		
		$this->db->from('mission');
		$this->db->order_by('record_order');
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_vision(){
		$this->db->select('*');
		
		$this->db->from('vision');
		$this->db->order_by('record_order');
		$query = $this->db->get();
		return $query->result();
	}

	function get_team(){
		$this->db->select('*');
		
		$this->db->from('team');
		$this->db->order_by('record_order');
		$query = $this->db->get();
		return $query->result();
	}

	function get_work(){
		$this->db->select('*');
		
		$this->db->from('how_it_works');
		$this->db->order_by('record_order');
		$query = $this->db->get();
		return $query->result();
	}

	function get_meet(){
		$this->db->select('*');
		
		$this->db->from('meet');
		$query = $this->db->get();
		return $query->row();
	}

	function get_associations($id = null){
		$this->db->select('*');
		
		$this->db->from('associations');
		if (!is_null($id))
			$this->db->where('id', $id);

		$this->db->order_by('record_order');
		$query = $this->db->get();

		if (!is_null($id))
			return $query->row();

		return $query->result();
	}

	function get_associations_page($limit, $start){
		$this->db->select('*');
		
		$this->db->from('associations');
		$this->db->order_by('record_order', 'ASC');
		$this->db->order_by('updated_at', 'DESC');
		$this->db->limit($limit, $start);

		$query = $this->db->get();
		return $query->result();
	}

	function get_blog(){
		$this->db->select('*');
		
		$this->db->from('blog');

		$query = $this->db->get();
		return $query->row();
	}

	function get_post($id = null){
		$this->db->select('*');
		
		$this->db->from('articles');
		if (!is_null($id))
			$this->db->where('id', $id);

		$this->db->order_by('record_order');
		$this->db->where('actived_radio', 'Si');
		$query = $this->db->get();

		if (!is_null($id))
			return $query->row();

		return $query->result();
	}

	function get_post_page($limit, $start){
		$this->db->select('*');
		
		$this->db->from('articles');
		$this->db->order_by('created_at', 'desc');
		$this->db->where('actived_radio', 'Si');
		$this->db->limit($limit, $start);

		$query = $this->db->get();
		return $query->result();
	}

	function get_seo() {
		$this->db->select('*');
		$this->db->from('configuration');
		$this->db->where('id', 1);
		$query = $this->db->get();
		return $query->row();
	}

	function validate_visitor($email){
		$this->db->select('*');
		
		$this->db->from('visitors');
		$this->db->where('email_text', $email);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows())
			return 'Thank you for verifying your email.';

		return 'This email is not registered, please enter all the data to register.';

	}
	function set_visitor($data){
		$validate = $this->validate_visitor($data['email_text']);

		if ($validate == 'Thank you for verifying your email.') {
			return 'This email is already registered.';
		}else{
			$data['created_at'] = date('Y-m-d h:i:s');
			$this->db->insert('visitors', $data);
			return 'Thank you for registering your information.';
		}
		
	}


	function get_search($word = null){
		$this->db->select('associations.*');
		
		$this->db->from('associations');
		if (!is_null($word)){
			$this->db->join('categories', 'categories.id = associations.categories_relation', 'left');
			$this->db->like('associations.name_text', $word);
			$this->db->or_like('associations.short_description_textarea', $word);
			$this->db->or_like('associations.products_available_list', $word);
			$this->db->or_like('categories.name_text', $word);
		}

		$this->db->order_by('associations.record_order');
		$query = $this->db->get();

		return $query->result();
	}

	function get_search_page($word = null, $limit, $start){
		$this->db->select('associations.*');
		
		$this->db->from('associations');

		if (!is_null($word)){
			$this->db->join('categories', 'categories.id = associations.categories_relation', 'left');
			$this->db->like('associations.name_text', $word);
			$this->db->or_like('associations.short_description_textarea', $word);
			$this->db->or_like('associations.products_available_list', $word);
			$this->db->or_like('categories.name_text', $word);
		}

		$this->db->order_by('associations.record_order');
		$this->db->limit($limit, $start);

		$query = $this->db->get();
		return $query->result();
	}
}