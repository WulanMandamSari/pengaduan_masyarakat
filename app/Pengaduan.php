<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    public $timestamps = false;
    protected $table = 'tb_pengaduan'; 
    protected $fillable = ['unique_id','tgl_tanggapan','tanggapan','isi_laporan','status','tanggapan']; 

    public function tanggapan()
    {
        return $this->hasMany('App\Tanggapan');
    }

}
