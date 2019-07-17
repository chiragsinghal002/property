<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Listing extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('common_model');
	}
	public function index(){

		$id = $this->session->userdata('admin_id');
		 if(!empty($_GET) && $_GET['submit']=="Search")
			 {

			     $data['all_info'] =  $this->common_model->get_allcategory($_GET);
			 }else{
			 	$data['all_info'] =  $this->common_model->get_allcategory($_GET);

			 }	

		// echo "<pre>";

		// print_r($data['all_info']);

		

		$this->load->view('include/header');

		$this->load->view('include/top');

		$this->load->view('include/sidebar');

		$this->load->view('lists/category', $data);

		$this->load->view('include/footer');



	}



	public function property_type(){

		$id = $this->session->userdata('admin_id');

		$data['all_info'] =  $this->common_model->get_allproperty_type();

		// echo "<pre>";

		// print_r($data['all_info']);

		

		$this->load->view('include/header');

		$this->load->view('include/top');

		$this->load->view('include/sidebar');

		$this->load->view('lists/property_type', $data);

		$this->load->view('include/footer');



	}



	/*Get All Properties by Dealer Id*/
	public function getAllProperties($dealer_id = 0){

		// $id = $this->session->userdata('admin_id');
		// echo $dealer_id;die;
		$data['all_resiproperty'] =  $this->common_model->getResidencialProperty($dealer_id);
		$data['all_commproperty'] =  $this->common_model->getCommercialProperty($dealer_id);
		// echo "<pre>";
		// print_r($data['all_resiproperty']);die;
		$this->load->view('include/header');

		$this->load->view('include/top');

		$this->load->view('include/sidebar');

		$this->load->view('lists/dealerproperties', $data);

		$this->load->view('include/footer');



	}

	/*Close All properties By Dealer Id*/



	public function manage_property($ids = 0){

		$id = $this->session->userdata('admin_id');
		// echo $id; die;

		$data['dealers'] =  $this->common_model->get_allDealers();
		// $data['property'] =  $this->common_model->get_dealerpropertyresidence($ids);
		// $data['commerisal'] =  $this->common_model->get_dealerpropertyCommercial($ids);

		// echo "<pre>";

		// print_r($data['dealers']);

		$this->load->view('include/header');

		$this->load->view('include/top');

		$this->load->view('include/sidebar');

		$this->load->view('lists/manage_property', $data);

		$this->load->view('include/footer');



	}



	public function manage_property_filter(){

		$dealer_name=$this->input->post('dealer_name');

		$property_type=$this->input->post('property_type');

		$id = $this->session->userdata('admin_id');

		$data['property'] =  $this->common_model->get_allproperty_filter($dealer_name,$property_type);

		// echo "<pre>";

		// print_r($data['all_info']);

		$this->load->view('include/header');

		$this->load->view('include/top');

		$this->load->view('include/sidebar');

		$this->load->view('lists/manage_property', $data);

		$this->load->view('include/footer');



	}



	public function dealers(){

		$id = $this->session->userdata('admin_id');
		$data['all_info'] =  $this->common_model->get_allDealers();

		// echo "<pre>";

		// print_r($data['all_info']);

		

		$this->load->view('include/header');

		$this->load->view('include/top');

		$this->load->view('include/sidebar');

		$this->load->view('lists/dealers', $data);

		$this->load->view('include/footer');



	}

	



	public function subcategory(){

		$id = $this->session->userdata('admin_id');

		$data['subcategory'] =  $this->common_model->get_subcategory($_GET);
		//$data['subcategoryfilter'] =  $this->common_model->get_subcategoryfilter();
		$data['categoryfilter'] =  $this->common_model->get_all_categoryfilter();

		if(!empty($_GET) && $_GET['submit']=="Search")
			 {
			 $data['subcategory'] =  $this->common_model->get_subcategory($_GET);		
		}else{
			 $data['subcategoryfilter'] =  $this->common_model->get_subcategoryfilter();	

			 }

		// echo "<pre>";

		// print_r($data['all_info']);

		

		$this->load->view('include/header');

		$this->load->view('include/top');

		$this->load->view('include/sidebar');

		$this->load->view('lists/subcategory', $data);

		$this->load->view('include/footer');



	}



	public function subchildcategory(){

		$id = $this->session->userdata('admin_id');

		$data['subchildcategory'] =  $this->common_model->get_subchildcategory($_GET);
		$data['categoryfilter'] =  $this->common_model->get_all_categoryfilter();
	$data['subcategory'] =  $this->common_model->get_allsubcategoryfilter();

		if(!empty($_GET) && $_GET['submit']=="Search")
			 {
			 	// echo "<pre>";
			 	// print_r($_GET);

			 $data['subchildcategory'] =  $this->common_model->get_subchildcategory($_GET);		
		}else{
			 $data['subcategoryfilter'] =  $this->common_model->get_subcategoryfilter();	

			 }

		// echo "<pre>";

		// print_r($data['subchildcategory']);die;

		

		$this->load->view('include/header');

		$this->load->view('include/top');

		$this->load->view('include/sidebar');

		$this->load->view('lists/subchildcategory', $data);

		$this->load->view('include/footer');



	}



	public function unit_size(){

		$id = $this->session->userdata('admin_id');

		$data['subchildcategory'] =  $this->common_model->get_unit_size();

		// echo "<pre>";

		// print_r($data['all_info']);

		

		$this->load->view('include/header');

		$this->load->view('include/top');

		$this->load->view('include/sidebar');

		$this->load->view('lists/unit_size', $data);

		$this->load->view('include/footer');



	}



	public function size(){

		$id = $this->session->userdata('admin_id');

		$data['size'] =  $this->common_model->get_size();

		// var_dump($data['size']);die;

		$this->load->view('include/header');

		$this->load->view('include/top');

		$this->load->view('include/sidebar');

		$this->load->view('lists/size', $data);

		$this->load->view('include/footer');



	}



	public function price_range(){

		$id = $this->session->userdata('admin_id');

		$data['price_range'] =  $this->common_model->get_pricerange();

		// echo "<pre>";

		// print_r($data['all_info']);

		

		$this->load->view('include/header');

		$this->load->view('include/top');

		$this->load->view('include/sidebar');

		$this->load->view('lists/price_range', $data);

		$this->load->view('include/footer');



	}



	public function bedroom(){

		$id = $this->session->userdata('admin_id');

		$data['bedroom'] =  $this->common_model->get_bedroom();

		// echo "<pre>";

		// print_r($data['all_info']);

		

		$this->load->view('include/header');

		$this->load->view('include/top');

		$this->load->view('include/sidebar');

		$this->load->view('lists/bedroom', $data);

		$this->load->view('include/footer');



	}

	

	



	



}





?>