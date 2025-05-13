<?php

namespace Streitleak\RadiusWeb;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Streitleak\RadiusWeb\app\models\CDR;
use Illuminate\Support\Facades\Validator;

class TcgCDRController extends Controller
{
    //
    public function index(Request $request)
    {
        if(Auth::check())
        {
            return View('radiusweb::index',['name' => $request->user()->name]);
        }
        return View('radiusweb::index');

    }

    public function showcdr(Request $request)
    {
        $cdrs = CDR::where('netcallduration','>','0')->orderBy('radacctid','desc')->paginate(15)->onEachSide(2);
        return View('radiusweb::tcgcdr', ['cdrs' => $cdrs, 'starttime' => null, 'stoptime' => null, 'calling' => null, 'called' => null, 'duration' => null, 'page' => null, 'name' => $request->user()->name]);
    }

    public function customcdr(Request $request)
    {
        $rules = array(
            'starttime' => 'nullable|date_format:Y-m-d H:i:s', // make sure the email is an actual email
            'stoptime' => 'nullable|date_format:Y-m-d H:i:s',
            'calling' => 'nullable|numeric',
            'called' => 'nullable|numeric',
            'page' => 'nullable|numeric' // password can only be alphanumeric and has to be greater than 3 characters
        );
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) 
        {
            return Redirect::to('tcgcdr'.$equest->user()->id)
                    ->withErrors($validator); // send back all errors to the login form
        }


		$starttime = $request->input('starttime');
		$stoptime = $request->input('stoptime');
		$calling = $request->input('calling');
		$called = $request->input('called');

		$cdrs = CDR::where('netcallduration','>','0')
				->when($starttime, function ($query, $starttime) {
                    return $query->where('netconnecttime', '>=', strtotime($starttime));
                })
				->when($stoptime, function ($query, $stoptime) {
                    return $query->where('netdisconnecttime', '<=', strtotime($stoptime));
                })
				->when($calling, function ($query, $calling) {
                    return $query->where('netcallingnumber', '=', $calling);
                })
				->when($called, function ($query, $called) {
                    return $query->where('netcallednumber', '=', $called);
                })
				->orderBy('radacctid','desc')
				->paginate(15)->onEachSide(2);
		
        return View('radiusweb::tcgcdr', ['cdrs' => $cdrs, 'starttime' => $starttime, 'stoptime' => $stoptime, 'calling' => $calling, 'called' => $called, 'name' => $request->user()->name]);
    
    }
}
