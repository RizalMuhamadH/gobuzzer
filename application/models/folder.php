<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Folder extends CI_Model {
    function createFolder($dateNow){
		$newDate = str_replace('-', '', $dateNow);
		$path = 'assets/img/'.$newDate;

		if(!file_exists('./assets/img/'.$newDate)){
		   mkdir('./assets/img/'.$newDate, 0777, TRUE);
		}

		return $path;
	}
}