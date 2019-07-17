<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Dashboard extends CI_Controller {

		public function __construct(){

			parent::__construct();
		}

		public function index(){		

			$this->load->view('include/header');

			$this->load->view('include/top');

			$this->load->view('include/sidebar');

			$this->load->view('dashboard');

			$this->load->view('include/footer');

		}
			}
?>	