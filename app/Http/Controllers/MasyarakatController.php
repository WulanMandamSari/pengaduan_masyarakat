<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB;
use App\Tanggapan;
use App\Pengaduan;
use App\User;
use Carbon\Carbon;


class MasyarakatController extends Controller
{
    public function historyPengaduan()
    {
        $nik = Auth::user()->nik;

        $pengaduan = Pengaduan::where('nik', $nik)->get();

        return view('masyarakat.history', compact('pengaduan'));
    }

    public function detailHistory($id)
    {
        $user = User::all();

        $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();

        $tanggapan = Tanggapan::where('id_tanggapan', $id)->first(); 

        $tanggapans = DB::table('tb_tanggapan as T')
        ->select('T.*', 'P.*', 'U.name', 'U.email')
        ->join('tb_pengaduan as P', 'T.id_pengaduan', '=', 'P.id_pengaduan')
        ->join('users as U', 'P.nik', '=', 'U.nik')
        ->where('P.id_pengaduan', '=', $id)
        ->first();

        return view('masyarakat.detail-history', compact('pengaduan','tanggapan','user','tanggapans'));
    }
}
