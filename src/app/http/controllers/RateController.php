<?php

namespace Streitleak\RadiusWeb;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Streitleak\RadiusWeb\App\Models\Rate;

class RateController extends Controller
{
    public function showrate(Request $request)
    {
        $rates = Rate::all();
        return View('radiusweb::rate',['rates' => $rates, 'name' => $request->user()->name]);
    }

    public function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }
    public function importrate(Request $request)
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'ratefile'    => 'required|file'
        );
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) 
        {
            return Redirect::route('showrate')
                        ->withErrors($validator); // send back all errors to the login form
        }
        else
        {   
            $file = $request->file('ratefile');

            $customerArr = $this->csvToArray($file);

            for ($i = 0; $i < count($customerArr); $i ++)
            {
                Rate::firstOrCreate($customerArr[$i]);
            }

            return Redirect::to('rate');
        }
    }
}

