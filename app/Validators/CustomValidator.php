<?php

namespace App\Validators;

class CustomValidator
{
	
	public function isOddNumber($attribute, $value, $parameters, $validator)
	{
		if($value%2==1) {
			return true;
		} else {
			return false;
		}
	}

}