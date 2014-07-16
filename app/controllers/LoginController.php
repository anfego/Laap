<?php

class LoginController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function login()
	{
	
		if ($this->isPostRequest())
		{
			
			$validator = $this -> getLoginValidator();

			if ($validator->passes()) 
			{
				 $credentials = $this->getLoginCredentials();

				if (Auth::attempt($credentials))
				{
					return Redirect::route("user.apps");
				}

				return Redirect::back()->withErrors([
					"password" => ["Credentials invalid."]]);
			}
			else 
			{
				echo "Go back";
				return Redirect::back()
					->withInput()
					->withErrors($validator);
			}
		}

  		return View::make("user.login");
	}

	protected function isPostRequest()
	{	
		
		return Input::server("REQUEST_METHOD") == "POST";
	}

	protected function getLoginValidator()
	{
		return Validator::make(Input::all(), [
			"username" => "required",
			"password" => "required"
		]);
	}

	protected function getLoginCredentials()
  	{
    	return [
			"username" => Input::get("username"),
			"password" => Input::get("password")
    	];
	}

	public function apps()
	{
		return View::make("user.apps");
	}
	
}
