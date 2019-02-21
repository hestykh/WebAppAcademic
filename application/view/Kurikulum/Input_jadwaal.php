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
              <h3 class="card-title">Halaman Input Jadwal Kelas</h3>
              <?php echo form_open('c_kurikulum/input_data_jadwal');?>
              <div class="form-group">
                <label control-label">Kode KBM</label>
                <select class="form-control" name="kbm">
                  <?php foreach ($kbm as $x) { ?>
                    <option value="<?php echo $x->kode_kbm;?>"><?php echo $x->kode_kbm.' -- '.$x->nama.' -- '.$x->nama_kelas.' -- '.$x->nama_mapel;?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label control-label>Hari</label>
                <select class="form-control" id="select" name="hari">
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
                  <?php foreach ($jam as $j) { ?>
                    <option value="<?php echo $j->kode_jam;?>">Jam Ke <?php echo $j->kode_jam.' ('.date('H:i',strtotime($j->jam_mulai)).' - '.date('H:i',strtotime($j->jam_selesai)).')';?></option>
                  <?php } ?>
                </select>
              </div>
              <button class="btn btn-primary" type="submit" name="submit">Submit</button>
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