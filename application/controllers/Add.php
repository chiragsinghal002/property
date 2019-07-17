<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Add extends CI_Controller {



	public function __construct(){

		parent::__construct();

		$this->load->model('common_model');

	}



	public function category(){

		if($this->input->post('submit')){
			// echo "<pre>";
			// print_r($_POST);
			// print_r($_FILES);
			// die;			

			$data['detail'] =  $this->common_model->get_categorybyname($_POST['cat_name']);

			$this->form_validation->set_rules('cat_status', 'status', 'trim|required');
			if ($this->form_validation->run() == FALSE) {

				$this->load->view('include/header');

				$this->load->view('include/top');

				$this->load->view('include/sidebar');

				$this->load->view('add/category');

				$this->load->view('include/footer');

				

			}else{

				if ($data['detail']['cat_name'] !=$_POST['cat_name']) {	

				//$filesCount = count($_FILES['hotel']['name']);
    					// for($i = 0; $i < $filesCount; $i++)
    					// {
    						// $imagefilefolder=$_SERVER['DOCUMENT_ROOT']."/property/image";
    						 $fileimage=date("mdyhis").$_FILES['cat_image']['name'];
    						// if(move_uploaded_file($_FILES['cat_image']['tmp_name'],$imagefilefolder.$fileimage))
    						// {
    						// 	///////////////////////////////////////////////////////////////////    							
    						// 	$config['image_library'] = 'gd2';
    	     //                    $config['source_image'] =$_SERVER['DOCUMENT_ROOT'].'/property/image/'.$fileimage;
    	     //                     $config['new_image'] =$_SERVER['DOCUMENT_ROOT'].'/property/image/thumb/'.$fileimage;
    	     //                    $config['create_thumb'] = TRUE;
    	     //                    $config['maintain_ratio'] = TRUE;
    	     //                    $config['width']         = 75;
    	     //                    $config['height']       = 50;
    	                       
    	
    	     //                     $this->load->library('image_lib', $config);
    	     //                    $this->image_lib->initialize($config);
    	
    	     //                    $this->image_lib->resize();    	                           
    						// 	///////////////////////////////////////////////////////////////////
    						// }
    						
    					   $upload_file     = $fileimage;
    					// }
    					//$uploadedimages = implode(',', $upload_file);	

					$data = array(
						'property_type' => $this->input->post('property_type'),
						'cat_name' => $this->input->post('cat_name'),
						'cat_image' => $upload_file,
						'cat_status' => $this->input->post('cat_status'),
						'cat_createdat' => date('Y-m-d H:i:s'),
						'cat_modifiedat' => date('Y-m-d H:i:s'),

					);

					// echo "<pre>";
					// print_r($data);die;

					

					$data = $this->security->xss_clean($data);

					$result = $this->common_model->add_category($data);

					$this->session->set_flashdata('msg', 'Record is Added Successfully!');

					redirect(base_url('index.php/listing/'));

				}

				else{				

					$this->session->set_flashdata('msg', 'This Category already exists.');

					$this->load->view('add/category');

			// $this->load->view('admin/layout', $data);

				}

			}

		}else{

			$this->load->view('include/header');

			$this->load->view('include/top');

			$this->load->view('include/sidebar');

			$this->load->view('add/category');

			$this->load->view('include/footer');

		}

		



	}





	public function subcategory(){

		//echo 'chirag';die;

		//$data['category'] =  $this->common_model->get_allcategory();

		if($this->input->post('submit')){

				$data = array(

					'property_type' => $this->input->post('property_type'),

					'cat_id' => $this->input->post('category_name'),	

					'subcat_name'=>$this->input->post('subcategory_name'),

					'status' => $this->input->post('subcat_status'),

					

				);

				$data = $this->security->xss_clean($data);

				$result = $this->common_model->add_subcategory($data);

				$this->session->set_flashdata('msg', 'Record is Added Successfully!');

				redirect(base_url('index.php/listing/subcategory'));

		}else{

			$this->load->view('include/header');

			$this->load->view('include/top');

			$this->load->view('include/sidebar');

			$this->load->view('add/subcategory');

			$this->load->view('include/footer');

		}

	}



	public function childsubcategory(){

		//echo 'chirag';die;

		//$data['category'] =  $this->common_model->get_allcategory();

		if($this->input->post('submit')){
			// echo '<pre>';
			// var_dump($_POST);
			$values_data=implode(',',$this->input->post('value'));


				$data = array(

					'property_type' => $this->input->post('property_type'),

					'cat_id' => $this->input->post('category_name'),	

					'subcat_id'=>$this->input->post('subcategory_name'),

					'subchild_name' =>$this->input->post('subchildcategory_name'),

					'property_option' => $this->input->post('property_option'),

					'is_mandatory' => $this->input->post('is_mandatory'),

					'min_max_option' =>$this->input->post('min_max_option'),

					'selection_type' =>$this->input->post('selection_type'),

					'values' => $values_data,

					'status' => $this->input->post('subchildcat_status')

					

				);

				$data = $this->security->xss_clean($data);

				$result = $this->common_model->add_childsubcategory($data);

				$this->session->set_flashdata('msg', 'Record is Added Successfully!');

				redirect(base_url('index.php/listing/subchildcategory'));

		}else{

			$this->load->view('include/header');

			$this->load->view('include/top');

			$this->load->view('include/sidebar');

			$this->load->view('add/subchildcategory');

			$this->load->view('include/footer');

		}

	}



	public function unit_size(){

		//echo 'chirag';die;



		//$data['category'] =  $this->common_model->get_allcategory();

		if($this->input->post('submit')){

			// var_dump($_POST);die;

				$data = array(

					'property_type' => $this->input->post('property_type'),

					'cat_id' => $this->input->post('category_name'),	

					'subcat_id'=>$this->input->post('subcategory_name'),

					'child_subcat_id' =>$this->input->post('subchildcategory_name'),

					'unit_size' =>implode(',', $this->input->post('size')),

					'status' => $this->input->post('subchildcat_status')

					

				);

				$data = $this->security->xss_clean($data);

				$result = $this->common_model->unit_size($data);

				$this->session->set_flashdata('msg', 'Record is Added Successfully!');

				redirect(base_url('index.php/listing/unit_size'));

		}else{

			$this->load->view('include/header');

			$this->load->view('include/top');

			$this->load->view('include/sidebar');

			$this->load->view('add/unit_size');

			$this->load->view('include/footer');

		}

	}





	public function property_type(){

		$data['category'] =  $this->common_model->get_activecategory();

		if($this->input->post('submit')){

			

			$data['detail'] =  $this->common_model->get_property_typebyname($_POST['type_name']);



			$this->form_validation->set_rules('type_status', 'status', 'trim|required');

			if ($this->form_validation->run() == FALSE) {

				$this->load->view('include/header');

				$this->load->view('include/top');

				$this->load->view('include/sidebar');

				$this->load->view('add/property_type',$data);

				$this->load->view('include/footer');

				

			}else{

				if ($data['detail']['type_name'] !=$_POST['type_name']) {		





					$data = array(

						'type_pro_catid' => $this->input->post('type_pro_catid'),

						'type_name' => $this->input->post('type_name'),	

						'type_status' => $this->input->post('type_status'),

						'type_createdat' => date('Y-m-d H:i:s'),

						'type_modifiedat' => date('Y-m-d H:i:s'),

					);

					

					$data = $this->security->xss_clean($data);

					$result = $this->common_model->add_property_type($data);

					$this->session->set_flashdata('msg', 'Record is Added Successfully!');

					$data['msg']='Record is Added Successfully!';

					redirect(base_url('index.php/listing/property_type/'));

				}

				else{				

					$this->session->set_flashdata('msg', 'This Category already exists.');

					$this->load->view('add/property_type/');

			// $this->load->view('admin/layout', $data);

				}

			}

		}else{

			$this->load->view('include/header');

			$this->load->view('include/top');

			$this->load->view('include/sidebar');

			$this->load->view('add/property_type',$data);

			$this->load->view('include/footer');

		}

		



	}





	// Add size

	public function size(){

		//echo 'chirag';die;



		//$data['category'] =  $this->common_model->get_allcategory();

		if($this->input->post('submit')){

			$date=date('Y-m-d H:i:s');

			// var_dump($_POST);die;

				$data = array(

					'property_size' => $this->input->post('size_name'),

					'size_status' => $this->input->post('status'),

					'size_createdat' => $date,

					'size_modifiedat' => $date		

				);

				$data = $this->security->xss_clean($data);

				$result = $this->common_model->add_size($data);

				$this->session->set_flashdata('msg', 'Record is Added Successfully!');

				redirect(base_url('index.php/listing/size'));

		}else{

			$this->load->view('include/header');

			$this->load->view('include/top');

			$this->load->view('include/sidebar');

			$this->load->view('add/size');

			$this->load->view('include/footer');

		}

	}



	// Price Range

	public function price_range(){

		//echo 'chirag';die;



		//$data['category'] =  $this->common_model->get_allcategory();

		if($this->input->post('submit')){

			$date=date('Y-m-d H:i:s');

			// var_dump($_POST);die;

				$data = array(

					'min_range' => $this->input->post('min'),

					'max_range' => $this->input->post('max'),

					'status' => $this->input->post('status')

						

				);

				$data = $this->security->xss_clean($data);

				$result = $this->common_model->add_price_range($data);

				$this->session->set_flashdata('msg', 'Record is Added Successfully!');

				redirect(base_url('index.php/listing/price_range'));

		}else{

			$this->load->view('include/header');

			$this->load->view('include/top');

			$this->load->view('include/sidebar');

			$this->load->view('add/price_range');

			$this->load->view('include/footer');

		}

	}



	public function bedroom(){

		//echo 'chirag';die;



		//$data['category'] =  $this->common_model->get_allcategory();

		if($this->input->post('submit')){

			$date=date('Y-m-d H:i:s');

			// var_dump($_POST);die;

				$data = array(

					'bedroom_type' => $this->input->post('bedroom_type'),

					'status' => $this->input->post('status')

						

				);

				$data = $this->security->xss_clean($data);

				$result = $this->common_model->add_bedroom($data);

				$this->session->set_flashdata('msg', 'Record is Added Successfully!');

				redirect(base_url('index.php/listing/bedroom'));

		}else{

			$this->load->view('include/header');

			$this->load->view('include/top');

			$this->load->view('include/sidebar');

			$this->load->view('add/bedroom');

			$this->load->view('include/footer');

		}

	}

	



	





	public function sub_category(){

		if($this->input->post('submit')){

			$this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');

			$this->form_validation->set_rules('subcategory_name', 'SubCategory Name', 'trim|required');

			$this->form_validation->set_rules('status', 'status', 'trim|required');

			if ($this->form_validation->run() == FALSE) {

				$data['view'] = 'add/subcategory_add';

				$this->load->view('admin/layout', $data);

			}else{

				$imagefilefolder=$_SERVER['DOCUMENT_ROOT']."/wedding/image/subcategory/";



				$fileimage=date("mdyhis").$_FILES['subcat_image']['name'];

				//move_uploaded_file($_FILES['image']['tmp_name'],$imagefilefolder.$fileimage);

				if(move_uploaded_file($_FILES['subcat_image']['tmp_name'],$imagefilefolder.$fileimage))

				{

					$config['image_library'] = 'gd2';

					$config['source_image'] =$_SERVER['DOCUMENT_ROOT'].'/wedding/image/subcategory/'.$fileimage;

					$config['new_image'] =$_SERVER['DOCUMENT_ROOT'].'/wedding/image/subcategory/thumb/'.$fileimage;

					$config['create_thumb'] = TRUE;

					$config['maintain_ratio'] = TRUE;

					$config['width']         = 262;

					$config['height']       = 165;





                    // $this->load->library('image_lib', $config);

					$this->image_lib->initialize($config);



					$this->image_lib->resize();

				}

				

				$upload_file = $fileimage;

				$data = array(

					'cat_id' => $this->input->post('category_name'),

					'subcategory_name' => $this->input->post('subcategory_name'),

					'subcat_image' => $upload_file,

					'status' => $this->input->post('status'),

					'created_at' => date('Y-m-d H:i:s'),

					'modified_at' => date('Y-m-d H:i:s'),

				);

					//var_dump($data);die;

				$data = $this->security->xss_clean($data);

				$result = $this->common_model->add_subcategory($data);

				$this->session->set_flashdata('msg', 'Record is Added Successfully!');

				redirect(base_url('index.php/category/subcategory_list'));

			}

		}else{

			$data['get_allcategory']=$this->common_model->get_allcategory();

			$data['view'] = 'add/subcategory_add';

			$this->load->view('admin/layout', $data);

		}

		



	}



	



	public function get_category(){

		$type=$_POST['type'];

		$category=$this->common_model->get_category_propertytype($type);

		//var_dump($category);die;

		echo '<option value="">'.'Select Category'.'</option>';

		foreach($category as $data){

			echo '<option value="'.$data['cat_id'].'">'.$data['cat_name'].'</option>';

		}



	}



	public function get_subcategorybasedoncategory(){

		$cat_id=$_POST['cat_id'];

		$category=$this->common_model->get_subcategory_base_category($cat_id);

		// var_dump($category);die;

		echo '<option value="">'.'Select SubCategory'.'</option>';

		foreach($category as $data){

			echo '<option value="'.$data['subcat_id'].'">'.$data['subcat_name'].'</option>';

		}



	}



	public function get_subchildcat(){

		$subcat_id=$_POST['subcat_id'];

		$category=$this->common_model->get_subchildcategory_base_subcategory($subcat_id);

		 // var_dump($category);die;

		echo '<option value="">'.'Select subchildCategory'.'</option>';

		foreach($category as $data){

			echo '<option value="'.$data['subchild_id'].'">'.$data['subchild_name'].'</option>';

		}



	}



	

}





?>