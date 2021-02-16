<?php 
namespace App\Controllers;
use CodeIgniter\Controller;	
use \App\Models\Login_model;
use \App\Models\Admin_Model;
	
	class Login extends BaseController
	{	
		public $loginModel;
		public $session;
		public $adminModel;
		public function __construct(){
			helper('form');
			$this->loginModel = new Login_model();
			$this->session   = session();
			$this->email = \Config\Services::email();
			$this->adminModel = new Admin_Model();
		}

		public function index(){
			$data = [];
			//site login 
			if ($this->request->getMethod() == 'post') {
				$rules = [
					'email'  => 'required|valid_email',
					'password'   => 'required|min_length[4]|max_length[16]'
				];
				if ($this->validate($rules)) {
					$email     = $this->request->getVar('email');
					$password  = $this->request->getVar('password');
					
					$throttler = \Config\Services::throttler();
					$allow     = $throttler->check("login", 4, MINUTE);
					if ($allow) {
						$userdata = $this->loginModel->verifyEmail($email, $password);
						if ($userdata['status'] == 'Active') {
							if ($userdata['level'] === '1') {
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
								return redirect()->to(base_url().'/Admin');
							}
							else{
								$data['error']  = 'Email & password do Not Matched  Invalid';
							}
						}else{
							$data['error']  = 'Your Account is Bloked by Admin Please Contect Admin';
						}
					}else{
						$data['error']  = 'Max No. of failed Login Attempt, Try Again a Few Minutes';
					}
				}else{
					
					$data['validation']  = $this->validator;
				}
			}		
			//Google Gmail Login Query Software Developer Khan Rayees
			return view('Login/index', $data);
		}


		public function create_doctor(){
			if (!(session()->has('loggedin_user'))) {
				return redirect()->to(base_url()."/Login");
			}else{
				$data['doctor'] = $this->adminModel->fetch_all_records('doctor');
				return view('Admin/Account/create_doctor', $data);
			}
		}


	public function get_doctor_data($id){
		$args = [
			'id'  => $id
		];

		$data = $this->adminModel->fetch_rec_by_args('doctor', $args);
		echo json_encode($data);
	}

	public function Create_doctor_account(){
		$data  = [];
		$data['validation'] = null;
		if($this->request->getMethod() == 'post'){
			$rules = [
				    'doctor_name'  => [
					'rules'  => 'required',
					'errors'    => [
						'required' => 'Doctor Name is Manidatory'
					],
				],
				'doctor_email'  => [
					'rules'   => 'required|valid_email|is_unique[register_all_users.email]',
					'errors'  => [
						'required'     => 'Doctor Email is Required',
						'valid_email'  => 'Enter Valid Email',
						'is_unique'    => 'Email is Already tacken Advice go to Login Other wise Pickup Another Email',
					],
				],
				'gender'  => [
					'rules'   => 'required',
					'errors'  => [
						'required'     => 'Doctor Gender is Required',
					],
				],
				'mobile' =>[
					'rules'  =>  'required|numeric|exact_length[10]',
					'errors' => [
						'required'     => 'Mobile Number is Required',
						'exact_length' => 'Exact Length Should be 10 Digit',
					],
				],


				'password'  => [
					'rules'   => 'required|min_length[6]|max_length[16]',
					'errors'  => [
						'required'  => 'Password is Required',
					],
				],
				'conf_password'  => [
					'rules'   => 'required|matches[password]',
					'errors'  => [
						'required'  => 'Confirm Password is Required',
					],
				],
			];
			if($this->validate($rules)){
				$uid = md5(str_shuffle('abcdefghizklmnopqrstuvwxyz'.time()));
				$userdata = [
					'username'  => $this->request->getVar('doctor_name',FILTER_SANITIZE_STRING),
					'mobile'    => $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
					'gender'    => $this->request->getVar('gender',FILTER_SANITIZE_STRING),
					'email'     => $this->request->getVar('doctor_email'),
					'password'     => password_hash($this->request->getVar('password',FILTER_SANITIZE_STRING),PASSWORD_DEFAULT),
					'uid'             => $uid,
					'level'             => '3',
					'status'             => 'Active',
					'created_date'    => date('Y-m-d h:i:s')
				];
				$status = $this->adminModel->Insertdata('register_all_users',$userdata);
				if ($status == true) {
					$this->session->setTempdata('success', 'Congratulation ! Account Created  Successfully !', 3);
				}else{
					$this->session->setTempdata('error', 'Sorry ! Unable to Create Account  Try Again ?', 3);
				}  
					return redirect()->to(base_url().'/Login/create_doctor');
			}else{
				$data['validation'] = $this->validator;
			}
		}else{
			$data['validation'] = $this->validator;
		}
		$data['doctor'] = $this->adminModel->fetch_all_records('doctor');
		return view('Admin/Account/create_doctor', $data);
	}

	public function create_med_account(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		return view('Admin/Account/create_med_account');
	}

	public function create_medical_acc_account(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$data  = [];
			$data['validation'] = null;
			if($this->request->getMethod() == 'post'){
				$rules = [
					'med_acc_name'  => [
						'rules'     => 'required',
						'errors'    => [
							'required' => 'Accountent Name is Manidatory'
						],
					],
					'med_acc_email'  => [
						'rules'      => 'required|valid_email|is_unique[register_all_users.email]',
						'errors'     => [
							'required'     => 'Accountent Email is Required',
							'valid_email'  => 'Enter Valid Email',
							'is_unique'    => 'Already Exit Advice go to Login Other wise pickup Another Email',
						],
					],
					'mobile' =>[
						'rules'  =>  'required|numeric|exact_length[10]',
						'errors' => [
							'required'     => 'Mobile Number is Required',
							'exact_length' => 'Exact Length Should be 10 Digit',
						],
					],
					'gender' =>[
						'rules'  =>  'required',
						'errors' => [
							'required'     => 'Gender is Required'
							
						],
					],

					'password'    => [
						'rules'   => 'required|min_length[6]|max_length[16]',
						'errors'  => [
							'required'  => 'Password is Required',
						],
					],
					'conf_password'  => [
						'rules'      => 'required|matches[password]',
						'errors'     => [
							'required'  => 'Confirm Password is Required',
						],
					],
				];
				if($this->validate($rules)){
					$uid  = md5(str_shuffle('abcdefghizklmnopqrstuvwxyz'.time()));
					$userdata = [
						'username'        => $this->request->getVar('med_acc_name',FILTER_SANITIZE_STRING),
						'mobile'        => $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
						'gender'        => $this->request->getVar('gender',FILTER_SANITIZE_STRING),
						'email'           => $this->request->getVar('med_acc_email'),
						'password'        => password_hash($this->request->getVar('password',FILTER_SANITIZE_STRING),PASSWORD_DEFAULT),
						'uid'             => $uid,
						'level'           => '2',
						'status'          => 'Active',
						'created_date'    => date('Y-m-d h:i:s')
					];
					$status = $this->adminModel->Insertdata('register_all_users',$userdata);
					if ($status == true) {
						$this->session->setTempdata('success', 'Congratulation ! Accountent Account Created  Successfully !', 3);
					}else{
						$this->session->setTempdata('error', 'Sorry ! Unable to Create Account  Try Again ?', 3);
					}  
					return redirect()->to(base_url().'/Login/create_med_account');
				}else{
					$data['validation'] = $this->validator;
				}
			}
		return view('Admin/Account/create_med_account', $data);
	}


	public function create_blood_acc(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$data  = [];
			$data['validation'] = null;
			if($this->request->getMethod() == 'post'){
				$rules = [
					'accountent_name'  => [
						'rules'     => 'required',
						'errors'    => [
							'required' => 'Blood Bank Accountent Name is Manidatory'
						],
					],
					'email'  => [
						'rules'      => 'required|valid_email|is_unique[register_all_users.email]',
						'errors'     => [
							'required'     => 'Accountent Email is Required',
							'valid_email'  => 'Enter Valid Email',
							'is_unique'    => 'Already Exit Advice go to Login Other wise pickup Another Email',
						],
					],
					'mobile' =>[
						'rules'  =>  'required|numeric|exact_length[10]',
						'errors' => [
							'required'     => 'Mobile Number is Required',
							'exact_length' => 'Exact Length Should be 10 Digit',
						],
					],
					'gender' =>[
						'rules'  =>  'required',
						'errors' => [
							'required'     => 'Gender is Required'
						],
					],

					'password'    => [
						'rules'   => 'required|min_length[6]|max_length[16]',
						'errors'  => [
							'required'  => 'Password is Required',
						],
					],
					'confirm_password'  => [
						'rules'      => 'required|matches[password]',
						'errors'     => [
							'required'  => 'Confirm Password is Required',
						],
					],
				];
				if($this->validate($rules)){
					$uid  = md5(str_shuffle('abcdefghizklmnopqrstuvwxyz'.time()));
					$userdata = [
						'username'        => $this->request->getVar('accountent_name',FILTER_SANITIZE_STRING),
						'mobile'          => $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
						'gender'          => $this->request->getVar('gender',FILTER_SANITIZE_STRING),
						'email'           => $this->request->getVar('email'),
						'password'        => password_hash($this->request->getVar('password',FILTER_SANITIZE_STRING),PASSWORD_DEFAULT),
						'uid'             => $uid,
						'level'           => '4',
						'status'          => 'Active',
						'created_date'    => date('Y-m-d h:i:s')
					];
					$status = $this->adminModel->Insertdata('register_all_users',$userdata);
					if ($status == true) {
						$this->session->setTempdata('success', 'Congratulation ! Blood Bank Accountent Account Created  Successfully !', 3);
					}else{
						$this->session->setTempdata('error', 'Sorry ! Unable to Create Account  Try Again ?', 3);
					}  
					return redirect()->to(base_url().'/Login/create_blood_acc');
				}else{
					$data['validation'] = $this->validator;
				}
			}
		return view('Admin/Account/blood_bank_accountent', $data);
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


	public function Logout(){
		if (session()->has('loggedin_info')) {
			$login_activity_id = session()->get('loggedin_info');
			$this->loginModel->updateLogoutTime($login_activity_id);
		}
		session()->remove('google_user');
		session()->destroy();
		return redirect()->to(base_url()."/Login");
	}

		





	}