<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url ('assets/css/main.css'); ?>">
    <title>Aplikasi Akademik</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      
      
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> SMPN 39 Bandung</h1>
            <p>kurikulum</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Dashboard</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <h3 class="card-title">Halaman Input Kelas</h3>
                <form action="<?php echo base_url('c_kurikulum/input_kelas'); ?>" method="post">
                  <div class="form-group">
                    <div class="form-group">
                      <label>Kode Kelas</label>
                      <input class="form-control" type="text"  name="kode_kelas" required>
                    </div>
                    <div class="form-group">
                      <label>Nama Kelas</label>
                      <input class="form-control" type="text"  name="nama_kelas" required>
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button> <br>
                  </div>
                </form>
              <p style="font-size: 16px;">&nbsp;</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>