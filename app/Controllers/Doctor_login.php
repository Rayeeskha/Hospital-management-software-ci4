<?php 
namespace App\Controllers;
use CodeIgniter\Controller;	
use \App\Models\Login_model;
use \App\Models\Register_model;
	
class Doctor_login extends BaseController
{
	public $loginModel;
	public $session;
	public $registerModel;
	public function __construct(){
		helper(['form','date']);
		$this->loginModel = new Login_model();
		$this->session   = session();
		$this->email = \Config\Services::email();
		$this->registerModel = new Register_model();
	}

	public function  index(){
		return view('Account/doctor_register');
	}

	public function create_doc_account(){
		$data  = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'username'          => 'required|min_length[4]|max_length[20]',
				'gender'            => 'required',
				'email'             => 'required|valid_email|is_unique[register_all_users.email]',
				'mobile'            => 'required|numeric|exact_length[10]',
				'password'          => 'required|min_length[6]|max_length[16]',
				'Confirm_password'  => 'required|matches[password]',
			];
			if($this->validate($rules)){
				$uid = md5(str_shuffle('abcdefghizklmnopqrstuvwxyz'.time()));
					$userdata = [
						'username'  => $this->request->getVar('username',FILTER_SANITIZE_STRING),
						'gender'    => $this->request->getVar('gender',FILTER_SANITIZE_STRING),
						'email'     => $this->request->getVar('email'),
						'password'     => password_hash($this->request->getVar('password',FILTER_SANITIZE_STRING),PASSWORD_DEFAULT),
						'mobile'          => $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
						'uid'             => $uid,
						'level'           => '3',
						'status'          => 'InActive',
						'created_date'   => date('Y-m-d h:i:s')
					];
					$insert_data = $this->registerModel->Insertdata('register_all_users',$userdata);
					if ($insert_data) {
						$to        = $this->request->getVar('email');
						$subject   = 'Account Activation Link  - Hospital Management System';
						$message   = 'Hi ' .$this->request->getVar('username',FILTER_SANITIZE_STRING).",<br><br>Thanks Your Account Created Successfully, Please Click the below Link to Activate your Account <br><br>"
						   ."<a href='".base_url()."/Accountent_login/Activate_account/".$uid."' target='_blank'>Activate  Now</a><br><br>Thanks<br>FlexionSoftware Solution  Team"; 
						
						$this->email->setTo($to);
						$this->email->setFrom('khanrayeesq121@gmail.com', 'Khan Rayees FlexionSoftware');
						$this->email->setSubject($subject);
						$this->email->setMessage($message);
						$filepath = 'public/assets/images/logo3.png';
						$this->email->attach($filepath);
						if ($this->email->send()) {
							
							$this->session->setTempdata('success', 'Account Created Successfully, Please Activate Your Account with in 1 hours' );
							return redirect()->to(current_url());
						}else{
							//$data = $this->email->printDebugger(['headers']);
							//print_r($data);
							$this->session->setTempdata('error', 'Account Created Successfully, Sorry Unable to Send Activation Link,Contact to Admin Disk <br> FlexionSoftware Solution by Khan Rayees <br> Mobile: 9554540271');
							return redirect()->to(current_url());
						}   
					}else{
						$this->session->setTempdata('error', 'Sorry Unable to Create an Account, Try Again ?',3);
						return redirect()->to(current_url());
					}
			}else{
				$data['validation'] =  $this->validator;
			}
		}
		return  view('Account/doctor_register', $data);
	}









}