<?php 

	function get_doctor_name($tablename, $args){
		$db = \Config\Database::connect();
		$builder = $db->table($tablename);
		$builder->select('*');
		$result = $builder->where('id', $args)
                  ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
	}

	function get_stock($tablename, $args){
		$db = \Config\Database::connect();
		$builder = $db->table($tablename);
		$builder->select('*');
		$result = $builder->where('product_id', $args)
                  ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
	}

	function get_all_customer($tablename, $args){
		$db = \Config\Database::connect();
		$builder = $db->table($tablename);
		$builder->select('*');
		$result = $builder->where('order_date', $args)
                  ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
	}

	function get_login_activity($tablename, $args){
		$db = \Config\Database::connect();
		$builder = $db->table($tablename);
		$builder->select('*');
		$result = $builder->where('uid', $args)
                  ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
	}

	function login_doctor_image($tablename, $args){
		$db = \Config\Database::connect();
		$builder = $db->table($tablename);
		$builder->select('*');
		$result = $builder->where('doctor_email', $args)
                  ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
	}


	function verify_db_detatime_to_current_time_stamp($db_time){
		// $current_time  = time();
		$diff      = abs(time() - $db_time);
	    //Count Year
	    $years = floor($diff / (365*60*60*24));  
		//Count Months
        $months = floor(($diff - $years * 365*60*60*24) 
                                       / (30*60*60*24));  
         //Count days 
        $days = floor(($diff - $years * 365*60*60*24 -  
                     $months*30*60*60*24)/ (60*60*24)); 
          //Count year 
        $hours = floor(($diff - $years * 365*60*60*24  
               - $months*30*60*60*24 - $days*60*60*24) 
                                           / (60*60));  
         //Count Months  
        $minutes = floor(($diff - $years * 365*60*60*24  
                 - $months*30*60*60*24 - $days*60*60*24  
                                  - $hours*60*60)/ 60); 
        return $minutes;
	}



	
?>