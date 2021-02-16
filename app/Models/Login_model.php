<?php 
namespace App\models;
use CodeIgniter\Model;
class Login_model extends Model
{
	public function verifyEmail($email,$password){
		$builder = $this->db->table('register');
		$builder->select('uid,status,username,password,email,level');
		$builder->where('email', $email);
		$builder->where('password', md5($password));

		$result = $builder->get();
		if (count($result->getResultArray()) == 1) {
			return $result->getRowArray();
		}else{
			return false;
		}
	}

	public function verifyEmail_with_args($tablename, $email){
		$builder = $this->db->table($tablename);
		$builder->select('uid,status,username,password,email,level');
		$builder->where('email', $email);
		$result = $builder->get();
		if (count($result->getResultArray()) == 1) {
			return $result->getRowArray();
		}else{
			return false;
		}
	}

	public function getLoggedInPatientsData($id){
			$builder = $this->db->table('patients_login');
			$builder->where('uid', $id);
			$result = $builder->get();
			if (count($result->getResultArray()) == 1) {
				return $result->getRow();
			}else{
				return false;
			}
	}


	public function saveLoginInfo($data){
		$builder = $this->db->table('login_activity');
		$builder->insert($data);
		if ($this->db->affectedRows() == 1) {
			return $this->db->insertID();
		}else{
			return false;
		}
	}

	public function google_user_exists($id){
		$builder = $this->db->table('social_login');
		$builder->where('oauth_id',$id);
		if ($builder->countAllResults() == 1) {
			return true;
		}else{
			return false;
		}
	}

	public function updateGoogleUser($data,$id){
		$builder = $this->db->table('social_login');
		$builder->where('oauth_id', $id);
		$builder->update($data);
		if ($this->db->affectedRows() == 1) {
			return true;
		}else{
			return false;
		}
	}

	public function createGoogleUser($data){
		$builder = $this->db->table('social_login');
		$res     = $builder->insert($data);
		if ($this->db->affectedRows() == 1) {
			return true;
		}else{
			return false;
		}
	}

	public function updateLogoutTime($id){
		$builder = $this->db->table('login_activity');
		$builder->where('id',$id);
		$builder->update(['logout_time'=> date('Y-m-d h:i:s')]);
		if ($this->db->affectedRows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function verifyAccountentEmail($tbalename,$email){
		$builder = $this->db->table($tbalename);
		$builder->select('uid,status,username,password,level');
		$builder->where('email', $email);
		$result = $builder->get();
		if (count($result->getResultArray()) == 1) {
			return $result->getRowArray();
		}else{
			return false;
		}
	}

	public function updatedAt($tablename,$id){
		$builder = $this->db->table($tablename);
		$builder->where('uid', $id);
		$builder->update(['updated_at'=> date('Y-m-d h:i:s')]);
		if ($this->db->affectedRows() == 1) {
			return true;
		}else{
			return false;
		}
	}

	public function verifyToken($tablename, $token){
		$builder = $this->db->table($tablename);
		$builder->select('uid,username,updated_at');
		$builder->where('uid', $token);
		$result = $builder->get();
		if (count($result->getResultArray()) == 1) {
			return $result->getRowArray();
		}else{
			return false;
		}
	}


	public function update_password($tablename, $token,$pass){
		$builder = $this->db->table($tablename);
		$builder->where('uid', $token);
		$builder->update(['password' => $pass]);
		if ($this->db->affectedRows() == 1) {
			return true;
		}else{
			return false;
		}
	}







}