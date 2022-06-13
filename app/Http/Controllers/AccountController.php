<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return view('admin.ShowAccounts')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.AddAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $acc = new User;
        $acc->name = $request->input('name');
        $acc->email = $request->input('email');
        $acc->password =  Hash::make($request->input('password'));
        $acc->assignRole('Admin');
        $data = $request->all(); // This will get all the request data.
        $userCount = User::where('email', $data['email']);
        if ($userCount->count()) {
            return redirect()->route('DrAcc.index')->with('failed', 'Email already exist. Please enter a valid email address.');  
        } else {
            $acc->save();
            return redirect()->route('DrAcc.index')->with('success', 'Account created successfully.'); 
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $FoundAcc = User::find($id);        
        return view('admin.AdminInformation')->with( 'data', $FoundAcc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $FoundAcc = User::find($id);
        return view('admin.EditAccountInformation')->with('data', $FoundAcc);
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
        $Acc = User::find($id);
        $Acc->name = $request->input('name');
        $Acc->email = $request->input('email');
        $Acc->password =  Hash::make($request->input('password'));
        $Acc->update();
        
        return redirect()->route('DrAcc.index')->with('success', 'Account updated successfully.'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = User::find($id);
        // if delete is not equal to null
        if ($del != null) {
            $del->delete();
            return back()->with('deleted', 'Account deleted successfully.');
        }
        else{
            return back()->with('deleted', 'Account not deleted.');
        }
    }
}