<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class SetupController extends Controller
{
    public function office_index()
    {
        //$credentials = Http::post('http://127.0.0.1:8000/api/login');

        $token=Session::get('token_info');

        // return $token;

         $response = Http::get('http://127.0.0.1:8000/api/all_office', [
        'headers' => [
            'Authorization' => 'Bearer '.$token,
            'Accept' => 'application/json',
        ],
    ]);

       return $response;

       return view('frontend.setup.office.index',compact('response'));
    }
}
