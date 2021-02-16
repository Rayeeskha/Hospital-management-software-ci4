<?php 
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

	class LoginFilter implements FilterInterface{
		public function before(RequestInterface $request, $arguments = null){
			if (!(session()->has('loggedin_user'))) {
				return redirect()->to(base_url()."/Login");
			}
		}
		public function after(RequestInterface $request, ResponseInterface $response,  $arguments = null){
			echo 'Bye';
		}

	}

?>