<?php 
namespace App\models;
use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

    class Medicine_model extends Model
	{
		protected $table      = 'mediciens';
	    protected $primaryKey = 'id';

	    // protected $returnType     = 'array';
	    // protected $useSoftDeletes = true;
	    protected $allowedFields     = ['med_name','med_company','med_price','med_d_price', 'med_dis','expiry_date', 'batch_number', 'med_image','status'];
	    protected $useTimestamps     = true;
	    protected $createdField      = 'created_at';
	    // protected $updatedField      = 'updated_at';
	    // protected $deletedField      = 'deleted_at';
	    protected $returnType        = 'array';

	    protected $validationRules    = [
	    	'med_name'       => 'required',
	    	'med_company'    => 'required',
	    	'med_price'      => 'required'
	    ];
	    // $model->setValidationRule($fieldName, $fieldRules);


	    public function search($key)
	    {   

	    	return $this->table('mediciens')->like('med_company',$key);
	    	// $builder = $this->table('patents');
	        // $builder->like('patent_name',$keys);
	        // // $query   = $builder->paginate(10);
	        // return $query;
	        
	    }

	    public function search_med_name($key, $args)
	    {   
			return $this->table('mediciens')->like('med_name',$key)->where($args);
	    }

	    public function fetch_rec_by_args_with_status($tablename, $args){
	    	return $this
                    ->table($tablename)
                    ->select('*')
                    ->where($args)
                    ->paginate(10);
		}

		public function fetch_rec_by_expiry_medicine($tablename, $args){
			return $this->table($tablename)
                    ->select('*')
                    ->where($args)
                    ->paginate(10);
		}

		
	    public function filter_rec_by_args($tablename, $order_format){
			extract($order_format);
		    $builder = $this->db->table('mediciens');
			$builder->orderBy($order_format['column_name'],$order_format['order']);
			$result = $builder->get();
			if (count($result->getResultArray())> 0) {
			 	return $result->getResult();
			}else{
			 	return $result->getResult();
			}
		}

		public function filter_rec_by_args_with_pagination($tablename, $order_format, $args){
			extract($order_format);
			return $this->table($tablename)
                    ->orderBy($order_format['column_name'],$order_format['order'])
                    ->where($args)
                    ->paginate(10);
		}


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



		
		





	}


?>