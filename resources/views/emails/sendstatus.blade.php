@component('mail::message')

<table id="datatable" class="table table-striped" data-toggle="data-table">
    <thead>
        <tr>
            <th>Tanggal Pengaduan</th>
            <th>Isi Pengaduan</th>
            <th>Isi Tanggapan</th>
            <th>Status Pengaduan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $data['tgl_pengaduan'] }}</td>
            <td>{{ $data['isi_laporan'] }}</td>
            <td>{{ $data['tanggapan'] }}</td>
            <td>{{ $data['status'] }}</td>
        </tr>
    </tbody>
</table>


Thanks,<br>
{{ config('app.name') }}
@endcomponent 

