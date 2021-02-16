<?php namespace App\Controllers;
use \App\Models\Admin_Model;
use \App\Models\AutoModel;
use \App\Models\Medicine_model;

class Medical_Accountent extends BaseController
{
	public $adminModel;
	public $session;
	public $medicine_model;
	public function __construct(){
		helper(['form','Patent']);
		$this->adminModel = new Admin_Model();
		$this->session    = \Config\Services::session();
		$this->medicine_model   = new Medicine_model();
	}
	public function index(){
		$data = [];
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$uniid = session()->get('loggedin_user');
			$data['userdata'] = $this->adminModel->getLoggedInUserData($uniid);
			$data['total_company'] = $this->adminModel->fetch_all_records('mediciens_category');
			$data['total_products'] = $this->adminModel->fetch_all_records('mediciens');

			//Dashboard Section Script Start

			$args  = [
				'order_date'   => date('Y-m-d')
			];
			$today_customer  = $this->adminModel->fetch_rec_by_args('order_product', $args);
			$args  = [
				'order_date'   => date('Y-m-d', strtotime("-1 day"))
			];
			$yesterday_customer  = $this->adminModel->fetch_rec_by_args('order_product', $args);
			$args  = [
				'order_date'   => date('Y-m-d', strtotime("-2 day"))
			];
			$last_3days_customer  = $this->adminModel->fetch_rec_by_args('order_product', $args);
			$args  = [
				'order_date'   => date('Y-m-d', strtotime("-3 day"))
			];
			$last_4days_customer  = $this->adminModel->fetch_rec_by_args('order_product', $args);
			$args  = [
				'order_date'   => date('Y-m-d', strtotime("-4 day"))
			];
			$last_5days_customer  = $this->adminModel->fetch_rec_by_args('order_product', $args);
			$args  = [
				'order_date'   => date('Y-m-d', strtotime("-5 day"))
			];
			$last_6days_customer  = $this->adminModel->fetch_rec_by_args('order_product', $args);
			$args  = [
				'order_date'   => date('Y-m-d', strtotime("-6 day"))
			];
			$last_7days_customer  = $this->adminModel->fetch_rec_by_args('order_product', $args);
			$data['chart_data']  = [
				'ch_today_order'        => $today_customer ? count($today_customer): "0",
				'ch_yesterday_order'    => $yesterday_customer ? count($yesterday_customer) : "0",
				'ch_last_3_days_order'  => $last_3days_customer ? count($last_3days_customer) : "0",
				'ch_last_4_days_order'  => $last_4days_customer ? count($last_4days_customer) : "0",
				'ch_last_5_days_order'  => $last_5days_customer ? count($last_5days_customer) : "0",
				'ch_last_6_days_order'  => $last_6days_customer ? count($last_6days_customer) : "0",
				'ch_last_7_days_order'  => $last_7days_customer ? count($last_7days_customer) :"0"
			]; 
			//Dashboard Section Script End
			return view('Medical/dashboard', $data);
		}
	}

	public function add_company(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			return view('Medical/add_company');	
		}
	}

	public function upload_company(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$data = [];
			$data['validation'] = null;
			if ($this->request->getMethod() == 'post') {
				$rules = [
					'company_name'      => 'required',
					'company_c_num'     => 'numeric|exact_length[10]'
				];
				if ($this->validate($rules)) {
					$userdata = [
						'company_name'          =>  $this->request->getVar('company_name',FILTER_SANITIZE_STRING),
						'company_c_num'         =>  $this->request->getVar('company_c_num',FILTER_SANITIZE_STRING),
						'com_address'           =>  $this->request->getVar('com_address',FILTER_SANITIZE_STRING),
						'category_image'        =>  '',
						'status'                =>  'Active', 
						'created_at'            =>   date('Y-m-d h:i:s')
					];
					$status = $this->adminModel->Insertdata('mediciens_category', $userdata);
					if ($status == true) {
						$this->session->setTempdata('success', 'Congratulation ! Company Added Successfully !', 3);
					}else{
						$this->session->setTempdata('error', 'Sorry ! Unable to Add  Company  Try Again ?', 3);
					}  
					return redirect()->to(base_url().'/Medical_Accountent/add_company');	
				}else{
					$data['validation'] = $this->validator;
				}
			}
		}
		return view('Medical/add_company', $data);
	}

	public function manage_company(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$data['medicine_company'] = $this->adminModel->fetch_all_records('mediciens_category');
			return view('Medical/manage_company', $data);
		}
	}
	public function filter_medicine_cpmpany($filter){
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

		$data['medicine_company'] = $this->adminModel->filter_rec_by_args('mediciens_category', $order);
		return view('Medical/manage_company', $data);
	}

	public function delete_company($id){
		$args = [
			'id'  => $id
		];
		$status = $this->adminModel->delete_records('mediciens_category', $args);
		if ($status) {
			$this->session->setTempdata('success', 'Congratulation ! Company Deleted Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Deleted  Company  Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Medical_Accountent/manage_company');
	}

	public function search_company(){
		$args = [
			'company_name'   => $this->request->getVar('company_name', FILTER_SANITIZE_STRING)
		];
		$status = [
			'status'  => 'Active'
		];
		$data['medicine_company'] = $this->adminModel->fetch_rec_by_args_by_like_with_status('mediciens_category',$args, $status);
		return view('Medical/manage_company', $data);
	}

	public function change_company_status($id, $status){
		$args = [
			'id'  => $id
		];

		$data = [
			'status' => $status
		];

		$status = $this->adminModel->update_rec_by_args('mediciens_category', $args, $data);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Company Status Updated  Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Updated  Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Medical_Accountent/manage_company');
	}


	public function edit_company_name($id){
		$args = [
			'id'  => $id
		];
		$data['edit_company'] = $this->adminModel->fetch_rec_by_args('mediciens_category', $args);
		return view('Medical/edit_company_name', $data);
	}

	public function update_company($id){
		$args  = [
			'id'  => $id
		];

		$data = [
			'company_name'          =>  $this->request->getVar('company_name',FILTER_SANITIZE_STRING),
			'company_c_num'         =>  $this->request->getVar('company_c_num',FILTER_SANITIZE_STRING),
			'com_address'           =>  $this->request->getVar('com_address',FILTER_SANITIZE_STRING),
			'status'                =>  'Active', 
			'created_at'            =>   date('Y-m-d h:i:s')
		];

		$status = $this->adminModel->update_rec_by_args('mediciens_category', $args, $data);
		if ($status == true) {
			$this->session->setTempdata('success', 'Congratulation ! Company Records Updated  Successfully !', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Updated  Try Again ?', 3);
		}
		return redirect()->to(base_url().'/Medical_Accountent/edit_company_name/'.$id);
	}

	public function add_medicine(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$data['company']  = $this->adminModel->fetch_all_records_by_active('mediciens_category');
			return view('Medical/add_medicine', $data);
		}
	}

	public function upload_products(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$data = [];
			$data['validation'] = null;
			if ($this->request->getMethod() == 'post') {
				$rules = [
					'product_name'      => 'required',
					'company_name'  => 'required',
					'unit_price'    => 'required',
					'stock'         => 'required',
					'expiry_date'   => 'required',
					'batch_number'  => 'required'
				];
				if ($this->validate($rules)) {
					$userdata = [
						'med_name'           =>  $this->request->getVar('product_name',FILTER_SANITIZE_STRING),
						'med_company'        =>  $this->request->getVar('company_name',FILTER_SANITIZE_STRING),
						'med_price'          =>  $this->request->getVar('unit_price',FILTER_SANITIZE_STRING),
						'med_stock'            =>  $this->request->getVar('stock',FILTER_SANITIZE_STRING),
						'med_d_price'        =>  $this->request->getVar('med_dis',FILTER_SANITIZE_STRING),
						'expiry_date'        =>  $this->request->getVar('expiry_date',FILTER_SANITIZE_STRING),
						'batch_number'       =>  $this->request->getVar('batch_number',FILTER_SANITIZE_STRING),
						'med_image'          =>  '',
						'status'             =>  'Active', 
						'created_at'         =>   date('Y-m-d h:i:s')
					];
					$status = $this->adminModel->Insertdata('mediciens', $userdata);
					if ($status == true) {
						$this->session->setTempdata('success', 'Congratulation ! Product Added Successfully !', 3);
					}else{
						$this->session->setTempdata('error', 'Sorry ! Unable to Add  Product  Try Again ?', 3);
					}  
					return redirect()->to(base_url().'/Medical_Accountent/add_medicine');	
				}else{
					$data['validation'] = $this->validator;
				}
			}
		}
		
		$data['company']  = $this->adminModel->fetch_all_records_by_active('mediciens_category');
		return view('Medical/add_medicine', $data);
	}

///Medicine Section Script Start  With Pagination

	public function manage_medicine(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$args = [
				'expiry_date>='  => date('Y-m-d')
			];
			$data = [
		        'mediciens' => $this->medicine_model->fetch_rec_by_args_with_status('mediciens', $args),
		        'pager'     => $this->medicine_model->pager
		    ];
			return view("Medical/manage_medicine", $data);
		}
	}

	public function show_products($id){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$args = [
				'med_company'  => $id,
				'expiry_date>='  => date('Y-m-d'),
				'status'       => 'Active'
			];
			$data = [
	            'mediciens' => $this->medicine_model->fetch_rec_by_args_with_status('mediciens', $args),
	            'pager'     => $this->medicine_model->pager
	        ];
			return view("Medical/manage_medicine", $data);
		}
	}

	public function search_medicine(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$keyword = $this->request->getVar('medicine_name', FILTER_SANITIZE_STRING);
			$args = [
				'expiry_date>='  => date('Y-m-d'),
			];
			if ($keyword) {
			 	$result = $this->medicine_model->search_med_name($keyword, $args);
			}else{
			 	$result = $this->medicine_model;
			}
			$data = [
	            'mediciens' => $this->medicine_model->fetch_rec_by_expiry_medicine('mediciens', $args),
	            'pager'     => $this->medicine_model->pager
	        ];
		    return view("Medical/manage_medicine", $data);
		}
	}

	public function filter_medicine($filter){
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
		$args = [
			'expiry_date>=' => date('Y-m-d'),
			'status'        => 'Active'

		];
		$data = [
			'mediciens' => $this->medicine_model->filter_rec_by_args_with_pagination('mediciens', $order, $args),
			'pager'     => $this->medicine_model->pager
		];
		return view("Medical/manage_medicine", $data);
	}

	public function edit_medicine($id){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$args = [
				'id'  => $id
			];
			$data['medicines'] = $this->adminModel->fetch_rec_by_args('mediciens', $args);
			$data['medicine'] = $this->adminModel->fetch_all_records_by_active('mediciens_category');
			return view('Medical/edit_medicine', $data);
		}
	}

	public function update_medicines($id){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$args = [
				'id'  => $id
			];
			 $userdata = [
				'med_company'          =>  $this->request->getVar('med_company',FILTER_SANITIZE_STRING),
				'med_price'            =>  $this->request->getVar('med_price',FILTER_SANITIZE_STRING),
				'med_d_price'          =>  $this->request->getVar('med_d_price',FILTER_SANITIZE_STRING),
				'med_stock'            =>  $this->request->getVar('med_dis',FILTER_SANITIZE_STRING),
				'expiry_date'          =>  $this->request->getVar('expiry_date',FILTER_SANITIZE_STRING),
				'batch_number'         =>  $this->request->getVar('batch_number',FILTER_SANITIZE_STRING),
				'med_name'             =>  $this->request->getVar('med_name',FILTER_SANITIZE_STRING),
				'status'               => 'Active', 
				'created_at'           =>  date('Y-m-d h:i:s')
			];
			$status = $this->adminModel->update_rec_by_args('mediciens', $args, $userdata);
			if ($status == true) {
				$this->session->setTempdata('success', 'Congratulation ! Medicines  Updated Successfully !', 3);
			}else{
				$this->session->setTempdata('error', 'Sorry ! Unable to Update Medicines  Try Again ?', 3);
			} 
	        
	        $data['medicine'] = $this->adminModel->fetch_all_records_by_active('mediciens_category');
	        return redirect()->to(base_url().'/Medical_Accountent/edit_medicine/'.$id);
		}
	}

	public function add_medicine_stock($id){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$args = [
				'id'  => $id,
				'expiry_date>=' => date('Y-m-d')
			];
			$data['mediciens'] = $this->adminModel->fetch_rec_by_args('mediciens', $args);
			return view('Medical/add_medicine_stock', $data);
		}
	}

	public function update_stock($id){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$args = [
				'id'  => $id
			];

			$data = [
				'med_stock' => $this->request->getVar('med_stock',FILTER_SANITIZE_STRING)
			];

			$status = $this->adminModel->update_rec_by_args('mediciens', $args, $data);
			if ($status == true) {
				$this->session->setTempdata('success', 'Congratulation ! Medicines  Stock Updated Successfully !', 3);
			}else{
				$this->session->setTempdata('error', 'Sorry ! Unable to Update Medicines  Try Again ?', 3);
			} 
	        
	        return redirect()->to(base_url().'/Medical_Accountent/add_medicine_stock/'.$id);
		}
	}

	public function expiry_products(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$args = [
				'expiry_date<='  => date('Y-m-d')
			];
			$data = [
	            'mediciens' => $this->medicine_model->fetch_rec_by_expiry_medicine('mediciens', $args),
	            'pager'     => $this->medicine_model->pager
	        ];
			return view('Medical/expiry_products', $data);
		}
	}

	public function delete_expiry_medicine($id){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$args = [
				'id'  => $id
			];
			$status = $this->adminModel->delete_records('mediciens', $args);
			if ($status == true) {
				$this->session->setTempdata('success', 'Congratulation ! Expiry Medicines Products Deleted Successfully !', 3);
			}else{
				$this->session->setTempdata('error', 'Sorry ! Unable to delete() Medicines  Try Again ?', 3);
			} 
	        
	        return redirect()->to(base_url().'/Medical_Accountent/expiry_products');
		}
	}

	public function change_exp_medicine_status($id, $status){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$args = [
				'id'  => $id
			];

			$data = [
				'status' => $status
			];

			$status = $this->adminModel->update_rec_by_args('mediciens', $args, $data);
			if ($status == true) {
				$this->session->setTempdata('success', 'Congratulation ! Expiry Status Change  Successfully !', 3);
			}else{
				$this->session->setTempdata('error', 'Sorry ! Unable to Updated  Try Again ?', 3);
			}
			return redirect()->to(base_url().'/Medical_Accountent/expiry_products');
		}
	}

	public function search_exp_medicine(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$keyword = $this->request->getVar('medicine_name', FILTER_SANITIZE_STRING);
			$args = [
				'expiry_date<='  => date('Y-m-d'),
				'status'        => 'Active'

			];
			if ($keyword) {
			 	$result = $this->medicine_model->search_med_name($keyword, $args);
			}else{
			 	$result = $this->medicine_model;
			}
		
		    $data = [
	            'mediciens' => $this->medicine_model->fetch_rec_by_expiry_medicine('mediciens', $args),
	            'pager'     => $this->medicine_model->pager
	        ];
		    return view('Medical/expiry_products', $data);
		}
	}


	public function filter_exp_medicine($filter){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
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
			$args = [
				'expiry_date<=' => date('Y-m-d'),
				'status'        => 'Active'

			];
			$data = [
				'mediciens' => $this->medicine_model->filter_rec_by_args_with_pagination('mediciens', $order, $args),
				'pager'     => $this->medicine_model->pager
			];
			return view("Medical/expiry_products", $data);
		}	
	}
///Medicine Section Script Start With Pagination


//Product Sale Query Start
	public function  add_customer_name(){
		return view('Medical/add_customer_name');
	}

	public function add_customer_bill_slip(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$data = [
				'customer_name'   => $this->request->getVar('cus_name',FILTER_SANITIZE_STRING),
				'customer_add'    => $this->request->getVar('cus_address',FILTER_SANITIZE_STRING),
				'cus_mobile'      => $this->request->getVar('cus_number',FILTER_SANITIZE_STRING),
				'doctor_name'     => $this->request->getVar('doc_name',FILTER_SANITIZE_STRING),
				'date'            => date('Y-m-d')
			];

			$status = $this->adminModel->Insertdata_return_id('sale_cus_record', $data);
			if ($status == true) {
				$customer_session = [
					'id'    =>  $status
				];
				$this->session->set('customer_session_id',$customer_session);
				$this->session->setTempdata('success', 'Congratulation ! Customer Added Successfully !', 3);
				return redirect()->to(base_url().'/Medical_Accountent/product_sale');
			}else{
				$this->session->setTempdata('error', 'Sorry ! Unable to Add  Try Again ?', 3);
			}
			return redirect()->to(base_url().'/Medical_Accountent/add_customer_name');
		}	
	}

	public function product_sale(){
		if (!(session()->has('customer_session_id'))) {
			$this->session->setTempdata('error', 'Please Add Customer Name First', 3);
			return redirect()->to(base_url()."/Medical_Accountent/add_customer_name");
		}
		$args = [
			'expiry_date>=' => date('Y-m-d'),
			'status'        => 'Active'
		];
		$data['product_name'] = $this->adminModel->fetch_rec_by_args('mediciens', $args);

		$args = [
			'session_id'  => session()->get('customer_session_id')
		];
		$data['carts'] = $this->adminModel->fetch_rec_by_args('carts', $args);
		return view('Medical/product_sale', $data);
	}



	public function add_to_Cart(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
				$args = [
				'id'   => $this->request->getVar('product_id',FILTER_SANITIZE_STRING)
			];

			$product_details = $this->adminModel->fetch_rec_by_args('mediciens', $args);
			// var_dump($product_details);
			// exit();
		//Add one id data  already added or not check and quantity increment script Khan Rayees Software Developer

			$args = [
				'product_id'  => $this->request->getVar('product_id',FILTER_SANITIZE_STRING)
			];
			$check_product = $this->adminModel->fetch_rec_by_args('carts', $args);
			if ($check_product) {
				count($check_product);
				$old_qty = $check_product[0]->quantity;
				$new_qty = $old_qty + 1;
				$args = [
					'id'  => $check_product[0]->id
				];
				$data = [
					'quantity'   => $new_qty
				];
				$result = $this->adminModel->update_rec_by_args('carts',$data, $args);
				if ($result == true) {
					# code...
					echo "1";
				}else{	
					echo "Failed";
				}
		//Add one id data  already added or not check and quantity increment script Khan Rayees Software Developer
			}else{
				$cus_id = session()->get('customer_session_id');
				$data = [
					'product_id'     => $product_details[0]->id,
					'product_name'   => $product_details[0]->med_name,
					'session_id'     => $cus_id['id'],
					'quantity'       => $this->request->getVar('quantity',FILTER_SANITIZE_STRING),
					'rate'           => $product_details[0]->med_price,
					'stock'          => $product_details[0]->med_stock,
					'date'           => date('Y-m-d')
				];
				$result = $this->adminModel->Insertdata('carts',$data);
				if ($result == true) {
					# code...
					$this->session->setTempdata('success', 'Congratulation ! Product Added to Cart Successfully !', 3);
				}else{
					$this->session->setTempdata('error', 'Sorry ! Unable to Add  Try Again ?', 3);
				}
				return redirect()->to(base_url().'/Medical_Accountent/product_sale');
			}
		}
	}

	public function delete_cart_product($id){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$args = [
				'id'  => $id,
				'session_id'  => session()->get('customer_session_id')
			];
			$status = $this->adminModel->delete_records('carts', $args);
			if ($status == true) {
				$this->session->setTempdata('success', 'Congratulation ! Product Remove to Cart Successfully !', 3);
			}else{
				$this->session->setTempdata('error', 'Sorry ! Unable to Add  Try Again ?', 3);
			}
			return redirect()->to(base_url().'/Medical_Accountent/product_sale');
		}
	}

	public function check_out_products($id){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$args = [
				'session_id'   => $id
			];
			$products = $this->adminModel->fetch_rec_by_args('carts', $args);

			//Get Shipping Address
			$args =[
				'id'   => $id
			];
			$tem_address = $this->adminModel->fetch_rec_by_args('sale_cus_record', $args);
			//Get Shipping Address

			//Get Products
			$total_quantity = 0;
			$total_amount = 0;
			if ($products) {
				count($products);
				foreach ($products as $pro) {
					$total_quantity   += $pro->quantity;
					$total_amount     += ($pro->quantity * $pro->rate);
				}
			}else{
				$total_quantity  = 0;
			}
			//Get Products

			$data = [
				'customer_id'     => $id,
				'customer_name'   => $tem_address[0]->customer_name,
				'customer_add'    => $tem_address[0]->customer_add,
				'total_quantity'  => $total_quantity,
				'total_amount'    => $total_amount,
				'order_date'      => date('Y-m-d')
			];
			$order_id = $this->adminModel->Insertdata_return_id('order_product',$data);

			//insert order products
				
				if ($products) {
					count($products);
					foreach ($products as $pro) {
						$data =  [
							'customer_id'   => $tem_address[0]->id,
							'order_id'      => $order_id,
							'customer_name' => $tem_address[0]->customer_name,
							'customer_add' => $tem_address[0]->customer_add,
							'product_id'   => $pro->product_id,
							'product_name' => $pro->product_name,
							'quantity'     => $pro->quantity,
							'rate'         => $pro->rate,
							'date'         => date('Y-m-d')
						];
						$result = $this->adminModel->Insertdata('sale_products',$data);
					}
				}else{
					echo "Product Not Sale";
				}
		// session()->destroy('customer_session_id');

			$args = [
				'customer_id'  => $id
			];	
			$data['generate_bill'] = $this->adminModel->fetch_rec_by_args('sale_products', $args);
			return view('Medical/generate_payment_bill', $data);	
		}	
	}

	public function print_slip($id){
		//insert order products
			$args  = [
				'session_id'   => $id
			];
			$result = $this->adminModel->delete_records('carts', $args);

			$args = [
				'id'  => $id	
			];
			$result = $this->adminModel->delete_records('sale_cus_record',$args);
			session()->destroy('customer_session_id');
			$args = [
				'customer_id'  => $id
			];
			$data['print_slip'] = $this->adminModel->fetch_rec_by_args('sale_products', $args);
		return view('Medical/print_slip', $data);
	}	

	public function todays_sale_records(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$args = [
				'order_date'   => date('Y-m-d')
			];
			$data['sales'] = $this->adminModel->fetch_rec_by_args('order_product',$args);
			return view('Medical/todays_sale_records', $data);
		}
	}

	public function search_sales(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$args = [	
				'order_date>='  => $this->request->getVar('start_date',FILTER_SANITIZE_STRING),
				'order_date<='  => $this->request->getVar('last_date',FILTER_SANITIZE_STRING),
			];
			$data['sales'] = $this->adminModel->fetch_rec_by_args('order_product',$args);
			return view('Medical/search_sales', $data);
		}
	}

	public function all_sale_reports(){
		if (!(session()->has('loggedin_user'))) {
			return redirect()->to(base_url()."/Accountent_login/accountent_login");
		}else{
			$data['sales'] = $this->adminModel->fetch_all_records('order_product');
			return view('Medical/all_sale_reports', $data);
		}
	}
//Product Sale Query End	


//Change Password Script Start 
	public function change_password(){
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
		
		return view('Medical/change_password', $data);
	} 

	
//Change Password Script Start End

//Dashboard Section Script Start
	public function count_customers($type = 'all'){
		if ($type == 'all') {
			$customer = $this->adminModel->fetch_all_records('order_product');
				
		}else if ($type == 'today') {
			$args = [
				'order_date'  => date('Y-m-d')
			];
			$customer = $this->adminModel->fetch_rec_by_args_with_date('order_product', $args);
			// var_dump($customer);
			// exit();
		}else if ($type == 'yesterday') {
			$args = [
				'order_date'  => date('Y-m-d',strtotime("-1 day"))
			];
			$customer = $this->adminModel->fetch_rec_by_args_with_date('order_product', $args);
		}else if ($type == 'last_30_days') {
			$args = [
				'order_date>='  => date('Y-m-d',strtotime("-30 day")),
				'order_date<='   => date('Y-m-d') 
			];
			$customer = $this->adminModel->fetch_rec_by_args_with_date('order_product', $args);
		}else{
			$customer = $this->adminModel->fetch_all_records('order_product');
		}
		echo count($customer);
	} 

	public function count_income($type = 'all'){
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
			// echo "<pre>";
			// var_dump($income);
			// exit();
		}
		$total_income = 0;
		if(count($income)){
			foreach($income as $count_inc){
				// $total_income += $inc->intry_fee;
				
				$total_income += $count_inc->quantity *  $count_inc->rate;
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
//Dashboard Section Script End






}