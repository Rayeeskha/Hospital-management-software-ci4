<?php namespace App\Controllers;
use \App\Models\Admin_Model;
use \App\Models\AutoModel;
use \App\Models\Medicine_model;
use \App\Models\AccountAutoModel;
use \App\Models\Blogs_model;

class Admin extends BaseController
{	
	public $session;
	public $email;
	public $adminModel;
	public $AutoModel;
	public $pager;
	public $medicine_model;
	public $accountent_model;
	public $blogmodel;
	public function __construct(){
		helper(['form','Patent','text']);
		$this->session     = \Config\Services::session();
		$this->email       = \Config\Services::email();
		$this->adminModel  = new Admin_Model();
		$this->AutoModel   = new AutoModel();
		$this->medicine_model   = new Medicine_model();
		$this->accountent_model   = new AccountAutoModel();
		$this->blogmodel   = new Blogs_model();
		$this->pager       = \Config\Services::pager();
		// $pager = \Config\Services::pager();
	}
	public function index()
	{
		$data = [];
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$uniid = session()->get('loggedin_user');
			$data['userdata'] = $this->adminModel->getLoggedInAdminData($uniid);
			$data['doctors'] = $this->adminModel->fetch_all_records('doctor');
			$data['patents'] = $this->adminModel->fetch_all_records('patents');
			$args = [
				'status'     => 'Appointment',
				'created_at' => date('Y-m-d')
			];
			$data['today_appointment'] = $this->adminModel->fetch_rec_by_args('booked_doctor', $args);

			//Dashboard Script Start 

			//Total Patient Records
			$total_patients    = $this->adminModel->fetch_all_records('patents');
			$total_appointment = $this->adminModel->fetch_all_records('booked_doctor');
			//Total Patient Records

			//Count Medical All Medical Expense
			$medical_income = $this->adminModel->fetch_all_records('sale_products');
			$total_income = 0;
			if($medical_income){
				count($medical_income);
				foreach($medical_income as $count_inc){
					$total_income += $count_inc->quantity *  $count_inc->rate;
				}
			}
			else{
				$total_income = 0;
			}
			$medical_earning =  json_encode($total_income);
			//Count Medical All Medical Expense

			//Count Patient Earning 
			$patient_income = $this->adminModel->fetch_all_records('patents');
			$total_patient_inc = 0;
			if($patient_income){
				count($patient_income);
				foreach($patient_income as $count_inc){
					$total_patient_inc += $count_inc->other_fee +  $count_inc->intry_fee;
				}
			}
			else{
				$total_patient_inc = 0;
				
			}
			$patient_earning =  json_encode($total_patient_inc);

			//Count Patient Earning 

			$data['chart_data']  = [
				'ch_medical_earning'      => $medical_earning,
				'ch_patient_earning'      => $patient_earning,
				'total_patients'         => $total_patients ? count($total_patients): '0',
				'total_appointment'         => $total_appointment ? count($total_appointment): '0'
			];
			//Dashboard Script Start 
			return view('Admin/dashboard',$data);
		}
		
	}

	public function add_department(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			return view('Admin/department/add_department');
		}
	}

	public function upload_department(){
		$data = [];
			$data['validation'] = null;
			if ($this->request->getMethod() == 'post') {
				$rules = [
					'department_name'      => 'required',
				];
				if ($this->validate($rules)) {
					$userdata = [
						'department_name'           =>  $this->request->getVar('department_name',FILTER_SANITIZE_STRING),
						'dep_desc'              =>  $this->request->getVar('dep_desc'),
						'status'                => 'Active', 
						'created_at'            =>  date('Y-m-d')
					];
					$status = $this->adminModel->Insertdata('department', $userdata);
					if ($status == true) {
						$this->session->setTempdata('success', 'Congratulation ! Department Added Successfully !', 3);
					}else{
						$this->session->setTempdata('error', 'Sorry ! Unable to Add  Department  Try Again ?', 3);
					}  
					return redirect()->to(base_url().'/Admin/add_department');
				}else{
					$data['validation'] = $this->validator;
				}
			}
		
		return view('Admin/department/add_department', $data);
	}

	public function manage_department(){
		$data['department'] = $this->adminModel->fetch_all_records('department');
		return view('Admin/department/manage_department', $data);
	}
	public function edit_department($id){
		$args = [
			'id'  => $id
		];
		$data['department'] = $this->adminModel->fetch_rec_by_args('department', $args);
		return view('Admin/department/edit_department', $data);
	}

	public function update_department($id){
		$args = [
			'id'  => $id
		];

		$data = [
			'department_name'           =>  $this->request->getVar('department_name',FILTER_SANITIZE_STRING),
			'dep_desc'                  =>  $this->request->getVar('dep_desc'),
			'status'                    => 'Active', 
			'created_at'                =>  date('Y-m-d')
		];

		$status = $this->adminModel->update_rec_by_args('department',$args, $data);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Department Details Updated Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Update Try Again ?', 3);
		}
       return redirect()->to(base_url().'/Admin/edit_department/'.$id);
	}

	public function delete_department($id){
		$args = [
			'id'  =>  $id
		];
		$status = $this->adminModel->delete_records('department', $args);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Department Deleted Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Deleted Try Again ?', 3);
		}
       return redirect()->to(base_url().'/Admin/manage_department');
	}

	public function search_department(){
		$args = [
			'department_name'   => $this->request->getVar('department_name', FILTER_SANITIZE_STRING)
		];

		$data['department'] = $this->adminModel->fetch_rec_by_args_by_like('department',$args);
		return view('Admin/department/manage_department', $data);
	}

	public function filter_department($filter){
		if ($filter == 'new_department') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'old_department') {
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
		$data['department'] = $this->adminModel->filter_rec_by_args('department', $order);
		return view('Admin/department/manage_department', $data);
	}

	public function change_department_status($id, $status){
		$args  = [
			'id' => $id
		];
		$data = [
			'status'  => $status
		];
		$status = $this->adminModel->update_rec_by_args('department', $args, $data);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Department Status Changed Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Update Try Again ?', 3);
		}
       return redirect()->to(base_url().'/Admin/manage_department');
	}



	public function doctor(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$data["department"] = $this->adminModel->fetch_all_records('department');
			return view('Admin/add_doctor', $data);
		}
		
	}

	public function add_doctor(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$data = [];
			$data['validation'] = null;
			if ($this->request->getMethod() == 'post') {
				$rules = [
					'department_name'  => 'required',
					'doctor_name'      => 'required|min_length[4]|max_length[20]',
					'doctor_phone'     => 'required|numeric|exact_length[10]',
					'doctor_address'   => 'required|min_length[4]|max_length[50]',
					'doctor_email'     => 'required|valid_email|is_unique[doctor.doctor_email]',
					'doctor_specility' => 'required',
					'doctor_image'     =>  'uploaded[doctor_image]|max_size[doctor_image,1024]|is_image[doctor_image]',
				];
				if ($this->validate($rules)) {
					 $uid = md5(str_shuffle('abcdefghizklmnopqrstuvwxyz'.time()));
					 $img = $this->request->getFile('doctor_image');
					
					 if ($img->isValid() &&  !$img->hasMoved()) {
					 	 $newName = $img->getRandomName();
					 	 // $doc_img = $image->getName();
	                	$img->move('./public/uploads/doctor', $newName); 
	                	// $path = $this->request->getFile('doctor_image')->store();
	                	$doc_img = $img->getName();
	                	// var_dump($doc_img);
	                	// exit();
						$userdata = [
							'department_name'           =>  $this->request->getVar('department_name',FILTER_SANITIZE_STRING),
							'doctor_name'           =>  $this->request->getVar('doctor_name',FILTER_SANITIZE_STRING),
							'doctor_email'          =>  $this->request->getVar('doctor_email'),
							'doctor_address'        =>  $this->request->getVar('doctor_address',FILTER_SANITIZE_STRING),
							'doctor_specility'      =>  $this->request->getVar('doctor_specility',FILTER_SANITIZE_STRING),
							'doctor_other_info'     =>  $this->request->getVar('doctor_other_info',FILTER_SANITIZE_STRING),
							'doctor_phone'          =>  $this->request->getVar('doctor_phone',FILTER_SANITIZE_STRING),
							'uid'                   =>  $uid,
							'doctor_image'          =>  $doc_img,
							'status'                => 'Active', 
							'created_at'            =>  date('Y-m-d h:i:s')
						];

						// var_dump($userdata);
						// exit();

						$status = $this->adminModel->Insertdata('doctor', $userdata);
						if ($status == true) {
							$this->session->setTempdata('success', 'Congratulation ! Doctor Added Successfully !', 3);
						}else{
							$this->session->setTempdata('error', 'Sorry ! Unable to Add  Doctor  Try Again ?', 3);
						}  
						return redirect()->to(base_url().'/Admin/add_doctor');

					 }else{
					 	echo $image->getErrorString(). " " .$image->getError();
					 }
				}else{
					$data['validation'] = $this->validator;
				}
			}
		}
		return view('Admin/add_doctor',$data);
	}

	public function manage_doctor(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$data['doctors'] = $this->adminModel->fetch_all_records('doctor');
			return view('Admin/manage_doctor', $data);
		}
		
	}

	public function edit_doctor($id){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$args = [
				'id'  => $id
			];
			$data['update_doctor'] = $this->adminModel->fetch_rec_by_args('doctor', $args);
			$data['department'] = $this->adminModel->fetch_all_records('department');
			return view('Admin/edit_doctor', $data);
		}
	}

	public function update_doctor($id){
		$args = [
		    'id'   => $id
		];

		$data = [
			'department_name'           => $this->request->getVar('department_name', FILTER_SANITIZE_STRING),
			'doctor_name'           => $this->request->getVar('doctor_name', FILTER_SANITIZE_STRING),
			'doctor_phone'          => $this->request->getVar('doctor_phone', FILTER_SANITIZE_STRING),
			'doctor_address'        => $this->request->getVar('doctor_address', FILTER_SANITIZE_STRING),
			'doctor_email'          => $this->request->getVar('doctor_email', FILTER_SANITIZE_STRING),
			'doctor_specility'      => $this->request->getVar('doctor_specility', FILTER_SANITIZE_STRING),
			'doctor_other_info'      => $this->request->getVar('doctor_other_info', FILTER_SANITIZE_STRING),
			// 'doctor_image'           => $doc_img
			'updated_at'             => date('Y-m-d h:i:s')
		];

		$status = $this->adminModel->update_rec_by_args('doctor',$args, $data);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Doctor Details Updated Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Update Try Again ?', 3);
		}
       
        return redirect()->to(base_url().'/Admin/edit_doctor/'.$id);
	}

	public function delete_doctor($id){
		$args = [
			'id' => $id
		];

		$status = $this->adminModel->delete_records('doctor', $args);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Doctor Details Deleted Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Delete Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Admin/manage_doctor');
	}

	public function change_doctor_status($id,$status){
		$args = [
			'id'  => $id
		];
		$data = [
			'status' => $status
		];
		$status = $this->adminModel->update_rec_by_args('doctor', $args, $data);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Doctor Status Updated  Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Updated Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Admin/manage_doctor');
	}

	public function filter_doctor($filter){
		if ($filter == 'new_doctor') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'old_doctor') {
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
		$data['doctors'] = $this->adminModel->filter_rec_by_args('doctor', $order);
		return view('Admin/manage_doctor', $data);
	}

	public function search_doctor(){
		$args = [
			'doctor_name'   => $this->request->getVar('doctor_name', FILTER_SANITIZE_STRING)
		];

		$data['doctors'] = $this->adminModel->fetch_rec_by_args_by_like('doctor',$args);
		return view('Admin/manage_doctor', $data);
	}

	public function add_doctor_fee(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$data['doctors'] = $this->adminModel->fetch_all_records('doctor');
			return view('Admin/add_doctor_fee', $data);	
		}
	}

	public function upload_doctor_fee(){
		$data = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'doctor_name'      => 'required',
				'doctor_fee'      => 'required',
			];
			if ($this->validate($rules)) {
					$userdata = [
						'doctor_name'          =>  $this->request->getVar('doctor_name',FILTER_SANITIZE_STRING),
						'doctor_fee'           =>  $this->request->getVar('doctor_fee',FILTER_SANITIZE_STRING),
						'status'               => 'Active', 
						'created_at'           =>  date('Y-m-d h:i:s')
					];
					$status = $this->adminModel->Insertdata('doctor_fee', $userdata);
					if ($status == true) {
						$this->session->setTempdata('success', 'Congratulation ! Doctor Fee Added Successfully !', 3);
					}else{
						$this->session->setTempdata('error', 'Sorry ! Unable to Add  Doctor Fee Try Again ?', 3);
					}  
					return redirect()->to(base_url().'/Admin/add_doctor_fee');
			}else{
				$data['validation'] = $this->validator;
			}
		}
		$data['doctors'] = $this->adminModel->fetch_all_records('doctor');
		return view('Admin/add_doctor_fee',$data);
	}

	public function manage_doctor_fee(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$data['doctor_fee'] = $this->adminModel->fetch_all_records('doctor_fee');
			return view('Admin/manage_doctor_fee',$data);
		}
	}

	public function edit_doctor_fee($id){
		$args = [
			'id'  => $id
		];
		$data['update_doctor_fee'] = $this->adminModel->fetch_rec_by_args('doctor_fee', $args);
		$data['doctors'] = $this->adminModel->fetch_all_records('doctor');
		return view('Admin/edit_doctor_fee', $data);
	}

	public function update_doctor_fee($id){
		$args = [
		    'id'   => $id
		];

		$data = [
			'doctor_name'         => $this->request->getVar('doctor_name', FILTER_SANITIZE_STRING),
			'doctor_fee'          => $this->request->getVar('doctor_fee', FILTER_SANITIZE_STRING)
			
		];

		$status = $this->adminModel->update_rec_by_args('doctor_fee',$args, $data);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Doctor Fee Details Updated Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Update Fee Try Again ?', 3);
		}
       
        return redirect()->to(base_url().'/Admin/edit_doctor_fee/'.$id);
	}

	public function delete_doctor_fee($id){
		$args = [
			'id' => $id
		];

		$status = $this->adminModel->delete_records('doctor_fee', $args);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Doctor Fee Details Deleted Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Delete Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Admin/manage_doctor_fee');
	}

	public function change_doctor_fee_status($id,$status){
		$args = [
			'id'  => $id
		];

		$data = [
			'status' => $status
		];

		$status = $this->adminModel->update_rec_by_args('doctor_fee', $args, $data);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Doctor Fee Status Updated  Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Updated Fee Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Admin/manage_doctor_fee');
	}

	public function search_doctor_fee(){
		$args = [
			'doctor_name'   => $this->request->getVar('doctor_name', FILTER_SANITIZE_STRING)
		];

		$data['doctor_fee'] = $this->adminModel->fetch_rec_by_args_by_like('doctor_fee',$args);
		return view('Admin/manage_doctor_fee', $data);
	}


	public function filter_doctor_fee($filter){
		if ($filter == 'new_doctor') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'old_doctor') {
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

		$data['doctor_fee'] = $this->adminModel->filter_rec_by_args('doctor_fee', $order);
		return view('Admin/manage_doctor_fee', $data);
	}

//Patents Record Section Start with AutoModel Pagination Feature (Developed By Khan Rayees Software Developer)
	public function add_patents(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$data['doctors'] = $this->adminModel->fetch_all_records('doctor_fee');
			return view('Admin/add_patents',$data);
		}
	}

	public function get_doctor_fee_details($id){
		$args = [
			'id'  => $id
		];

		$data = $this->adminModel->fetch_rec_by_args('doctor_fee', $args);
		echo json_encode($data);
	}

	public function upload_patents(){
		$data = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'patent_name'      => 'required|min_length[4]|max_length[20]',
				'patent_phone'     => 'required|numeric|exact_length[10]',
				'patent_address'   => 'required|min_length[4]|max_length[50]',
				'doctor_name'      => 'required',
				'patent_issue'     => 'required'
			];
			if ($this->validate($rules)) {
				 $uid = md5(str_shuffle('abcdefghizklmnopqrstuvwxyz'.time()));
				 $img = $this->request->getFile('patent_image');
				
				 if ($img->isValid() &&  !$img->hasMoved()) {
				 	 $newName = $img->getRandomName();
				 	 // $doc_img = $image->getName();
                	$img->move('./public/uploads/patents', $newName); 
                	// $path = $this->request->getFile('doctor_image')->store();
                	$doc_img = $img->getName();
                	// var_dump($doc_img);
                	// exit();
					$userdata = [
						'patent_name'           =>  $this->request->getVar('patent_name',FILTER_SANITIZE_STRING),
						'patent_phone'          =>  $this->request->getVar('patent_phone',FILTER_SANITIZE_STRING),
						'patent_address'        =>  $this->request->getVar('patent_address',FILTER_SANITIZE_STRING),
						'patent_zip'            =>  $this->request->getVar('patent_zip',FILTER_SANITIZE_STRING),
						'doctor_name'           =>  $this->request->getVar('doctor_name',FILTER_SANITIZE_STRING),
						'doctor_fee'            =>  $this->request->getVar('doctor_fee',FILTER_SANITIZE_STRING),
						'intry_fee'             =>  $this->request->getVar('intry_fee',FILTER_SANITIZE_STRING),
						'patent_issue'          =>  $this->request->getVar('patent_issue',FILTER_SANITIZE_STRING),
						'other_fee'             =>  $this->request->getVar('other_fee',FILTER_SANITIZE_STRING),
						'patent_room'           =>  $this->request->getVar('patent_room',FILTER_SANITIZE_STRING),
						'patent_email'          =>  $this->request->getVar('patent_email'),
						'uid'                   =>  $uid,
						'patent_image'          =>  $doc_img,
						'status'                => 'Active', 
						'created_at'            =>  date('Y-m-d')
					];

					// var_dump($userdata);
					// exit();

					$status = $this->adminModel->Insertdata('patents', $userdata);
					if ($status == true) {
						$this->session->setTempdata('success', 'Congratulation ! Patents Added Successfully !', 3);
					}else{
						$this->session->setTempdata('error', 'Sorry ! Unable to Add  Patents  Try Again ?', 3);
					}  
					return redirect()->to(base_url().'/Admin/add_patents');

				 }else{
				 	echo $image->getErrorString(). " " .$image->getError();
				 	$this->session->setTempdata('error', 'Please Select any Image File', 3);
				 	return redirect()->to(base_url().'/Admin/add_patents');
				 }
				
				
				
			}else{
				$data['validation'] = $this->validator;
			}
		}
		$data['doctors'] = $this->adminModel->fetch_all_records('doctor_fee');
		return view('Admin/add_patents',$data);
	}

	public function manage_patents(){
		// $pager = \Config\Services::pager();
		// $model = new \App\Models\AutoModel();
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$args = [
				'status'  => 'Active'
			];
			$data = [
				'patents'  => $this->AutoModel->fetch_rec_by_args_with_status('patents', $args),
				'pager'   => $this->AutoModel->pager
			];
        	return view("Admin/manage_patents",$data);
		}
	}




	public function manage_doctor_discharge_patients(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$args = [
				'status'  => 'Ddischarge'
			];
			$data = [
		        'patents' => $this->AutoModel->fetch_rec_by_args_with_status('patents', $args),
		        'pager'     => $this->AutoModel->pager
		    ];
			return view("Admin/manage_doc_dis_patient", $data);
		}
	}

	public function filter_dischrage_pat($filter){

	}

	public function search_doc_dis_patient(){
		$keyword = $this->request->getVar('patent_name', FILTER_SANITIZE_STRING);
			$args = [
				'status'  => 'Ddischarge'
			];
			if ($keyword) {
			 	$result = $this->AutoModel->search_patients_name($keyword, $args);
			}else{
			 	$result = $this->AutoModel;
			}
			$data = [
	            'patents' => $this->AutoModel->fetch_rec_by_status_with_pagination('patents', $args),
	            'pager'     => $this->AutoModel->pager
	        ];
		return view("Admin/manage_doc_dis_patient", $data);
	}

	public function search_discharge_patient(){
		$keyword = $this->request->getVar('patent_name', FILTER_SANITIZE_STRING);
			$args = [
				'status'  => 'Discharge'
			];
			if ($keyword) {
			 	$result = $this->AutoModel->search_patients_name($keyword, $args);
			}else{
			 	$result = $this->AutoModel;
			}
			$data = [
	            'patents' => $this->AutoModel->fetch_rec_by_status_with_pagination('patents', $args),
	            'pager'     => $this->AutoModel->pager
	        ];
		return view("Admin/manage_disc_patient", $data);
	}

	public function manage_discharge_patient(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$args = [
				'status'  => 'Discharge'
			];
			$data = [
				'patents'  => $this->AutoModel->fetch_rec_by_args_with_status('patents', $args),
				'pager'   => $this->AutoModel->pager
			];
        	return view("Admin/manage_disc_patient",$data);
		}
	}

	public function filter_dischrage_patient($filter){
		if ($filter == 'new_patents') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'old_patents') {
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
		$args = [
			'status'        => 'Discharge'
		];
		$data = [
			'patents' => $this->AutoModel->filter_rec_by_args_with_pagination('patents', $order, $args),
			'pager'     => $this->AutoModel->pager
		];
		return view("Admin/manage_disc_patient",$data);
	}

	public function payment_dischrge_patient($id){
		$args = [
			'pateints_id'      => $id,
			'status'           => 'Discharge'
		];
		$data['payment_bill'] = $this->adminModel->fetch_rec_by_args('patents_discharge', $args);
		return view('Admin/payment_dischrge_patient', $data);
	}

	public function filter_doc_dis_patents($filter){
		if ($filter == 'new_patents') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'old_patents') {
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
		$args = [
			'status'        => 'Ddischarge'
		];
		$data = [
			'patents' => $this->AutoModel->filter_rec_by_args_with_pagination('patents', $order, $args),
			'pager'     => $this->AutoModel->pager
		];
		return view("Admin/manage_doc_dis_patient", $data);
	}

	public function search_patent(){
	    $keyword = $this->request->getVar('patent_name', FILTER_SANITIZE_STRING);
			$args = [
				'status'  => 'Active'
			];
			if ($keyword) {
			 	$result = $this->AutoModel->search_patients_name($keyword, $args);
			}else{
			 	$result = $this->AutoModel;
			}
			$data = [
	            'patents' => $this->AutoModel->fetch_rec_by_status_with_pagination('patents', $args),
	            'pager'     => $this->AutoModel->pager
	        ];
		return view("Admin/manage_patents", $data);
	}



	public function filter_patents($filter){
	    if ($filter == 'new_patents') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'old_patents') {
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
		$args = [
			'status'        => 'Active'
		];
		$data = [
			'patents' => $this->AutoModel->filter_rec_by_args_with_pagination('patents', $order, $args),
			'pager'     => $this->AutoModel->pager
		];

		return view("Admin/manage_patents", $data);

		// return view('Admin/manage_doctor', $data);
	}




	public function change_patents_status($id, $status){
		$args = [
			'id'   => $id
		];
		$data = [
			'status'  => $status
		];
		$status = $this->AutoModel->update($id,$data);
		if ($status == true) {
			session()->setTempdata('success','Congratulation ! Patents Status Updated Successfully',2);
			return redirect()->to(base_url().'/Admin/manage_patents');
		}
	}

	public function delete_patents($id){
		$status = $this->AutoModel->where('id',$id)->delete();
		if ($status == true) {
			session()->setTempdata('success','Congratulation ! Patents Deleted Successfully',2);
			return redirect()->to(base_url().'/Admin/manage_patents');
		}
	}

	public function edit_patents($id){
		$args = [
			'id'  => $id
		];
		$data['patents'] = $this->adminModel->fetch_rec_by_args('patents', $args);
		$data['doctors']  = $this->adminModel->fetch_all_records('doctor_fee');
		return view('Admin/edit_patents',$data);
	}
	public function update_patents($id ){
		$args = [
			'id'  => $id
		];

		$data = [
			'patent_name'           =>  $this->request->getVar('patent_name',FILTER_SANITIZE_STRING),
			'patent_phone'          =>  $this->request->getVar('patent_phone',FILTER_SANITIZE_STRING),
			'patent_address'        =>  $this->request->getVar('patent_address',FILTER_SANITIZE_STRING),
			'patent_zip'            =>  $this->request->getVar('patent_zip',FILTER_SANITIZE_STRING),
			'doctor_name'           =>  $this->request->getVar('doctor_name',FILTER_SANITIZE_STRING),
			'doctor_fee'            =>  $this->request->getVar('doctor_fee',FILTER_SANITIZE_STRING),
			'intry_fee'             =>  $this->request->getVar('intry_fee',FILTER_SANITIZE_STRING),
			'patent_issue'          =>  $this->request->getVar('patent_issue',FILTER_SANITIZE_STRING),
			'other_fee'             =>  $this->request->getVar('other_fee',FILTER_SANITIZE_STRING),
			'patent_room'           =>  $this->request->getVar('patent_room',FILTER_SANITIZE_STRING),
			'patent_email'          =>  $this->request->getVar('patent_email'),
			'status'                => 'Active'
		];
		$status = $this->adminModel->update_rec_by_args('patents',$args, $data);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Patents Updated Successfully', 3);
		
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to update  Patents  Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Admin/edit_patents/'.$id);
	}

	public function print_slip($id){
		$args = [
			'id'  => $id
		];
		$data['patent_slip'] = $this->adminModel->fetch_rec_by_args('patents', $args);
		return view('Admin/print_slip', $data);
	}


	public function discharge_pateints($id){
		$args = [
			'id'  => $id
		];
		$data['patents'] = $this->adminModel->fetch_rec_by_args('patents', $args);
		return view('Admin/discharge_pateints', $data);
	}


	public function discharge_apmnt_patient($id){
		$args = [
			'id'  => $id
		];
		$data['patents'] = $this->adminModel->fetch_rec_by_args('booked_doctor', $args);
		return view('Admin/discharge_appointment_pat', $data);
	}

	public function add_appointment_pat_charge($id){
		$args = [
			'id'  => $id
		];
		$data = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'room_charge'      => 'required',
				'doc_fee'          => 'required',
				'med_cost'         => 'required',
				'other_cost'       => 'required'
				
			];
			if ($this->validate($rules)) {
				 	$userdata = [
						'room_charge'           =>  $this->request->getVar('room_charge',FILTER_SANITIZE_STRING),
						'doc_fee'               =>  $this->request->getVar('doc_fee',FILTER_SANITIZE_STRING),
						'med_cost'              =>  $this->request->getVar('med_cost',FILTER_SANITIZE_STRING),
						'other_cost'            =>  $this->request->getVar('other_cost',FILTER_SANITIZE_STRING),
						'pateints_id'           =>  $args,
						'status'                =>  'Discharge', 
						'discharge_date'        =>  date('Y-m-d')
					];
					$status = $this->adminModel->Insertdata('patents_discharge', $userdata);
					if ($status == true) {
						
					}else{
						
					}  
					 return redirect()->to(base_url().'/Admin/generate_apment_patient_bill/'.$id);	
			}else{
				$data['validation'] = $this->validator;
			}
		}
		$data['patents'] = $this->adminModel->fetch_rec_by_args('booked_doctor', $args);
		return view('Admin/discharge_appointment_pat', $data);
	}


	public function generate_apment_patient_bill($id){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$args = [
				'pateints_id'  => $id
			];
			$data['payment_bill'] = $this->adminModel->fetch_rec_by_args('patents_discharge', $args);
				$args = [
					'id'  => $id
				];
				$value = [
					'status'  => 'Discharge'
				];
				$this->adminModel->update_rec_by_args('booked_doctor', $args, $value);
			return view('Admin/generate_apment_pateint_bill', $data);
		}
	}


	public function add_patent_charge($id){
		$args = [
			'id'  => $id
		];
		$data = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'room_charge'      => 'required',
				'doc_fee'          => 'required',
				'med_cost'         => 'required',
				'other_cost'       => 'required'
				
			];
			if ($this->validate($rules)) {
				 	$userdata = [
						'room_charge'           =>  $this->request->getVar('room_charge',FILTER_SANITIZE_STRING),
						'doc_fee'               =>  $this->request->getVar('doc_fee',FILTER_SANITIZE_STRING),
						'med_cost'              =>  $this->request->getVar('med_cost',FILTER_SANITIZE_STRING),
						'other_cost'            =>  $this->request->getVar('other_cost',FILTER_SANITIZE_STRING),
						'pateints_id'           =>  $args,
						'status'                =>  'Discharge', 
						'discharge_date'        =>  date('Y-m-d')
					];
					$status = $this->adminModel->Insertdata('patents_discharge', $userdata);
					if ($status == true) {
							
						// $this->session->setTempdata('success', 'Congratulation ! Patents Added Successfully !', 3);
					}else{
						// $this->session->setTempdata('error', 'Sorry ! Unable to Add  Patents  Try Again ?', 3);
					}  
					 return redirect()->to(base_url().'/Admin/generate_pateint_bill/'.$id);	
			}else{
				$data['validation'] = $this->validator;
			}
		}
		$data['patents'] = $this->adminModel->fetch_rec_by_args('patents', $args);
		return view('Admin/discharge_pateints', $data);

	}

	public function generate_pateint_bill($id){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$args = [
				'pateints_id'  => $id
			];
			$data['payment_bill'] = $this->adminModel->fetch_rec_by_args('patents_discharge', $args);
				$args = [
					'id'  => $id
				];
				$value = [
					'status'  => 'Discharge'
				];
				$this->adminModel->update_rec_by_args('patents', $args, $value);
			return view('Admin/generate_pateint_bill', $data);
		}
	}

	public function manage_revisit_patient(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$args = [
				'status'  => 'Discharge'
			];
			$data = [
				'patents'  => $this->AutoModel->fetch_rec_by_args_with_status('patents', $args),
				'pager'   => $this->AutoModel->pager
			];
        	return view('Admin/manage_revisit_patient', $data);
		}
	}

	public function revist_patients($id){
		$args = [
			'id'  => $id
		];
		$data['patents'] = $this->adminModel->fetch_rec_by_args('patents', $args);
		$data['doctors']  = $this->adminModel->fetch_all_records('doctor_fee');

		return view('Admin/revist_patients', $data);
	}

	public function update_revisit_patient($id){
		$args = [
			'id'  => $id
		];
		$data = [
			'patent_name'           =>  $this->request->getVar('patent_name',FILTER_SANITIZE_STRING),
			'patent_phone'          =>  $this->request->getVar('patent_phone',FILTER_SANITIZE_STRING),
			'patent_address'        =>  $this->request->getVar('patent_address',FILTER_SANITIZE_STRING),
			'patent_zip'            =>  $this->request->getVar('patent_zip',FILTER_SANITIZE_STRING),
			'doctor_name'           =>  $this->request->getVar('doctor_name',FILTER_SANITIZE_STRING),
			'doctor_fee'            =>  $this->request->getVar('doctor_fee',FILTER_SANITIZE_STRING),
			'intry_fee'             =>  $this->request->getVar('intry_fee',FILTER_SANITIZE_STRING),
			'patent_issue'          =>  $this->request->getVar('patent_issue',FILTER_SANITIZE_STRING),
			'other_fee'             =>  $this->request->getVar('other_fee',FILTER_SANITIZE_STRING),
			'patent_room'           =>  $this->request->getVar('patent_room',FILTER_SANITIZE_STRING),
			'patent_email'          =>  $this->request->getVar('patent_email'),
			// 'patient_id'            =>  $this->request->getVar('patient_id'),
			'status'                => 'Active',
			'created_at'            => date('Y-m-d')
		];
		$status = $this->adminModel->update_rec_by_args('patents',$args, $data);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Patents Revist  Successfully', 3);
		
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to update  Patents  Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Admin/manage_revisit_patient');
	}

	public function search_revisit_patent(){
		$keyword = $this->request->getVar('patent_name', FILTER_SANITIZE_STRING);
			$args = [
				'status'  => 'Discharge'
			];
			if ($keyword) {
			 	$result = $this->AutoModel->search_patients_name($keyword, $args);
			}else{
			 	$result = $this->AutoModel;
			}
			$data = [
	            'patents' => $this->AutoModel->fetch_rec_by_status_with_pagination('patents', $args),
	            'pager'     => $this->AutoModel->pager
	        ];
		$data['doctors']  = $this->adminModel->fetch_all_records('doctor_fee');
		return view('Admin/manage_revisit_patient', $data);
	}

	public function filter_revisit_patient($filter){
		if ($filter == 'new_patents') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'old_patents') {
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
		$args = [
			'status'        => 'Discharge'
		];
		$data = [
			'patents' => $this->AutoModel->filter_rec_by_args_with_pagination('patents', $order, $args),
			'pager'     => $this->AutoModel->pager
		];
		return view('Admin/manage_revisit_patient', $data);
	}

	public function number_of_visit_patients($id){
		$args =  [
			'patient_id'  => $id
		];
		$data['pat_visiter'] = $this->adminModel->fetch_rec_by_args('revisit_patients', $args);
		return view('Admin/number_of_visiting_pat', $data);

	}

//Patents Record Section Start with AutoModel Pagination Feature (Developed By Khan Rayees Software Developer)	

	//-----Mediciens Sction Query Start 
	public function med_category(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			return view('Admin/mediciens/med_category');
		}
	}

	public function add_med_category(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$data = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'company_name'      => 'required|min_length[4]|max_length[20]'
			];
			if ($this->validate($rules)) {
				 $img = $this->request->getFile('category_image');
				if ($img->isValid() &&  !$img->hasMoved()) {
				 	 $newName = $img->getRandomName();
                	$img->move('./public/uploads/mediciens_Category', $newName); 
                	$doc_img = $img->getName();
					$userdata = [
						'company_name'          =>  $this->request->getVar('company_name',FILTER_SANITIZE_STRING),
						'category_image'        =>  $doc_img,
						'status'                => 'Active', 
						'created_at'            =>  date('Y-m-d h:i:s')
					];
					$status = $this->adminModel->Insertdata('mediciens_category', $userdata);
					if ($status == true) {
						$this->session->setTempdata('success', 'Congratulation ! Medicines Category Uploded Successfully !', 3);
					}else{
						$this->session->setTempdata('error', 'Sorry ! Unable to Add Medicines Category Try Again ?', 3);
					}  
					return redirect()->to(base_url().'/Admin/med_category');

				}else{
				 	echo $image->getErrorString(). " " .$image->getError();
				}
				
			}else{
				$data['validation'] = $this->validator;
			}
		}
		
		return view('Admin/mediciens/med_category',$data);
	}

	public function manage_med_category(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$data['med_category']  = $this->AutoModel->fetch_all_records('mediciens_category');
		return view("Admin/mediciens/manage_med_category",$data);
	}


	public function filter_medicine_cat($filter){
		if ($filter == 'new_cat') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'old_cat') {
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

		$data['med_category'] = $this->adminModel->filter_rec_by_args('mediciens_category', $order);
		return view("Admin/mediciens/manage_med_category",$data);
	}


	public function search_medicines(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$args = [
			'company_name'  => $this->request->getVar('medicine_name', FILTER_SANITIZE_STRING)
		];
		$data['med_category'] = $this->adminModel->fetch_rec_by_args_by_like('mediciens_category', $args);
		return view("Admin/mediciens/manage_med_category",$data);
	}

	public function change_med_cat_status($id, $status){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$args = [
			'id'  => $id
		];
		$data = [
			'status' => $status
		];

		$status = $this->adminModel->update_rec_by_args('mediciens_category', $args, $data);
		if ($status) {
			$this->session->setTempdata('success', 'Congratulation ! Medicines Category Status Change Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Fail Unable To Update Category Status', 3);
		}
		return redirect()->to(base_url().'/Admin/manage_med_category');
	}

	public function delete_med_cat($id){
		$args = [
			'id'  => $id
		];
		$status = $this->adminModel->delete_records('mediciens_category', $args);
		if ($status) {
			$this->session->setTempdata('success', 'Congratulation ! Medicines Category Deleted Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Fail Unable To Deleted Category ', 3);
		}
		return redirect()->to(base_url().'/Admin/manage_med_category');
	}

	public function edit_med_cat($id){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$args = [
			'id'  => $id
		];
		$data['med_cat'] = $this->adminModel->fetch_rec_by_args('mediciens_category', $id);
		return view('Admin/mediciens/edit_med_cat', $data);
	}

	public function update_med_category($id){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$args = [
			'id'  => $id
		];
		$old_data = $this->adminModel->fetch_rec_by_args('mediciens_category', $args);
		//delete old  image
		@unlink('./public/uploads/mediciens_Category/'. $old_data[0]->category_image);
		//delete old  image
		 $img = $this->request->getFile('category_image');
		if ($img->isValid() &&  !$img->hasMoved()) {
			$newName = $img->getRandomName();
            $img->move('./public/uploads/mediciens_Category', $newName); 
            $doc_img = $img->getName();
            $userdata = [
				'company_name'          =>  $this->request->getVar('company_name',FILTER_SANITIZE_STRING),
				'category_image'        =>  $doc_img,
				'status'                => 'Active', 
				'created_at'            =>  date('Y-m-d h:i:s')
			];
			$status = $this->adminModel->update_rec_by_args('mediciens_category', $args, $userdata);
			if ($status == true) {
				$this->session->setTempdata('success', 'Congratulation ! Medicines Category Updated Successfully !', 3);
			}else{
				$this->session->setTempdata('error', 'Sorry ! Unable to Update Medicines Category Try Again ?', 3);
			} 
        }

       return redirect()->to(base_url().'/Admin/edit_med_cat/'.$id);
	}

	public function add_medicine(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}

		$data['mediciens'] = $this->adminModel->fetch_all_records_by_active('mediciens_category');
		return view('Admin/mediciens/add_medicine', $data);
	}

	public function upload_medicine(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$data = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'med_company'      => 'required',
				'med_price'          => 'required',
				'med_name'           => 'required'
				
			];
			if ($this->validate($rules)) {
				 $img = $this->request->getFile('med_image');
				if ($img->isValid() &&  !$img->hasMoved()) {
				 	 $newName = $img->getRandomName();
                	$img->move('./public/uploads/medicien_image', $newName); 
                	$med_img = $img->getName();
					$userdata = [
						'med_company'           =>  $this->request->getVar('med_company',FILTER_SANITIZE_STRING),
						'med_price'             =>  $this->request->getVar('med_price',FILTER_SANITIZE_STRING),
						'med_d_price'           =>  $this->request->getVar('med_d_price',FILTER_SANITIZE_STRING),
						'med_name'              =>  $this->request->getVar('med_name',FILTER_SANITIZE_STRING),
						'med_stock'              =>  $this->request->getVar('med_dis',FILTER_SANITIZE_STRING),
						'med_image'             =>  $med_img,
						'status'                => 'Active', 
						'created_at'            =>  date('Y-m-d h:i:s')
					];
					$status = $this->adminModel->Insertdata('mediciens', $userdata);
					if ($status == true) {
						$this->session->setTempdata('success', 'Congratulation ! Medicines  Uploded Successfully !', 3);
					}else{
						$this->session->setTempdata('error', 'Sorry ! Unable to Add Medicines  Try Again ?', 3);
					}  
					return redirect()->to(base_url().'/Admin/add_medicine');

				}else{
				 	echo $image->getErrorString(). " " .$image->getError();
				}
				
			}else{
				$data['validation'] = $this->validator;
			}
		}

		$data['mediciens'] = $this->adminModel->fetch_all_records_by_active('mediciens_category');
		return view('Admin/mediciens/add_medicine',$data);
	}

	public function manage_medicine(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$data = [
	        'mediciens' => $this->medicine_model->paginate(10),
	        'pager'     => $this->medicine_model->pager
	    ];
		return view("Admin/mediciens/manage_medicine", $data);
	}

	public function edit_medicine($id){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$args = [
			'id'  => $id
		];
		$data['medicines'] = $this->adminModel->fetch_rec_by_args('mediciens', $args);
		$data['medicine'] = $this->adminModel->fetch_all_records_by_active('mediciens_category');
		return view('Admin/mediciens/edit_medicine', $data);

	}

	public function update_medicines($id){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$args = [
			'id'  => $id
		];
		$old_data = $this->adminModel->fetch_rec_by_args('mediciens', $args);
		//delete old  image
		@unlink('./public/uploads/medicien_image/'. $old_data[0]->med_image);
		//delete old  image
		 $img = $this->request->getFile('med_image');
		if ($img->isValid() &&  !$img->hasMoved()) {
			$newName = $img->getRandomName();
            $img->move('./public/uploads/medicien_image', $newName); 
            $doc_img = $img->getName();
            $userdata = [
				'med_company'          =>  $this->request->getVar('med_company',FILTER_SANITIZE_STRING),
				'med_price'            =>  $this->request->getVar('med_price',FILTER_SANITIZE_STRING),
				'med_d_price'          =>  $this->request->getVar('med_d_price',FILTER_SANITIZE_STRING),
				'med_name'             =>  $this->request->getVar('med_name',FILTER_SANITIZE_STRING),
				'med_image'            =>  $doc_img,
				'status'                => 'Active', 
				'created_at'            =>  date('Y-m-d h:i:s')
			];
			$status = $this->adminModel->update_rec_by_args('mediciens', $args, $userdata);
			if ($status == true) {
				$this->session->setTempdata('success', 'Congratulation ! Medicines  Updated Successfully !', 3);
			}else{
				$this->session->setTempdata('error', 'Sorry ! Unable to Update Medicines  Try Again ?', 3);
			} 
        }

       $data['medicine'] = $this->adminModel->fetch_all_records_by_active('mediciens_category');
       return redirect()->to(base_url().'/Admin/edit_medicine/'.$id);
	}

	public function delete_medicine($id){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$args = [
			'id'  => $id
		];
		$status = $this->adminModel->delete_records('mediciens', $args);
		if ($status) {
			$this->session->setTempdata('success', 'Congratulation ! Medicines  Deleted Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Fail Unable To Deleted Medicines ', 3);
		}
		return redirect()->to(base_url().'/Admin/manage_medicine');
	}

	public function search_medicine(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$keyword = $this->request->getVar('medicine_name', FILTER_SANITIZE_STRING);
		if ($keyword) {
		 	$result = $this->medicine_model->search($keyword);
		}else{
		 	$result = $this->medicine_model;
		}
		$data = [
	   		'mediciens' => $result->paginate(10, 'result'),
	        'pager'     => $result->pager
	    ];

		return view("Admin/mediciens/manage_medicine", $data);	
	}

	public function filter_medicine($filter){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
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
		$result = $this->medicine_model->filter_rec_by_args('patents', $order);
		// echo "<pre>";
		// var_dump($result);
		if ($result) {
		 	$result = $this->medicine_model;
		}else{
		 	// $result = $this->AutoModel;
		 	echo "Access Denied";
		}
		$data = [
	   		'mediciens' => $result->paginate(10, 'result'),
	        'pager'   => $result->pager
	    ];

		return view("Admin/mediciens/manage_medicine", $data);
	}

	public function change_medicine_status($id, $status){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$args = [
			'id'  => $id
		];

		$data = [
			'status'  => $status
		];

		$status = $this->adminModel->update_rec_by_args('mediciens', $args, $data);
		if ($status) {
			$this->session->setTempdata('success', 'Congratulation ! Medicines  Status Updated Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Fail Unable To update  Medicines Status ', 3);
		}
		return redirect()->to(base_url().'/Admin/manage_medicine');
	}



	//-----Mediciens Sction Query Start

	//---Account Section Script Start
	public function manage_doctor_account(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$data['doctor'] = $this->adminModel->fetch_all_records_by_level_with_args('register_all_users', '3');
		return view('Admin/Account/manage_doctor_account', $data);
	} 
	public function change_doctor_acc_status($id, $status){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$args = [
			'id'  => $id
		];

		$data = [
			'status'  => $status
		];
		$status = $this->adminModel->update_rec_by_args('register_all_users', $args, $data);
		if ($status) {
			$this->session->setTempdata('success', 'Congratulation ! Doctor Account Status Updated Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Fail Unable To update Doctor Account Status ', 3);
		}
		return redirect()->to(base_url().'/Admin/manage_doctor_account');
	}

	public function delete_doctor_account($id){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$args = [
			'id'  => $id
		];

		$status = $this->adminModel->delete_records('register_all_users', $args);
		if ($status) {
			$this->session->setTempdata('success', 'Congratulation ! Doctor Account Deleted Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Fail Unable To Deleted Doctor Account  ', 3);
		}
		return redirect()->to(base_url().'/Admin/manage_doctor_account');
	} 

	public function search_doctor_account(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$args = [
			'username'   => $this->request->getVar('search_doctor', FILTER_SANITIZE_STRING)
		];
		$level = [
			'level'  => '3'
		];

		$data['doctor'] = $this->adminModel->fetch_rec_by_args_by_like_with_level('register_all_users',$args, $level);
		return view('Admin/Account/manage_doctor_account', $data);
	}

	public function filter_doctor_account($filter){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		if ($filter == 'new_doctor') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'old_doctor') {
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
		$args = [
			'level'  => '3'
		];

		$data['doctor'] = $this->adminModel->filter_rec_by_args_with_level('register_all_users', $order, $args);
		return view('Admin/Account/manage_doctor_account', $data);
	}


	public function manage_medical_acc(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$data['medical'] = $this->adminModel->fetch_all_records_by_level_with_args('register_all_users', '2');
		return view('Admin/Account/manage_medical_acc', $data);
	}

	public function change_medical_acc_status($id, $status){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$args = [
			'id'  => $id
		];

		$data = [
			'status'  => $status
		];

		$status = $this->adminModel->update_rec_by_args('register_all_users', $args, $data);
		if ($status) {
			$this->session->setTempdata('success', 'Congratulation ! Accountent Status Updated Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Fail Unable To Update Account  ', 3);
		}
		return redirect()->to(base_url().'/Admin/manage_medical_acc');
	}

	public function delete_acc_account($id){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$args = [
			'id'  => $id
		];
		$status = $this->adminModel->delete_records('register_all_users', $args);
		if ($status) {
			$this->session->setTempdata('success', 'Congratulation ! Accountent Account Deleted Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Fail Unable To Deleted Account  ', 3);
		}
		return redirect()->to(base_url().'/Admin/manage_medical_acc');
	}

	public function search_medical_account(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$args = [
			'username'   => $this->request->getVar('search_med_name', FILTER_SANITIZE_STRING)
		];
		$level = [
			'level'  => '2'
		];

		$data['medical'] = $this->adminModel->fetch_rec_by_args_by_like_with_level('register',$args, $level);
		return view('Admin/Account/manage_medical_acc', $data);
	}

	public function filter_med_account($filter){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		if ($filter == 'new_med_acc') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'old_med_acc') {
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
		$args = [
			'level'  => '2'
		];

		$data['medical'] = $this->adminModel->filter_rec_by_args_with_level('register_all_users', $order, $args);
		return view('Admin/Account/manage_medical_acc', $data);
	}
	//---Account Section Script End 

//Accountetn Verification Section Script Start 
	public function accountent_verification(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$args = [
				'level'   => '2',
				'status'  => 'AdminVerification'
			];
			$data = [
		        'accountent' => $this->accountent_model->fetch_rec_by_args_with_status('register_all_users', $args),
		        'pager'     => $this->accountent_model->pager
		    ];
		   return view("Admin/Account/accountent_verification", $data);
		}
	}

	public function change_accountent_status($id, $status){
		$args = [
			'id'  => $id
		];

		$data = [
			'status'  => $status
		];
		$status = $this->accountent_model->update($args, $data);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Accountent Account Verify  Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Updated Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Admin/accountent_verification');

	}

	public function filter_accountent_verification($filter){
		if ($filter == 'new_accountent') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'old_accountent') {
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
		$args = [
			'status'        => 'AdminVerification',
			'level'         => '2'

		];
		$data = [
			'accountent' => $this->accountent_model->filter_rec_by_args_with_pagination('register_all_users', $order, $args),
			'pager'     => $this->accountent_model->pager
		];

		return view("Admin/Account/accountent_verification", $data);
	}

	public function delete_accountent_account($id){
		$args = [
			'id'  => $id
		];
		$status = $this->accountent_model->delete($args);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Account Deleted  Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Deleted Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Admin/accountent_verification');
	}

	////Doctor Account Verification

	public function doctor_email_register(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$data['request_email'] = $this->adminModel->fetch_all_records('doc_req_email');
			return view('Admin/Account/doctor_email_register', $data);
		}	
	}


	public function doctor_verification(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$args = [
				'level'   => '3',
				'status'  => 'AdminVerification'
			];
			$data = [
		        'doctors' => $this->accountent_model->fetch_rec_by_args_with_status('register_all_users', $args),
		        'pager'     => $this->accountent_model->pager
		    ];
		   return view("Admin/Account/doctor_verification", $data);
		}
		
	}

	public function change_doc_acc_status($id, $status){
		$args = [
			'id'  => $id
		];

		$data = [
			'status'  => $status
		];
		$status = $this->accountent_model->update($args, $data);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Doctor Account Verify  Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Updated Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Admin/doctor_verification');
	}

	public function delete_doc_account($id){
		$args = [
			'id'  => $id
		];
		$status = $this->accountent_model->delete($args);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Account Deleted  Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Deleted Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Admin/doctor_verification');
	}


	public function filter_doctor_verification($filter){
		if ($filter == 'new_doc_account') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'old_doc_account') {
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
		$args = [
			'status'        => 'AdminVerification',
			'level'         => '3'

		];
		$data = [
			'doctors' => $this->accountent_model->filter_rec_by_args_with_pagination('register_all_users', $order, $args),
			'pager'     => $this->accountent_model->pager
		];

		return view("Admin/Account/doctor_verification", $data);
	}
//Accountetn Verification Section Script End 
//Appointment Sction Script Start
	public function today_appointment(){
		$args = [
			'created_at'  => date('Y-m-d')
		];
		$data['today_apmnt'] = $this->adminModel->fetch_rec_by_args('booked_doctor', $args);
		return view('Admin/Account/today_appointment', $data);
	} 

	public function delete_appointment($id){
		$args = [
			'id'  => $id
		];
		$status = $this->adminModel->delete_records('booked_doctor', $args);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Appointment Deleted Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Delete Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Admin/today_appointment');
	}

	public function change_Appointment_status($id, $status){
		$args = [
			'id'  => $id
		];
		$data = [
			'status'  => $status
		];
		$status = $this->adminModel->update_rec_by_args('booked_doctor', $args, $data);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Appointment Status Change Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Change Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Admin/today_appointment');
	}


	public function filter_appointment($filter){
		if ($filter == 'new_appointment') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'old_appointment') {
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
		$data['today_apmnt'] = $this->adminModel->filter_rec_by_args('booked_doctor', $order);
		return view('Admin/Account/today_appointment', $data);
	} 


	public function doctor_discharge_appointment(){
		$args = [
			'status'      => 'Ddischarge'
		];
		$data['disc_apmnt'] = $this->adminModel->fetch_rec_by_args('booked_doctor', $args);
		return view('Admin/Account/discharg_appoinetment', $data);
	}	
//Appointment Sction Script End	


//Medical Section Script Start
	public function today_medical_cus_report(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$args = [
				'order_date'   => date('Y-m-d')
			];
			$data['sales'] = $this->adminModel->fetch_rec_by_args('order_product',$args);
			return view('Admin/mediciens/todays_sale_records', $data);
		}
	} 

	public function search_sales(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$args = [	
				'order_date>='  => $this->request->getVar('start_date',FILTER_SANITIZE_STRING),
				'order_date<='  => $this->request->getVar('last_date',FILTER_SANITIZE_STRING),
			];
			$data['sales'] = $this->adminModel->fetch_rec_by_args('order_product',$args);
			return view('Admin/mediciens/search_sales', $data);
		}
	}

	public function all_sale_reports(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$data['sales'] = $this->adminModel->fetch_all_records('order_product');
			return view('Admin/mediciens/all_sale_reports', $data);
		}
	}
//Medical Section Script End

//Front page Section Query 
	public function add_slider_image(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			return view('Admin/Account/add_slider_image');
		}
	}
	public function publish_slider_image(){
		$img = $this->request->getFile('image_gallery');
		if ($img->isValid() &&  !$img->hasMoved()) {
			$newName = $img->getRandomName();
			$img->move('./public/uploads/frontend/slider', $newName); 
	        $doc_img = $img->getName();
	        $userdata = [
				'image_title'           =>  $this->request->getVar('image_title',FILTER_SANITIZE_STRING),
				'website_link'          =>  $this->request->getVar('website_link',FILTER_SANITIZE_STRING),
				'image_discription'     =>  $this->request->getVar('image_discription',FILTER_SANITIZE_STRING),
				'image_gallery'         =>  $doc_img,
				'status'                => 'Active', 
				'created_at'            =>  date('Y-m-d')
			];
			$status = $this->adminModel->Insertdata('slider_image', $userdata);
			if ($status == true) {
				$this->session->setTempdata('success', 'Congratulation ! Slider Image Uploded Successfully !', 3);
			}else{
				$this->session->setTempdata('error', 'Sorry ! Unable to Uploded  Try Again ?', 3);
			}  
				return redirect()->to(base_url().'/Admin/add_slider_image');

		}else{
			echo $image->getErrorString(). " " .$image->getError();
		}
	}

	public function manage_slider(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$data['slider'] = $this->adminModel->fetch_all_records('slider_image');
			return view('Admin/Account/manage_slider', $data);
		}
		
	}	

	public function edit_slider_image($id){
		$args = [
			'id'  => $id
		];
		$data['slider']  = $this->adminModel->fetch_rec_by_args('slider_image', $args);
		return view('Admin/Account/edit_slider_image', $data);
	}
	public function update_slider_image($id){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}
		$args = [
			'id'  => $id
		];
		$old_data = $this->adminModel->fetch_rec_by_args('slider_image', $args);
		//delete old  image
		@unlink('./public/uploads/frontend/slider/'. $old_data[0]->image_gallery);
		//delete old  image
		 $img = $this->request->getFile('image_gallery');
		if ($img->isValid() &&  !$img->hasMoved()) {
			$newName = $img->getRandomName();
            $img->move('./public/uploads/frontend/slider/', $newName); 
            $doc_img = $img->getName();
            $data = [
				'image_title'          =>  $this->request->getVar('image_title',FILTER_SANITIZE_STRING),
				'website_link'          =>  $this->request->getVar('website_link',FILTER_SANITIZE_STRING),
				'image_discription'          =>  $this->request->getVar('image_discription',FILTER_SANITIZE_STRING),
				'image_gallery'        =>  $doc_img,
				'status'                => 'Active', 
				'created_at'            =>  date('Y-m-d')
			];
			$status = $this->adminModel->update_rec_by_args('slider_image', $args, $data);
			if ($status == true) {
				$this->session->setTempdata('success', 'Congratulation ! Slider Image Updated Successfully !', 3);
			}else{
				$this->session->setTempdata('error', 'Sorry ! Unable to Update Image Try Again ?', 3);
			} 
        }

       return redirect()->to(base_url().'/Admin/edit_slider_image/'.$id);
	}

	public function delete_slider($id){
		$args = [
			'id'  => $id
		];
		$status = $this->adminModel->delete_records('slider_image', $args);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Slider Image Deleted Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Deleted Image Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Admin/manage_slider');
	}
	public function change_slider_image_status($id, $status){
		$args = [
			'id'  => $id
		];
		$data = [
			'status'  => $status
		];
		$status = $this->adminModel->update_rec_by_args('slider_image', $args, $data);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Slider Image Status Changed Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Update Image Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Admin/manage_slider');
	}

	public function image_gallery(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
		$data = [];
		if ($this->request->getMethod() == 'post') {
			$files = $this->request->getFiles();
				foreach ($files['gallary_image'] as $img) {
					if ($img->isValid() &&  !$img->hasMoved()) {
						$new_image = $img->getRandomName();
						if ($img->move(FCPATH.'public\uploads\frontend\image_gallery',$new_image)) {
							$doc_img = $img->getName();
							$userdata = [
								'image_title'           =>  $this->request->getVar('image_title',FILTER_SANITIZE_STRING),
								'gallary_image'         =>  $doc_img,
								'status'                => 'Active', 
								'created_at'            =>  date('Y-m-d')
							];
							$status = $this->adminModel->Insertdata('gallary_image', $userdata);
						}else{
							echo "<p>" .$img->getErrorString(). "</p>";
						}
					}
				}
				$this->session->setTempdata('success', 'Congratulation ! Gallary Image Uploded Successfully !', 3);
				return redirect()->to(base_url().'/Admin/image_gallery');
			
		}
		return view('Admin/frontend/image_gallery');
		}
	}
	public function manage_image_gallary(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$data['gallary'] = $this->adminModel->fetch_all_records('gallary_image');
			return view('Admin/frontend/manage_gallary', $data);
		}
	}

	public function delete_gallary_image($id){
		$args = [
			'id'  => $id
		];
		$status  = $this->adminModel->delete_records('gallary_image', $args);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Gallary Image Deleted Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Deleted Image Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Admin/manage_image_gallary');
	}

	public function change_gallary_img_status($id, $status){
		$args = [
			'id'  => $id
		];

		$data = [
			'status'  => $status
		];
		$status = $this->adminModel->update_rec_by_args('gallary_image', $args, $data);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Gallary Image Status Changed Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Changed Image Status Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Admin/manage_image_gallary');
	}

	public function filter_gallary($filter){
		if ($filter == 'new_gallary') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'old_gallary') {
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
		$data['gallary'] = $this->adminModel->filter_rec_by_args('gallary_image', $order);
		return view('Admin/frontend/manage_gallary', $data);
	}


	//BlOGS ssection 
	public function manage_blogs(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$args = [
				'status'   => 'Active'
			];
			$data = [
		        'blogs_content' => $this->blogmodel->fetch_rec_by_args_with_status('news_blog', $args),
		        'pager'     => $this->blogmodel->pager
		    ];
			return view("Admin/frontend/manage_blogs", $data);
		}
	}
	public function change_blog_status($id, $status){
		$args = [
			'id'   => $id
		];
		$data = [
			'status'  => $status
		];
		$status = $this->adminModel->update_rec_by_args('news_blog',$args,$data);
		if ($status == true) {
			session()->setTempdata('success','Congratulation ! Blog Publish Successfully',2);
			return redirect()->to(base_url().'/Admin/manage_blogs');
		}
	}

	public function delete_blogs($id){
		$args = [
			'id'  => $id
		];
		$status =$this->adminModel->delete_records('news_blog', $args);
		if ($status == true) {
			session()->setTempdata('success','Congratulation ! Blog Deleted Successfully',2);
			return redirect()->to(base_url().'/Admin/manage_blogs');
		}
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
		$args = [
			'status'        => 'Active'
		];
		$data = [
			'blogs_content' => $this->blogmodel->filter_rec_by_args_with_pagination('mediciens', $order, $args),
			'pager'     => $this->blogmodel->pager
		];
		return view("Admin/frontend/manage_blogs", $data);
	}

	public function view_blog($id){
		$args = [
			'id' => $id
		];
		$data['blogs'] = $this->adminModel->fetch_rec_by_args('news_blog', $args);
		return view('Admin/frontend/view_blog', $data);
	}

	public function patients_review(){
		$args = [
			'status'  => 'Active'
		];
		$data['review_patient'] = $this->adminModel->fetch_rec_by_args('review_hospital', $args);
		return view('Admin/frontend/patients_review', $data);
	}
	public function change_feedback_status($id, $status){
		$args = [
			'id'  => $id
		];
		$data = [
			'status'  => $status
		];
		$status = $this->adminModel->update_rec_by_args('review_hospital', $args, $data);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Feedback is Verify Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Changed Status Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Admin/patients_review');
	}

	public function delete_review($id){
		$args = [
			'id'  => $id
		];
		$status = $this->adminModel->delete_records('review_hospital', $args);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Feedback is Deleted Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Delete Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Admin/patients_review');
	}

	public function filter_feedback($filter){
		if ($filter == 'new_feedback') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'old_feedback') {
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
		$args = [
			'status'  => 'Active'
		];
		$data['review_patient'] = $this->adminModel->filter_rec_by_args_with_status('review_hospital', $order, $args);
		return view('Admin/frontend/patients_review', $data);
	}

	public function check_login_activity(){
		$args = [
			'login_date'  => date('Y-m-d')
		];
		$data['login_activity'] = $this->adminModel->fetch_rec_by_args('login_activity', $args);
		return view('Admin/department/check_login_activity', $data);
	
	}
	public function contact_us(){
		$data['contact_us'] = $this->adminModel->fetch_all_records('contact_us');
		return view('Admin/frontend/contact_us', $data);
	}
	public function blood_bank_accountent(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			return  view('Admin/Account/blood_bank_accountent');
		}
	}

	public function blood_bank_admin(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Login");
		}else{
			$args = [
				'status'  => 'AdminVerification',
				'level'   => '4'
			];
			$data['bld_bnk_admin'] = $this->adminModel->fetch_rec_by_args('register_all_users', $args);
			return view('Admin/Account/blood_bank_admin_verify', $data);
		}
	}

	public function change_bld_admin_acc($id, $status){
		$args = [
			'id'  => $id
		];
		$data  = [
			'status'  => $status
		];
		$status = $this->adminModel->update_rec_by_args('register_all_users', $args, $data);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Blood Bank Admin Verify Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Verify Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Admin/blood_bank_admin');
	}

	public function delete_bld_admin_account($id){
		$args = [
			'id'  => $id
		];
		$status = $this->adminModel->delete_records('register_all_users', $args);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Blood Bank Admin Account Deleted Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Deleted Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Admin/blood_bank_admin');
	}


	//BlOGS ssection 
	// 
//Front page Section Query 	





	//Dashboard Script Start
	public function count_patents($type = 'all'){
		if ($type == 'all') {
			$patents = $this->adminModel->fetch_all_records('patents');
				
		}else if ($type == 'today') {
			$args = [
				'created_at'  => date('Y-m-d')
			];
			$patents = $this->adminModel->fetch_rec_by_args_with_date('patents', $args);
			// var_dump($patents);
			// exit();
		}else if ($type == 'yesterday') {
			$args = [
				'created_at'  => date('Y-m-d',strtotime("-1 day"))
			];
			$patents = $this->adminModel->fetch_rec_by_args_with_date('patents', $args);
		}else if ($type == 'last_30_days') {
			$args = [
				'created_at>='  => date('Y-m-d',strtotime("-30 day")),
				'created_at<='   => date('Y-m-d') 
			];
			$patents = $this->adminModel->fetch_rec_by_args_with_date('patents', $args);
		}else{
			$patents = $this->adminModel->fetch_all_records('patents');
		}
		echo count($patents);
	}

	public function count_income($type = 'all'){
		if ($type == 'all') {
			$income = $this->adminModel->fetch_all_records('patents');
				
		}else if ($type == 'today') {
			$args = [
				'created_at'  => date('Y-m-d')
			];
			$income = $this->adminModel->fetch_rec_by_args_with_date('patents', $args);
			 // var_dump($income);
			 // exit();
		}else if ($type == 'yesterday') {
			$args = [
				'created_at'  => date('Y-m-d',strtotime("-1 day"))
			];
			$income = $this->adminModel->fetch_rec_by_args_with_date('patents', $args);

		}else if ($type == 'last_30_days') {
			$args = [
				'created_at>='  => date('Y-m-d',strtotime("-30 day")),
				'created_at<='  => date('Y-m-d') 
			];
			$income = $this->adminModel->fetch_rec_by_args_with_date('patents', $args);
			// var_dump($income);
			// exit();
		}else{
			$income = $this->adminModel->fetch_all_records('patents');
			// echo "<pre>";
			// var_dump($income);
			// exit();
		}
		$total_income = 0;
		if(count($income)){
			foreach($income as $count_inc){
				// $total_income += $inc->intry_fee;
				
				$total_income += $count_inc->other_fee +  $count_inc->intry_fee;
				// var_dump($total_income);
				// exit();
			}
		}
		else{
			$total_income = 0;
			// number_format($total_income);
		}
		echo json_encode($total_income);
	}


	public function count_medical_income($type = 'all'){
		if ($type == 'all') {
			$income = $this->adminModel->fetch_all_records('sale_products');
				
		}else if ($type == 'today') {
			$args = [
				'date'  => date('Y-m-d')
			];
			$income = $this->adminModel->fetch_rec_by_args_with_date('sale_products', $args);
			 // var_dump($income);
			 // exit();
		}else if ($type == 'yesterday') {
			$args = [
				'date'  => date('Y-m-d',strtotime("-1 day"))
			];
			$income = $this->adminModel->fetch_rec_by_args_with_date('sale_products', $args);

		}else if ($type == 'last_30_days') {
			$args = [
				'date>='  => date('Y-m-d',strtotime("-30 day")),
				'date<='  => date('Y-m-d') 
			];
			$income = $this->adminModel->fetch_rec_by_args_with_date('sale_products', $args);
			// var_dump($income);
			// exit();
		}else{
			$income = $this->adminModel->fetch_all_records('sale_products');
		}
		$total_income = 0;
		if(count($income)){
			foreach($income as $count_inc){
				$total_income += $count_inc->quantity *  $count_inc->rate;
			}
		}
		else{
			$total_income = 0;
		}
		echo json_encode($total_income);
	}
	//Dashboard Script End

}
