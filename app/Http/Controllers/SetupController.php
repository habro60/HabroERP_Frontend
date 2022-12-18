<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SetupController extends Controller
{
    public function office_index()
    {
       return $response = Http::get('http://127.0.0.1:8000/api/all_office');

       return $office = $response['success'];

       return view('frontend.setup.office.index',compact('response'));
    }
}
