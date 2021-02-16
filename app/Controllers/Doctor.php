<?php namespace App\Controllers;
use \App\Models\Admin_Model;
use \App\Models\AutoModel;
use \App\Models\Medicine_model;

class Doctor extends BaseController
{
	public $adminModel;
	public $session;
	public $medicine_model;
	public $patinet_model;
	public function __construct(){
		helper(['form','Patent', 'text']);
		$this->adminModel = new Admin_Model();
		$this->session    = \Config\Services::session();
		$this->medicine_model   = new Medicine_model();
		$this->patinet_model   = new AutoModel();
	}
    
    public function index(){
    	if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$uniid = session()->get('loggedin_user');
			$data['userdata'] = $this->adminModel->getLoggedInUserData($uniid);
		//Checking Activation Account is Activate to Access Control or Not	
			$args = [
				'doctor_email'  => $data['userdata']->email
			];
			$check_account = $this->adminModel->fetch_rec_by_args('doctor', $args);
			if ($check_account) {
				//Store Doctor Account in session
				$doctor_session = [
					'id'    =>  $check_account[0]->id
				];
				$this->session->set('doctor_session_id',$doctor_session);
				//Store Doctor Account in session

			//Dashboard Section Query
				//Today Patient Under You 
				$doctor_id = session()->get('doctor_session_id');
				$args = [
					'doctor_name'  => $doctor_id,
					'status'       => 'Active',
					'created_at'   => date('Y-m-d')
				];
				$data['p_under_u'] = $this->patinet_model->where($args)->findAll();
				//Today Patient Under You

				//Discharge Patient Under You
				$doctor_id = session()->get('doctor_session_id');
				$args = [
					'doctor_name'  => $doctor_id,
					'status'       => 'Ddischarge'
				];
				$data['t_d_patient'] = $this->patinet_model->where($args)->findAll(); 
				//Discharge Patient Under You

				//Doctor Appointment Section Script
				 $doctor_id = session()->get('doctor_session_id');
				 $args = [
				 	'doctor_id'   => $doctor_id,
				 	'created_at'  => date('Y-m-d')
				 ];
				 $data['appointment'] = $this->adminModel->fetch_rec_by_args('booked_doctor', $args);
				//Doctor Appointment Section Script 
				 $doctor_id = session()->get('doctor_session_id');
				 $args = [
				 	'doctor_id'   => $doctor_id
				 ];
				 $all_appointment = $this->adminModel->fetch_rec_by_args('booked_doctor', $args);

				$doctor_id = session()->get('doctor_session_id');
				$args = [
				 	'doctor_name'   => $doctor_id,
				 	'status'        => 'Active'
				];
				$all_patients = $this->adminModel->fetch_rec_by_args('patents', $args);

				$args = [
				 	'doctor_name'   => $doctor_id,
				 	'status'        => 'Ddischarge'
				];
				$all_discharge_pat = $this->adminModel->fetch_rec_by_args('patents', $args);
				 //Chart Sction Query Start
				$data['chart_data']  = [
					'all_appointment_count'      => $all_appointment ? count($all_appointment): '0',
					'total_patients'             => $all_patients ? count($all_patients): '0',
					'all_discharge_pat'          => $all_discharge_pat ? count($all_discharge_pat): '0'
				]; 
				 //Chart Sction Query End
				
			//Dashboard Section Query
				return view('Doctor/dashboard', $data);
		//Checking Activation Account is Activate to Access Control or Not		
			}else{
				return view('Doctor/doctor_req_active', $data);
			}
		}
    }

    public function today_patient(){
    	if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$doctor_id = session()->get('doctor_session_id');
			$args = [
				'doctor_name'  => $doctor_id,
				'status'       => 'Active',
				'created_at'   => date('Y-m-d')
			];
			$data['today_patient'] = $this->patinet_model->where($args)->findAll();
			return view('Doctor/today_patient',$data);
		}
    }

    public function change_patents_status($id, $status){
    	$args = [
    		'id'  => $id
    	];
    	$data = [
    		'status'  => $status
    	];
    	$status = $this->adminModel->update_rec_by_args('patents', $args, $data);
    	if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Patient Discharge  Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Discharge  Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Doctor/today_patient');
    }

    public function filter_patent($filter){
    	if ($filter == 'new_patient') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'old_patient') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else{
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}
		$doctor_id = session()->get('doctor_session_id');
		$args = [
			'doctor_name'  => $doctor_id,
			'created_at' => date('Y-m-d'),
			'status'        => 'Active'

		];
		$data = [
			'today_patient' => $this->patinet_model->filter_rec_by_args_with_pagination('patents', $order, $args)
		];
		return view('Doctor/today_patient',$data);
    }

    public function today_discharge_patient(){
    	if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$doctor_id = session()->get('doctor_session_id');
			$args = [
				'doctor_name'  => $doctor_id,
				'status'       => 'Ddischarge',
				'created_at'   => date('Y-m-d')
			];
			$data['today_patient'] = $this->patinet_model->where($args)->findAll();
			return view('Doctor/today_discharge_patient', $data);
		}
    }

    public function filter_today_discharge_patient($filter){
    		if ($filter == 'new_patient') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'old_patient') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else{
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}
		$doctor_id = session()->get('doctor_session_id');
		$args = [
			'doctor_name'  => $doctor_id,
			'created_at='  => date('Y-m-d'),
			'status'        => 'Ddischarge'

		];
		$data = [
			'today_patient' => $this->patinet_model->filter_rec_by_args_with_pagination('patents', $order, $args)
		];
		return view('Doctor/today_discharge_patient', $data);
    }

    public function change_doctor_password(){
    		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$data = [];
			$data['userdata'] = $this->adminModel->getLoggedInUserData(session()->get('loggedin_user'));
			if ($this->request->getMethod() == 'post') {
				$rules = [
					'old_password'   => 'required',
					'new_password'   => 'required|min_length[6]|max_length[16]',
					'Confirm_password'  => 'required|matches[new_password]',
				];
				if ($this->validate($rules)) {
					$opwd = $this->request->getVar('old_password');
					$npwd = password_hash($this->request->getVar('new_password'), PASSWORD_DEFAULT);
					$pass_verify = password_verify($opwd,$data['userdata']->password);
					if ($pass_verify) {
						$status = $this->adminModel->updatePassword('register_all_users',$npwd,session()->get('loggedin_user'));
						if ($status) {
							$this->session->setTempdata('success', 'Congratulation ! Password Updated Successfully!', 3);
							return redirect()->to(current_url());
						}else{
							$this->session->setTempdata('error', 'Sorry Unable to Update Password Try Again!', 3);
							return redirect()->to(current_url());
						}
					}else{
						$this->session->setTempdata('error', 'Old Password DoesNot Matched with DB Password', 3);
					}
					
						
				}else{
					$data['validation']  = $this->validator;
				}
			}	
		}
    	return view('Doctor/change_doctor_password', $data);
    }

    public function total_discharge_patient(){
    	if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$doctor_id = session()->get('doctor_session_id');
			$args = [
				'doctor_name'  => $doctor_id,
				'status'       => 'Ddischarge'
			];
			$data = [
		        'today_patient' => $this->patinet_model->fetch_rec_by_args_with_status('patents',$args),
		        'pager'         => $this->patinet_model->pager
		    ];
			return view('Doctor/total_discharge_patient',$data);
		}
    }

    public function filter_all_discharge_patient($filter){
    	if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}
    	if ($filter == 'new_medicine') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'old_medicine') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else{
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}
		$doctor_id = session()->get('doctor_session_id');
		$args = [
			'doctor_name'  => $doctor_id,
			'status'       => 'Ddischarge'
		];
		$data = [
			'today_patient' => $this->patinet_model->filter_rec_by_args_with_pagination('patents', $order, $args),
			'pager'     => $this->patinet_model->pager
		];
		return view('Doctor/total_discharge_patient',$data);
    }

    public function request_activate_email(){
    	$data = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'doctor_name'      => 'required|min_length[4]|max_length[20]',
				'doctor_phone'     => 'required|numeric|exact_length[10]',
				'doctor_email'     => 'required|valid_email|is_unique[doc_req_email.doctor_email]'
			];
			if ($this->validate($rules)) {
				$data = [
					'doctor_name'   => $this->request->getVar('doctor_name',FILTER_SANITIZE_STRING),
					'doctor_phone'  => $this->request->getVar('doctor_phone',FILTER_SANITIZE_STRING),
					'doctor_email'  => $this->request->getVar('doctor_email',FILTER_SANITIZE_STRING),
					'status'        => 'Active',
					'created_at'    => date('Y-m-d h:i:s')
				];
				$status = $this->adminModel->Insertdata('doc_req_email', $data);
				if ($status) {
					$this->session->setTempdata('success', 'Congratulation ! Email Verification Sent Successfully Please Wait Some time !', 3);
				}else{
					$this->session->setTempdata('error', 'Failed ! Unable to Sent !', 3);
				}
				return redirect()->to(base_url().'/Doctor/request_activate_email');
			}else{
				$data['validation'] = $this->validator;
			}
		}
		return view('Doctor/doctor_req_active',$data);
    }

    public function today_appointement(){
    	$doctor_id = session()->get('doctor_session_id');
    	$args = [
    		'doctor_id'  => $doctor_id,
    		'status'     => 'Active',
    		'boking_date' => date('Y-m-d')
    	];
    	$data['today_apmt'] = $this->adminModel->fetch_rec_by_args('booked_doctor', $args);
    	return view('Doctor/today_appointement', $data);
    }

    public function filter_appointment_patient($filter){
    	if ($filter == 'new_patient') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'old_patient') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else{
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}
		$doctor_id = session()->get('doctor_session_id');
		$args = [
			'doctor_id'  => $doctor_id,
			'boking_date' => date('Y-m-d'),
			'status'        => 'Active'

		];
		$data = [
			'today_apmt' => $this->adminModel->filter_rec_by_args_with_status('booked_doctor', $order, $args)
		];
		return view('Doctor/today_appointement', $data);
    }

    public function change_appointment_status($id, $status){
    	$args = [
    		'id'  => $id
    	];

    	$data = [
    		'status'  => $status
    	];
    	$status = $this->adminModel->update_rec_by_args('booked_doctor', $args, $data);
    	if ($status) {
			$this->session->setTempdata('success', 'Congratulation ! Patients Discharge Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Failed ! Unable to Sent !', 3);
		}
		return redirect()->to(base_url().'/Doctor/today_appointement');
    }

    public function news_from_blog(){
    	if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			return view('Doctor/news_from_blog');
		}
    }

    public function Upload_blog(){
    	if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}
    	$data = [];
			$data['validation'] = null;
			if ($this->request->getMethod() == 'post') {
				$rules = [
					'blog_title'      => 'required',
					'blog_content'      => 'required|min_length[10]|max_length[10000]',
				];
				if ($this->validate($rules)) {
					 $img = $this->request->getFile('blog_image');
					
					 if ($img->isValid() &&  !$img->hasMoved()) {
					 	 $newName = $img->getRandomName();
					 	 // $doc_img = $image->getName();
	                	$img->move('./public/uploads/frontend/blog_image', $newName); 
	                	// $path = $this->request->getFile('doctor_image')->store();
	                	$doc_img = $img->getName();
	                	// var_dump($doc_img);
	                	// exit();

	                	//Get Doctor Details 
	                	$doctor_id = session()->get('doctor_session_id');
	                	$args = [
	                		'id'  => $doctor_id
	                	];
	                	$doctor = $this->adminModel->fetch_rec_by_args('doctor', $args);
	                	//Get Doctor Details 

						$userdata = [
							'blog_title'            =>  $this->request->getVar('blog_title',FILTER_SANITIZE_STRING),
							'blog_content'          =>  $this->request->getVar('blog_content',FILTER_SANITIZE_STRING),
							'blog_image'            =>  $doc_img,
							'doctor_name'           => $doctor[0]->doctor_name,
							'doctor_id'             => $doctor[0]->id,
							'department_name'       => $doctor[0]->department_name,
							'doctor_specility'      => $doctor[0]->doctor_specility,
							'status'                => 'Preview', 
							'created_date'         =>   date('d'),
							'created_month'         =>  date('M'),
							'created_year'          =>  date('Y')
						];
						$status = $this->adminModel->Insertdata('news_blog', $userdata);
						if ($status == true) {
							$this->session->setTempdata('success', 'Congratulation ! Blog Uploded Successfully !', 3);
						}else{
							$this->session->setTempdata('error', 'Sorry ! Unable to Uploded blog Try Again ?', 3);
						}  
						return redirect()->to(base_url().'/Doctor/news_from_blog');

					 }else{
					 	echo $image->getErrorString(). " " .$image->getError();
					 }
				}else{
					$data['validation'] = $this->validator;
				}
			}
		
		return view('Doctor/news_from_blog', $data);
    }

    public function manage_blogs(){
    	if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$doctor_id = session()->get('doctor_session_id');
	    	$args = [
	    		'doctor_id' => $doctor_id
	    	];
	    	$data['blogs_content'] = $this->adminModel->fetch_rec_by_args('news_blog', $args);
	    	return view('Doctor/manage_blogs', $data);
		}
     }

    public function delete_blogs($id){
    	if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$args = [
				'id'  => $id
			];
			$status = $this->adminModel->delete_records('news_blog', $args);
			if ($status == true) {
				$this->session->setTempdata('success', 'Congratulation ! Blog deleted Successfully !', 3);
			}else{
				$this->session->setTempdata('error', 'Sorry ! Unable to delete blog Try Again ?', 3);
			}  
			return redirect()->to(base_url().'/Doctor/manage_blogs');
		}
    }

    public function change_blog_status($id, $status){
    	$args = [
    		'id'  => $id
    	];
    	$data = [
    		'status'  => $status
    	];
    	$status = $this->adminModel->update_rec_by_args('news_blog', $args, $data);
    	if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Blog Status Change Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Change Status blog Try Again ?', 3);
		}  
		return redirect()->to(base_url().'/Doctor/manage_blogs');
    }

    public function filter_blogs($filter){
    	if ($filter == 'new_blogs') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'old_blogs') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else{
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}
		$doctor_id = session()->get('doctor_session_id');
		$args = [
			'doctor_id'  => $doctor_id,
		];
		$data = [
			'blogs_content' => $this->adminModel->filter_rec_by_args_with_status('news_blog', $order, $args)
		];
		return view('Doctor/manage_blogs',$data);
    }





}