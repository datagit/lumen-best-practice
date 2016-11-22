<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function goodResponse($result, $validResponse=true, $message=null) {
	    if($validResponse) {
	        $resp['meta'] = [ 'status' => true, 'message' => $message ? $message : 'valid response', 'version' => 'v1' ];
	    } else {
	        // Throw error
	        $resp['meta'] = [ 'status' => false, 'message' => $message ? $message : 'invalid response', 'version' => 'v1' ];
	    }
	    $resp['result'] = $result;

	    return response()->json($resp);
	}
}
