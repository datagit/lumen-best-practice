<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MiddlewaredController extends Controller
{
    public function index(Request $req) {
		
		$result = [
			'username' => 'bajulbuntung',
			'fname' => 'Bajul',
			'lname' => 'Buntung'
		];

	    return $this->goodResponse($result, true);
	}

}
