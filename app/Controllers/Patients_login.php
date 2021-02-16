<?php 
namespace App\Controllers;
use CodeIgniter\Controller;	
use \App\Models\Login_model;
use \App\Models\Register_model;
	
class Patients_login extends BaseController
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

	public function index(){
		return view('Patients/patients_register');
	}

	public function create_patients_account(){
		$data  = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'username'          => 'required|min_length[4]|max_length[20]',
				'email'             => 'required|valid_email|is_unique[patients_login.email]',
				'mobile'            => 'required|numeric|exact_length[10]',
				'password'          => 'required|min_length[6]|max_length[16]',
				'Confirm_password'  => 'required|matches[password]',
			];
			if($this->validate($rules)){
				$uid = md5(str_shuffle('abcdefghizklmnopqrstuvwxyz'.time()));
					$userdata = [
						'username'         => $this->request->getVar('username',FILTER_SANITIZE_STRING),
						'email'            => $this->request->getVar('email'),
						'password'         => password_hash($this->request->getVar('password',FILTER_SANITIZE_STRING),PASSWORD_DEFAULT),
						'mobile'           => $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
						'uid'              => $uid,
						'level'            => '4',
						'status'           => 'InActive',
						'created_date'     => date('Y-m-d h:i:s')
					];
					$insert_data = $this->registerModel->Insertdata('patients_login',$userdata);
					if ($insert_data) {
						$to        = $this->request->getVar('email');
						$subject   = 'Account Activation Link  - Hospital Management System';
						$message   = 'Hi ' .$this->request->getVar('username',FILTER_SANITIZE_STRING).",<br><br>Thanks Your Account Created Successfully, Please Click the below Link to Activate your Account <br><br>"
						   ."<a href='".base_url()."/Patients_login/Activate_account/".$uid."' target='_blank'>Activate  Now</a><br><br>Thanks<br>FlexionSoftware Solution  Team"; 
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
		return view('Patients/patients_register', $data);
	}

	public function Activate_account($unid = null){
		$data = [];
		if(!empty($unid)){
			$userdata = $this->registerModel->verify_patients_Unid($unid);
			if ($userdata) {
				$expiry_time = $this->verify_expiry_time($userdata->created_date);
				if ($expiry_time) {
					if ($userdata->status === 'InActive') {
						$status = $this->registerModel->update_patients_Status($unid);
						if ($status == true) {
							$data['success'] = 'Account Activated Successfully';
						}
						$this->session->setTempdata('success', 'Account Activated Successfully Login Your Account' );
						return redirect()->to(base_url().'/Patients_login/login_account');
					}else{
						$data['success'] = 'Your Account is Already Activated';
					}
				}else{
					$data['error'] = 'Sorry Activation Link was Expired Try Again!';
				}
			}else{
				$data['error'] = 'Sorry Unable to Process Activate Your Account Request ?';
			}
		}else{
			$data['error'] = 'Sorry Unable to Process Your Request Your Not Elegible here Sorry';
		}
		return view('Account/Activate_patient_account', $data);
	}

	public function verify_expiry_time($regTime){
		$ourTime = now();//load time helper he will get current time stamp
		$regTime = strtotime($regTime);
		$diffTime =  $regTime - $ourTime;
		if (3600 > $diffTime) {
			return true;
		}else{
			return false;
		}
	}

	public function login_account(){
		$data = [];
		//site login 
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'email'      => 'required|valid_email',
				'password'   => 'required|min_length[4]|max_length[16]'
			];
			if ($this->validate($rules)) {
				$email     = $this->request->getVar('email');
				$password  = $this->request->getVar('password');
					
				$throttler = \Config\Services::throttler();
				$allow     = $throttler->check("test", 4, MINUTE);
				if ($allow) {
					$userdata = $this->loginModel->verifyAccountentEmail('patients_login',$email);
					if ($userdata) {
						$pass_verify = password_verify($password, $userdata['password']);
						if ($pass_verify) {
							if ($userdata['status'] == 'Active') {
								if ($userdata['level'] === '4') {
									$loginInfo  = [
										'uniid'       => $userdata['uid'],
										'browser'     => $this->getUserBrowserInfo(),
										'ip'          => $this->request->getIPAddress(),
										'login_date'  => date('Y-m-d'),
										'login_time'  => date('Y-m-d h:i:s')
									];
									$login_activity_id = $this->loginModel->saveLoginInfo($loginInfo);
									if ($login_activity_id) {
										$this->session->set('loggedin_info', $login_activity_id);
									}else{

									}
									$this->session->set('loggedin_user', $userdata['uid']);
									return redirect()->to(base_url().'/Patients');
									
								}
								else{
									$data['error']  = 'Email & password do Not Matched  Invalid';
								}
							}else{
								$data['error']  = 'Your Account is Not Activated by Admin Please Contect Admin other wise wait Some time !';
							}	
						}else{
							$data['error']  = 'Sorry Wrong password entered for that Email';
									
						}
					}else{
						$data['error']  = 'Email & password does not Exists';
					}
				}else{
						$data['error']  = 'Max No. of failed Login Attempt, Try Again a Few Minutes';
				}
			}else{
					
				$data['validation']  = $this->validator;
			}
		}
		return view('Patients/login_patients', $data);
	}


	public function getUserBrowserInfo(){
		$agent = $this->request->getUserAgent(); //predefine method
		if ($agent->isBrowser()) {
			$currentAgent  = $agent->getBrowser();
		}else if ($agent->isRobot()) {
			$currentAgent  = $this->agent->robot();
		}else if ($agent->isMobile()) {
			$currentAgent  = $agent->getMobile();
		}else{
			$currentAgent  = 'Unidentified User Agent';
		}
		return $currentAgent;
	}

	public function Logout(){
		if (session()->has('loggedin_info')) {
			$login_activity_id = session()->get('loggedin_info');
			$this->loginModel->updateLogoutTime($login_activity_id);
		}
		session()->remove('google_user');
		session()->destroy();
		return redirect()->to(base_url()."/Patients_login/login_account");
	}







}