<!-- <!DOCTYPE html>
<html lang="en"> -->
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Profile</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/logoorm.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="../../images/yy.png" style="height: 60px;
         width: 160px;" alt="logo"></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
              </div>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <!-- <i class="icon-bell mx-0"></i> -->
              <!-- <span class="count"></span> -->
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <img src="../../images/faces/orangg.png" alt="profile" h6 class="font-weight-bold">&nbsp;&nbsp;<b><font color="white">{{ Auth::user()->name }}</font></b></h6>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            @if (auth()->user()->role =="masyarakat")
            <a class="dropdown-item" href="/history">
                <i class="icon-bar-graph menu-icon" text-primary></i>
                 Riwayat Pengaduan
              </a>
            @endif
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="ti-power-off"></i>
                Logout
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <!-- <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a> -->
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <!-- <div id="settings-trigger"><i class="ti-settings"></i></div> -->
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <!-- <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/beranda">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Data Master</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/pengaduan">Pengaduan</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Data Transaksi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="/tanggapan">Tanggapan</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav> -->
        <!-- partial -->
      <!-- <div class="main-panel"> -->
      <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                </div>
                <!-- <div class="main-panel"> -->
        <div class="content-wrapper">
          <!-- <div class="row"> -->
          <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                </div>
                <!-- <div class="main-panel">         -->
                    <div class="content-wrapper">
                <!-- <div class="row"> -->
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                    <label class="col-sm-2 col-form-label">NIK</label> : {{ $user->nik }}
                    <div class="col-sm-10">
                    </div>
                  </div>
                  <!-- <div class="card">
                    <div class="card-body">
                    <label class="col-sm-2 col-form-label">Nama Depan</label> : {{ $user->first_name }}
                    <div class="col-sm-10">
                    </div>
                  </div> -->
                  <!-- <div class="card">
                    <div class="card-body">
                    <label class="col-sm-2 col-form-label">Nama Belakang</label> : {{ $user->last_name }}
                    <div class="col-sm-10">
                    </div>
                  </div> -->
                   <div class="card">
                    <div class="card-body">
                    <label class="col-sm-2 col-form-label">Nama Lengkap</label> : {{ $user->name }}
                    <div class="col-sm-10">
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                    <label class="col-sm-2 col-form-label">No Handphone</label> : {{ $user->no_handphone }}
                    <div class="col-sm-10">
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                    <label class="col-sm-2 col-form-label">Email</label> : {{ $user->email }}
                    <div class="col-sm-10">
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label> : {{ $user->jenkel }}
                    <div class="col-sm-10">
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                    <label class="col-sm-2 col-form-label">Alamat</label> : {{ $user->alamat }}
                    <div class="col-sm-10">
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                    <label class="col-sm-2 col-form-label">RT</label> : {{ $user->rt }}
                    <div class="col-sm-10">
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                    <label class="col-sm-2 col-form-label">RW</label> : {{ $user->rw }}
                    <div class="col-sm-10">
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                    @foreach ($user_profile as $v)
                    <label class="col-sm-2 col-form-label">Provinsi</label> :@if ($user->province_id) {{$v->province->name}} 
                    @else Silahkan Perbaharui @endif
                  @endforeach
                    <div class="col-sm-10">
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                    @foreach ($user_profile as $v) 
                    <label class="col-sm-2 col-form-label">Kota</label> : @if ($user->regency_id) {{ $v->regencies->name}} @else Silahkan Perbaharui @endif
                 @endforeach
                    <div class="col-sm-10">
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                    @foreach ( $user_profile as $v )
                    <label class="col-sm-2 col-form-label">Kecamatan</label>: @if ($user->village_id) {{ $v->village->name}} @else Silahkan Perbaharui @endif
                  @endforeach
                    <div class="col-sm-10">
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                    @foreach ( $user_profile as $v )
                    <label class="col-sm-2 col-form-label">Kelurahan</label>: @if ($user->district_id) {{ $v->district->name}} @else Silahkan Perbaharui @endif
                  @endforeach
                    <div class="col-sm-10">
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                    <label class="col-sm-2 col-form-label">Kode Pos</label> : {{ $user->kode_pos }}
                    <div class="col-sm-10">
                    </div>
                  </div>

                  <hr color="#0000FF">
                                  <div class="col-12 grid-margin stretch-card">
                                    <div class="card-body">
                                      <p class="card-description">
                                        <center>Lengkapi Datamu Dibawah Ini!</center>
                                      </p>
                                      
                                    <form method="POST" action="user_profile/{{ $user->id}}" enctype="multipart/form-data">
                                        @csrf 
                                        <input type="hidden" name="_method" value="PUT">
                                        <div class="row">     
                                        <div class="form-group col-md-12">
                                              <label>NIK</label>
                                              <input type="text" value="{{ $user->nik }}" class="form-control" name="nik">
                                        @if($errors->has('nik'))
                                            <div class="text-danger">
                                              {{ $errors->first('nik')}}
                                            </div>
                                        @endif 
                                          </div>
                                          <!-- <div class="form-group col-md-12">
                                              <label>Nama Depan</label>
                                              <input type="text" value="{{ $user->first_name }}" class="form-control" name="first_name">
                                        @if($errors->has('first_name'))
                                            <div class="text-danger">
                                              {{ $errors->first('first_name')}}
                                            </div>
                                        @endif 
                                          </div> -->
                                          <!-- <div class="form-group col-md-12">
                                              <label>Nama Belakang</label>
                                              <input type="text" value="{{ $user->last_name }}" class="form-control" name="last_name">
                                        @if($errors->has('last_name'))
                                            <div class="text-danger">
                                              {{ $errors->first('last_name')}}
                                            </div>
                                        @endif 
                                          </div> -->
                                          <div class="form-group col-md-12">
                                              <label>Nama Lengkap</label>
                                              <input type="text" value="{{ $user->name }}" class="form-control" name="name">
                                        @if($errors->has('name'))
                                            <div class="text-danger">
                                              {{ $errors->first('name')}}
                                            </div>
                                        @endif 
                                          </div>
                                          <div class="form-group col-md-12">
                                              <label>No Handphone</label>
                                              <input type="text" value="{{ $user->no_handphone }}" class="form-control" name="no_handphone">
                                        @if($errors->has('no_handphone'))
                                            <div class="text-danger">
                                              {{ $errors->first('no_handphone')}}
                                            </div>
                                        @endif 
                                          </div>
                                          <div class="form-group col-md-12">
                                              <label>Email</label>
                                              <input type="text" value="{{ $user->email }}" class="form-control" name="email">
                                        @if($errors->has('email'))
                                            <div class="text-danger">
                                              {{ $errors->first('email')}}
                                            </div>
                                        @endif 
                                          </div>
                                          <div class="form-group col-md-12">
                                              <label class="form-label" for="email">Jenis Kelamin :</label>
                                              <p><input type="radio" value="laki-laki" name="jenkel">&nbsp; Laki-laki</input> &nbsp; &nbsp;
                                              <input type="radio" value="Perempuan" name="jenkel">&nbsp; Perempuan</p> 
                                        @if($errors->has('jenkel'))
                                            <div class="text-danger">
                                              {{ $errors->first('jenkel')}}
                                            </div>
                                        @endif 
                                          </div>
                                          <div class="form-group col-md-12">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" name="alamat" rows="4"></textarea>
                                            @if($errors->has('alamat'))
                                                <div class="text-danger">
                                                  {{ $errors->first('alamat')}}
                                                </div>
                                            @endif
                                          </div>
                                          <div class="form-group col-md-12">
                                              <label>RT</label>
                                              <input type="text" value="{{ $user->rt }}" class="form-control" name="rt">
                                        @if($errors->has('rt'))
                                            <div class="text-danger">
                                              {{ $errors->first('rt')}}
                                            </div>
                                        @endif 
                                          </div>
                                          <div class="form-group col-md-12">
                                              <label>RW</label>
                                              <input type="text" value="{{ $user->rw }}" class="form-control" name="rw">
                                        @if($errors->has('rw'))
                                            <div class="text-danger">
                                              {{ $errors->first('rw')}}
                                            </div>
                                        @endif 
                                          </div>
                                              <div class="form-group col-md-12">
                                                <label class="form-label" for="province_id">Provinsi:</label>
                                                <select name="province_id" id="province_id" class="selectpicker form-control" data-style="py-0">
                                                      <option value="">Pilih Provinsi...</option>
                                                      @foreach ( $provinces as $provinsi)
                                                          <option value="{{ $provinsi->id}}">{{ $provinsi->name}}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                              <div class="form-group col-md-12">
                                                  <label class="form-label" for="regency_id">Kota:</label>
                                                  <select name="regency_id" id="regency_id" class="selectpicker form-control" data-style="py-0"></select>
                                              </div>
                                              <div class="form-group col-md-12">
                                                  <label class="form-label" for="village_id">Kecamatan:</label>
                                                  <select name="village_id" id="village_id" class="selectpicker form-control" data-style="py-0"></select>
                                              </div>
                                              <div class="form-group col-md-12">
                                                  <label class="form-label" for="district_id">Kelurahan:</label>
                                                  <select name="district_id" id="district_id" class="selectpicker form-control" data-style="py-0"></select>
                                              </div>
                                              <div class="form-group col-md-12">
                                              <label>Kode Pos</label>
                                              <input type="text" value="{{ $user->kode_pos }}" class="form-control" name="kode_pos">
                                             @if($errors->has('kode_pos'))
                                            <div class="text-danger">
                                              {{ $errors->first('kode_pos')}}
                                            </div>
                                            @endif 
                                          </div>
                                              &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary">Edit Profile</button>
                                              @if(auth()->user())
                                              @if (auth()->user()->role =="admin" || auth()->user()->role == "petugas")
                                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/beranda" class="btn btn-danger">Kembali</a>
                                              @endif 
                                              @endif 

                                              @if(auth()->user())
                                              @if (auth()->user()->role =="masyarakat")
                                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/pengaduan/create" class="btn btn-danger">Kembali</a>
                                              @endif
                                              @endif 
                                          </div>
                                      </form>
                                    </div>
                                    </div>
                                    </div>
                  <!-- <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/beranda" class="btn btn-primary">Kembali</a>
                      &nbsp;&nbsp;&nbsp;<a href="/user_profile/edit/{{ $user->id }}" class="btn btn-danger">Edit Profile</a>
                    </div>
                  </div> -->
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023. Pengaduan Masyarakat by wulanmandam</span>
            <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span> -->
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <!-- <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">by wulanmandam</span>  -->
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/chart.js/Chart.min.js"></script>
  <script src="../../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../../js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/dashboard.js"></script>
  <script src="../../js/Chart.roundedBarCharts.js"></script>
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });
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
        });
    </script>
  <!-- End custom js for this page-->
  @include('sweetalert::alert')
</body>

</html>