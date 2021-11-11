<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Customer;
use File;
use DB;
use Response;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkMD()
    {
        dd('checkMD');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function api1()
    {
        //$header = header("location: index.php");
        //DB::table('customers')->delete();
        $data1 = json_encode(['Example 1','Example 2','Example 3',]);
        $fileName = time() . '_datafile.json';
        File::put(public_path($fileName),$data1);
        //File::put(public_path('/upload/json/'.$fileName),$data);
        //Response::download(public_path('/upload/jsonfile/'.$fileName));

        Customer::truncate();
        $json = File::get("C:\Users\myol\Desktop\data.json");
        $data = json_decode($json);

        foreach ($data as $obj) {
            Customer::create(array(
                'name' => $obj->name,
                'phone_number' => $obj->phone_number,
                'address' => $obj->address
            ));
        }

        //Session::flash(Response::download(public_path($fileName)));
        //redirect_now('/home');
        //$header = header("location: index.php");

        return Response::download(public_path($fileName), header("location: index.php"));

        //return Response::download(public_path($fileName), $fileName, ['location' => 'http://www.google.com']);
        //return Response::download(public_path($fileName), $fileName, ['location' => 'http://localhost/laravel-test/home']);


        //return Redirect::to('home');

        //return Response::download(public_path($fileName));
        //return array(Response::download(public_path($fileName)), redirect('home'));

        //Response::download('file_to_download', 'end_user_filename', ['location' => '/path_to_url']);
    }
}
