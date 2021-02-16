<?php 
namespace App\models;
use CodeIgniter\Model;

    class Blogs_model extends Model
	{
		protected $table      = 'news_blog';
	    protected $primaryKey = 'id';

	    // protected $returnType     = 'array';
	    // protected $useSoftDeletes = true;
	    protected $allowedFields     = ['blog_title','blog_content','blog_image','doctor_id', 'doctor_name','department_name','doctor_specility','status','created_date','created_month','created_year'];
	    protected $useTimestamps     = true;
	    protected $createdField      = 'created_date';
	    protected $returnType        = 'array';

	    // $model->setValidationRule($fieldName, $fieldRules);

	    public function search($key)
	    {   

	    	return $this->table('patents')->like('patent_name',$key);
	        // $builder = $this->table('patents');
	        // $builder->like('patent_name',$keys);
	        // // $query   = $builder->paginate(10);
	        // return $query;
	    }

	    public function filter_rec_by_args($tablename, $order_format){
			extract($order_format);
			$builder = $this->db->table('patents');
			$builder->orderBy($order_format['column_name'],$order_format['order']);
			$result = $builder->get();
			if (count($result->getResultArray())> 0) {
				return $result->getResult();
			}else{
				return $result->getResult();
			}
		}

		public function fetch_rec_by_status_with_pagination($tablename, $args){
			return $this->table($tablename)
                    ->select('*')
                    ->where($args)
                    ->paginate(10);
		}

		public function search_patients_name($key, $args)
	    {   
			return $this->table('patents')->like('patent_name',$key)->where($args);
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

		public function fetch_rec_by_args_with_status($tablename, $args){
		    return $this
	            ->table($tablename)
	            ->select('*')
	            ->where($args)
	            ->paginate(8);
		}

		public function filter_rec_by_args_with_pagination($tablename, $order_format, $args){
			extract($order_format);
			return $this->table($tablename)
                    ->orderBy($order_format['column_name'],$order_format['order'])
                    ->where($args)
                    ->paginate(10);
		}

	 





	}


?>