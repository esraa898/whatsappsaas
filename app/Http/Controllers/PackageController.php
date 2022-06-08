<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addPackageRequest;
use App\Models\Package;

class PackageController extends Controller
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
    public function store(addPackageRequest $request)
    {
        //
        Package::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'plan_info'=>$request->plan_info
        ]);

        return "stored";
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
        $package = Package::find($id);
        return $package;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(addPackageRequest $request, $id)
    {
        //update package info
        $package = Package::find($id);
        $package->name = $request->name;
        $package->price  =$request->price;
        $package->description = $request->description;
        $package->plan_info = $request->plan_info;
        $package->save();
        return redirect('/dashboard');
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
        Package::destroy($id);
        return redirect('/dashboard');

    }
}
