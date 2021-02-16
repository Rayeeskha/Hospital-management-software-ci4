<?php namespace App\Controllers;
use CodeIgniter\Controller;	
use \App\Models\Login_model;
use \App\Models\Register_model;
use \App\Models\Admin_Model;

class Blood_bank_donor extends BaseController
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
		if (!(session()->has('loggedin_user') || session()->has('google_user'))) {
			return redirect()->to(base_url()."/Blood_bank_registration/login_account");
		}else{
			$uniid = session()->get('loggedin_user');
			$data['userdata'] = $this->adminModel->getLoggedInDonor_data($uniid);
			$data['all_donors'] = $this->adminModel->fetch_all_records('blood_donor');
			$args = [
				'status' => 'Active'
			];
			$data['blood_bank'] = $this->adminModel->fetch_rec_by_args('blood_group', $args);
			return view('Blood_bank/Donor/dashboard', $data);
		}
	}

	public function donor_registration(){
		return view('Blood_bank/Donor/donor_registration');
	}

	public function donor_registered(){
		$data = [];
			$data['validation'] = null;
			if ($this->request->getMethod() == 'post') {
				$rules = [
					'donor_name'      => 'required|min_length[3]|max_length[20]',
					'blood_group'      => 'required',
					'contact_number'     => 'required|numeric|exact_length[10]',
					'address'   => 'required|min_length[4]|max_length[50]',
				];
				if ($this->validate($rules)) {
					 $uid = md5(str_shuffle('abcdefghizklmnopqrstuvwxyz'.time()));
					 $img = $this->request->getFile('donor_photo');
					
					 if ($img->isValid() &&  !$img->hasMoved()) {
					 	 $newName = $img->getRandomName();
					 	 // $doc_img = $image->getName();
	                	$img->move('./public/uploads/donar_users', $newName); 
	                	// $path = $this->request->getFile('doctor_image')->store();
	                	$doc_img = $img->getName();
	                	// var_dump($doc_img);
	                	// exit();
						$userdata = [
							'donor_name'           =>  $this->request->getVar('donor_name',FILTER_SANITIZE_STRING),
							'blood_group'           =>  $this->request->getVar('blood_group',FILTER_SANITIZE_STRING),
							'contact_number'          =>  $this->request->getVar('contact_number'),
							'address'        =>  $this->request->getVar('address',FILTER_SANITIZE_STRING),
							
							'uid'                  =>  $uid,
							'donor_image'          =>  $doc_img,
							'status'                => 'Active', 
							'created_at'            =>  date('Y-m-d h:i:s')
						];

						// var_dump($userdata);
						// exit();

						$status = $this->adminModel->Insertdata('blood_donor', $userdata);
						if ($status == true) {
							$this->session->setTempdata('success', 'Congratulation ! Donor Requested Successfully !', 3);
						}else{
							$this->session->setTempdata('error', 'Sorry ! Unable to Add  Donor  Try Again ?', 3);
						}  
						return redirect()->to(base_url().'/Blood_bank_donor/donor_registration');

					 }else{
					 	echo $image->getErrorString(). " " .$image->getError();
					 }
				}else{
					$data['validation'] = $this->validator;
				}
			}
		return view('Blood_bank/Donor/donor_registration', $data);
	}

	public function search_donor(){
		$uniid = session()->get('loggedin_user');
		$data['userdata'] = $this->adminModel->getLoggedInDonor_data($uniid);
		$data['all_donors'] = $this->adminModel->fetch_all_records('blood_donor');
		return view('Blood_bank/Donor/search_donor', $data);
	}

	public function search_donor_details(){
		$args = [
			'blood_group'   => $this->request->getVar('blood_group', FILTER_SANITIZE_STRING)
		];

		$data['all_donors'] = $this->adminModel->fetch_rec_by_args_by_like('blood_donor',$args);
		return view('Blood_bank/Donor/search_donor', $data);
	}

	public function blood_req_google_users($id){
		if (!session()->has('google_user')) {
			return redirect()->to(base_url()."/Blood_bank_registration/login_account");
		}else{
			$uinfo = session()->get('google_user');
			//  echo "<pre>";
			//  var_dump($uinfo);
			// exit();
			$data = [
				'blood_donor_id'        => $id,
				'request_user'          => $uinfo['first_name'],
				'last_name'             => $uinfo['last_name'],
				'request_user_email'    => $uinfo['email'],
				'profile_pic'           => $uinfo['profile_pic'],
				'status'                => 'Active',
				'request_date'          => date('Y-m-d')
			];
			$status = $this->adminModel->Insertdata('blood_request_google_user', $data);
			if ($status == true) {
				$this->session->setTempdata('success', 'Congratulation ! Your Blood Request Successfully !', 3);
			}else{
				$this->session->setTempdata('error', 'Sorry ! Unable to Send  Blood Request  Try Again ?', 3);
			}  
			return redirect()->to(base_url().'/Blood_bank_donor/search_donor_details/'.$id);
		}
	}

	public function blood_request($id){
		if (!session()->has('loggedin_user')) {
			return redirect()->to(base_url()."/Blood_bank_registration/login_account");
		}else{
			$uniid = session()->get('loggedin_user');
			$data['userdata'] = $this->adminModel->getLoggedInDonor_data($uniid);
			//Checking User & Store Id in Session Variable
			$user_session = [
				'id'    =>  $data['userdata']->id
			];
			$this->session->set('user_session_id',$user_session);
			//Checking User & Store Id in Session Variable
			$user_id = session()->get('user_session_id');
			$data = [
				'blood_donor_id'   => $id,
				'request_user_id'  => $user_id,
				'status'           =>'Active',
				'request_date'     => date('Y-m-d')
			];
			$status = $this->adminModel->Insertdata('blood_requested_user', $data);
			if ($status == true) {
				$this->session->setTempdata('success', 'Congratulation ! Your Blood Request Successfully !', 3);
			}else{
				$this->session->setTempdata('error', 'Sorry ! Unable to Send  Blood Request  Try Again ?', 3);
			}  
			return redirect()->to(base_url().'/Blood_bank_donor/search_donor_details/'.$id);
		}
	}

	public function blood_bank(){
		if (!(session()->has('loggedin_user') || session()->has('google_user'))) {
			return redirect()->to(base_url()."/Blood_bank_registration/login_account");
		}else{
			$args = [
				'status' => 'Active'
			];
			$data['blood_bank'] = $this->adminModel->fetch_rec_by_args('blood_group', $args);
			return view('Blood_bank/Donor/blood_bank', $data);
		}
	}

	public function search_hos_bld_user(){
		if (!(session()->has('loggedin_user') || session()->has('google_user'))) {
			return redirect()->to(base_url()."/Blood_bank_registration/login_account");
		}
		$args = [
			'blood_group'   => $this->request->getVar('blood_group', FILTER_SANITIZE_STRING),
			'status' => 'Active'
		];

		$data['blood_bank'] = $this->adminModel->fetch_rec_by_args_by_like('blood_group',$args);
		return view('Blood_bank/Donor/blood_bank', $data);
	}





}