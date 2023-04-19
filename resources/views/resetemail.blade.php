<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Lupa Password</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../../forgot/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../forgot/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="../../forgot/assets/css/style.css">
  <link rel="stylesheet" href="../../forgot/assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="../../forgot/assets/img/yy.png" alt="logo" style="height: 60px;
                width: 160px;" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4><center>Lupa Password</center></h4></div>
              <form method="POST" action="{{ route('password.email') }}">
                @csrf
              <div class="card-body">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                  </div>

                  <div class="form-group">
                    <button type="submit" href=""class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Kirim
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Pengaduan Masyarakat &copy; 2023
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="../../forgot/assets/modules/jquery.min.js"></script>
  <script src="../../forgot/assets/modules/popper.js"></script>
  <script src="../../forgot/assets/modules/tooltip.js"></script>
  <script src="../../forgot/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../forgot/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../../forgot/assets/modules/moment.min.js"></script>
  <script src="../../forgot/assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="../../forgot/assets/js/scripts.js"></script>
  <script src="../../forgot/assets/js/custom.js"></script>
</body>
</html>