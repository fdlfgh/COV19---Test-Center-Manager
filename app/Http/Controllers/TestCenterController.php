<?php

namespace App\Http\Controllers;

use App\TestCenter;
use Illuminate\Http\Request;

class TestCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = $request->input();
        try{
            TestCenter::create([
              'name' => $data['testCenterName']
            ]);

            return back()
              ->with('status',"Test Center Added successfully")
              ->with('alert-class',"alert-success");
          }catch(Exception $e){
            return back()
              ->with('status',"Test Center Failed to Add")
              ->with('alert-class',"alert-danger");
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TestCenter  $testCenter
     * @return \Illuminate\Http\Response
     */
    public function show(TestCenter $testCenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TestCenter  $testCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(TestCenter $testCenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TestCenter  $testCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestCenter $testCenter)
    {
        $data = $request->input();
        try{
            TestCenter::where('id', $data['id'])
            ->update(['name' => $data['name']]);

            return back()
            ->with('status',"Test Center Updated successfully")
            ->with('alert-class',"alert-success");
        }catch(Exception $e){
            return back()
            ->with('status',"Test Center Failed to Update")
            ->with('alert-class',"alert-danger");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TestCenter  $testCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = $request->input();
        try{
            TestCenter::where('id', $data['id'])
            ->delete();

            return back()
            ->with('status',"Test Center deleted successfully")
            ->with('alert-class',"alert-success");
        }catch(Exception $e){
            return back()
            ->with('status',"Test Center Failed to delete")
            ->with('alert-class',"alert-danger");
        }
    }
}
