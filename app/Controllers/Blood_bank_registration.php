<?php namespace App\Controllers;
use CodeIgniter\Controller;	
use \App\Models\Login_model;
use \App\Models\Register_model;
use \App\Models\Admin_Model;

class Blood_bank_registration extends BaseController
{
	public $loginModel;
	public $session;
	public $registerModel;
	public $adminModel;
	public function __construct(){
		helper(['form','date', 'Patent']);
		$this->loginModel = new Login_model();
		$this->session   = session();
		$this->adminModel  = new Admin_Model();
		$this->email = \Config\Services::email();
		$this->registerModel = new Register_model();
	}
	public function index(){
		return view('Blood_bank/index');
	}
	public function registration(){
		$data  = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'username'          => 'required|min_length[4]|max_length[20]',
				'email'             => 'required|valid_email|is_unique[patients_login.email]',
				'gender'            => 'required',
				'mobile'            => 'required|numeric|exact_length[10]',
				'password'          => 'required|min_length[6]|max_length[16]',
				'Confirm_password'  => 'required|matches[password]',
			];
			if($this->validate($rules)){
				$uid = md5(str_shuffle('abcdefghizklmnopqrstuvwxyz'.time()));
				$img = $this->request->getFile('donor_photo');
				 if ($img->isValid() &&  !$img->hasMoved()) {
					 	 $newName = $img->getRandomName();
					 	 // $doc_img = $image->getName();
	                	$img->move('./public/uploads/donor_image', $newName); 
	                	// $path = $this->request->getFile('doctor_image')->store();
	                	$doc_img = $img->getName();
	                	// var_dump($doc_img);
	                	// exit();
						$userdata = [
							'username'         => $this->request->getVar('username',FILTER_SANITIZE_STRING),
							'email'            => $this->request->getVar('email'),
							'password'         => password_hash($this->request->getVar('password',FILTER_SANITIZE_STRING),PASSWORD_DEFAULT),
							'mobile'           => $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
							'gender'           => $this->request->getVar('gender',FILTER_SANITIZE_STRING),
							'uid'              => $uid,
							'image'            => $doc_img,
							'level'            => '5',
							'status'           => 'Active',
							'created_date'     => date('Y-m-d')
						];
					$insert_data = $this->registerModel->Insertdata('blood_bank_users',$userdata);
					if ($insert_data) {
						$this->session->setTempdata('success', 'Account Created Successfully ?',3);
						return redirect()->to(base_url().'/Blood_bank_registration/login_account');   
					}else{
						$this->session->setTempdata('error', 'Sorry Unable to Create an Account, Try Again ?',3);
						return redirect()->to(current_url());
					}

				}else{
					echo $image->getErrorString(). " " .$image->getError();
				}

			}else{
				$data['validation'] =  $this->validator;
			}
		}
		return view('Blood_bank/index', $data);
	}

	//Blood Bank Admin Registration Section  Start
	public function admin_registration(){
		return view('Blood_bank/Admin/admin_registration');
	}

	public function admin_registerd(){
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
						'email'     => $this->request->getVar('email'),
						'password'     => password_hash($this->request->getVar('password',FILTER_SANITIZE_STRING),PASSWORD_DEFAULT),
						'mobile'          => $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
						'gender'          => $this->request->getVar('gender',FILTER_SANITIZE_STRING),
						'uid'             => $uid,
						'level'           => '4',
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
		return view('Blood_bank/Admin/admin_registration', $data);
	}
	//Blood Bank Admin Registration Section  End










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
					$userdata = $this->loginModel->verifyAccountentEmail('blood_bank_users',$email);
					if ($userdata) {
						$pass_verify = password_verify($password, $userdata['password']);
						if ($pass_verify) {
							if ($userdata['status'] == 'Active') {
								if ($userdata['level'] === '5') {
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
									return redirect()->to(base_url().'/Blood_bank_donor');
									
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


			//Google Gmail Login Query Software Developer Khan Rayees
			include_once APPPATH . "libraries/vendor/autoload.php";
			$google_client = new \Google_Client();
			$google_client->setClientId('597704537216-7qiivrukccjfm4i1ijjlm498hcvqnm12.apps.googleusercontent.com');
			$google_client->setClientSecret('VjDBo2PSnA53l5ehfsRFSgMK');
			$google_client->setRedirectUri(base_url(). '/Blood_bank_registration/login_account');
			$google_client->addScope('email');
			$google_client->addScope('profile');
			
			if ($this->request->getVar('code')) {
				$token = $google_client->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
				if (!isset($token['error'])) {
					$google_client->setAccessToken($token['access_token']);
					$this->session->set('access_token',$token['access_token']);
					//to get the profile data
					$google_service = new \Google_Service_Oauth2($google_client);
					$gdata = $google_service->userinfo->get();
					if ($this->loginModel->google_user_exists($gdata['id'])) {
						# update
						$userdata = [
							'first_name'  => $gdata['given_name'],
							'last_name'   => $gdata['family_name'],
							'email'       => $gdata['email'],
							'profile_pic' => $gdata['picture']
						];
						$this->loginModel->updateGoogleUser($userdata, $gdata['id']);
						$this->session->set('google_user', $userdata);
						return redirect()->to(base_url() . "/Blood_bank_donor");


					}else{
						//insert
						$userdata = [
							'oauth_id'    => $gdata['id'],
							'first_name'  => $gdata['given_name'],
							'last_name'   => $gdata['family_name'],
							'email'       => $gdata['email'],
							'profile_pic' => $gdata['picture']
						];
						$this->loginModel->createGoogleUser($userdata);
						$this->session->set('google_user', $userdata);
						return redirect()->to(base_url() . "/Blood_bank_donor");

					}
				}
			}
			if (!$this->session->get('access_token')) {
				$data['loginButton'] = $google_client->createAuthUrl(); 
			}
		return view('Blood_bank/login_account', $data);
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
						$userdata = $this->loginModel->verifyEmail_with_args('blood_bank_users',$email);
						if (!empty($userdata)) {
							$update = $this->loginModel->updatedAt('blood_bank_users',$userdata['uid']);
							if ($update) {
								$to = $email;
								$subject  = 'Reset Password Link';
								$token    = $userdata['uid'];
								$message  = 'Hi ' .$userdata['username']. '<br><br>'
												.'Your Reset Password request has been Received. Please Click'
												.' the below Link to reset your Password.<br><br>'
												.'<a href="'.base_url().'/Blood_bank_registration/reset_password/'.$token.'">Click Here to Reset Password</a>'
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
		return view('Blood_bank/forget_password', $data);
	}

		public function reset_password($token=null){
		$data = [];
		if (!empty($token)) {
			$userdata = $this->loginModel->verifyToken('blood_bank_users', $token);
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
							$update_pass = $this->loginModel->update_password('blood_bank_users',$token, $password);
							if ($update_pass) {
								$this->session->setTempdata('success', 'Password Updated Successfully',3);
								return redirect()->to(base_url().'/Blood_bank/index');
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
		return view('Blood_bank_registration/reset_acc_password', $data);
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

	public function Logout_account(){
		if (session()->has('loggedin_info')) {
			$login_activity_id = session()->get('loggedin_info');
			$this->loginModel->updateLogoutTime($login_activity_id);
		}
		session()->remove('google_user');
		session()->destroy();
		return redirect()->to(base_url()."/Blood_bank_registration/login_account");
	}



}