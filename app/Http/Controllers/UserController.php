<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addCompanyRequest;
use App\Models\User;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{

    public function assignPackageToCompany(Request $request,$id){


        $packageID = $request->package_id;

        $company = User::find($id);

        if($company->package_id == null){
            $company->package_id = $packageID;
            $company->subscribeTime = date("Y-m-d",time());
            $company->save();
        }

        // $data = Package::where('id',$packageID)->first();

        // return view("home",compact('data'));

        return 'assigned';

    }
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
    public function store(addCompanyRequest $request)
    {
        //
        $status="out of service";
        $packageID = $request->package_id;

        User::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'balance'=>$request->balance,
            'status'=>$status,
            'package_id'=>$packageID,
            'api_key' => '',
            'chunk_blast' => 0
        ]);

        return "success";
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
        $company = User::find($id);
        return $company;
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
        $status="out of service";
        $packageID = $request->package_id;

        $user = User::find($id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->balance = $request->balance;
        $user->status = $status;
        $user->package_id = $packageID;
        $user->save();
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
        //delete company by id
        User::destroy($id);
        return redirect('/dashboard');
    }
}
