<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all(); 
        return view('admin.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
           'nik' => 'required',
           'name' => 'required', 
           'email' => 'required',
           'password' => 'required', 
           'role' => 'required'
       ]); 

       User::create([
           'nik' => $request->nik, 
           'name' => $request->name,
           'email' => $request->email, 
           'password' => Hash::make($request['password']),
           'role' => $request->role,
       ]);

       return redirect()->route('userEdit')->with('success','Data Berhasil Tersimpan');
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
        $user = User::where('id', $id)->first();
        return view('admin.edit', compact('user'));
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
        // dd($request);
        $this->validate($request,[
            // 'nik' => 'required', 
            // 'name' => 'required', 
            // 'email' => 'required', 
            'role' => 'required'
        ]);

        User::where('id', $id)->update([
            // 'nik' => $request->nik, 
            // 'name' => $request->name, 
            // 'email' => $request->email, 
            'role' => $request->role,
        ]); 
        
        return redirect()->route('userEdit')->with('success','Data Berhasil Diedit');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete(); 
        return redirect()->route('userEdit')->with('success','Data Berhasil Dihapus');
    }
}
