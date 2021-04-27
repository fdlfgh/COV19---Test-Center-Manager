<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\TestKit;
use App\TestCenter;
use App\Tester;
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
      $testerDataList = User::where('role', 'tester')->select(
<<<<<<< HEAD
        'users.*', 
        'test_centers.name as test_center_name', 
=======
        'users.*',
        'test_centers.name as test_center_name',
>>>>>>> ddbaadf781ec5c3975aed8251ed31d4b16f947af
        'test_centers.id as test_center_id'
      )
      ->join('testers', 'testers.user_id', '=', 'users.id')
      ->join('test_centers', 'test_centers.id', '=', 'testers.test_center_id')
      ->get();
      $testCenterDataList = TestCenter::get();
      $testKitDataList = TestKit::get();
      return view('home', compact("testerDataList", "testCenterDataList", "testKitDataList"));
    }

    public function addTester(Request $request){
      $data = $request->input();
      try{
        $addTester = User::create([
          'name' => $data['testerName'],
          'email' => $data['email'],
          'password' => Hash::make($data['password']),
          'role' => $data['role']
        ]);

        $testerData = Tester::create([
          'user_id' => $addTester->id,
          'test_center_id' => $data['test_center_id']
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

    public function updateTester(Request $request){
      $data = $request->input();
      try{
          $user = User::where('id', $data['user_id'])
          ->update(
              [
                  'name' => $data['name']
              ]
          );

          $patientData = Tester::where('user_id', $data['user_id'])
          ->update(
              [
                  'test_center_id' => $data['test_center_id'],
              ]
          );

          return back()
              ->with('status',"Tester Updated successfully")
              ->with('alert-class',"alert-success");
          }catch(Exception $e){
          return back()
              ->with('status',"Tester Failed to Update")
              ->with('alert-class',"alert-danger");
          }
  }

  public function destroy(Request $request)
    {
        $data = $request->input();
        try{
          Tester::where('user_id', $data['id'])
          ->delete();
<<<<<<< HEAD
          
=======

>>>>>>> ddbaadf781ec5c3975aed8251ed31d4b16f947af
          User::where('id', $data['id'])
          ->delete();

            return back()
            ->with('status',"Tester deleted successfully")
            ->with('alert-class',"alert-success");
        }catch(Exception $e){
            return back()
            ->with('status',"Tester Failed to delete")
            ->with('alert-class',"alert-danger");
        }
    }
}
