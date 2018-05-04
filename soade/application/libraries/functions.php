<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 *  ======================================= 
 *  Author     : Jairo torres 
 *  License    : Protected
  
    $data[] = $comment = array(
					'date' => date('Y-m-d'),
					'time' => date('H:i'),
					'user' => ($post['name'] ? $post['name'] : 'anonymous'),
					'text' => substr($post['text'], 0, 200)
				); 
 
    $comments = array();
	$dataFile = dirname(__FILE__).'/'.$pageId.'.comments.dat';
	$dataStr = is_file($dataFile) ? file_get_contents($dataFile) : null;
	$data = $dataStr ? json_decode($dataStr) : null;

 */  
require_once APPPATH . "/third_party/PHPExcel.php";

class Functions {

    public function __construct() {
        parent::__construct();
    }
	
	public function is_mail($mail) {
		if (preg_match("/^[0-9a-zA-Z\.\-\_]+\@[0-9a-zA-Z\.\-\_]+\.[0-9a-zA-Z\.\-\_]+$/is", trim($mail)))
			return $mail;
		return "";
    }

	public function mini_text($text) {
		return trim(substr(strip_tags($text), 0, 100), " \n\r\t\0\x0B.").'...';
	}

}
