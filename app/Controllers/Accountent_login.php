<?php 
namespace App\Controllers;
use CodeIgniter\Controller;	
use \App\Models\Login_model;
use \App\Models\Register_model;
	
class Accountent_login extends BaseController
{
	public $loginModel;
	public $session;
	public $registerModel;
	public function __construct(){
		helper(['form','date', 'Patent']);
		$this->loginModel = new Login_model();
		$this->session   = session();
		$this->email = \Config\Services::email();
		$this->registerModel = new Register_model();
	}

	public function index(){
		return view('Account/accountent_account');
	}

	public function create_acc_account(){
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
						'level'           => '2',
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
						$this->email->setFrom('khanrayeesq121@gmail.com', 'Info');
						$this->email->setSubject($subject);
						$this->email->setMessage($message);
						$filepath = 'public/assets/images/flexionSoftware.png';
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
		return  view('Account/accountent_account', $data);
	}

	public function Activate_account($unid = null){
		$data = [];
		if(!empty($unid)){
			$userdata = $this->registerModel->verifyUnid($unid);
			if ($userdata) {
				$expiry_time = $this->verify_expiry_time($userdata->created_date);
				if ($expiry_time) {
					if ($userdata->status === 'InActive') {
						$status = $this->registerModel->updateStatus($unid);
						if ($status == true) {
							$data['success'] = 'Account Activated Successfully';
						}
						$this->session->setTempdata('success', 'Account Activated Successfully Login Your Account');
						return redirect()->to(base_url().'/Accountent_login/accountent_login');
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
		return view('Account/Activate_acc_account', $data);
	}

	public function verify_expiry_time($regTime){
		$added_time = strtotime($regTime);
		$diffTime = verify_db_detatime_to_current_time_stamp($added_time);
		if ($diffTime < 25) {
			return true;
		}else{
			return false;
		}
	}

//Accountent Account Login Script
	public function accountent_login(){
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
					$userdata = $this->loginModel->verifyAccountentEmail('register_all_users',$email);
					if ($userdata) {
						$pass_verify = password_verify($password, $userdata['password']);
						if ($pass_verify) {
							if ($userdata['status'] == 'Active') {
								if ($userdata['level'] === '2') {
									$loginInfo  = [
										'uniid'       => $userdata['uid'],
										'level'       => $userdata['level'],
										'browser'     => $this->getUserAgent(),
										'ip'          => $this->request->getIPAddress(),
										'login_time'  => date('Y-m-d h:i:s'),
										'login_date'  => date('Y-m-d')
									];
									$login_activity_id = $this->loginModel->saveLoginInfo($loginInfo);
									if ($login_activity_id) {
										$this->session->set('loggedin_info', $login_activity_id);
									}else{

									}
									$this->session->set('loggedin_user', $userdata['uid']);
									return redirect()->to(base_url().'/Medical_Accountent');
									
								}else if ($userdata['level'] === '3') {
									$loginInfo  = [
										'uniid'       => $userdata['uid'],
										'level'       => $userdata['level'],
										'browser'     => $this->getUserAgent(),
										'ip'          => $this->request->getIPAddress(),
										'login_time'  => date('Y-m-d h:i:s'),
										'login_date'  => date('Y-m-d')
									];
									$login_activity_id = $this->loginModel->saveLoginInfo($loginInfo);
									if ($login_activity_id) {
										$this->session->set('loggedin_info', $login_activity_id);
									}else{

									}
									$this->session->set('loggedin_user', $userdata['uid']);
									return redirect()->to(base_url().'/Doctor');
								}else if ($userdata['level'] === '4') {
									$loginInfo  = [
										'uniid'       => $userdata['uid'],
										'level'       => $userdata['level'],
										'browser'     => $this->getUserAgent(),
										'ip'          => $this->request->getIPAddress(),
										'login_time'  => date('Y-m-d h:i:s'),
										'login_date'  => date('Y-m-d')
									];
									$login_activity_id = $this->loginModel->saveLoginInfo($loginInfo);
									if ($login_activity_id) {
										$this->session->set('loggedin_info', $login_activity_id);
									}else{

									}
									$this->session->set('loggedin_user', $userdata['uid']);
									return redirect()->to(base_url().'/Blood_bank');
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
		return view('Account/accountent_login', $data);
	}


	 public function getUserAgent(){
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

//Accountent Account Login Script End	

	public function forget_password(){
		$data = [];
			if ($this->request->getMethod() == 'post') {
				$rules = [
					'email' => [
						'label'  => 'Email',
						'rules'   => 'required|valid_email',
						'errors'  => [
							'required'    => ' Email is required',
							'valid_email' => 'Please Enter valid Email required'
						]
					],
				];

					if ($this->validate($rules)) {
						$email = $this->request->getVar('email', FILTER_SANITIZE_EMAIL);
						$userdata = $this->loginModel->verifyEmail_with_args('register_all_users',$email);
						if (!empty($userdata)) {
							$update = $this->loginModel->updatedAt('register_all_users',$userdata['uid']);
							if ($update) {
								$to = $email;
								$subject  = 'Reset Password Link';
								$token    = $userdata['uid'];
								$message  = 'Hi ' .$userdata['username']. '<br><br>'
												.'Your Reset Password request has been Received. Please Click'
												.'the below Link to reset your Password.<br><br>'
												.'<a href="'.base_url().'/Accountent_login/reset_password/'.$token.'">Click Here to Reset Password</a>'
												.'<br>Thanks <br>FlexionSoftware Solution <br>'
												.'Khan Rayees visit my site khanrayees.000webhostapp.com <br>';

								$this->email->setTo($to);
								$this->email->setFrom('khanrayeesq121@gmail.com', 'Software Developer & Blogger');
								$this->email->setSubject($subject);
								$this->email->setMessage($message);
								if ($this->email->send()) {
									$this->session->setTempdata('success', 'Reset Password Link Send to Your Email Please Check and Verify, with in 15min',3);
									return redirect()->to(current_url());
								}else{
									$data = $this->email->printDebugger(['headers']);
									print_r($data);
								} 

								
							}else{
								$this->session->setTempdata('error', 'Sorry ! Unable to Update Try Again ?', 3);
								return redirect()->to(current_url());
							}
							
						}else{
							$this->session->setTempdata('error', 'Sorry Email Does Not Exists Try Again valid Email?', 3);
							return redirect()->to(current_url());
						}
					}else{
						$data['validation'] = $this->validator;
					}
				}
		return view('Account/forget_password', $data);
	}


	public function reset_password($token=null){
		$data = [];
		if (!empty($token)) {
			$userdata = $this->loginModel->verifyToken('register_all_users', $token);
			if (!empty($userdata)) {
				$check_exp_time = $this->checkExpiry_time($userdata['updated_at']);
				if ($check_exp_time) {
					if ($this->request->getMethod() == 'post') {
					 	$rules = [
							'new_password' => [
								'label'  => 'Password',
								'rules'  => 'required|min_length[6] |max_length[16]',
							],
							'Confirm_password' => [
								'label'  => 'Confirm Password',
								'rules'  => 'required|matches[new_password]'

							],
						];

						if ($this->validate($rules)) {
							$password   = password_hash($this->request->getVar('new_password'), PASSWORD_DEFAULT);
							$update_pass = $this->loginModel->update_password('register_all_users',$token, $password);
							if ($update_pass) {
								$this->session->setTempdata('success', 'Password Updated Successfully',3);
								return redirect()->to(base_url().'/Accountent_login/accountent_login');
							}else{
								$this->session->setTempdata('error', 'Sorry Unable to Update Password Try Again !',3);
									return redirect()->to(current_url());
							}
						}else{
							$data['validation'] = $this->validator;
						}
					}else{
						
					}
				}else{
					$data['error']  = 'Reset Password Link was Expired';
				}
			}else{
				$data['error'] = 'Unable to Find User Account';
			}
		}else{
			$data['error']  = 'Sorry ! Unauthorized access';
		}
		return view('Account/reset_acc_password', $data);
	}


	public function checkExpiry_time($time){
		$update_time   = strtotime($time);
		$current_time  = time();
		$timeDiff      = ($current_time - $update_time)/60;
		if ($timeDiff < 900) {
			return true;
		}else{
			return false;
		}
	}


	public function Logout_accountent(){
		if (session()->has('loggedin_info')) {
			$login_activity_id = session()->get('loggedin_info');
			$this->loginModel->updateLogoutTime($login_activity_id);
		}
		session()->remove('google_user');
		session()->destroy();
		return redirect()->to(base_url()."/Accountent_login/accountent_login");
	}







}