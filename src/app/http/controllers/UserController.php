<?php

namespace Streitleak\RadiusWeb;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function showlogin()
    {
        return View('radiusweb::auth.login');
    }
    public function dologin(Request $request)
    {
        /*$credentials = $request->only('email', 'password');

        $login_result = "";

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $request->session()->regenerate();
            return route('index');
        }        

        return View('radiusweb::auth.login',['login_result' = $login_result ]);*/
        
        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) 
        {
            return Redirect::to('login')
                    ->withErrors($validator) // send back all errors to the login form
                    ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        }
        else 
        {
            if ($request->session()->has('users')) {
                // Caught login try
                return abort(400);
            }

            // create our user data for the authentication
            $userdata = array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password')
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) 
            {
                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)
                //echo 'SUCCESS!';                
                $request->session()->regenerate();
            }
            else 
            {        
                // validation not successful, send back to form 
                return Redirect::to('login');

            }

        }

    }

    public function showlogout()
    {
        return View('radiusweb::auth.logout');
    }

    public function dologout()
    {
        Auth::logout(); // log the user out of our application
        $request->session()->flush();
        return Redirect::to('login'); // redirect the user to the login screen
    }
    public function showresetpassword()
    {
        return View('radiusweb::auth.resetpassword');
    }
    public function doresetpassword()
    {
        return Redirect::to('login'); 
    }
}

