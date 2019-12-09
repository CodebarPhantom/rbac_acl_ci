<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Errorpage extends CI_Controller{
  function __construct(){
    parent::__construct();
    
  }


	function error404(){
		$this->load->view('error404');
  }
  
  function error403(){
		$this->load->view('error403');
	}
}