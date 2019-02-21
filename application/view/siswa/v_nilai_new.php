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
                <input type="hidden" name="kode_ta" value="<?php echo $nilai_kd1['kode_ta'];?>">
                <input type="hidden" name="kode_semester" value="<?php echo $nilai_kd1['kode_semester'];?>">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                  <div class="col-xs-12">
                    <table id="simple-table" class="table  table-bordered table-hover">
                      <thead>
                        <tr>
                          <th align="center">Mata Pelajaran</th>
                          <th align="center">Kd1</th>
                          <th align="center">Kd2</th>
                          <th align="center">Kd3</th>
                          <th align="center">Kd4</th>
                          <th align="center">Kd5</th>
                          <th align="center">Kd6</th>
                          <th align="center">Kd7</th>
                          <th align="center">Kd8</th>
                          <th align="center">UTS</th>
                          <th align="center">UAS</th>
                          <th align="center">Nilai Rapot</th>

                        </tr>
                      </thead>

                      <tbody>
                        <?php
                        $no = 1;
                        ?>
                        <tr>
                          <td><?php echo $nilai_kd1['nama_mapel']?></td>
                          <td><?php echo $nilai_kd1['nilai']?></td>
                          <td><?php echo $nilai_kd2['nilai']?></td>
                          <td><?php echo $nilai_kd3['nilai']?></td>
                          <td><?php echo $nilai_kd4['nilai']?></td>
                          <td><?php echo $nilai_kd5['nilai']?></td>
                          <td><?php echo $nilai_kd6['nilai']?></td>
                          <td><?php echo $nilai_kd7['nilai']?></td>
                          <td><?php echo $nilai_kd8['nilai']?></td>
                          <td><?php echo $nilai_uts['nilai']?></td>
                          <td><?php echo $nilai_uas['nilai']?></td>
                          <td><?php echo $nilai_rapot['rapot']?></td>
                      </tr>
                      <?php
                          $no++;
                      ?>
                       
                      </tbody>

                    </table>
                    <button><a href="<?php echo base_url('c_siswa/back_nilai/'.$nilai_kd1['kode_kategori'].'/'.$nilai_kd1['kode_semester'].'/'.$nilai_kd1['kode_ta'])?>" class="fa fa-lg fa-chevron-left">&nbsp Back<br></a></button>
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