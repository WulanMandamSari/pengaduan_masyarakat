<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="{{ csrf_token() }}"> 
    <style> 
        table.static {
            position: relative;
            /* left: 3%; */ 
            border: 1px solid #543535; 
        }
    </style> 
    <title>CETAK DATA KERUSAKAN</title> 
</head>
<body> 
    <!-- <center>
    <img src="../images/yy.png" width="500px">
    </center> -->
    <center>
        <br>
        <p>
            <font size="4"><b>&nbsp;&nbsp;&nbsp;&nbsp;Laporan Data Pengaduan Masyarakat</b></font>
        </p> 
    </center>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%"> 
        <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Tanggal Pengaduan</th> 
                <th>Isi Laporan</th>
                <th>Bukti</th>
                <th>Status</th> 
                <th>Tanggal Ditanggapi</th>
                <th>Tanggapan</th> 
            </tr>
            @foreach ($cetakpengaduan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <center/>
                    {{ $item->nik }}
                </td>
                <td>
                    <center/>
                    {{ date('d F Y', strtotime($item->tgl_pengaduan)) }}
                </td>
                <td>{{ $item->isi_laporan }}</td>
               
                <td>
                    <center>
                    @php 
                    $foto = App\PengaduanImage::where('pengaduan_unique_id' , $item->unique_id)->get();
                    @endphp

                    @foreach($foto as $i)
                    <a href="{{ asset('images/'. $i->foto) }}/{{$i->image}}" target="_blank" rel="noopener noreferrer"> 
                    <img src="{{ asset('images/'. $i->foto) }}/{{$i->image}}" height="50px" width="50px">
                    </a> 
                    @endforeach 
                    </center>
                </td>
                <td>
                    <center>
                      @if ($item->status == '0')
                      <label class="btn btn-sm btn-primary">Terkirim</label>
                      @elseif ($item->status == 'proses')
                      <label class="btn btn-sm btn-warning">Proses</label>
                      @else
                      <label class="btn btn-sm btn-success">Selesai</label>
                      @endif
                </td>
                <td>
                    <center>
                    {{ Carbon\Carbon::parse($item->tgl_tanggapan)->format('d F Y') }}
                    </center>
                </td>
                <td>{{$item->tanggapan}}</td> 
            </tr>
            @endforeach 
        </table> 
    </div> 

    <script type="text/javascript"> 
       window.print();

    </script>
</body> 
</html> 