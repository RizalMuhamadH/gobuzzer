<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Folder extends CI_Model {
    function createFolder($dateNow){
		$newDate = str_replace('-', '', $dateNow);
		$path = 'assets/img/';

		if(!file_exists('./assets/img/capture_buzzer')){
		   mkdir('./assets/img/capture_buzzer', 0777, TRUE);
		}

		return $path;
	}
}