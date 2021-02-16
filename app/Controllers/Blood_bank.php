<?php namespace App\Controllers;
use CodeIgniter\Controller;	
use \App\Models\Login_model;
use \App\Models\Register_model;
use \App\Models\Admin_Model;

class Blood_bank extends BaseController
{
	public $loginModel;
	public $session;
	public $registerModel;
	public $adminModel;
	public function __construct(){
		helper(['form','date', 'Patent','text']);
		$this->loginModel = new Login_model();
		$this->session   = session();
		$this->adminModel  = new Admin_Model();
		$this->email = \Config\Services::email();
		$this->registerModel = new Register_model();
	}
	public function index(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$uniid = session()->get('loggedin_user');
			$data['userdata'] = $this->adminModel->getLoggedInUserData($uniid);
			$args = [
				'status'   => 'Active'
			];
			$data['blood_available'] = $this->adminModel->fetch_rec_by_args('blood_group', $args);
			$data['donors'] = $this->adminModel->fetch_all_records('buy_donor_blood');
			$data['donor_blood_sale'] = $this->adminModel->fetch_all_records('donor_blood_sale');
			$data['has_blood_sale'] = $this->adminModel->fetch_all_records('hospital_blood_sale');
			$args = [
				'status'  => 'Active'
			];
			$data['donor_details'] = $this->adminModel->get_image_by_args('blood_donor', $args, 5);
			return view('Blood_bank/Admin/dashboard', $data);
		}
	}

	public function add_blood(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			return view('Blood_bank/Admin/add_blood');
		}
	}

	public function add_blood_group(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$data = [];
			$data['validation'] = null;
			if ($this->request->getMethod() == 'post') {
				$rules = [
					'blood_group'      => 'required',
					'blood_unit'      => 'required',
					'blood_price'      => 'required',
				];
				if ($this->validate($rules)) {
						$userdata = [
							'blood_group'          =>  $this->request->getVar('blood_group',FILTER_SANITIZE_STRING),
							'blood_unit'           =>  $this->request->getVar('blood_unit',FILTER_SANITIZE_STRING),
							'blood_price'           =>  $this->request->getVar('blood_price',FILTER_SANITIZE_STRING),
							'total_blood_price'           =>  $this->request->getVar('total_blood_price',FILTER_SANITIZE_STRING),
							'status'               => 'Active', 
							'created_at'           =>  date('Y-m-d')
						];
						$status = $this->adminModel->Insertdata('blood_group', $userdata);
						if ($status == true) {
							$this->session->setTempdata('success', 'Congratulation ! Blood Group Added Successfully !', 3);
						}else{
							$this->session->setTempdata('error', 'Sorry ! Unable to Add  Blood Group Try Again ?', 3);
						}  
						return redirect()->to(base_url().'/Blood_bank/add_blood');
				}else{
					$data['validation'] = $this->validator;
				}
			}
			return view('Blood_bank/Admin/add_blood', $data);
		}
	}

	public function manage_blood(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}
		$data['blood_group'] = $this->adminModel->fetch_all_records('blood_group');
		return view('Blood_bank/Admin/manage_blood', $data);
	}

	public function change_blood_status($id, $status){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$args = [
				'id'  => $id
			];
			$data = [
				'status'  => $status
			];
			$status = $this->adminModel->update_rec_by_args('blood_group', $args, $data);
			if ($status == true) {
				$this->session->setTempdata('success', 'Congratulation ! Blood Group status Change Successfully !', 3);
			}else{
				$this->session->setTempdata('error', 'Sorry ! Unable to Change Blood Group Try Again ?', 3);
			}  
			return redirect()->to(base_url().'/Blood_bank/manage_blood');
		}
	}

	public function delete_blood_group($id){
		$args = [
			'id'  => $id
		];
		$status = $this->adminModel->delete_records('blood_group', $args);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Blood Group Deleted Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Delete Blood Group Try Again ?', 3);
		}  
		return redirect()->to(base_url().'/Blood_bank/manage_blood');
	}

	public function donor_details(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}
		$data['donor_details'] = $this->adminModel->fetch_all_records('blood_donor');
		return view('Blood_bank/Admin/donor_details', $data);
	}

	public function search_donor_details(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}
		$args = [
			'blood_group'   => $this->request->getVar('blood_group', FILTER_SANITIZE_STRING)
		];

		$data['donor_details'] = $this->adminModel->fetch_rec_by_args_by_like('blood_donor',$args);
		return view('Blood_bank/Admin/donor_details', $data);
	}

	public function filter_blood_donors($filter){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			if ($filter == 'new_donors') {
				$order = [
					'column_name'  => 'id',
					'order'        => 'desc'
				];
			}else if ($filter == 'old_donors') {
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
			$data['donor_details'] = $this->adminModel->filter_rec_by_args('blood_donor', $order);
			return view('Blood_bank/Admin/donor_details', $data);
		}
	}

	//Send Message in Mobile Phone message API KEY : WI3ARZJBQ7I-DUkCeXTniz6ZrPmKYi4FIFUKlbwkS0

	public function blood_response_data($id){
		$args = [
			'id'  => $id
		];
		$user = $this->adminModel->fetch_rec_by_args('blood_donor', $args);
		$message = 'I want to your Blood please give me Blood Hope your are very well Thanks for your Blood Donation thanks for Divine Hospital & Medicar Center  (Developed by Khan Rayees Software Developer)';
		//Mobile Phone Api Section Start
		// Account details
		$apiKey = urlencode('WI3ARZJBQ7I-DUkCeXTniz6ZrPmKYi4FIFUKlbwkS0');
		
		// Message details
		$numbers = array(91, $user->contact_number);
		$sender = urlencode('TXTLCL');
		$message = rawurlencode($message);
	 
		$numbers = implode(',', $numbers);
	 
		// Prepare data for POST request
		$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
	 
		// Send the POST request with cURL
		$ch = curl_init('https://api.textlocal.in/send/');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		
		// Process your response here
		echo $response; 
		//Mobile Phone Api Section End
		$this->session->setTempdata('success', 'Congratulation ! Response Message Send Successfully ?', 3);
		return redirect()->to(base_url().'/Blood_bank/donor_details/'.$id);

	}

	//Send Message in Mobile Phone message API KEY : WI3ARZJBQ7I-DUkCeXTniz6ZrPmKYi4FIFUKlbwkS0

	public function view_enquiry(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$data['req_users'] = $this->adminModel->fetch_all_records('blood_requested_user');
			return view('Blood_bank/Admin/view_enquiry', $data);
		}
	}

	public function filter_blood_needed_users($filter){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			if ($filter == 'new_user') {
				$order = [
					'column_name'  => 'id',
					'order'        => 'desc'
				];
			}else if ($filter == 'old_user') {
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
			$data['req_users'] = $this->adminModel->filter_rec_by_args('blood_requested_user', $order);
			return view('Blood_bank/Admin/view_enquiry', $data);
		}
	}

	public function view_enquirygoogleusers(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$data['req_users'] = $this->adminModel->fetch_all_records('blood_request_google_user');
			return view('Blood_bank/Admin/view_enquirygoogleusers', $data);
		}
	}

	public function filter_google_user_nedded($filter){
		if ($filter == 'new_user') {
				$order = [
					'column_name'  => 'id',
					'order'        => 'desc'
				];
			}else if ($filter == 'old_user') {
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
			$data['req_users'] = $this->adminModel->filter_rec_by_args('blood_request_google_user', $order);
			return view('Blood_bank/Admin/view_enquirygoogleusers', $data);
	}

	public function buy_donor_blood(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$data['blood_donor'] = $this->adminModel->fetch_all_records('blood_donor');
			return view('Blood_bank/Admin/buy_donor_blood', $data);
		}
	}

	public function get_donor_blood_group($id){
		$args = [
			'id'  => $id
		];

		$data = $this->adminModel->fetch_rec_by_args('blood_donor', $args);
		echo json_encode($data);
	}

	public function buy_blood_donor(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$data = [];
			$data['validation'] = null;
			if ($this->request->getMethod() == 'post') {
				$rules = [
					'blood_donors'    => 'required',
					'blood_unit'      => 'required',
					'blood_price'     => 'required',
				];
				if ($this->validate($rules)) {
						$userdata = [
							'blood_donor_id'          =>  $this->request->getVar('blood_donors',FILTER_SANITIZE_STRING),
							'blood_unit'           =>  $this->request->getVar('blood_unit',FILTER_SANITIZE_STRING),
							'blood_price'           =>  $this->request->getVar('blood_price',FILTER_SANITIZE_STRING),
							'blood_group'           =>  $this->request->getVar('blood_group',FILTER_SANITIZE_STRING),
							'selling_price'        => '0', 
							'status'               => 'Active', 
							'created_at'           =>  date('Y-m-d h:i:s')
						];
						$status = $this->adminModel->Insertdata('buy_donor_blood', $userdata);
						if ($status == true) {
							$this->session->setTempdata('success', 'Congratulation ! Blood Buy Successfully !', 3);
						}else{
							$this->session->setTempdata('error', 'Sorry ! Unable to Add  Buy Try Again ?', 3);
						}  
						return redirect()->to(base_url().'/Blood_bank/buy_donor_blood');
				}else{
					$data['validation'] = $this->validator;
				}
			}
			$data['blood_donor'] = $this->adminModel->fetch_all_records('blood_donor');
			return view('Blood_bank/Admin/buy_donor_blood', $data);
		}
	}

	public function manage_donor_blood(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$data['donor_blood'] = $this->adminModel->fetch_all_records('buy_donor_blood');
			return view('Blood_bank/Admin/manage_donor_blood', $data);
		}
	}

	public function search_donor_blood(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}
		$args = [
			'blood_group'   => $this->request->getVar('blood_group', FILTER_SANITIZE_STRING)
		];

		$data['donor_blood'] = $this->adminModel->fetch_rec_by_args_by_like('buy_donor_blood',$args);
		return view('Blood_bank/Admin/manage_donor_blood', $data);
	}

	public function filter_donor_blood($filter){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			if ($filter == 'new_donors') {
				$order = [
					'column_name'  => 'id',
					'order'        => 'desc'
				];
			}else if ($filter == 'old_donors') {
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
			$data['donor_blood'] = $this->adminModel->filter_rec_by_args('buy_donor_blood', $order);
			return view('Blood_bank/Admin/manage_donor_blood', $data);
		}
	}

	public function delete_donor_details($id){
		$args = [
			'id'  => $id
		];
		$status = $this->adminModel->delete_records('buy_donor_blood', $args);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Blood Donor Records Deleted Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Add  Deleted Try Again ?', 3);
		}  
		return redirect()->to(base_url().'/Blood_bank/manage_donor_blood/'.$id);
	}

	public function change_donor_blood($id, $status){
		$args = [
			'id'  => $id
		];
		$data = [
			'status'  => $status
		];
		$status = $this->adminModel->update_rec_by_args('buy_donor_blood', $args, $data);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Blood Donor Records Change Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Change Donor Try Again ?', 3);
		}  
		return redirect()->to(base_url().'/Blood_bank/manage_donor_blood/'.$id);
	}

	public function add_blood_selling_price($id){
		$args = [
			'id'  => $id
		];
		$data['donor_blood'] = $this->adminModel->fetch_rec_by_args('buy_donor_blood', $args);
		return view('Blood_bank/Admin/add_blood_selling_price', $data);
	}

	public function blood_selling_price($id){
		$args = [
			'id'  => $id
		];
		$data = [
			'selling_price'  => $this->request->getVar('selling_price',FILTER_SANITIZE_STRING)
		];
		$status = $this->adminModel->update_rec_by_args('buy_donor_blood', $args, $data);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Blood Selling Price Added Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Add Blood Selling Price Try Again ?', 3);
		}  
		return redirect()->to(base_url().'/Blood_bank/add_blood_selling_price/'.$id);
	}

	public function donor_blood_trans(){
		$args = [
			'status'  => 'Active'
		];
		$data['donor_blood'] = $this->adminModel->fetch_rec_by_args('buy_donor_blood', $args);
		return view('Blood_bank/Admin/donor_blood_trans', $data);
	}

	public function get_blood_price($id){
		$args = [
			'id'  => $id
		];

		$data = $this->adminModel->fetch_rec_by_args('buy_donor_blood', $args);
		echo json_encode($data);
	}

	public function donor_blood_transition(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}
		$data = [];
			$data['validation'] = null;
			if ($this->request->getMethod() == 'post') {
				$rules = [
					'blood_group'    => 'required',
					'username'       => 'required|min_length[3]|max_length[20]',
					'mobile'         => 'required|numeric|exact_length[10]',
					'address'        => 'required|min_length[4]|max_length[50]',	
				];
				if ($this->validate($rules)) {
					 $uid = md5(str_shuffle('abcdefghizklmnopqrstuvwxyz'.time()));
					 $img = $this->request->getFile('photo');
					
					 if ($img->isValid() &&  !$img->hasMoved()) {
					 	 $newName = $img->getRandomName();
					 	 // $doc_img = $image->getName();
	                	$img->move('./public/uploads/blood_buy_cus', $newName); 
	                	// $path = $this->request->getFile('doctor_image')->store();
	                	$doc_img = $img->getName();
	                	// var_dump($doc_img);
	                	// exit();
						$userdata = [
							'blood_id'        =>  $this->request->getVar('blood_group',FILTER_SANITIZE_STRING),
							'blood_price'  =>  $this->request->getVar('blood_price',FILTER_SANITIZE_STRING),
							'blood_unit'  =>  $this->request->getVar('blood_unit',FILTER_SANITIZE_STRING),
							'blood_group_sale'  =>  $this->request->getVar('blood_group_sale',FILTER_SANITIZE_STRING),
							'username'        =>  $this->request->getVar('username',FILTER_SANITIZE_STRING),
							'mobile'          =>  $this->request->getVar('mobile'),
							'address'         =>  $this->request->getVar('address',FILTER_SANITIZE_STRING),
							'email'           =>  $this->request->getVar('email',FILTER_SANITIZE_STRING),
							'uid'             =>  $uid,
							'photo'           =>  $doc_img,
							'status'          => 'Active', 
							'created_at'      =>  date('Y-m-d h:i:s')
						];
						$status = $this->adminModel->Insertdata('donor_blood_sale', $userdata);
						if ($status == true) {
							$this->session->setTempdata('success', 'Congratulation ! Blood Sale Successfully !', 3);
						}else{
							$this->session->setTempdata('error', 'Sorry ! Unable to Sale Blood  Try Again ?', 3);
						}  
						return redirect()->to(base_url().'/Blood_bank/donor_blood_trans');

					 }else{
					 	echo $image->getErrorString(). " " .$image->getError();
					 }
				}else{
					$data['validation'] = $this->validator;
				}
			}
			$args = [
				'status'  => 'Active'
			];
			$data['donor_blood'] = $this->adminModel->fetch_rec_by_args('buy_donor_blood', $args);
			return view('Blood_bank/Admin/donor_blood_trans', $data);
	}

	public function manage_donor_blood_trans(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$data['blood_sale_rec'] = $this->adminModel->fetch_all_records('donor_blood_sale');
			return view('Blood_bank/Admin/manage_donor_blood_trans', $data);
		}
	}

	public function filter_sale_records($filter){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			if ($filter == 'new_sale') {
				$order = [
					'column_name'  => 'id',
					'order'        => 'desc'
				];
			}else if ($filter == 'old_sale') {
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
			$data['blood_sale_rec'] = $this->adminModel->filter_rec_by_args('donor_blood_sale', $order);
			return view('Blood_bank/Admin/manage_donor_blood_trans', $data);
		}
	}

	public function blood_transition(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$args = [
				'status'   => 'Active'
			];
			$data['blood_transition'] = $this->adminModel->fetch_rec_by_args('blood_group', $args);
			return view('Blood_bank/Admin/blood_transition', $data);
		}
	}

	public function get_blood_price_one_unit($id){
		$args = [
			'id'  => $id
		];

		$data = $this->adminModel->fetch_rec_by_args('blood_group', $args);
		echo json_encode($data);
	}

	public function upload_blood_transition(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}
		$data = [];
			$data['validation'] = null;
			if ($this->request->getMethod() == 'post') {
				$rules = [
					'blood_group'    => 'required',
					'blood_unit'     => 'required',
					'username'       => 'required|min_length[3]|max_length[20]',
					'mobile'         => 'required|numeric|exact_length[10]',
					'address'        => 'required|min_length[4]|max_length[50]',	
				];
				if ($this->validate($rules)) {
					 $uid = md5(str_shuffle('abcdefghizklmnopqrstuvwxyz'.time()));
					 $img = $this->request->getFile('photo');
					
					 if ($img->isValid() &&  !$img->hasMoved()) {
					 	 $newName = $img->getRandomName();
					 	 // $doc_img = $image->getName();
	                	$img->move('./public/uploads/hospitalblood_cus', $newName); 
	                	// $path = $this->request->getFile('doctor_image')->store();
	                	$doc_img = $img->getName();
	                	// var_dump($doc_img);
	                	// exit();
						$userdata = [
							'blood_id'        =>  $this->request->getVar('blood_group',FILTER_SANITIZE_STRING),
							'blood_group'        =>  $this->request->getVar('sale_blood_group',FILTER_SANITIZE_STRING),
							'blood_price'     =>  $this->request->getVar('blood_price',FILTER_SANITIZE_STRING),
							'blood_unit'      =>  $this->request->getVar('blood_unit',FILTER_SANITIZE_STRING),
							'username'        =>  $this->request->getVar('username',FILTER_SANITIZE_STRING),
							'mobile'          =>  $this->request->getVar('mobile'),
							'address'         =>  $this->request->getVar('address',FILTER_SANITIZE_STRING),
							'email'           =>  $this->request->getVar('email',FILTER_SANITIZE_STRING),
							'uid'             =>  $uid,
							'photo'           =>  $doc_img,
							'status'          => 'Active', 
							'created_at'      =>  date('Y-m-d h:i:s')
						];
						$status = $this->adminModel->Insertdata('hospital_blood_sale', $userdata);
						if ($status == true) {
							$this->session->setTempdata('success', 'Congratulation ! Blood Sale Successfully !', 3);
						}else{
							$this->session->setTempdata('error', 'Sorry ! Unable to Sale Blood  Try Again ?', 3);
						}  
						return redirect()->to(base_url().'/Blood_bank/blood_transition');

					 }else{
					 	echo $image->getErrorString(). " " .$image->getError();
					 }
				}else{
					$data['validation'] = $this->validator;
				}
			}
			$args = [
				'status'   => 'Active'
			];
			$data['blood_transition'] = $this->adminModel->fetch_rec_by_args('blood_group', $args);
			return view('Blood_bank/Admin/blood_transition', $data);;
	}

	public function manage_blood_transition(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$data['blood_rec'] = $this->adminModel->fetch_all_records('hospital_blood_sale');
			return view('Blood_bank/Admin/manage_blood_transition',$data);
		}	
	}

	public function blood_selling_slip($id){
		$args = [
			'id'  => $id
		];
		$data['blood_slip'] = $this->adminModel->fetch_rec_by_args('hospital_blood_sale',$args);
		return view('Blood_bank/Admin/blood_selling_slip', $data);
	}

	public function search_hos_bld_user(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}
		$args = [
			'username'   => $this->request->getVar('username', FILTER_SANITIZE_STRING)
		];

		$data['blood_rec'] = $this->adminModel->fetch_rec_by_args_by_like('hospital_blood_sale',$args);
		return view('Blood_bank/Admin/manage_blood_transition',$data);
	}

	public function filter_hos_sale_bld($filter){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			if ($filter == 'new_blood') {
				$order = [
					'column_name'  => 'id',
					'order'        => 'desc'
				];
			}else if ($filter == 'old_blood') {
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
			$data['blood_rec'] = $this->adminModel->filter_rec_by_args('hospital_blood_sale', $order);
			return view('Blood_bank/Admin/manage_blood_transition',$data);
		}
	}

	public function total_blood_stock(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			
			$data['blood_stock'] = $this->adminModel->fetch_all_records('hospital_blood_sale');
			return view('Blood_bank/Admin/total_blood_stock', $data);
		}
	}

	public function search_sale_bld_stock(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}
		$args = [
			'blood_group'   => $this->request->getVar('blood_group', FILTER_SANITIZE_STRING)
		];

		$data['blood_stock'] = $this->adminModel->fetch_rec_by_args_by_like('hospital_blood_sale',$args);
		return view('Blood_bank/Admin/total_blood_stock', $data);
	}




}