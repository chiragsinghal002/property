<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends CI_Controller {

    
 
     








	public function __construct(){
		parent::__construct();
		$this->load->model('common_model');
	}	




       // for  categoryss
		public function delete_dealer($id = 0){
			$this->db->delete('dealer', array('dealer_id' => $id));
			
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('index.php/listing/dealers'));
		}
	/*Close*/




	public function category($id = 0){
		$this->db->delete('property_category', array('cat_id' => $id));
		$this->db->delete('property_subcategory', array('cat_id' => $id));
		$this->db->delete('property_subchildcategory', array('cat_id' => $id));
		$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
		redirect(base_url('index.php/listing/'));
	}

	// for sub category
	public function subcategory($id = 0){
		$this->db->delete('property_subcategory', array('subcat_id' => $id));
		$this->db->delete('property_subchildcategory', array('subcat_id' => $id));
		$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
		redirect(base_url('index.php/listing/subcategory'));
	}

	// for sub child  category
	public function subchildcategory($id = 0){
		$this->db->delete('property_subchildcategory', array('subchild_id' => $id));
		$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
		redirect(base_url('index.php/listing/subchildcategory'));
	}

	// for size
	public function size($id = 0){
		$this->db->delete('property_size', array('size_id' => $id));
		$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
		redirect(base_url('index.php/listing/size'));
	}

	// for price range
	public function price_range($id = 0){
		$this->db->delete('price_range', array('id' => $id));
		$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
		redirect(base_url('index.php/listing/price_range'));
	}

	// for bedroom
	public function bedroom($id = 0){
		$this->db->delete('bedroom', array('id' => $id));
		$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
		redirect(base_url('index.php/listing/bedroom'));
	}

	public function property_type($id = 0){
		$this->db->delete('property_type', array('type_id' => $id));
		$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
		redirect(base_url('index.php/listing/property_type'));
	}

	

	

	

}


?>