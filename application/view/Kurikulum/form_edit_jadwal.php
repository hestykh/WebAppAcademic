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
            <h3 class="card-title"> Form Edit Jadwal </h3>
            <!-- <p><?php echo $this->session->userdata('semester');?></p> -->
            <div class="form-group">
              <?php echo form_open_multipart ('c_kurikulum/update_jadwal');?>
              <?php foreach ($hasiljadwal as $key) {?>
              <input type="hidden" name="kode_jadwal" value="<?php echo $key->kode_jadwal;?>">
              <div class="form-group">
                <label control-label">Kode KBM</label>
                <select class="form-control" name="kbm">
                  <option value="<?php echo $key->kode_kbm;?>"><?php echo $key->kode_kbm.' -- '.$key->nama.' -- '.$key->nama_kelas.' -- '.$key->nama_mapel;?></option>
                  <?php foreach ($kbm as $x) { ?>
                    <option value="<?php echo $x->kode_kbm;?>"><?php echo $x->kode_kbm.' -- '.$x->nama.' -- '.$x->nama_kelas.' -- '.$x->nama_mapel;?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label control-label>Hari</label>
                <select class="form-control" id="select" name="hari">
                  <option value="<?php echo $key->hari;?>"><?php echo $key->hari;?></option>
                  <option>Senin</option>
                  <option>Selasa</option>
                  <option>Rabu</option>
                  <option>Kamis</option>
                  <option>Jumat</option>
                </select>
              </div>
              <div class="form-group">
                <label control-label>Jam Mulai</label>
                <select class="form-control" id="select" name="jam">
                  <option value="<?php echo $key->kode_jam;?>">Jam Ke <?php echo $key->kode_jam.' ('.date('H:i',strtotime($key->jam_mulai)).' - '.date('H:i',strtotime($key->jam_selesai)).')';?></option>
                  <?php foreach ($jam as $j) { ?>
                    <option value="<?php echo $j->kode_jam;?>">Jam Ke <?php echo $j->kode_jam.' ('.date('H:i',strtotime($j->jam_mulai)).' - '.date('H:i',strtotime($j->jam_selesai)).')';?></option>
                  <?php } ?>
                </select>
              </div>
              <button class="btn btn-primary" type="submit" name="submit">Submit</button> <br>
              <?php }?>
              <?php echo form_close();?>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>