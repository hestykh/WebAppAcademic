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
              <h3 class="card-title">Halaman Input Data Siswa </h3>
                <form action="<?php echo base_url('c_kurikulum/input_data_siswa'); ?>" method="post">
                  <div class="form-group">
                    <label>NIS</label>
                    <input class="form-control" type="number" placeholder="NIS" name="nis" required>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input class = "form-control" type="text" placeholder="Nama" name="nama" required="required"/>
                  </div>
                  <div class="form-group">
                    <label>Agama</label>
                    <input class = "form-control" type="text" placeholder="Agama" name="agama" required="required"/>
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="animated-radio-button">
                      <label>
                        <input type="radio" name="kelamin" value="Pria" checked="required"><span class="label-text">Pria</span>
                      </label>
                    </div>
                    <div class="animated-radio-button">
                      <label>
                        <input type="radio" name="kelamin" value="Wanita"><span class="label-text">Wanita</span>
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Tahun Masuk</label>
                    <input class="form-control" type="number" min="2015" placeholder="<?php echo date('Y');?>" name="tahun_masuk" required>
                  </div>
                    <div class="form-group">
                      <label>Status</label>
                      <div class="animated-radio-button">
                        <label>
                          <input type="radio" name="status" value="6" checked="required"><span class="label-text">Aktif</span>
                        </label>
                      </div>
                      <div class="animated-radio-button">
                        <label>
                          <input type="radio" name="status" value="7"><span class="label-text">Nonaktif</span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" rows="3" placeholder="Nomor rumah, nama jalan, dsb." name="alamat" required></textarea>
                    </div>
                    <div class="form-group">
                      <label>No. Telepon</label>
                      <input class="form-control" type="number" placeholder="No. Telepon" name="telepon" required>
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