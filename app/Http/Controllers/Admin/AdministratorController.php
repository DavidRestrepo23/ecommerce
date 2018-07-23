<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdministratorController extends Controller
{
    use AuthenticatesUsers;

    public function __construct(){
        $this->middleware('admin');
    }

    protected $redirectTo = '/admin/dashboard';
    
    protected function guard()
    {
        return Auth::guard('admins');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

  

}
