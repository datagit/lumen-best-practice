<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Validator;

class AppServiceProvider extends ServiceProvider
{
	public function boot()
	{
		
		// CUSTOM VALIDATION
		Validator::extend('is_odd_number', 'App\Validators\CustomValidator@isOddNumber');

	}

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
