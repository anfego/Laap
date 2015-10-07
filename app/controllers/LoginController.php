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
    |   Route::get('/', 'HomeController@showWelcome');
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
                    $return = Redirect::route("user.home")->withCookie(Cookie::make('name', 'value', 6969))
                    return $return;
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

    public function frontPage()
    {
        Blade::setContentTags('<%', '%>');              // for variables and all things Blade
        Blade::setEscapedContentTags('<%%', '%%>');   // for escaped data
        return View::make("user.frontPage");
    }
    public function portal()
    {
        Blade::setContentTags('<%', '%>');              // for variables and all things Blade
        Blade::setEscapedContentTags('<%%', '%%>');   // for escaped data
        return View::make("user.home");
    }
    public function getUsername() {
        $username = Auth::user()->username;
        return ["username" => $username];   
    }
    public function logout()
    {
        Auth::logout();
        return View::make("user.login");
    }
    
}
