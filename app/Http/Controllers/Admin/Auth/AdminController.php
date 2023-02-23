<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{


    //Admin Login 

    public function loginView()
    {
        return view('Admin.Auth.Login');
    }

    public function adminLogin(LoginRequest $request)
    {
        $email    = $request->email;
        $password = $request->password;

        $data = User::where('email', $email)->first();

        if (!empty($data)) {
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('admin.login.view')->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ])->onlyInput('email');
            }
        } else {
            return redirect()->route('admin.login.view')->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }


    public function dashboard()
    {
        $admin    = User::where('type','=','admin')->get()->count();
        $subadmin = User::where('type','=','subadmin')->get()->count();
        return view('Admin.Home.Dashboard')->with('admin', $admin)->with('subadmin' , $subadmin);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('admin.login.view');
    }

    public function profile()
     {
       $userId = Auth::user()->id;
       $admin    = User::where('type','=','admin')->get()->count();
       $subadmin = User::where('type','=','subadmin')->get()->count();
       return view('Admin.Home.Dashboard')->with('admin', $admin)->with('subadmin' , $subadmin);
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
