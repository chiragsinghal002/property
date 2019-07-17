<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Auth extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('auth_model', 'auth_model');

		}



		public function index(){
			// echo 'chirag';die;
			if($this->session->has_userdata('is_admin_login'))

			{	redirect('dashboard');	}

			else{
				redirect('auth/login');

			}

		}



		public function login(){



			if($this->input->post('submit')){

			

				$this->form_validation->set_rules('dealer_email', 'Email', 'trim|required');

				$this->form_validation->set_rules('dealer_password', 'Password', 'trim|required');



				if ($this->form_validation->run() == FALSE) {

					$this->load->view('auth/login');

				}

				else {

					$data = array(

					'dealer_email' => $this->input->post('dealer_email'),

					'dealer_password' => $this->input->post('dealer_password')

					);

					$result = $this->auth_model->login($data);

					// echo "<pre>";

					// print_r($result);die;

					if ($result == TRUE) {

						$admin_data = array(

							'admin_id' => $result['dealer_id'],

						 	'name' => $result['dealer_first_name'],

						 	'email' => $result['dealer_email'],

						 	'phone' => $result['dealer_phone'],

						 	'usertype' => $result['dealer_type'],

						 	

						 	'is_admin_login' => TRUE

						);

						$this->session->set_userdata($admin_data);

						redirect(base_url('index.php/dashboard'), 'refresh');

					}

					else{

						if ($result['dealer_status']==0) {

							$data['msg'] = 'Deactivate your account please contact with admin! ';

						$this->load->view('auth/login', $data);

						}

						else{

							$data['msg'] = 'Invalid Email or Password!';

						$this->load->view('auth/login', $data);

						}

						

					}

				}

			}

			else{

				$this->load->view('auth/login');

			}

		}



		



		// forgot password	

		public function forgot(){

			 $this->load->helper('form');



			if($this->input->post('submit')){				



				$this->form_validation->set_rules('email', 'Email', 'trim|required');

				if ($this->form_validation->run() == FALSE) {

					$this->load->view('auth/forgot');

				}

				else {

					$letters='abcdefghijklmnopqrstuvwxyz';  // selection of a-z

$string='';  // declare empty string

for($x=0; $x<3; ++$x){  // loop three times

    $string.=$letters[rand(0,25)].rand(0,9);  // concatenate one letter then one number

}

$pass = $string;

					$data = array(

					//'password' => $pass,

						'email_to' => $this->input->post('email'),			

						'email_from' => "info@anytimecheckin.com",

         				 

					

					);

					// echo "<pre>";

					// print_r($data);die; 



					$result = $this->auth_model->forgot($data);

					

					if ($result == TRUE) {

						//Load email library 



         $this->load->library('email'); 



         $message = "Your New Password is " .$result['v_pass'];

   

         $this->email->from($data['email_from']); 

         $this->email->to($data['email_to']);

         $this->email->subject('Forget Password');

         // $this->email->cc('kanchan.netmaximus@gmail.com'); 

         $this->email->message($message);						



         if($this->email->send()) 

       

         	$data['msg'] = 'Email sent successfully.';

         else         

         	$data['msg'] = 'Error in sending Email.';

						

     $this->load->view('admin/auth/forgotpassword', $data);

					}

					else{

						$data['msg'] = 'Invalid Email!';

						$this->load->view('auth/forgot', $data);

					}

				}

			}

			else{

				$this->load->view('auth/forgot');

			}

		}



		// forgot password end



		public function change_pwd(){

			$id = $this->session->userdata('admin_id');

			if($this->input->post('submit')){

				$this->form_validation->set_rules('password', 'Password', 'trim|required');

				$this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'trim|required|matches[password]');

				if ($this->form_validation->run() == FALSE) {

					$data['view'] = 'admin/auth/change_pwd';

					$this->load->view('admin/layout', $data);

				}

				else{

					$data = array(

						'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)

					);

					$result = $this->auth_model->change_pwd($data, $id);

					if($result){

						$this->session->set_flashdata('msg', 'Password has been changed successfully!');

						redirect(base_url('admin/auth/change_pwd'));

					}

				}

			}

			else{

				$data['view'] = 'admin/auth/change_pwd';

				$this->load->view('admin/layout', $data);

			}

		}

				

		public function logout(){

			// echo "<pre>";

			// print_r($_SESSION);

			// die;

			$this->session->sess_destroy();

			redirect(base_url('index.php/auth/login'), 'refresh');

		}











		

			

	}  // end class







?>