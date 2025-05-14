<?php

<<<<<<< Updated upstream
namespace Streitleak\Radiusweb;
=======
namespace Streitleak\Radiusweb\App\Http\Controllers;
>>>>>>> Stashed changes

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< Updated upstream
use Streitleak\Radiusweb\app\models\CDR;
=======
use Streitleak\Radiusweb\App\Models\CDR;
>>>>>>> Stashed changes
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;

class RadiusCDRController extends Controller
{
    public CDR $cdr_collection;
    public function __construct()
    {
        $this->cdr_collection = new CDR();
        $this->cdr_collection->where('netcallduration','>','0')
                        ->where('netsetuptime','>',Carbon::now()->addMonths(-1)->timestamp)
                        ->orderBy('radacctid','desc');
    }
    //
    public function index(Request $request)
    {
        //echo "Auth=" . (Auth::check()?"true":"false");
        //echo "User=" . (Auth::user()?"true":"false");
        if(Auth::check())
        {       
		    //$cdrs_30_0 = CDR::where('netsetuptime','>',Carbon::now()->addMonths(-1)->timestamp)->count();
		    //$cdrs_30_1 = CDR::where('netcallduration','>','0')->where('netsetuptime','>',Carbon::now()->addMonths(-1)->timestamp)->count();
		    //$gateways = CDR::select("nasipaddress", DB::raw("count(*) as calls"))->groupby('nasipaddress')->where('netcallduration','>','0')->where('netsetuptime','>',Carbon::now()->addMonths(-1)->timestamp)->get();
            $cdrs_30_0 = $this->cdr_collection->count();
		    $cdrs_30_1 = $this->cdr_collection->where('netsetuptime','>',Carbon::now()->addMonths(-1)->timestamp)->count();
		    $gateways = $this->cdr_collection->select("nasipaddress", DB::raw("count(*) as calls"))->groupby('nasipaddress')->where('netsetuptime','>',Carbon::now()->addMonths(-1)->timestamp)->get();
		    //var_dump($gateways);
            //$cdrs_30_0 = 0;
            //$cdrs_30_1 = 0;
            //$gateways=null;
        
            return View('radiusweb::dashboard',['name' => $request->user()->name,'cdr_0' => $cdrs_30_0,'cdr_1' => $cdrs_30_1, 'gateways' => $gateways]);
        }
        else
        {
            return View('radiusweb::index');
        }
    }

    public function showcdr(Request $request)
    {
        //$cdrs = CDR::where('netcallduration','>','0')
        //            ->where('netsetuptime','>',Carbon::now()->addMonths(-1)->timestamp)
        //            ->orderBy('radacctid','desc')
        //            ->paginate(15)
        //            ->onEachSide(2);
        $cdrs = $this->cdr_collection->paginate(15)
                    ->onEachSide(2);
        return View('radiusweb::cdr', ['cdrs' => $cdrs, 'starttime' => null, 'stoptime' => null, 'calling' => null, 'called' => null, 'duration' => null, 'page' => null, 'name' => $request->user()->name]);
    }

    public function showgwcdr(Request $request,$gateway)
    {
        $gateway = urldecode($gateway);
        //$cdrs = CDR::where('netcallduration','>','0')
        //            ->when($gateway, function ($query, $gateway) {
        //                return $query->where('nasipaddress', '=', $gateway);
        //            })
        //            ->where('netsetuptime','>',Carbon::now()->addMonths(-1)->timestamp)
        //            ->orderBy('radacctid','desc')
        //            ->paginate(15)
        //            ->onEachSide(2);
        $cdrs = $this->cdr_collection->when($gateway, function ($query, $gateway) {
                        return $query->where('nasipaddress', '=', $gateway);
                    })
                    ->paginate(15)
                    ->onEachSide(2);
        return View('radiusweb::cdr', ['cdrs' => $cdrs, 'starttime' => null, 'stoptime' => null, 'calling' => null, 'called' => null, 'duration' => null, 'page' => null, 'name' => $request->user()->name]);
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
            return Redirect::to('cdr'.$equest->user()->id)
                    ->withErrors($validator); // send back all errors to the login form
        }


		$starttime = $request->input('starttime');
		$stoptime = $request->input('stoptime');
		$calling = $request->input('calling');
		$called = $request->input('called');

		$cdrs = $this->cdr_collection->where('netcallduration','>','0')
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
		
        return View('radiusweb::cdr', ['cdrs' => $cdrs, 'starttime' => $starttime, 'stoptime' => $stoptime, 'calling' => $calling, 'called' => $called, 'name' => $request->user()->name]);
    
    }
}
