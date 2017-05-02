<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_images_gallery')){
    function get_images_gallery($gallery){
    	$CI = &get_instance();
    	$CI->load->database();
    	$sql = "SELECT * FROM upload WHERE gallery_id = '".$gallery."' ORDER BY 'order'";
		$query = $CI->db->query($sql);
		return $query->result();
    }   
}

if ( ! function_exists('multirelacion_data')){
    function multirelacion_data($data, $table){
    	$CI = &get_instance();
    	$CI->load->database();
    	$data = explode(',', $data);
    	$response = array();
    	for ($i=0; $i < count($data) ; $i++) { 
    		$sql = "SELECT * FROM $table WHERE id = '".$data[$i]."'";
			$query = $CI->db->query($sql);
			array_push($response, $query->row());
    	}
    	return $response;
    }   
}

if ( ! function_exists('clip_text')){
    function clip_text($text, $limit = 300){   
        $text = trim($text);
        $text = strip_tags($text);
        $size = strlen($text);
        $result = '';
        if($size <= $limit){
            return $text;
        }else{
            $text = substr($text, 0, $limit);
            $words = explode(' ', $text);
            $result = implode(' ', $words);
            $result .= '...';
        }   
        return $result;
    }
}

if ( ! function_exists('url_encode')){
    function url_encode($text){   
        $text = str_replace(' ', '_', $text);
        $text = sanitize($text);
        $text = strtolower($text);
        return urlencode($text);
    }
}

if ( ! function_exists('sanitize')){
    function sanitize($string){
     
        $string = trim($string);
     
        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );
     
        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );
     
        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );
     
        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );
     
        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );
     
        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C',),
            $string
        );     
     
        return $string;
    }
}

if ( ! function_exists('authenticate')){
    function authenticate(){
        $CI = & get_instance();
        $user = $CI->session->userdata('logged_front');

        if (empty($user['name']) || empty($user['user_id']) )
            redirect('/', 'refresh');
    }   
}

if ( ! function_exists('verify_favorite')){
    function verify_favorite($user, $property){
        $CI = &get_instance();
        $CI->load->database();
        $sql = "SELECT * FROM favorites WHERE user_id = '".$user."' AND property_id = '".$property."'";
        $query = $CI->db->query($sql);
        if ($query->num_rows() > 0)
            return true;
        
        return false;
    }   
}


if ( ! function_exists('config_mail')){
    function config_mail(){
        return $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => '465',
                'smtp_user' => 'david.ardila@imaginamos.com.co',
                'smtp_pass' => 'Dvt94012213705',
                'wordwrap' => TRUE,
                'charset' => 'iso-8859-1',
                'mailtype' => 'html'
            );
    }   
}