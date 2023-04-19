<html>
    <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
<body>
<form action="{{ route('user_profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
         @csrf 
         <input type="hidden" name="_method" value="PUT">
    <div class="form-group col-md-6">
    <label class="form-label" for="province_id">Provinsi:</label>
    <select name="province_id" id="province_id" class="selectpicker form-control" data-style="py-0">
        <option value="">Pilih Provinsi...</option>
        @foreach ( $provinces as $provinsi)
            <option value="{{ $provinsi->id}}">{{ $provinsi->name}}</option>
        @endforeach
    </select>
    </div>
    <div class="form-group col-md-6">
    <label class="form-label" for="regency_id">Kota:</label>
    <select name="regency_id" id="regency_id" class="selectpicker form-control" data-style="py-0">

    </select>
    </div>
    <div class="form-group col-md-6">
    <label class="form-label" for="village_id">Kecamatan:</label>
    <select name="village_id" id="village_id" class="selectpicker form-control" data-style="py-0">

    </select>
    </div>
    <div class="form-group col-md-6">
    <label class="form-label" for="district_id">Kelurahan:</label>
    <select name="district_id" id="district_id" class="selectpicker form-control" data-style="py-0">

    </select>
    </div>
    <button type="submit" class="btn btn-primary">Ubah data</button>
</form>
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script>
   $(function () {
      $('#province_id').on('change', function(){
         let province_id = $('#province_id').val();
         
         if (province_id) {
            $.ajax({
               url: "{{ route('getKota')}}",
               type: "POST",
               data : { province_id:province_id },
               cache: false,
               success:function($msg){
                  $('#regency_id').html($msg);
                  $('#village_id').html('');
                  $('#district_id').html('');
                },
               error: function (data) {
                  console.log('error:', data);
               }
            })
         }
      })
      $('#regency_id').on('change', function(){
         let regency_id = $('#regency_id').val();
         if (regency_id) {
            $.ajax({
               url: "{{ route('getKecamatan')}}",
               type: "POST",
               data : { regency_id:regency_id },
               cache: false,
               success:function($msg){
                  $('#village_id').html($msg);
                  $('#district_id').html('');
               },
               error: function (data) {
                  console.log('error:', data);
               }
            })
         }
      })
      $('#village_id').on('change', function(){
         let village_id = $('#village_id').val();
         if (village_id) {
            $.ajax({
               url: "{{ route('getKelurahan')}}",
               type: "POST",
               data : { village_id:village_id },
               cache: false,
               success:function($msg){
                  $('#district_id').html($msg);
               },
               error: function (data) {
                  console.log('error:', data);
               }
            })
         }
      })
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });
   });
</script>
</body>
</html>