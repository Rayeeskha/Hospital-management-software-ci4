<?php 
	
	function getRandom($arr){
		 shuffle($arr);
		return end($arr);
	}


	function randomString(){
		return substr(str_shuffle('khan Rayees Software Developer'), 10,10);
	}


?>