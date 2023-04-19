<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tanggapan;
use App\Pengaduan;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = \App\Pengaduan::all();
        $tanggapan = Tanggapan::all();
        return view('tanggapan.index', compact('tanggapan','pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tanggapan = \App\Tanggapan::all();
        $pengaduan = Pengaduan::all();
        return view('tanggapan.create', compact('tanggapan','pengaduan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $message = ([
        //     'required' => "Data Tidak Boleh Kosong!"
        // ]);

        $this->validate($request,[
            'id_pengaduan' => 'required', 
            'tanggapan' => 'required', 
            // 'id_tanggapan' => 'required', 
            // 'tgl_tanggapan' => 'required', 
            // 'nik' => 'required', 
        ]);

        Tanggapan::create([
             'id_pengaduan' => $request->id_pengaduan, 
             'tanggapan' => $request->tanggapan, 
            // 'id_tanggapan' => $request->id_tanggapan, 
            // 'tgl_tanggapan' => $request->tgl_tanggapan, 
            // 'nik' => $request->nik,
        ]);
        
        return redirect()->route('tanggapan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tanggapan = Tanggapan::where('id_tanggapan',$id)->first(); 
        return view('tanggapan.show',compact('tanggapan')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tanggapan = Tanggapan::where('id_tanggapan',$id)->first(); 
        return view('tanggapan.edit', compact('tanggapan'));
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
        $this->validate($request,[
            'tanggapan' => 'required', 
            // 'tgl_tanggapan' => 'required', 
            // 'id_pengaduan' => 'required', 
            // 'tgl_tanggapan' => 'required', 
            // 'nik' => 'required',
        ]);

        Tanggapan::where('id_tanggapan', $id)->update([
            'tanggapan' => $request->tanggapan, 
            // 'tgl_tanggapan' => $request->tanggapan,
            // 'id_tanggapan' => $request->id_tanggapan, 
            // 'id_pengaduan' => $request->id_pengaduan, 
            // 'tgl_tanggapan' => $request->tgl_tanggapan, 
            // 'nik' => $request->nik,
        ]); 
        
        return redirect()->route('tanggapan')->with('success','Data Berhasil Diedit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tanggapan::where('id_tanggapan',$id)->delete(); 
        return redirect()->route('tanggapan')->with('success','Data Berhasil Dihapus');
    }
}
