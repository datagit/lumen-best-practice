<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ConsistencyController extends Controller
{
    public function validResponse(Request $req) {
		
		$result = "OK, I'm valid result";

	    return $this->goodResponse($result, true);
	}

	public function invalidResponse(Request $req) {
		
		if(1) {
			throw new \App\Libraries\MyException("Oooopsss, I'm invalid but not an error!!!!");
		}  

	    return $this->goodResponse(null, false);
	}

	public function errorResponse(Request $req) {
		try {
			// this will raised error, lets assume its an unexpected :)
			$result = \DB::table('notexists')->get();
		} catch (\Exception $e) {
			throw new \App\Libraries\MyException("ERROR : WHAT THE F**K IT IS !!!", 500);
		}

	    return $this->goodResponse($result, false);
	}

	public function unauthorizedResponse(Request $req) {
		
		$authenticated = 0;

		if($authenticated) {
			$result = "You're allowed";
		} else {
			// lets throw error 403
			throw new \App\Libraries\MyException("Dude you're not allowed !!!", 403, new \Exception, [ 'codeStatus' => 'Forbidden' ]);
		}

	    return $this->goodResponse($result, false);
	}
}
