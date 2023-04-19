
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Pengaduan Masyarakat</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/logoorm.png"/>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
              <img src="../../images/yy.png" style="height: 40px;
                  width: 150px;" alt="logo">
              </div>
              
              <center>
              <h4>Silahkan Lengkapi Terlebih Dahulu</h4>
              <br/>
              </center>
              <form method="POST" action="{{ route('register') }}">
                @csrf 
              <form class="pt-3">
              <div class="form-group">
                  <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="Masukkan NIK" value="{{ old('nik') }}" required autocomplete="nik" autofocus>
                  @error ('nik')
                  <span clas="invalid-feedback" role="alert"> 
                    <strong>{{ $message }}</strong> 
                  @enderror
                </div>
                <div class="form-group">
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama Pengguna" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  @error ('name')
                  <span clas="invalid-feedback" role="alert"> 
                    <strong>{{ $message }}</strong> 
                  @enderror
                </div>

                <div class="form-group">
                  <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  @error ('email')
                  <span clas="invalid-feedback" role="alert"> 
                    <strong>{{ $message }}</strong> 
                  @enderror
                </div>
                
                <div class="form-group">
                <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Kata Sandi" required autocomplete="new-password">
                @error ('password')
                  <span clas="invalid-feedback" role="alert"> 
                    <strong>{{ $message }}</strong> 
                  @enderror
                </div>

                <div class="form-group">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Kata Sandi" required autocomplete="new-password">
                @error ('password_confirmation')
                  <span clas="invalid-feedback" role="alert"> 
                    <strong>{{ $message }}</strong> 
                  @enderror
                </div>

                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" href="{{ route('login') }}">Daftar</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  <h5>Sudah Memiliki Akun?</h5> 
                  <a href="{{ route('login') }}" class="text-primary"><h5>Masuk</h5></a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
