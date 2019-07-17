<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Edit extends CI_Controller {



	public function __construct(){

		parent::__construct();

		$this->load->model('common_model');

	}



	//edit cuisines

	public function category($id = 0){							

		

		$data['category'] =  $this->common_model->get_category_by_id($id);



		if($this->input->post('submit')){

			$this->form_validation->set_rules('cat_name', 'Category Name', 'trim|required');

			$this->form_validation->set_rules('cat_status', 'status', 'trim|required');



			if ($this->form_validation->run() == FALSE) {

				$data['category'] = $this->common_model->get_category_by_id($id);

				$this->load->view('include/header');

			 $this->load->view('include/top');

			 $this->load->view('include/sidebar');

				$this->load->view('edit/category', $data);

				$this->load->view('include/footer');

			}

			else{

				

					$data = array(



						'cat_name' => $this->input->post('cat_name'),

						'cat_status' => $this->input->post('cat_status'),

					'cat_createdat' => date('Y-m-d H:i:s'),

					'cat_modifiedat' => date('Y-m-d H:i:s'),



					);				



					$data = $this->security->xss_clean($data);

					$result = $this->common_model->editcategory($data, $id);

					if($result){



						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');

						redirect(base_url('index.php/listing/'));

					}



				

			}

		}

		else{

			$data['category'] = $this->common_model->get_category_by_id($id);

			$this->load->view('include/header');

			 $this->load->view('include/top');

			 $this->load->view('include/sidebar');

				$this->load->view('edit/category', $data);

				$this->load->view('include/footer');

		}

	}



		//end edit category



	//edit property type

	public function property_type($id = 0){							

		$data['category'] =  $this->common_model->get_activecategory();

		$data['property_type'] =  $this->common_model->get_property_type_by_id($id);



		if($this->input->post('submit')){

			$this->form_validation->set_rules('type_name', 'Property type Name', 'trim|required');

			$this->form_validation->set_rules('type_status', 'status', 'trim|required');



			if ($this->form_validation->run() == FALSE) {

				$data['property_type'] = $this->common_model->get_property_type_by_id($id);

				$this->load->view('include/header');

			 $this->load->view('include/top');

			 $this->load->view('include/sidebar');

				$this->load->view('edit/property_type', $data);

				$this->load->view('include/footer');

			}

			else{

				

					$data = array(



						'type_pro_catid' => $this->input->post('type_pro_catid'),

					'type_name' => $this->input->post('type_name'),	

					'type_status' => $this->input->post('type_status'),

					'type_createdat' => date('Y-m-d H:i:s'),



					);				



					$data = $this->security->xss_clean($data);

					$result = $this->common_model->editproperty_type($data, $id);

					if($result){



						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');

						redirect(base_url('index.php/listing/property_type'));

					}



				

			}

		}

		else{

			$data['property_type'] = $this->common_model->get_property_type_by_id($id);

			$this->load->view('include/header');

			 $this->load->view('include/top');

			 $this->load->view('include/sidebar');

				$this->load->view('edit/property_type', $data);

				$this->load->view('include/footer');

		}

	}



		//end edit property type





	//edit dealer

	public function dealers($id = 0){							

		

		$data['dealers'] =  $this->common_model->get_dealers_by_id($id);



		if($this->input->post('submit')){

			

			$this->form_validation->set_rules('dealer_status', 'status', 'trim|required');



			if ($this->form_validation->run() == FALSE) {

				$data['dealers'] =  $this->common_model->get_dealers_by_id($id);



				$this->load->view('include/header');

			 $this->load->view('include/top');

			 $this->load->view('include/sidebar');

				$this->load->view('edit/flavour', $data);

				$this->load->view('include/footer');

			}

			else{

				

				$data = array(

			'dealer_first_name' => $this->input->post('dealer_name'),

			'dealer_email' => $this->input->post('dealer_email'),	

			'dealer_phone' => $this->input->post('dealer_phone'),

			'dealer_status' => $this->input->post('dealer_status'),			

			'dealer_modifiedat' => date('Y-m-d H:i:s'),

				);	

					$data = $this->security->xss_clean($data);

					$result = $this->common_model->editdealers($data, $id);
					
					if($result){
						if ($data['dealer_status'] == 1) {
							
						$to = $data['dealer_email'];
    $subject = "Congratulation for your successful registration with Property App!!";

    $message = "
    <html>
    
    <body>
    <h3>Dear ".$data['dealer_first_name'].", </h3>
    <p>Greetings! Hope you are having a good day.</p>
    <p>Your registration request has been approved!</p>

<p>You can now log in (<a href='http://netmaxims.in/projects/property/dealer/index.php'>Login</a>) the portal. </p>
<p>Thanks </p>
<p>Property App Team</p>

    </body>
    </html>
    ";

                        // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        // More headers
    $headers .= 'From: <webmail@netmaxims.in>' . "\r\n";
    $headers .= 'Cc: kanchan.netmaximus@gmail.com' . "\r\n";

    $mail = mail($to,$subject,$message,$headers);

}

						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');

						redirect(base_url('index.php/listing/dealers/'));

					}



				

			}

		}

		else{

			$data['dealers'] =  $this->common_model->get_dealers_by_id($id);

			$this->load->view('include/header');

			 $this->load->view('include/top');

			 $this->load->view('include/sidebar');

				$this->load->view('edit/dealers', $data);

				$this->load->view('include/footer');

		}

	}



		//end edit dealers



	



}





?>



