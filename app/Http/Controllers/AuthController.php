<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    function index()
    {
        return view('login');
    }

    function registration()
    {
        return view('registration');
    }

    function validate_registration(Request $request)
    {
        $request->validate([
            'org_name'         =>   'required',
            'email'        =>   'required|email|unique:users',
            'contact_no'     =>   'required|min:11',
            'org_number'     =>   'required'
        ]);

        // $data = $request->all();

        // User::create([
        //     'name'  =>  $data['name'],
        //     'email' =>  $data['email'],
        //     'password' => FacadesHash::make($data['password'])
        // ]);

         $response = Http::post('http://127.0.0.1:8000/api/register', $request->input());

        if ($response['success'] == true) {

            $request->session()->put('temp_email_info',$response['data']['email']);
            $request->session()->put('temp_password_info',$response['data']['org_number']);
           
            // Session::set('temp_email_info', $response['data']['email']);
            // Session::set('temp_password_info', $response['data']['org_number']);
            
            //notify()->success($response['message']);

            return redirect('login')->with('success', 'Registration Completed, now you can login');
            
            //echo $response['message'];
        }

        //return redirect('login')->with('success', 'Registration Completed, now you can login');
    }

    

    function validate_login(Request $request)
    {
        $request->validate([
            'email' =>  'required',
            'password'  =>  'required'
        ]);

         $credentials = Http::post('http://127.0.0.1:8000/api/login', $request->only('email', 'password'));

         //return $credentials;
        
       $request->session()->put('token_info',$credentials['token']);
        
        //  $credentials2[] = $credentials; 

        $credentials = array(
            'email' => $request->email,
            'password' => $request->password,
        );

        

        try {
            
            $config = Config::get('database.connections.mysql');

            $config['database'] = 'habroerp_root';

                $config['username'] = 'root';
                $config['password'] = null;
            


            // Update config
            Config::set('database.connections.mysql', $config);

            // Refresh config array in connection cache
            DB::purge('mysql');

            // Reconnect
            DB::reconnect('mysql');
        } catch (\Throwable $th) {
            //throw $th;
        }

        // $currentDatabase = DB::connection()->getDatabaseName();

        // return $currentDatabase;


       // return $credentials;


        //$credentials = $request->only('email', 'password');

        //return $credentials;

        // $credentials = explode(':', $request->header('Authorization'));
        //$token = trim($credentials[2]);

       //$token= $request->bearerToken();
        //return $credentials;

        if(Auth::attempt($credentials))
        {
           // return $token= request()->bearerToken();
            //return Auth::user();
            //return $credentials['token'];
            return redirect('dashboard');
        }

        return redirect('login')->with('success', 'Login details are not valid');
    }

    function dashboard()
    {
        if(Auth::check())
        {
            return view('dashboard');
        }

        return redirect('login')->with('success', 'you are not allowed to access');
    }

    function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect('login');
    }
}
