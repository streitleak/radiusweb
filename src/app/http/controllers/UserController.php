<?php

namespace Streitleak\RadiusWeb;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //
    public function showlogin()
    {
        return View('radiusweb::auth.login',['errors' => null]);
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
            'password' => 'required|alphaNum|min:6' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) 
        {
            return Redirect::to('login')
                    ->withErrors($validator) // send back all errors to the login form
                    ->withInput($request->except('password')); // send back the input (not the password) so that we can repopulate the form
        }
        else 
        {
            if ($request->session()->has('users')) {
                // Caught login try
                return abort(400);
            }

            // create our user data for the authentication
            $userdata = array(
                'email'     => $request->input('email'),
                'password'  => $request->input('password')
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

                // validation successful, send to Profile
                return Redirect::to('index');
            }
            else 
            {        
                // validation not successful, send back to form 
                return Redirect::to('login');

            }

        }        

    }

    public function dologout(Request $request)
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

    public function showprofile(Request $request)
    {        
        return View('radiusweb::auth.profile', ['name' => $request->user()->name , 'email' => $request->user()->email]);
    }

    public function doprofile(Request $request)
    {         
         // validate the info, create rules for the inputs
         $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            //'password' => 'required|alphaNum|min:6' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) 
        {
            return Redirect::to('profile/'.$equest->user()->id)
                    ->withErrors($validator) // send back all errors to the login form
                    ->withInput($request->except('email')); // send back the input (not the password) so that we can repopulate the form
        }
        
        return View('radiusweb::auth.profile', ['name' => $request->user()->name , 'email' => $request->user()->email]);
    }
}

