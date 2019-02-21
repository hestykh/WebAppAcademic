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
              <h3 class="card-title">Input Presensi Kelas <?php echo $this->session->userdata('nama_kelas')." Tanggal ".$this->session->userdata('tanggal');?></h3>
              <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form action="<?php echo base_url('c_guru/input_presensi'); ?>" method="post">
                <div class="row">
                  <div class="col-xs-12">
                    <table id="simple-table" class="table  table-bordered table-hover">
                      <thead>
                        <tr>
                          <th align="center">No</th>
                          <th align="center">NIS</th>
                          <th align="center">Nama Siswa</th>
                          <th align="center">Status</th>
                          <th align="center">Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($hasil as $n) {
                        ?>
                        <tr>
                          <td><?php echo $no?></td>
                          <td><?php echo $n->nis?></td>
                          <td><?php echo $n->nama?></td>
                          <!-- <td><input type="radio" name="radio" value="1"> Hadir || 
                            <input type ="radio" name="radio" value="2"> Alfa ||  
                            <input type ="radio" name = "radio" value="3"> Sakit || 
                            <input type ="radio" name = "radio" value="4"> Izi || 
                            <input type ="radio" name = "radio" value="5">  Dispen</td> -->
                          <td><?php 
                          foreach ($status as $x) { ?>
                            <input type="radio" name="radio|<?php echo $n->kode_siswaKelas;?>" value="<?php echo $x->kode_status;?>" required="required"><?php echo " ".$x->status;?>
                          <?php }?></td>
                          <td><input type="text" name="keterangan|<?php echo $n->kode_siswaKelas;?>"></td>
                          <input type="hidden" name="jam" value="<?php $dt = new DateTime("now", new DateTimeZone('Asia/Jakarta')); echo $dt->format('H:i:s');?>">
                        </tr>
                      <?php
                          $no++;
                      }
                      ?>
                      </tbody>
                    </table>
                     <label class="col-lg-2 control-label"></label>
                       <button class="btn btn-primary" type="submit" name="submit">Submit</button> <br>
                  </div><!-- /.span -->
                </div><!-- /.row -->
                <!-- PAGE CONTENT ENDS -->
              </form>
              </div><!-- /.col -->
            </div><!-- /.row -->
              
            </div>
          </div>

        </div>
      </div>
    </div>
  </body>
</html>