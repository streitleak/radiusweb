<?php

namespace Streitleak\RadiusWeb;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Streitleak\RadiusWeb\App\Models\CDR;
use Illuminate\Support\Facades\Validator;

class RadiusCDRController extends Controller
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
        $cdrs = CDR::paginate(15)->onEachSide(2);
        //$cdrs = \DB::table('freecdr')->orderByDesc('radacctid')->paginate(15)->onEachSide(2);   
        return View('radiusweb::cdr', ['cdrs' => $cdrs, 'starttime' => null, 'stoptime' => null, 'calling' => null, 'called' => null, 'duration' => null, 'page' => null, 'name' => $request->user()->name]);
    }

    public function customcdr(Request $request)
    {
        $rules = array(
            'starttime' => 'nullable|date_format("Y-m-d H:i:s")', // make sure the email is an actual email
            'stoptime' => 'nullable|date_format("Y-m-d H:i:s")',
            'calling' => 'nullable|nemuric',
            'called' => 'nullable|nemuric',
            'duration' => 'nullable|nemuric',
            'page' => 'nullable|nemuric' // password can only be alphanumeric and has to be greater than 3 characters
        );
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) 
        {
            return Redirect::to('cdr'.$equest->user()->id)
                    ->withErrors($validator); // send back all errors to the login form
//                    ->withInput($request->except('email')); // send back the input (not the password) so that we can repopulate the form
        }

        #$cdr = CDR::all();

        $query = "";
        if( $request->filled('starttime') ) 
        {
            $starttime = $request->input('starttime');
            
        }
        else
        {
            $starttime = NULL;
        }
    
        if( $request->filled('stoptime') ) 
        {
            $stoptime = $request->input('stoptime');     
        }
        else
        {
            $stoptime = NULL;
        }
    
        if( is_null($starttime) == false && is_null($stoptime) == false )
        {
            $query = " ( `NET-Setup-Time` >= '" . strtotime($starttime) . "' and `NET-Setup-Time` <= '" . strtotime($stoptime) . "' )";
        }
        else if( is_null($starttime) == false && is_null($stoptime) == true )
        {
            $query = " `NET-Setup-Time` >= '" . strtotime($starttime) . "'";
        }
        else if( is_null($starttime) == true && is_null($stoptime) == false )
        {
            $query = " `NET-Setup-Time` <= '" . strtotime($stoptime) . "'";
        }
        else
        {
            $query = "";
        }
    
        if( $request->filled('calling') ) 
        {
            $calling = $request->input('calling');
    
            if(strlen($query) > 0 )
            {
                $query .=" and `NET-Calling-Number` = '" . $calling . "'";
            }
            else
            {
                $query =" `NET-Calling-Number` = '" . $calling . "'";
            }
            
        }
        else
        {
            $calling = NULL;
        }
    
        if( $request->filled('called')) 
        {
            $called = $request->input('called');
            if(strlen($query) > 0 )
            {
                $query .=" and `NET-Called-Number` = '" . $called . "'";
            }        
            else
            {
                $query =" `NET-Called-Number` = '" . $called . "'";
            }
            
        }
        else
        {
            $called = NULL;
        }
    
        if( $request->has('duration')) 
        {
            if(strlen($query) > 0 )
            {
                $query .=" and `NET-Call-Duration` > 0";
            }        
            else
            {
                $query =" `NET-Call-Duration` > 0 ";
            }        
    
        }
    
        if( $request->filled('page'))
        {
            $page="?page=" .  $request->input('page');
        }
        else $page = NULL;
    
        if( strlen($query) == 0 )
        {
            //$cdrs = \DB::table('freecdr')->paginate(15)->onEachSide(2);           
            $cdrs = CDR::paginate(15)->onEachSide(2);
        }
        else
        {
            //$cdrs = \DB::table('freecdr')
            //    ->whereRaw($query)
            //    ->paginate(15)->onEachSide(2);
            /*if( $cdrs->count() == 0)        
            {
                $cdrs = array();
                $cdrs->paginate(15)->onEachSide(2);
            }*/        
            $cdrs = CDR::whereraw($query)->paginate(15)->onEachSide(2);
            $page=null;
        }
        return View('radiusweb::cdr', ['cdrs' => $cdrs, 'starttime' => $starttime, 'stoptime' => $stoptime, 'calling' => $calling, 'called' => $called, 'duration' => $request->has('duration')?"checked":"", 'page' => $page, 'name' => $request->user()->name]);
    
    }
}
