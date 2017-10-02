<?php if (!defined('BASEPATH'))
exit('No direct script access allowed');

class GoogleURL_model extends CI_Model {

	private $apiURL = 'https://www.googleapis.com/urlshortener/v1/url'; 


	public function __construct(){
		parent::__construct();
		$apiKey="AIzaSyCziOymgdq7wgFW9tlO_8SnM9MKFt8gAuY";
		$this->apiURL = $this->apiURL . '?key=' . $apiKey; 

	}

	public function encode($url) { 
		$data = $this->cURL($url, true); 
		return isset($data->id) ? $data->id : '' ; 
	}

	public function decode($url) { 
		$data = $this->cURL($url, false); 
		return isset($data->longUrl) ? $data->longUrl : '' ; 
	} 

	private function cURL($url, $post = true) { 
		$ch = curl_init(); 
		if ($post) { 
			curl_setopt( $ch, CURLOPT_URL, $this->apiURL );
			curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json') ); 
			curl_setopt( $ch, CURLOPT_POST, true ); 
			curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode(array('longUrl' => $url)) ); 
		} 
		else { 
			curl_setopt( $ch, CURLOPT_URL, $this->apiURL . '&shortUrl=' . $url ); 
		} 
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false ); 
		$json = curl_exec($ch); curl_close($ch); 
		return (object) json_decode($json); 
	}





}