<?php

class Dropdowns extends CI_Controller {

   public function __construct() { 
      parent::__construct();
      $this->load->database();

      $this->load->model('common_model');
   }

   public function index() {

    $data['countries'] =  $this->common_model->get_allcuisines();    
      $this->load->view('dependent_dropdown', $data);
       
      // $countries = $this->db->get("cuisines")->result();

      // $this->load->view('dependent_dropdown', array('cuisines' => $countries )); 
   } 

   public function getStateList($id) {
   echo $id; 
       $states = $this->db->where("cuisine_id",$id)->get("subcuisines")->result();
       echo json_encode($states);
   }


} 


?>