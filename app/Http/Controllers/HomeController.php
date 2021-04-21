<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\TestKit;
use App\TestCenter;
use Illuminate\Support\Facades\Hash;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
      $testerDataList = User::where('role', 'tester')->get();
      $testCenterDataList = TestCenter::get();
      $testKitDataList = TestKit::get();
      return view('home', compact("testerDataList", "testCenterDataList", "testKitDataList"));
    }

    public function addTester(Request $request){
      $data = $request->input();
      try{
        User::create([
          'name' => $data['testerName'],
          'email' => $data['email'],
          'password' => Hash::make($data['password']),
          'role' => $data['role']
        ]);

        return back()
          ->with('status',"Tester Added successfully")
          ->with('alert-class',"alert-success");
      }catch(Exception $e){
        return back()
          ->with('status',"Tester Failed to Add")
          ->with('alert-class',"alert-danger");
      }
    }
}
