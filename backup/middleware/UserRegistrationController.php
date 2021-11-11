<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class UserRegistrationController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$regUsers = User::whereIn('role', ['app_admin', 'app_user'])->get();
    	return view('registration.index', compact('regUsers'));
    }

    public function create()
    {
    	return view('registration.create');
    }

    public function store(Request $request)
    {
    	$input = Input::all();
	    $rules = [
	    	'username' => 'required|unique:users',
	    	'password' => 'required',
	    	'role' => 'required',
	    	'name' => 'required',
	    	// 'phone_number' => 'required|numeric|digits_between:11,11',
	    	
	    ];
	    $messages = [
            'username.required' => 'The Username field is required.',
            'username.unique' => 'The Useruame already exist.',
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $regUser = new User;
        $regUser->email = $request->username;
        $regUser->password = bcrypt($request->password);
        $regUser->secret = base64_encode($request->password);
        $regUser->role = $request->role;
        $regUser->name = $request->name;
        $regUser->created_by = Auth::id();
        $regUser->save();
        flash()->success($regUser->name.' User information registered successfully');
    	return redirect('user');
    }
}
