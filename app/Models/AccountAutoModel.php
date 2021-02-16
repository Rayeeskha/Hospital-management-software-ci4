<?php 
namespace App\models;
use CodeIgniter\Model;

    class AccountAutoModel extends Model
	{
		protected $table      = 'register_all_users';
	    protected $primaryKey = 'id';

	    // protected $returnType     = 'array';
	    // protected $useSoftDeletes = true;
	    protected $allowedFields     = ['uid','username','email','password', 'mobile','level','status'];
	    protected $useTimestamps     = true;
	    protected $createdField      = 'created_date';
	    protected $updatedField      = 'updated_at';
	    protected $deletedField      = 'deleted_at';
	    protected $returnType        = 'array';

	    // $model->setValidationRule($fieldName, $fieldRules);

	 public function fetch_rec_by_args_with_status($tablename, $args){
	    return $this
            ->table($tablename)
            ->select('*')
            ->where($args)
            ->paginate(10);
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