<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendTanggapan;
use App\Pengaduan;
use App\Tanggapan;
use App\PengaduanImage;
use Carbon\Carbon;
use App\User;
use App\Mail\SendStatus;


class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = Pengaduan::all();
        $user = User::all();
        return view('pengaduan.index', compact('pengaduan','user')); 
    }

    public function cetakpengaduan()
    {
        $user = User::all();
        $cetakpengaduan =  DB::table('tb_tanggapan as u')->select(
            'u.id_tanggapan',
            'u.id_pengaduan',
            'u.tgl_tanggapan',
            'u.tanggapan',
            'b.*'
        )
        ->join('tb_pengaduan as b', 'b.id_pengaduan', '=', 'u.id_pengaduan')
        ->get();

       
        return view('pengaduan.cetak-pengaduan',compact('cetakpengaduan','user'));
    } 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengaduan = Pengaduan::all(); 
        return view('pengaduan.create', compact('pengaduan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = ([
            'required' => "Data perlu di isi!",
            'numeric' => "Harus berupa angka!",
            'min' => "Minimal 16 Angka!"
        ]);

       $this->validate($request,[
            'tgl_pengaduan' => 'required',
    		// 'nik' => 'required|numeric|min:16',
            'isi_laporan' => 'required',
            'foto.*' => 'image|mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:1024|required'
        ], $message);

        $uniqID = Carbon::now()->timestamp . uniqid();

        // $item = time().rand(100,999).".".$nm->getClientOriginalName();

        $data = new Pengaduan;
        $data->unique_id = $uniqID;
        $data->tgl_pengaduan = $request->tgl_pengaduan;
        $data->nik = Auth::user()->nik;
        $data->isi_laporan = $request->isi_laporan;

        foreach ($request->foto as $key => $image) {
            $pimage = New PengaduanImage();
            $pimage->Pengaduan_unique_id = $uniqID;

            $imageName = Carbon::now()->timestamp . $key . '.' . $request->foto[$key]->extension();
            $request->foto[$key]->move(public_path("images"), $imageName);

            $pimage->image = $imageName;
            $pimage->save();
        }
        $data->save();
        // Pengaduan::create([
        //     // 'id_pengaduan' => $request->id_pengaduan,
        //     'tgl_pengaduan' => $request->tgl_pengaduan, 
        //     'nik' => $request->nik, 
        //     'isi_laporan' => $request->isi_laporan, 
        //     'foto' => $request->file('foto')->store('foto'), 
        //     // 'status' => $request->status,

        // ]);

        // $pengaduan = Pengaduan::create($request->all());
        // if ($request->hasFile('foto')) {
        //     $request->file('foto')->move('images/',$request->file('foto')->getClientOriginalName());
        //     $pengaduan->foto = $request->file('foto')->getClientOriginalName();
        //     $pengaduan->save();
        // }
        return redirect()->route('history')->with('success','Data Berhasil Tersimpan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::where('id_pengaduan',$id)->first(); 
        return view('pengaduan.show',compact('pengaduan')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $pengaduan = Pengaduan::where('id_pengaduan',$id)->first(); 
        return view('pengaduan.edit', compact('pengaduan'));

        
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
        // $message = ([
        //     'required' => "Data Tidak Boleh Kosong!",
        // ]); 

        $this->validate($request,[
            'tanggapan' => 'required', 
            // 'nik' => 'required|numeric', 
            // 'isi_laporan' => 'required', 
            // 'foto' => 'required', 
        ]); 

        // $uniqID = Carbon::now()->timestamp . uniqid();

        // $data = new Pengaduan;
        // $data->unique_id = $uniqID;
        // $data->tgl_pengaduan = $request->tgl_pengaduan;
        // $data->nik = $request->nik;
        // $data->isi_laporan = $request->isi_laporan;

        // foreach ($request->foto as $key => $image) {
        //     $pimage = New PengaduanImage();
        //     $pimage->Pengaduan_unique_id = $uniqID;

        //     $imageName = Carbon::now()->timestamp . $key . '.' . $request->foto[$key]->extension();
        //     $request->foto[$key]->move(public_path("images"), $imageName);

        //     $pimage->image = $imageName;
        //     $pimage->update();
        // }

        // $data->save();
        
       
        $pengaduan = Pengaduan::where('id_pengaduan',$id)->first(); 

        Tanggapan::create([
            'id_pengaduan' => $pengaduan->id_pengaduan,
            'tgl_tanggapan' =>  Carbon::now()->format('Y-m-d'), 
            'tanggapan' => $request->tanggapan,
            'nik' => $pengaduan->nik, 
        ]); 

        Pengaduan::where('id_pengaduan',$id)->update([
            'status' => 'proses'
        ]);

        $send_tanggapan = DB::table('tb_tanggapan as T') // as itu artinya alias
        ->select('T.*', 'P.*', 'U.name', 'U.email') // seluruh data di tb_tanggapan diambil, seluruh data ditb_pengaduan diambil, di tb user yang diambil hanya name dan email //
        ->join('tb_pengaduan as P', 'T.id_pengaduan', '=', 'P.id_pengaduan') 
        ->join('users as U', 'P.nik', '=', 'U.nik')
        ->where('P.id_pengaduan', '=', $id)
        ->first();
        
        $data_tanggapan = [
            'tgl_pengaduan' => $send_tanggapan->tgl_pengaduan,
            'isi_laporan'   => $send_tanggapan->isi_laporan,
            'tanggapan'     => $send_tanggapan->tanggapan,
            'status'        => $send_tanggapan->status
        ];

        Mail::to($send_tanggapan->email)->send(new SendTanggapan($data_tanggapan));
        return redirect()->route('tanggapan')->with('success','Data Berhasil Ditambahkan'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tanggapan::where('id_pengaduan',$id)->delete();
        Pengaduan::where('id_pengaduan',$id)->delete();
        return redirect()->route('pengaduan')->with('success','Data Berhasil Dihapus');
    }

    public function status($id)
    {
        $pengaduan = Pengaduan::where('id_pengaduan',$id)->first();

        $status_sekarang = $pengaduan->status;

        If($status_sekarang == 'proses'){
            Pengaduan::where('id_pengaduan',$id)->update([
                'status'=> 'selesai'
            ]);
        }

        $send_status = DB::table('tb_tanggapan as T') // as itu artinya alias
        ->select('T.*', 'P.*', 'U.name', 'U.email') // seluruh data di tb_tanggapan diambil, seluruh data ditb_pengaduan diambil, di tb user yang diambil hanya name dan email //
        ->join('tb_pengaduan as P', 'T.id_pengaduan', '=', 'P.id_pengaduan') 
        ->join('users as U', 'P.nik', '=', 'U.nik')
        ->where('P.id_pengaduan', '=', $id)
        ->first();
        
        $data_tanggapan = [
            'tgl_pengaduan' => $send_status->tgl_pengaduan,
            'isi_laporan'   => $send_status->isi_laporan,
            'tanggapan'     => $send_status->tanggapan,
            'status'        => $send_status->status
        ];
        Mail::to($send_status->email)->send(new SendStatus($data_tanggapan));
         return redirect()->route('pengaduan');
        }
}
