<?php 
namespace App\models;
use CodeIgniter\Model;

class Admin_Model extends Model
{
	public function Insertdata($tablename,$data){
		$builder = $this->db->table($tablename);
		$res = $builder->insert($data);
		if ($this->db->affectedRows() == 1) {
			return true;
		}else{
			return false;
		}
	}

	public function Insertdata_return_id($tablename,$data){
	 	$builder = $this->db->table($tablename);
	 	$res = $builder->insert($data);
	 	if ($this->db->affectedRows() == 1) {
	 		return $this->primaryKey = $this->db->insertID();
	 	}else{
			return false;
	 	}
	}

	//Get Logged In User data
	public function getLoggedInUserData($id){
		$builder = $this->db->table('register_all_users');
		$builder->where('uid', $id);
		$result = $builder->get();
		if (count($result->getResultArray()) == 1) {
			return $result->getRow();
		}else{
			return false;
		}
	}
	public function getLoggedInDonor_data($id){
			$builder = $this->db->table('blood_bank_users');
			$builder->where('uid', $id);
			$result = $builder->get();
			if (count($result->getResultArray()) == 1) {
				return $result->getRow();
			}else{
				return false;
			}
	}
	public function getLoggedInAdminData($id){
			$builder = $this->db->table('register');
			$builder->where('uid', $id);
			$result = $builder->get();
			if (count($result->getResultArray()) == 1) {
				return $result->getRow();
			}else{
				return false;
			}
	}
	//Get Logged In User data

	
	public function fetch_all_records($tablename){
		$builder = $this->db->table($tablename);
		$builder->select("*");
		$builder->orderBy('id', 'DESC');
		$result = $builder->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}	
	}

	public function fetch_all_records_by_active($tablename){
		$builder = $this->db->table($tablename);
		$builder->select("*");
		$builder->orderBy('id', 'DESC');
		$result = $builder->where('status', 'Active');
		$result = $builder->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}	
	}

	public function fetch_rec_by_args($tablename, $args){
		$builder = $this->db->table($tablename);
		$builder->select('*');
		$result = $builder->where($args)
                  ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
	}

	public function filter_rec_by_args_with_status($tablename, $order_format, $args){
		extract($order_format);
		$builder = $this->db->table($tablename);
		$builder->orderBy($order_format['column_name'],$order_format['order']);
		$builder->where($args);
		$result = $builder->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return $result->getResult();
		}
	}



	public function fetch_rec_by_args_with_date($tablename, $args){
		$builder = $this->db->table($tablename);
		$builder->select('*');
		$result = $builder->where($args)
                  ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return $result->getResult();
		}
	}

	public function update_rec_by_args($tablename, $args, $data){
		$builder = $this->db->table($tablename);
		$builder->where($args);
		$builder->update($data);
		if ($this->db->affectedRows() == 1) {
			return true;
		}else{
			return false;
		}
	}

	public function delete_records($tablename, $args){
		$builder = $this->db->table($tablename);
		$builder->where($args);
		$builder->delete();
		if ($this->db->affectedRows() == 1) {
			return true;
		}else{
			return false;
		}
	}

	public function filter_rec_by_args($tablename, $order_format){
		extract($order_format);
		$builder = $this->db->table($tablename);
		$builder->orderBy($order_format['column_name'],$order_format['order']);
		$result = $builder->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return $result->getResult();
		}
	}

	public function fetch_rec_by_args_by_like($tablename, $args){
		$builder = $this->db->table($tablename);
		$builder->like($args);
		$builder->orderBy('id', 'DESC');
		$result = $builder->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return $result->getResult();
		}
	}


	public function fetch_rec_by_args_by_like_with_level($tablename, $args, $level){
		$builder = $this->db->table($tablename);
		$builder->like($args);
		$builder->orderBy('id', 'DESC');
		$result = $builder->where('level', $level);
		$result = $builder->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return $result->getResult();
		}
	}
	public function fetch_rec_by_args_by_like_with_status($tablename, $args, $status){
		$builder = $this->db->table($tablename);
		$builder->like($args);
		$builder->orderBy('id', 'DESC');
		$result = $builder->where('status', $status);
		$result = $builder->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return $result->getResult();
		}
	}

	public function fetch_all_records_by_level_with_args($tablename, $args){
		$builder = $this->db->table($tablename);
		$builder->select("*");
		$builder->orderBy('id', 'DESC');
		$result = $builder->where('level', $args);
		$result = $builder->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
	}

	public function filter_rec_by_args_with_level($tablename, $order_format, $args){
		extract($order_format);
		$builder = $this->db->table($tablename);
		$builder->orderBy($order_format['column_name'],$order_format['order']);
		$result = $builder->where('level', $args);
		$result = $builder->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return $result->getResult();
		}
	}
	public function filter_rec_by_args_with_date($tablename, $order_format, $args){
		extract($order_format);
		$builder = $this->db->table($tablename);
		$builder->orderBy($order_format['column_name'],$order_format['order']);
		$result = $builder->where('created_at', $args);
		$result = $builder->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return $result->getResult();
		}
	}

	public function updatePassword($tablename,$npwd, $id){
		$builder = $this->db->table($tablename);
		$builder->where('uid',$id);
		$builder->update(['password'=> $npwd]);
		if ($this->db->affectedRows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	//Account Verification Query with Status Pagination
	public function fetch_rec_by_args_with_status($tablename, $args){
	    return $this
                ->table($tablename)
                ->select('*')
                ->where($args)
                ->paginate(10);
		}
	//Account Verification Query with Status Pagination

	//Front Page Query Section Start
	public function get_image_by_args($tablename, $args, $limit){
		$builder = $this->db->table($tablename);
		$builder->select('*');
		$builder->where($args);
		$builder->orderBy('id', 'DESC');
		$result = $builder->limit($limit);
		$result = $builder->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
	} 	

	public function get_image_by_args_as_order($tablename, $args, $limit){
		$builder = $this->db->table($tablename);
		$builder->select('*');
		$builder->where($args);
		$builder->orderBy('id', 'ASC');
		$result = $builder->limit($limit);
		$result = $builder->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
	} 
	//Front Page Query Section End	





}