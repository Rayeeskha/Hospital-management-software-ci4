<?php 
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;

	class IPBlockerFilter implements FilterInterface{
		public function before(RequestInterface $request, $arguments = null){
			$throttler = Services::throttler();
			if ($throttler->check('test', 4, MINUTE) === false) {
				return Services::response()->setStatusCode(429)->setBody('Too many hits IP Address Block Try Few minutes Later');
			}
		}
		public function after(RequestInterface $request, ResponseInterface $response,  $arguments = null){
			echo 'Bye';
		}

	}

?>