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
              <h3 class="card-title">Lihat Nilai Siswa</h3>
              <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                  <div class="col-xs-12">
                    <table id="simple-table" class="table  table-bordered table-hover">
                      <thead>
                        <tr>
                          <th align="center">No</th>
                          <th align="center">NIS</th>
                          <th align="center">Nama Siswa</th>
                          <th align="center">Mata Pelajaran</th>
                          <th align="center">Kategori</th>
                          <th align="center">Jenis</th>
                          <th align="center">Nilai</th>
                          <th align="center" colspan="2">Pengaturan</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($nilai as $n) {
                        ?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $n->nis;?></td>
                          <td><?php echo $n->nama;?></td>
                          <td><?php echo $n->nama_mapel;?></td>
                          <td><?php echo $n->nama_kategori;?></td>
                          <td><?php echo $n->nama_jenis;?></td>
                          <td><?php echo $n->nilai;?></td>
                          <td><?php echo anchor('c_guru/form_edit_nilai/'.$n->kode_nilai,'Edit',array('class'=>'btn btn-primary btn-sm'));?></td>
                          <td><?php echo anchor('c_guru/delete_nilai/'.$n->kode_nilai,'Hapus',array('class'=>'btn btn-danger btn-sm'));?></td>
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