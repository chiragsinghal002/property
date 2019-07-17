<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Users extends CI_Controller {
		public function __construct(){
			parent::__construct();

		}

		public function index(){
			
			 $this->load->view('include/header');
			 $this->load->view('include/top');
			 $this->load->view('include/sidebar');
			$this->load->view('userlist');
			 $this->load->view('include/footer');
		}

		public function add(){
			
			   $this->load->view('include/header');
			   $this->load->view('include/top');
			   $this->load->view('include/sidebar');
			$this->load->view('useradd');
			 $this->load->view('include/footer');
		}

		
	}

?>	