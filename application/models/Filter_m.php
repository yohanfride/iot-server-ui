<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class filter_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			

	function get_detail($id){
		$data = array(
			"filter_code" => $id
		);
		$url = $this->config->item('url_node')."filter/detail/";				
		return json_decode($this->sendPost($url,$data));
	}

	function add($data){
		$url = $this->config->item('url_node')."filter/add/";				
		return json_decode($this->sendPost($url,$data));
	}

	function edit($id,$data){
		$data+=["id" => $id];
		$url = $this->config->item('url_node')."filter/edit/";				
		return json_decode($this->sendPost($url,$data));
	}
	
	function del($id){
		$data = array(
			"id" => $id
		);
		$url = $this->config->item('url_node')."filter/delete/";				
		return json_decode($this->sendPost($url,$data));
	}	

	function search($data){
		$url = $this->config->item('url_node')."filter/";				
		$result =  json_decode($this->sendPost($url,$data));
		if(!$result->status)
			$result->data = array();
		return $result;
	}

	function search_count($data){
		$url = $this->config->item('url_node')."filter/count/";				
		return json_decode($this->sendPost($url,$data));
	}

	// function datasensor($device,$data){
	// 	$url = $this->config->item('url_node')."filter/data/".$device."/";				
	// 	$result =  json_decode($this->sendPost($url,$data));
	// 	if(!$result->status)
	// 		$result->data = array();
	// 	return $result;
	// }

	// function count_datasensor($filter,$data){
	// 	$url = $this->config->item('url_node')."filter/data/".$filter."/count/";				
	// 	$result =  json_decode($this->sendPost($url,$data));
	// 	if(!$result->status)
	// 		$result->data = 0;
	// 	return $result;
	// }

	// function add_other($data){
	// 	$url = $this->config->item('url_node')."filter/add/other/";				
	// 	return json_decode($this->sendPost($url,$data));
	// }

	// function edit_other($id,$data){
	// 	$data+=["id" => $id];
	// 	$url = $this->config->item('url_node')."filter/edit/other/";				
	// 	return json_decode($this->sendPost($url,$data));
	// }
	
	// function del_other($id){
	// 	$data = array(
	// 		"id" => $id
	// 	);
	// 	$url = $this->config->item('url_node')."filter/delete/other/";				
	// 	return json_decode($this->sendPost($url,$data));
	// }
	
	// function get_com_chanel($data){
	// 	$url = $this->config->item('url_node')."comchannel/detail/";				
	// 	return json_decode($this->sendPost($url,$data));
	// }

    function simulation($device,$data){
		$url = $this->config->item('url_node')."filter/simulation/".$device."/";			
		$result =  json_decode($this->sendPost($url,$data));
		if(!$result->status)
			$result->data = array();
		return $result;
	}

	function summary($device,$data){
		$url = $this->config->item('url_node')."filter/summary/".$device."/";			
		$result =  json_decode($this->sendPost($url,$data));
		if(!$result->status)
			$result->data = array();
		return $result;
	}
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_Model.php */
