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
            <p> Guru</p>
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
              <h3 class="card-title">Lihat Presensi</h3>
              <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                  <div class="col-xs-12">
                    <table id="simple-table" class="table  table-bordered table-hover">
                      <thead>
                        <tr>
                          <th align="center">Rekap</th>
                          <th align="center">Nis</th>
                          <th align="center">Nama</th>
                          <th align="center">Status</th>
                          <th align="center">Keterangan</th>
                          <th align="center" colspan="2">Pengaturan</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($jadwal as $j) {
                        ?>
                        <tr>
                          <td><?php echo $j->nis?></td>
                          <td><?php echo $j->nama?>
                          <td><?php echo $j->status?></td>
                          <td><?php echo $j->keterangan?></td>
                          <td><?php echo anchor('c_guru/form_edit_presensi/'.$j->kode_presensi,'Edit',array('class'=>'btn btn-primary btn-sm'))?></td>
                          <td><?php echo anchor('c_guru/delete_presensi/'.$j->kode_presensi,'Hapus',array('class'=>'btn btn-danger btn-sm'))?></td>
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