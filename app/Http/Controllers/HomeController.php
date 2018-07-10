<?php

namespace App\Http\Controllers;

use App\Admin\User_Model;
use Illuminate\Http\Request;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User_Model::paginate(10);
        return view('Admin_VW.admin',compact('users'));
    }
}
