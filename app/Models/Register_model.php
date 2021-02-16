<?php 
namespace App\models;
use CodeIgniter\Model;
class Register_model extends Model
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

	public function verifyUnid($id){
		$builder = $this->db->table('register_all_users');
		$builder->select('created_date,uid,status');
		$builder->where('uid', $id);
		$result =  $builder->get();
		if (count($result->getResultArray()) == 1) {
			return $result->getRow();
		}else{
			return false;
		}
	}

	public function verify_patients_Unid($id){
		$builder = $this->db->table('patients_login');
		$builder->select('created_date,uid,status');
		$builder->where('uid', $id);
		$result =  $builder->get();
		if (count($result->getResultArray()) == 1) {
			return $result->getRow();
		}else{
			return false;
		}
	}

	public function updateStatus($id){
		$builder  = $this->db->table('register_all_users');
		$builder->where('uid',$id);
		$builder->update(['status'=>'AdminVerification']);
		if ($this->db->affectedRows() == 1) {
			return true;
		}else{
			return false;
		}
	}

	public function update_patients_Status($id){
		$builder  = $this->db->table('patients_login');
		$builder->where('uid',$id);
		$builder->update(['status'=>'Active']);
		if ($this->db->affectedRows() == 1) {
			return true;
		}else{
			return false;
		}
	}




}

?>