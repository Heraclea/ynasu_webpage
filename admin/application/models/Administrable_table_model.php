<?php 
Class Administrable_table_model extends CI_Model {

	function get_tables($father = null){
		$this->db->select('*');
		$this->db->from('administrable_table');

		if (is_null($father))
			$this->db->where('father', 0);
		else
			$this->db->where('father', $father);

		$query = $this->db->get();
		return $query->result();
	}

	function get_table($table){
		$this->db->select('*');
		$this->db->from(strtolower($table));

		$query = $this->db->get();
		return $query->result();
	}

	function get_fields_table($table){
		$sql = "SHOW FULL COLUMNS FROM ".strtolower($table);
		$query = $this->db->query($sql);
		return $query->result();			
	}

	function get_records_table($table){
		$this->db->select('*');
		$this->db->from(strtolower($table));
		$this->db->order_by('record_order', 'ASC');
		$this->db->order_by('updated_at', 'DESC');

		$query = $this->db->get();
		return $query->result();
	}

	function get_num_records_table($table){
		$this->db->select('COUNT(*) AS count');
		$this->db->from(strtolower($table));

		$query = $this->db->get();
		return $query->row('count');
	}

	function get_record_table($table, $record){
		$this->db->select('*');
		$this->db->from(strtolower($table));
		$this->db->where('id', $record);

		$query = $this->db->get();
		return $query->row();
	}

	function delete_record_table($table, $record){
		$this->db->where('id', $record);
		$this->db->delete($table);
	}

	function order_records_table($table, $records){
		for ($i=0; $i < count($records); $i++) { 
			$this->db->set('record_order', $records[$i]['order']);
			$this->db->set('updated_at', date('Y-m-d h:i:s'));
			$this->db->where('id', $records[$i]['id']);
			$this->db->update($table);
		}
	}

	function get_files_gallery($gallery){
		$this->db->select('*');
		$this->db->from('upload');
		$this->db->order_by('order');
		$this->db->where('gallery_id', $gallery);

		$query = $this->db->get();
		return $query->result();
	}

	function save_table($table, $record, $data){
		unset($data['current_table']);
		unset($data['record_id']);

		if (is_null($record)) {
			$data['created_at'] = date('Y-m-d h:i:s');
			$this->db->insert(strtolower($table), $data);
			return $this->db->insert_id();
		}else{
			$data['updated_at'] = date('Y-m-d h:i:s');
			$this->db->where('id', $record);
			$this->db->update(strtolower($table), $data);
		}
	}

	function save_files_gallery($gallery, $table, $file){
		$this->db->set('gallery_id', $gallery);
		$this->db->set('folder', strtolower($table));
		$this->db->set('file', $file);
		$this->db->set('created_at', date('Y-m-d h:i:s'));
		$this->db->insert('upload');
	}

	function delete_files_gallery($file){
		$this->db->where('id', $file);
		$this->db->delete('upload');
	}

	function delete_field_files($data){
		$this->db->where('id', $data['record']);
		$this->db->update($data['table'], array( $data['field'] => ''));
	}

	function order_files_gallery($data){
		$file = $data['id'];
		unset($data['id']);
		$this->db->where('id', $file);
		$this->db->update('upload', $data);
	}
}