<?php

class Common_model extends CI_Model{



		// Start Category Section



	public function add_category($data){

		$this->db->insert('property_category', $data);

		return true;

			//return true;

	}



	public function add_subcategory($data){

		$this->db->insert('property_subcategory', $data);

		return true;

			//return true;

	}



	public function add_childsubcategory($data){

		$this->db->insert('property_subchildcategory', $data);

		return true;

			//return true;

	}



	public function unit_size($data){

		$this->db->insert('unit_size', $data);

		return true;

			//return true;

	}



	public function add_size($data){

		$this->db->insert('property_size', $data);

		return true;

			//return true;

	}



	public function add_price_range($data){

		$this->db->insert('price_range', $data);

		return true;

			//return true;

	}



	public function add_bedroom($data){

		$this->db->insert('bedroom', $data);

		return true;

			//return true;

	}

	public function get_allcategory($search){
		//echo "<pre>";
		// print_r($search);die;

		$this->db->select('*');

		$this->db->from('property_category');
		 if(!empty($search) && $search['cat_name']!="")
            {  
            $this->db->like('property_category.cat_name', $search['cat_name']);          	
	    	   // $this->db->where(array('property_category.cat_name' => $search['cat_name']));
            }

		$this->db->order_by("property_category.cat_id", "desc");

		$query = $this->db->get();	

		return $result = $query->result_array();

	}

    
    /*My*/
          
          


    /*Close*/




	public function get_all_categoryfilter(){
		
		$this->db->select('*');

		$this->db->from('property_category');
		 
		$this->db->order_by("property_category.cat_id", "desc");

		$query = $this->db->get();	

		return $result = $query->result_array();

	}

	public function get_allsubcategoryfilter(){
		
		$this->db->select('*');

		$this->db->from('property_subcategory');
		 
		$this->db->order_by("property_subcategory.cat_id", "desc");

		$query = $this->db->get();	

		return $result = $query->result_array();

	}


public function get_subcategoryfilter(){

		$this->db->select('property_subcategory.*,property_category.cat_name');

		$this->db->from('property_subcategory');

		$this->db->join('property_category', 'property_category.cat_id = property_subcategory.cat_id');

		$this->db->order_by("property_category.cat_id", "desc");
		$this->db->group_by("property_subcategory.cat_id");

		$query = $this->db->get();	

		return $result = $query->result_array();

	}


	public function get_subcategory($search){

		$this->db->select('property_subcategory.*,property_category.cat_name');

		$this->db->from('property_subcategory');

		$this->db->join('property_category', 'property_category.cat_id = property_subcategory.cat_id');
		if(!empty($search) && $search['cat_id']!="")
            {  
            $this->db->like('property_subcategory.cat_id', $search['cat_id']);          	
	    	   // $this->db->where(array('property_category.cat_name' => $search['cat_name']));
            }
            if(!empty($search) && $search['subcat_name']!="")
            {  
            $this->db->like('property_subcategory.subcat_name', $search['subcat_name']);          	
	    	   // $this->db->where(array('property_category.cat_name' => $search['cat_name']));
            }
            if(!empty($search) && $search['property_type']!="")
            {  
            $this->db->like('property_subcategory.property_type', $search['property_type']);          	
	    	   // $this->db->where(array('property_category.cat_name' => $search['cat_name']));
            }


		$this->db->order_by("property_category.cat_id", "desc");

		$query = $this->db->get();	

		return $result = $query->result_array();

	}

	public function get_subchildcategory($search){

		$this->db->select('property_subchildcategory.*,property_category.cat_name,property_subcategory.subcat_name');

		$this->db->from('property_subchildcategory');

		$this->db->join('property_category', 'property_category.cat_id = property_subchildcategory.cat_id');

		$this->db->join('property_subcategory', 'property_subchildcategory.subcat_id = property_subcategory.subcat_id','left');

		if(!empty($search) && $search['cat_id']!="")
            {  
            $this->db->like('property_subchildcategory.cat_id', $search['cat_id']);          	
	    	   // $this->db->where(array('property_category.cat_name' => $search['cat_name']));
            }
            if(!empty($search) && $search['subcat_id']!="")
            {  
            $this->db->like('property_subchildcategory.subcat_id', $search['subcat_id']);          	
	    	   // $this->db->where(array('property_category.cat_name' => $search['cat_name']));
            }
            if(!empty($search) && $search['subchild_name']!="")
            {  
            $this->db->like('property_subchildcategory.subchild_name', $search['subchild_name']);          	
	    	   // $this->db->where(array('property_category.cat_name' => $search['cat_name']));
            }
            if(!empty($search) && $search['property_type']!="")
            {  
            $this->db->like('property_subchildcategory.property_type', $search['property_type']);          	
	    	   // $this->db->where(array('property_category.cat_name' => $search['cat_name']));
            }

		$this->db->order_by("property_subchildcategory.subchild_id", "desc");

		$query = $this->db->get();	

		return $result = $query->result_array();

	}



	public function get_allproperty(){

		$this->db->select('properties.*,dealer.*');

		$this->db->from('properties');

		$this->db->join('dealer','properties.dealer_id = dealer.dealer_id');

		$this->db->order_by("properties.property_id", "desc");

		$query = $this->db->get();	

		return $result = $query->result_array();

	}

	public function get_dealerpropertyresidence($id){

		$this->db->select('dealer.*,residential_properties.*');

		$this->db->from('dealer');

		//$this->db->join('dealer','properties.dealer_id = dealer.dealer_id');
		$this->db->join('residential_properties','dealer.dealer_id = residential_properties.dealer_id');
		$this->db->where(array("residential_properties.dealer_id"=>$id));

		//$this->db->order_by("properties.property_id", "desc");

		$query = $this->db->get();	

		return $result = $query->result_array();

	}

	public function get_dealerpropertyCommercial($id){

		$this->db->select('dealer.*,commercial_properties.*');

		$this->db->from('dealer');

		//$this->db->join('dealer','properties.dealer_id = dealer.dealer_id');
		$this->db->join('commercial_properties','dealer.dealer_id = commercial_properties.dealer_id');
		$this->db->where(array("commercial_properties.dealer_id"=>$id));

		//$this->db->order_by("properties.property_id", "desc");

		$query = $this->db->get();	

		return $result = $query->result_array();

	}





	public function get_allproperty_filter($dealer_name=0,$property_type=0){

		// echo $dealer_name;

		// echo $property_type;die;

		$this->db->select('properties.*,dealer.*');

		$this->db->from('properties');

		$this->db->join('dealer','properties.dealer_id = dealer.dealer_id');

		if(!empty($dealer_name && $property_type)){

			//echo 'chirag1';die;

			$this->db->where(array("dealer.dealer_name" => $dealer_name,"properties.property_type"=>$property_type));

		}else if(!empty($property_type)){

			//echo 'chirag2';die;

			$this->db->where(array("properties.property_type"=>$type));

		}else if(!empty($dealer_name)){

			//echo 'chirag3';die;

			$this->db->where(array("dealer.dealer_name"=>$dealer_name));

		}else{

			//echo 'chirag4';die;

			$this->db->where(array("properties.status"=>'1'));

		}

		$this->db->order_by("properties.property_id", "desc");

		$query = $this->db->get();	

		return $result = $query->result_array();

	}



	public function get_unit_size(){

		$this->db->select('unit_size.*,property_category.cat_name,property_subcategory.subcat_name,property_subchildcategory.subchild_name');

		$this->db->from('unit_size');

		$this->db->join('property_category', 'unit_size.cat_id = property_category.cat_id');

		$this->db->join('property_subcategory', 'unit_size.subcat_id = property_subcategory.subcat_id');

		$this->db->join('property_subchildcategory', 'unit_size.child_subcat_id = property_subchildcategory.subchild_id');

		$this->db->order_by("unit_size.unit_size_id", "desc");

		$query = $this->db->get();	

		return $result = $query->result_array();

	}



	public function get_category_propertytype($type){



		$this->db->select('*');

		$this->db->from('property_category');

		$this->db->where(array("cat_status" => '1',"property_type"=>$type));

		$this->db->order_by("cat_id", "desc");

		$query = $this->db->get();	

		return $result = $query->result_array();

	}



	public function get_subcategory_base_category($cat_id){



		$this->db->select('*');

		$this->db->from('property_subcategory');

		$this->db->where(array("status" => '1',"cat_id"=>$cat_id));

		$this->db->order_by("subcat_id", "desc");

		$query = $this->db->get();	

		return $result = $query->result_array();

	}



	public function get_subchildcategory_base_subcategory($subcat_id){



		$this->db->select('*');

		$this->db->from('property_subchildcategory');

		$this->db->where(array("status" => '1',"subcat_id"=>$subcat_id));

		$this->db->order_by("subchild_id", "desc");

		$query = $this->db->get();	

		return $result = $query->result_array();

	}







	public function get_activecategory(){

		$this->db->select('*');

		$this->db->from('property_category');

		$this->db->where(array("property_category.cat_status" => '1'));

		$this->db->order_by("property_category.cat_id", "desc");



		$query = $this->db->get();	



		return $result = $query->result_array();

	}



	public function get_categorybyname($data){

		$this->db->select('*');

		$this->db->from('property_category');

		$this->db->where(array('cat_name' => $data));

		$query = $this->db->get();	



		return $result = $query->row_array();

	}



	public function get_size(){

		$this->db->select('*');

		$this->db->from('property_size');

		$this->db->where(array('size_status'=> '1'));

		$query = $this->db->get();	

		return $result = $query->result_array();

	}



	public function get_pricerange(){

		$this->db->select('*');

		$this->db->from('price_range');

		$this->db->where(array('status'=> '1'));

		$query = $this->db->get();	

		return $result = $query->result_array();

	}



	public function get_bedroom(){

		$this->db->select('*');

		$this->db->from('bedroom');

		$this->db->where(array('status'=> '1'));

		$query = $this->db->get();	

		return $result = $query->result_array();

	}





	public function get_category_by_id($id){

		$this->db->select('*');

		$this->db->from('property_category');

		$this->db->where(array('property_category.cat_id' => $id));

		$query = $this->db->get();	



		return $result = $query->row_array();

	}



	public function editcategory($data,$id){



		$this->db->where('cat_id', $id);

		$this->db->update('property_category', $data);

		return true;

	}

		// Close Category Section



		// Start Property type Section

	public function add_property_type($data){

		$this->db->insert('property_type', $data);

		return true;

			//return true;

	}



	public function get_allproperty_type(){

		$this->db->select('*');

		$this->db->from('property_type');

		$this->db->join('property_category', 'property_category.cat_id = property_type.type_pro_catid');			

		$this->db->order_by("property_type.type_id", "desc");

		$query = $this->db->get();	



		return $result = $query->result_array();

	}


	/*Get All Properties By Dealer Id*/
	public function getResidencialProperty($dealer_id){

		// echo "SELECT residential_properties.*,commercial_properties.* FROM residential_properties INNER JOIN commercial_properties ON commercial_properties.dealer_id=residential_properties.dealer_id where residential_properties.dealer_id=$dealer_id";die;
		$this->db->select('residential_properties.*,property_category.cat_name');

		$this->db->from('residential_properties');			

		$this->db->JOIN('property_category','residential_properties.cat_id = property_category.cat_id');
		$this->db->where(array("residential_properties.dealer_id"=>$dealer_id,"property_option"=>'0'));

		$query = $this->db->get();	



		return $result = $query->result_array();

	}

	/*Close Get All Properties By Dealer id*/

	/*Get All Properties By Dealer Id*/
	public function getCommercialProperty($dealer_id){

		// echo "SELECT residential_properties.*,commercial_properties.* FROM residential_properties INNER JOIN commercial_properties ON commercial_properties.dealer_id=residential_properties.dealer_id where residential_properties.dealer_id=$dealer_id";die;
		$this->db->select('commercial_properties.*');

		$this->db->from('commercial_properties');			

		$this->db->where(array("commercial_properties.dealer_id"=>$dealer_id,"property_option"=>'1'));

		$query = $this->db->get();	



		return $result = $query->result_array();

	}

	/*Close Get All Properties By Dealer id*/



	public function get_property_typebyname($data){

		$this->db->select('*');

		$this->db->from('property_type');

		$this->db->where(array('type_name' => $data));

		$query = $this->db->get();	



		return $result = $query->row_array();

	}





	public function get_property_type_by_id($id){

		$this->db->select('*');

		$this->db->from('property_type');

		$this->db->where(array('property_type.type_id' => $id));

		$query = $this->db->get();	



		return $result = $query->row_array();

	}



	public function editproperty_type($data,$id){



		$this->db->where('type_id', $id);

		$this->db->update('property_type', $data);

		return true;

	}



		// Close Property type Section



		// Start Dealer Section

	public function get_allDealers(){			

		$this->db->select('*');
		$this->db->from('dealer');
		$this->db->where(array('dealer.dealer_type' => 'Dealer'));
		$this->db->order_by("dealer.dealer_id", "desc");
		$query = $this->db->get();	
		return $result = $query->result_array();

	}



	public function get_dealers_by_id($id){

		$this->db->select('*');

		$this->db->from('dealer');

		$this->db->where(array('dealer.dealer_id' => $id));

		$query = $this->db->get();	

		return $result = $query->row_array();

	}


	



	public function editdealers($data,$id){



		$this->db->where('dealer_id', $id);

		$this->db->update('dealer', $data);

		return true;

	}

		// Close Dealer Section







		// Start Flavour Section

	public function add_flavour($data){

		$this->db->insert('flavour', $data);

		return true;

			//return true;

	}



	public function get_allflavour(){

		$this->db->select('*');

		$this->db->from('flavour');

		$this->db->order_by("flavour.flavour_id", "desc");

		$query = $this->db->get();	



		return $result = $query->result_array();

	}



	public function get_flavourbyname($data){

		$this->db->select('*');

		$this->db->from('flavour');

		$this->db->where(array('flavour_name' => $data));

		$query = $this->db->get();	



		return $result = $query->row_array();

	}





	public function get_flavour_by_id($id){

		$this->db->select('*');

		$this->db->from('flavour');

		$this->db->where(array('flavour.flavour_id' => $id));

		$query = $this->db->get();	



		return $result = $query->row_array();

	}



	public function editflavour($data,$id){



		$this->db->where('flavour_id', $id);

		$this->db->update('flavour', $data);

		return true;

	}



		// Close Flavour Section



		// Start Spice Section

	public function add_spice($data){

		$this->db->insert('spicelevel', $data);

		return true;

			//return true;

	}



	public function get_allspice(){

		$this->db->select('*');

		$this->db->from('spicelevel');

		$this->db->order_by("spicelevel.spice_level_id", "desc");

		$query = $this->db->get();	



		return $result = $query->result_array();

	}



	public function get_spicebyname($data){

		$this->db->select('*');

		$this->db->from('spicelevel');

		$this->db->where(array('name_of_peppers' => $data));

		$query = $this->db->get();	



		return $result = $query->row_array();

	}





	public function get_spice_by_id($id){

		$this->db->select('*');

		$this->db->from('spicelevel');

		$this->db->where(array('spicelevel.spice_level_id' => $id));

		$query = $this->db->get();	



		return $result = $query->row_array();

	}



	public function editspice($data,$id){



		$this->db->where('spice_level_id', $id);

		$this->db->update('spicelevel', $data);

		return true;

	}



		// Close Spice Section





		// Start Cooking Section



	public function add_cooking($data){

		$this->db->insert('cooking_style', $data);

		return true;

			//return true;

	}



	public function get_allcooking(){

		$this->db->select('*');

		$this->db->from('cooking_style');

		$this->db->order_by("cooking_style.cooking_style_id", "desc");

		$query = $this->db->get();	



		return $result = $query->result_array();

	}



	public function get_cookingbyname($data){

		$this->db->select('*');

		$this->db->from('cooking_style');

		$this->db->where(array('cooking_style_name' => $data));

		$query = $this->db->get();	



		return $result = $query->row_array();

	}





	public function get_cooking_by_id($id){

		$this->db->select('*');

		$this->db->from('cooking_style');

		$this->db->where(array('cooking_style.cooking_style_id' => $id));

		$query = $this->db->get();	



		return $result = $query->row_array();

	}



	public function editcooking($data,$id){



		$this->db->where('cooking_style_id', $id);

		$this->db->update('cooking_style', $data);

		return true;

	}



		// Close Cooking Section



		// Start Restaurants Section

	public function add_restaurants($data){

		$this->db->insert('add_restaurants', $data);

		return true;

			//return true;

	}



	public function get_allrestaurants(){

		$this->db->select('*');

		$this->db->from('add_restaurants');

		$this->db->order_by("add_restaurants.restaurants_id", "desc");

		$query = $this->db->get();	



		return $result = $query->result_array();

	}



	public function get_restaurantsbyname($data){

		$this->db->select('*');

		$this->db->from('add_restaurants');

		$this->db->where(array('restaurants_name' => $data));

		$query = $this->db->get();	

		return $result = $query->row_array();

	}





	public function get_restaurants_by_id($id){

		$this->db->select('*');

		$this->db->from('add_restaurants');

		$this->db->where(array('add_restaurants.restaurants_id' => $id));

		$query = $this->db->get();	

		return $result = $query->row_array();

	}



	public function editrestaurants($data,$id){



		$this->db->where('restaurants_id', $id);

		$this->db->update('add_restaurants', $data);

		return true;

	}



		// Close Restaurants Section



		// Start Ingredients Section

	public function add_ingredients($data){

		$this->db->insert('ingredients', $data);

		return true;

			//return true;

	}



	public function get_allingredients(){

		$this->db->select('*');

		$this->db->from('ingredients');

		$this->db->order_by("ingredients.ingredient_id", "desc");

		$query = $this->db->get();	



		return $result = $query->result_array();

	}



	public function get_ingredientsbyname($data){

		$this->db->select('*');

		$this->db->from('ingredients');

		$this->db->where(array('ingredient_name' => $data));

		$query = $this->db->get();	



		return $result = $query->row_array();

	}





	public function get_ingredients_by_id($id){

		$this->db->select('*');

		$this->db->from('ingredients');

		$this->db->where(array('ingredients.ingredient_id' => $id));

		$query = $this->db->get();	



		return $result = $query->row_array();

	}



	public function editingredients($data,$id){



		$this->db->where('ingredient_id', $id);

		$this->db->update('ingredients', $data);

		return true;

	}



		// Close Ingredients Section



		// Start Proteins Section

	public function add_proteins($data){

		$this->db->insert('proteins', $data);

		return true;

			//return true;

	}



	public function get_allproteins(){

		$this->db->select('*');

		$this->db->from('proteins');

		$this->db->order_by("proteins.proteins_id", "desc");

		$query = $this->db->get();	



		return $result = $query->result_array();

	}



	public function get_proteinsbyname($data){

		$this->db->select('*');

		$this->db->from('proteins');

		$this->db->where(array('protein_name' => $data));

		$query = $this->db->get();	



		return $result = $query->row_array();

	}





	public function get_proteins_by_id($id){

		$this->db->select('*');

		$this->db->from('proteins');

		$this->db->where(array('proteins.proteins_id' => $id));

		$query = $this->db->get();	



		return $result = $query->row_array();

	}



	public function editproteins($data,$id){



		$this->db->where('proteins_id', $id);

		$this->db->update('proteins', $data);

		return true;

	}



		// Close Proteins Section



}



?>