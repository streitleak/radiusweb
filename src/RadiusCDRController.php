<?php

namespace Streitleak\RadiusCDR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RadiusCDRController extends Controller
{
    //
    public function index()
    {
        return View('radiuscdr::index');

    }

    public function cdr(Request $request)
    {
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
            $cdrs = \DB::table('freecdr')->paginate(15)->onEachSide(2);           
        }
        else
        {
            $cdrs = \DB::table('freecdr')
                ->whereRaw($query)
                ->paginate(15)->onEachSide(2);
            /*if( $cdrs->count() == 0)        
            {
                $cdrs = array();
                $cdrs->paginate(15)->onEachSide(2);
            }*/        
            $page=null;
        }
        return View('radiuscdr::cdr', ['cdrs' => $cdrs, 'starttime' => $starttime, 'stoptime' => $stoptime, 'calling' => $calling, 'called' => $called, 'duration' => $request->has('duration')?"checked":"", 'page' => $page]);
    
    }
}
