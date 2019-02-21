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
            <h3 class="card-title"> Form Upload Materi</h3>
            <div class="form-group">
              <?php echo form_open_multipart ('c_guru/form_upload_materi/');?>
              <input type="hidden" name="kode_kbm" value="<?php echo $this->session->userdata('kode_kbm');?>">
              <label class="col-lg-2 control-label">Materi per Pertemuan</label>
              <div class="col-lg-10">
             <select class="form-control" id="select" name="kode_mg">
                      <?php foreach($pertemuan as $row){ ?>
                      <option value="<?php echo $row->kode_mg;?>"><?php echo $row->nama_pertemuan;?></option> 
                      <?php } ?>
                    </select>
              </div>
              <label class="col-lg-2 control-label">Judul Materi</label>
              <div class="col-lg-10">
                <input class = "form-control" type="text" name="nama_materi"  placeholder = "Judul Materi"/> <br>
              </div>
               <br>
              <label class="col-lg-2 control-label">Upload Materi</label>
              <div class="col-lg-10">
               <input type="file" name="userfile"><br>
              </div>
               <br>
              </div>
              <label class="col-lg-2 control-label"></label>
              <button class="btn btn-primary" type="submit" name="submit">Submit</button> <br>
              <?php echo form_close();?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>