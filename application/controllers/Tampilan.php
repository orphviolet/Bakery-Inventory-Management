<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tampilan extends CI_Controller {

	public function tampilan1(){
		$this->load->view('admin/layout2/header');
		$this->load->view('admin/tampilan1');

	}

	public function tampilan2(){
		$this->load->view('admin/layout2/header');
		$this->load->view('admin/tampilan2');
		$this->load->view('admin/layout2/footer');
	}
	
}


