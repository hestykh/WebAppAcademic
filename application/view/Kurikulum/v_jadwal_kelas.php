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
            <h1><i class="fa fa-dashboard"></i>SMPN 39 Bandung</h1>
            <p> kurikulum</p>
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
              <h3 class="card-title">Jadwal Kelas</h3>
              <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                  <div class="col-xs-12">
                    <h3>Senin</h3>
                    <table id="simple-table" class="table  table-bordered table-striped">
                      <thead>
                        <tr>
                          <th align="center">Jam Ke</th>
                          <th align="center">Waktu</th>
                          <th align="center">Mata Pelajaran</th>
                          <th align="center">Nama Guru</th>
                          <th align="center" colspan="2">Pengaturan</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($jadwalSenin as $j) {
                        ?>
                        <tr>
                          <td><?php echo $j->kode_jam?></td>
                          <td><?php echo date('H:i',strtotime($j->jam_mulai)).' - '.date('H:i',strtotime($j->jam_selesai))?></td>
                          <td><?php echo $j->nama_mapel?></td>
                          <td><?php echo $j->nama?></td>
                          <td><?php echo anchor('c_kurikulum/form_edit_jadwal/'.$j->kode_jadwal,'Edit',array('class'=>'btn btn-primary btn-sm')).' | '.anchor('c_kurikulum/delete_jadwal/'.$j->kode_jadwal,'Hapus',array('class'=>'btn btn-danger btn-sm'))?></td>
                      </tr>
                      <?php
                          $no++;
                      }
                      ?>
                      </tbody>
                    </table>

                    <h3>Selasa</h3>
                    <table id="simple-table" class="table  table-bordered table-striped">
                      <thead>
                        <tr>
                          <th align="center">Jam Ke</th>
                          <th align="center">Waktu</th>
                          <th align="center">Mata Pelajaran</th>
                          <th align="center">Nama Guru</th>
                          <th align="center" colspan="2">Pengaturan</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($jadwalSelasa as $j) {
                        ?>
                        <tr>
                          <td><?php echo $j->kode_jam?></td>
                          <td><?php echo date('H:i',strtotime($j->jam_mulai)).' - '.date('H:i',strtotime($j->jam_selesai))?></td>
                          <td><?php echo $j->nama_mapel?></td>
                          <td><?php echo $j->nama?></td>
                          <td><?php echo anchor('c_kurikulum/form_edit_jadwal/'.$j->kode_jadwal,'Edit',array('class'=>'btn btn-primary btn-sm')).' | '.anchor('c_kurikulum/delete_jadwal/'.$j->kode_jadwal,'Hapus',array('class'=>'btn btn-danger btn-sm'))?></td>
                      </tr>
                      <?php
                          $no++;
                      }
                      ?>
                      </tbody>
                    </table>
                  </div><!-- /.span -->
                </div><!-- /.row -->
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
              
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </body>
</html>