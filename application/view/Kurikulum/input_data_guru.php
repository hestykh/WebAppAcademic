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
              <h3 class="card-title">Halaman Input Data Guru </h3>
                <?php echo form_open_multipart ('c_kurikulum/input_data_guru');?>
                    <div class="form-group">
                      <label>Nama</label>
                      <input class="form-control" type="text" placeholder="Nama" name="nama" required>
                    </div>
                    <div class="form-group">
                      <label>NIP</label>
                      <input class="form-control" type="text" placeholder="NIP" name="nip" required>
                    </div>
                    <div class="form-group">
                      <label>Kode Guru</label>
                      <input class="form-control" type="text" placeholder="Kode Guru" name="kode_guru" required><small>3 Huruf Kapital Uniq. Contoh: XYZ, FGH, dan lainnya..</small>
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
                      <label control-label>Bagian</label>
                      <select class="form-control" id="select" name="bagian" required>
                        <option value="1">Guru / Pengajar</option>
                        <option value="2">Staff / Tata Usaha</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>No. Telepon</label>
                      <input class="form-control" type="number" placeholder="No. Telepon" name="telepon" required>
                    </div>
                    <div class="form-group">
                      <label>Agama</label>
                      <select class="form-control" id="select" name="agama" required>
                        <option value="1">Islam</option>
                        <option value="2">Kristen</option>
                        <option value="2">Katolik</option>
                        <option value="2">Hindu</option>
                        <option value="2">Budha</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input class="form-control" type="text" pattern="[A-Z a-z]{2,}" placeholder="Tempat Lahir" name="tempat" required>
                      <small>Kota Kelahiran</small>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input class="form-control" type="date" placeholder="Tanggal Lahir" name="tanggal" required>
                    </div>
                    <div class="form-group">
                      <label>Pendidikan Asal</label>
                      <input class="form-control" type="text" placeholder="Pendidikan Asal" name="pendidikan" required>
                      <small>Nama Universitas Asal. Contoh: Universitas Pendidikan Indonesia, Universitas Padjajaran, dan lainnya..</small>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" rows="3" placeholder="Nomor rumah, nama jalan, dsb." name="alamat" required></textarea>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Email</label>
                      <input class="form-control" type="email" placeholder="Email Aktif" name="email" required>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Foto Profil</label>
                      <input class="form-control" type="file" name="userfoto" required>
                      <small>Pas Photo, Size Max 100KB</small>
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button> <br>
                  </div>
                <?php echo form_close();?>
              <p style="font-size: 16px;">&nbsp;</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>