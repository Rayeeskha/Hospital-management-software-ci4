<?php namespace App\Controllers;
use \App\Models\Admin_Model;
use \App\Models\Login_model;
use \App\Models\Medicine_model;
use \App\Models\AutoModel;

class Patients extends BaseController
{
	public $adminModel;
	public $session;
	public $patinet_model;
	public $loginModel;
	public function __construct(){
		helper(['form','Patent','text']);
		$this->adminModel = new Admin_Model();
		$this->email = \Config\Services::email();
		$this->session    = \Config\Services::session();
		$this->medicine_model   = new Medicine_model();
		$this->loginModel = new Login_model();
		$this->patinet_model   = new AutoModel();
	}

	public function index(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Patients_login/login_account");
		}else{
			$uniid = session()->get('loggedin_user');
			$data['userdata'] = $this->loginModel->getLoggedInPatientsData($uniid);
			//Checking Patients Email is Given or Not to Access Pateints Admit details 	
			$args = [
				'patent_email'  => $data['userdata']->email
			];
			//Checking Patients Email is Given or Not to Access Pateints Admit details 
			$check_account = $this->adminModel->fetch_rec_by_args('patents', $args);
			if ($check_account) {
				//Store Patient ID In Session
				$patient_session = [
					'id'   => $check_account[0]->id
				];
				$this->session->set('patient_session_id',$patient_session);
				//Store Patient ID In Session
				$patient_id = session()->get('patient_session_id');

				//Fetch Doctor Name
				$args = [
					'id'           => $patient_id,
					
				];

				$patent_details = $this->adminModel->fetch_rec_by_args('patents', $args);
				if ($patent_details) {
					$args = [
						'id'  => $patent_details[0]->doctor_name
					];
					$data['doctor_details'] = $this->adminModel->fetch_rec_by_args('doctor', $args);
				}
				//Fetch Doctor Name

				//Dashboard Query Start 

				//Dashboard Query Start 
				return view('Patients/dashboard', $data);
			}else{
				$data['doctors'] = $this->adminModel->fetch_all_records('doctor');
				return view('Patients/book_appointment_dash', $data);	
			}
			
		}
	}

	public function view_receipt(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Patients_login/login_account");
		}else{
			$patient_id = session()->get('patient_session_id');
			$args = [
				'id'      => $patient_id
				
			];
			$data['patients'] = $this->adminModel->fetch_rec_by_args('patents', $args);
			return view('Patients/view_receipt', $data);
		}
		
	}

	public function discharge_report(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Patients_login/login_account");
		}else{
			$patient_id = session()->get('patient_session_id');
			$args = [
				'pateints_id'      => $patient_id,
				'status'           => 'Discharge'
			];
			$data['payment_bill'] = $this->adminModel->fetch_rec_by_args('patents_discharge', $args);
			return view('Patients/discharge_patient_report', $data);
		}
	}

	public function view_doctor(){
		$data['view_doctor'] = $this->adminModel->fetch_all_records('doctor');
		return view('Patients/view_doctor',$data);
	}

	public function booked_doctor($id){
		$args = [
			'id'  => $id
		];
		$data['doctor_id'] = $this->adminModel->fetch_rec_by_args('doctor', $args);
		return view('Patients/booked_doctor', $data);
	}

	public function booked_doctor_appointment(){
		$data = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'patient_name'      => 'required|min_length[4]|max_length[20]',
				'patient_mobile'    => 'required|numeric|exact_length[10]',
				'pateint_issue'     => 'required',
				'patient_email'     => 'required|valid_email',
				'boking_date'       => 'required',
				'boking_time'        => 'required',
			];
			if ($this->validate($rules)) {
				$userdata = [
					'patient_name'          =>  $this->request->getVar('patient_name',FILTER_SANITIZE_STRING),
					'patient_email'         =>  $this->request->getVar('patient_email'),
					'patient_mobile'        =>  $this->request->getVar('patient_mobile',FILTER_SANITIZE_STRING),
					'boking_date'           =>  $this->request->getVar('boking_date',FILTER_SANITIZE_STRING),
					'boking_time'           =>  $this->request->getVar('boking_time',FILTER_SANITIZE_STRING),
					'pateint_issue'         =>  $this->request->getVar('pateint_issue',FILTER_SANITIZE_STRING),
					'doctor_id'             =>  $this->request->getVar('doctor_id',FILTER_SANITIZE_STRING),
					'doctor_name'           =>  $this->request->getVar('doctor_name',FILTER_SANITIZE_STRING),
					'status'                => 'Appointment', 
					'created_at'            =>  date('Y-m-d')
				];
				$status = $this->adminModel->Insertdata('booked_doctor', $userdata);
				if ($status == true) {
					$to        = $this->request->getVar('patient_email');
					$subject   = 'Booking Appointment  - Hospital Management System';
					$message   = 'Hi ' .$this->request->getVar('patient_name',FILTER_SANITIZE_STRING).",
						<br>Thanks You are Booked Appointment to Dr. ".$this->request->getVar('doctor_name',FILTER_SANITIZE_STRING). "<br><br> Thanks For Your Booking <br> Your Booking date is :"
						.$this->request->getVar('boking_date',FILTER_SANITIZE_STRING)."<br> Booking Time is:<b>".$this->request->getVar('boking_time',FILTER_SANITIZE_STRING)."</b>";
						$this->email->setTo($to);
						$this->email->setFrom('khanrayeesq121@gmail.com', 'Info');
						$this->email->setSubject($subject);
						$this->email->setMessage($message);
						$filepath = 'public/assets/images/logo3.png';
						$this->email->attach($filepath);
						if ($this->email->send()) {
							$this->session->setTempdata('success', 'Appointment Booked Successfully !',3 );
						}else{
							$this->session->setTempdata('error', ' Sorry Unable to Send Booked Doctor Please Contact <br> FlexionSoftware Solution by Khan Rayees <br> Mobile: 9554540271');
						}
						return redirect()->to(base_url().'/Patients/view_doctor');
				}else{
					$this->session->setTempdata('error', 'Sorry ! Unable to Booked  Try Again ?', 3);
				}  
				return redirect()->to(base_url().'/Patients/view_doctor');

			}else{
				$data['validation'] = $this->validator;
			}
			return view('Patients/booked_doctor', $data);

		}
	}


	public function booked_appointment_dash(){
		$data = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'patient_name'      => 'required|min_length[4]|max_length[20]',
				'patient_mobile'    => 'required|numeric|exact_length[10]',
				'pateint_issue'     => 'required',
				'patient_email'     => 'required|valid_email',
				'doctor_name'       => 'required',
				'boking_date'       => 'required',
				'boking_time'        => 'required',
			];
			if ($this->validate($rules)) {
				$userdata = [
					'patient_name'          =>  $this->request->getVar('patient_name',FILTER_SANITIZE_STRING),
					'patient_email'         =>  $this->request->getVar('patient_email'),
					'patient_mobile'        =>  $this->request->getVar('patient_mobile',FILTER_SANITIZE_STRING),
					'boking_date'           =>  $this->request->getVar('boking_date',FILTER_SANITIZE_STRING),
					'boking_time'           =>  $this->request->getVar('boking_time',FILTER_SANITIZE_STRING),
					'pateint_issue'         =>  $this->request->getVar('pateint_issue',FILTER_SANITIZE_STRING),
					'doctor_id'             =>  $this->request->getVar('doctor_name',FILTER_SANITIZE_STRING),
					'doctor_name'           =>  'Doctors',
					'status'                => 'Appointment', 
					'created_at'            =>  date('Y-m-d')
				];
				$status = $this->adminModel->Insertdata('booked_doctor', $userdata);
				if ($status == true) {
					$args  = [
						'id'  => $this->request->getVar('doctor_name',FILTER_SANITIZE_STRING)
					];
					$doctor = $this->adminModel->fetch_rec_by_args('doctor', $args);

					$to        = $this->request->getVar('patient_email');
					$subject   = 'Booking Appointment  - Hospital Management System';
					$message   = 'Hi Your are booking to Dr. ' .$doctor[0]->doctor_name.",
						<br>Welcome : ".$this->request->getVar('patient_name',FILTER_SANITIZE_STRING). "<br><br> Thanks For Your Booking <br> Your Booking date is :"
						.$this->request->getVar('boking_date',FILTER_SANITIZE_STRING)."<br> Booking Time is:<b>".$this->request->getVar('boking_time',FILTER_SANITIZE_STRING)."</b>";
						$this->email->setTo($to);
						$this->email->setFrom('khanrayeesq121@gmail.com', 'Info');
						$this->email->setSubject($subject);
						$this->email->setMessage($message);
						$filepath = 'public/assets/images/logo3.png';
						$this->email->attach($filepath);
						if ($this->email->send()) {
							$this->session->setTempdata('success', 'Appointment Booked Successfully !',3 );
						}else{
							$this->session->setTempdata('error', ' Sorry Unable to Send Booked Doctor Please Contact <br> FlexionSoftware Solution by Khan Rayees <br> Mobile: 9554540271');
						}
						return redirect()->to(base_url().'/Patients/success');
				}else{
					$this->session->setTempdata('error', 'Sorry ! Unable to Booked  Try Again ?', 3);
				}  
				return redirect()->to(base_url().'/Patients/booked_appointment_dash');

			}else{
				$data['validation'] = $this->validator;
			}
			$data['doctors'] = $this->adminModel->fetch_all_records('doctor');
			return view('Patients/book_appointment_dash', $data);
		}
	}

	public function success(){
		return view('Patients/success_view');
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
						$userdata = $this->loginModel->verifyEmail_with_args('patients_login',$email);
						if (!empty($userdata)) {
							$update = $this->loginModel->updatedAt('patients_login',$userdata['uid']);
							if ($update) {
								$to = $email;
								$subject  = 'Reset Password Link';
								$token    = $userdata['uid'];
								$message  = 'Hi ' .$userdata['username']. '<br><br>'
												.'Your Reset Password request has been Received. Please Click'
												.' the below Link to reset your Password.<br><br>'
												.'<a href="'.base_url().'/Patients/reset_password/'.$token.'">Click Here to Reset Password</a>'
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
		return view('Patients/forget_password', $data);
	}

	public function reset_password($token=null){
		$data = [];
		if (!empty($token)) {
			$userdata = $this->loginModel->verifyToken('patients_login', $token);
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
							$update_pass = $this->loginModel->update_password('patients_login',$token, $password);
							if ($update_pass) {
								$this->session->setTempdata('success', 'Password Updated Successfully',3);
								return redirect()->to(base_url().'/Patients/index');
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
		return view('Patients/reset_acc_password', $data);
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

	public function review_hosp_activity(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Patients_login/login_account");
		}else{
			$data = [];
			$data['validation'] = null;
			if ($this->request->getMethod() == 'post') {
				$rules = [
					'review_title'     => 'required',
					'review_content'   => 'required|min_length[4]|max_length[200]'
					
				];
				if ($this->validate($rules)) {
					$img = $this->request->getFile('review_image');
					
					 if ($img->isValid() &&  !$img->hasMoved()) {
					 	 $newName = $img->getRandomName();
					 	 // $doc_img = $image->getName();
	                	$img->move('./public/uploads/frontend/review_image', $newName); 
	                	// $path = $this->request->getFile('doctor_image')->store();
	                	$doc_img = $img->getName();
	                	// var_dump($doc_img);
	                	// exit();
						$userdata = [
							'review_title'           =>  $this->request->getVar('review_title',FILTER_SANITIZE_STRING),
							'review_content'           =>  $this->request->getVar('review_content',FILTER_SANITIZE_STRING),
							'review_image'          =>  $doc_img,
							'status'                => 'Active', 
							'created_at'            =>  date('Y-m-d')
						];

						// var_dump($userdata);
						// exit();

						$status = $this->adminModel->Insertdata('review_hospital', $userdata);
						if ($status == true) {
							$this->session->setTempdata('success', 'Thanks ! for Your Feedback !', 3);
						}else{
							$this->session->setTempdata('error', 'Sorry ! Unable to Send your Feedback  Try Again ?', 3);
						}  
						return redirect()->to(base_url().'/Patients/review_hosp_activity');

					 }else{
					 	echo $image->getErrorString(). " " .$image->getError();
					 }
				}else{
					$data['validation'] = $this->validator;
				}
			}
		return view('Patients/review_hosp_activity', $data);
		}
	}









}