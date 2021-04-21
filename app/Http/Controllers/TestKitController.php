<?php

namespace App\Http\Controllers;

use App\TestKit;
use Illuminate\Http\Request;

class TestKitController extends Controller
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
            TestKit::create([
                'name' => $data['name'],
                'amount' => $data['amount']
            ]);

            return back()
            ->with('status',"Test kit Added successfully")
            ->with('alert-class',"alert-success");
        }catch(Exception $e){
            return back()
            ->with('status',"Test kit Failed to Add")
            ->with('alert-class',"alert-danger");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TestKit  $testKit
     * @return \Illuminate\Http\Response
     */
    public function show(TestKit $testKit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TestKit  $testKit
     * @return \Illuminate\Http\Response
     */
    public function edit(TestKit $testKit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TestKit  $testKit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestKit $testKit)
    {
        $data = $request->input();
        try{
            TestKit::where('id', $data['id'])
            ->update(['name' => $data['name'], 'amount' => $data['amount']]);

            return back()
            ->with('status',"Test kit Updated successfully")
            ->with('alert-class',"alert-success");
        }catch(Exception $e){
            return back()
            ->with('status',"Test kit Failed to Update")
            ->with('alert-class',"alert-danger");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TestKit  $testKit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = $request->input();
        try{
            TestKit::where('id', $data['id'])
            ->delete();

            return back()
            ->with('status',"Test kit deleted successfully")
            ->with('alert-class',"alert-success");
        }catch(Exception $e){
            return back()
            ->with('status',"Test kit Failed to delete")
            ->with('alert-class',"alert-danger");
        }
    }
}
