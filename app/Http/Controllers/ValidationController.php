<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libraries\MyException;

use Validator;
use Exception;

class ValidationController extends Controller
{
    public function validateNumber(Request $req) {
		$validation = Validator::make($req->all(),
            [
                'thisisnum' => 'numeric',
            ]
        );
        if($validation->fails()){
            $messages = $validation->errors();
            return response($messages)->setStatusCode(422, 'Unprocessable Entity');
        }
        $result = 'This is a number : ' . $req->input('thisisnum');
        return response($result);
	}

	public function validateOddNumber(Request $req) {
		$validation = Validator::make($req->all(),
            [
                'thisisnum' => 'numeric|is_odd_number',
            ]
        );
        if($validation->fails()){
            $messages = $validation->errors();
            return response($messages)->setStatusCode(422, 'Unprocessable Entity');
        }
        $result = 'This is an odd number : ' . $req->input('thisisnum');
        return response($result);
	}

}
