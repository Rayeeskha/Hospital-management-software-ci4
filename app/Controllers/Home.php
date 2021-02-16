<?php namespace App\Controllers;
use CodeIgniter\Controller;	
use \App\Models\Login_model;
use \App\Models\Register_model;
use \App\Models\Admin_Model;

class Home extends BaseController
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
	public function index()
	{	
		$args = [
			'status'  => 'Active'
		];
		$data['slider'] = $this->adminModel->get_image_by_args('slider_image', $args, 5);
		$args = [
			'status'  => 'Active'
		];
		$data['why_choose'] = $this->adminModel->get_image_by_args('gallary_image', $args, 7);
		$data['doctors'] = $this->adminModel->fetch_all_records('doctor');
		$data['patients'] = $this->adminModel->fetch_all_records('patents');
		$args = [
			'status'  => 'Active'
		];
		$data['doctors'] = $this->adminModel->fetch_rec_by_args('doctor', $args);
		$args = [
			'status'  => 'Publish'
		];
		$data['blogs'] = $this->adminModel->get_image_by_args('news_blog', $args, 3);
		$args = [
			'status'  => 'Verify'
		];
		$data['pateint_feeback'] = $this->adminModel->get_image_by_args('review_hospital', $args, 3);
		$data['department'] = $this->adminModel->fetch_all_records('department');
		return view('Home/index', $data);
	}

	public function gallary(){
		$args = [
			'status'  => 'Active'
		];
		$data['gallary'] = $this->adminModel->get_image_by_args('gallary_image', $args, 8);
		$args = [
			'status'  => 'Active'
		];
		$data['secound_gallary'] = $this->adminModel->get_image_by_args_as_order('gallary_image', $args, 8);
		return view('Home/section/gallary', $data);
	}

	public function doctor_appointment($id){
		$args = [
			'id' => $id
		];
		$data['doctors'] = $this->adminModel->fetch_rec_by_args('doctor', $args);
		$data['department'] = $this->adminModel->fetch_all_records('department');
		return view('Home/section/doctor_appointment', $data);
	}

	public function book_appointment(){
		$data = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'name'              => 'required|min_length[4]|max_length[20]',
				'mobile'            => 'required|numeric|exact_length[10]',
				'Symptoms'          => 'required',
				'email'             => 'required|valid_email',
				'appointment_date'  => 'required',
				'department'        => 'required',
				'appointment_time'  => 'required',
			];
			if ($this->validate($rules)) {
				$userdata = [
					'patient_name'          =>  $this->request->getVar('name',FILTER_SANITIZE_STRING),
					'patient_email'         =>  $this->request->getVar('email'),
					'patient_mobile'        =>  $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
					'boking_date'           =>  $this->request->getVar('appointment_date',FILTER_SANITIZE_STRING),
					'boking_time'           =>  $this->request->getVar('appointment_time',FILTER_SANITIZE_STRING),
					'pateint_issue'         =>  $this->request->getVar('Symptoms',FILTER_SANITIZE_STRING),
					'description'         =>  $this->request->getVar('description',FILTER_SANITIZE_STRING),
					'department'         =>  $this->request->getVar('department',FILTER_SANITIZE_STRING),
					'doctor_id'             =>  $this->request->getVar('doctor_id',FILTER_SANITIZE_STRING),
					'doctor_name'           =>  $this->request->getVar('doctor_name',FILTER_SANITIZE_STRING),
					'status'                => 'Appointment', 
					'created_at'            =>  date('Y-m-d')
				];
				$status = $this->adminModel->Insertdata('booked_doctor', $userdata);
				if ($status == true) {
					$to        = $this->request->getVar('email');
					$subject   = 'Booking Appointment  - Hospital Management System';
					$message   = 'Hi ' .$this->request->getVar('name',FILTER_SANITIZE_STRING).",
						<br>Thanks You are Booked Appointment to Dr. ".$this->request->getVar('doctor_name',FILTER_SANITIZE_STRING). "<br><br> Thanks For Your Booking <br> Your Booking date is :"
						.$this->request->getVar('appointment_date',FILTER_SANITIZE_STRING)."<br> Booking Time is:<b>".$this->request->getVar('appointment_time',FILTER_SANITIZE_STRING)."</b>";
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
						return redirect()->to(base_url().'/Home/success');
				}else{
					$this->session->setTempdata('error', 'Sorry ! Unable to Booked  Try Again ?', 3);
				}  
				return redirect()->to(base_url().'/Home/success');

			}else{
				$data['validation'] = $this->validator;
			}
			$data['department'] = $this->adminModel->fetch_all_records('department');
			return view('Home/section/doctor_appointment', $data);

		}
	}
	public function blog_archive(){
		$args = [
			'status'  => 'Publish'
		];
		$data['blogs'] = $this->adminModel->get_image_by_args('news_blog', $args, 7);
		$args = [
			'status'  => 'Publish'
		];
		$data['secound_blogs'] = $this->adminModel->get_image_by_args_as_order('news_blog', $args, 8);
		$data['most_view_blog'] = $this->adminModel->fetch_all_records('most_viewed_blog');
		return view('Home/section/blog_archive', $data);
	}

	public function view_blog($id){
		$blog = [
			'blog_id'     => $id,
			'browser'     => $this->getUserAgent(),
			'ip'          => $this->request->getIPAddress(),
			'blog_time'   => date('Y-m-d h:i:s'),
			'vist_date'   => date('Y-m-d')
		];
		$this->adminModel->Insertdata('most_viewed_blog', $blog);
		$args = [
			'status'  => 'Publish'
		];
		$data['blogs'] = $this->adminModel->get_image_by_args('news_blog', $args, 7);
		$args = [
			'id'  => $id
		];
		$data['view_blog'] = $this->adminModel->fetch_rec_by_args('news_blog', $args);
		return view('Home/section/view_blog', $data);
	}

	public function success(){
		return view('Home/section/success');
	}

	public function features(){
		$data['doctors'] = $this->adminModel->fetch_all_records('doctor');
		$data['patients'] = $this->adminModel->fetch_all_records('patents');
		$args = [
			'status'  => 'Active'
		];
		$data['why_choose'] = $this->adminModel->get_image_by_args('gallary_image', $args, 7);
		return view('Home/section/features', $data);
	}

	public function about_us(){
		$data['doctors'] = $this->adminModel->fetch_all_records('doctor');
		$data['patients'] = $this->adminModel->fetch_all_records('patents');
		return view('Home/section/about_us', $data);
	}

	public function contact_us(){
		$data = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'name'       => 'required',
				'subject'    => 'required',
				'mobile'    => 'required',
				'email'      => 'required|valid_email',
			];
			if ($this->validate($rules)) {
					$userdata = [
						'name'          =>  $this->request->getVar('name',FILTER_SANITIZE_STRING),
						'subject'           =>  $this->request->getVar('subject',FILTER_SANITIZE_STRING),
						'email'           =>  $this->request->getVar('email',FILTER_SANITIZE_STRING),
						'message'           =>  $this->request->getVar('message',FILTER_SANITIZE_STRING),
						'mobile'           =>  $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
						'status'               => 'Active', 
						'created_at'           =>  date('Y-m-d')
					];
					$status = $this->adminModel->Insertdata('contact_us', $userdata);
					if ($status == true) {
						$this->session->setTempdata('success', 'Congratulation ! Your Message Send Successfully !', 3);
					}else{
						$this->session->setTempdata('error', 'Sorry ! Unable to Send Your Message Try Again ?', 3);
					}  
					return redirect()->to(base_url().'/Home/success');
			}else{
				$data['validation'] = $this->validator;
			}
		}
		return view('Home/section/contact_us', $data);
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

	public function book_appointment_section(){
		$data = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'name'              => 'required|min_length[4]|max_length[20]',
				'mobile'            => 'required|numeric|exact_length[10]',
				'Symptoms'          => 'required',
				'email'             => 'required|valid_email',
				'appointment_date'  => 'required',
				'department'        => 'required',
				'appointment_time'  => 'required',
			];
			if ($this->validate($rules)) {
				$userdata = [
					'patient_name'          =>  $this->request->getVar('name',FILTER_SANITIZE_STRING),
					'patient_email'         =>  $this->request->getVar('email'),
					'patient_mobile'        =>  $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
					'boking_date'           =>  $this->request->getVar('appointment_date',FILTER_SANITIZE_STRING),
					'boking_time'           =>  $this->request->getVar('appointment_time',FILTER_SANITIZE_STRING),
					'pateint_issue'         =>  $this->request->getVar('Symptoms',FILTER_SANITIZE_STRING),
					'description'         =>  $this->request->getVar('description',FILTER_SANITIZE_STRING),
					'department'         =>  $this->request->getVar('department',FILTER_SANITIZE_STRING),
					'doctor_id'             =>  $this->request->getVar('doctor_id',FILTER_SANITIZE_STRING),
					'doctor_name'           =>  $this->request->getVar('doctor_name',FILTER_SANITIZE_STRING),
					'status'                => 'Appointment', 
					'created_at'            =>  date('Y-m-d')
				];
				$status = $this->adminModel->Insertdata('booked_doctor', $userdata);
				if ($status == true) {
					$to        = $this->request->getVar('email');
					$subject   = 'Booking Appointment  - Hospital Management System';
					$message   = 'Hi ' .$this->request->getVar('name',FILTER_SANITIZE_STRING).",
						<br>Thanks You are Booked Appointment to Dr. ".$this->request->getVar('doctor_name',FILTER_SANITIZE_STRING). "<br><br> Thanks For Your Booking <br> Your Booking date is :"
						.$this->request->getVar('appointment_date',FILTER_SANITIZE_STRING)."<br> Booking Time is:<b>".$this->request->getVar('appointment_time',FILTER_SANITIZE_STRING)."</b>";
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
						return redirect()->to(base_url().'/Home/success');
				}else{
					$this->session->setTempdata('error', 'Sorry ! Unable to Booked  Try Again ?', 3);
				}  
				return redirect()->to(base_url().'/Home/success');

			}else{
				$data['validation'] = $this->validator;
			}
			$data['department'] = $this->adminModel->fetch_all_records('department');
			return view('Home/index', $data);
		}
	}








}

	

	//Client ID = 597704537216-cacjdto2hchrfsfd8qng9pk4g0376gp6.apps.googleusercontent.com
	//secret key = 5yRtZTTu0el4y74t5RXmMDI1

	//--------------------------------------------------------------------


