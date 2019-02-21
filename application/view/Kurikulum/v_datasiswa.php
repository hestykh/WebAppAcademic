<!DOCTYPE html>
<html>
  <head>
    <title></title>
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
              <h3 class="card-title">Lihat Data Siswa</h3>
              <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                  <div class="col-xs-12">
                    <table id="simple-table" class="table  table-bordered table-hover">
                      <thead>
                        <tr>
                          <th align="center">No</th>
                          <th align="center">Foto</th>
                          <th align="center">Nama</th>
                          <th align="center">Nis</th>
                          <!--<th align="center">Kelas</th>-->
                          <th align="center">Jenis Kelamin</th>
                          <th align="center">Tahun Masuk</th>
                          <th align="center">Alamat</th>
                          <th align="center">Telepon</th>
                          <th align="center" colspan="2">Pengaturan</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($siswa as $s) {
                        ?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td align="center">
                            <?php 
                              if($s->foto != null){ 
                              ?> 
                                <div class="pull-left image"> <img class="img-circle" src="<?php echo base_url().$s->foto;?>" width="70"></div>
                              <?php
                                }else{
                              ?> 
                                  <div class="pull-left image"><img class="img-circle" src="<?php echo base_url()?>dataSMP/smile2.png" width="70"></div>
                            <?php } ?>
                          </td>
                          <td><?php echo $s->nama;?></td>
                          <td><?php echo $s->nis;?></td>
                          <!--<td><?php echo $s->kode_kelas;?></td>-->
                          <td><?php echo $s->jenis_kelamin;?></td>
                          <td><?php echo $s->tahun_masuk;?></td>
                          <td><?php echo $s->alamat;?></td>
                          <td><?php echo $s->telepon;?></td>
                          <td><?php echo anchor('c_kurikulum/form_edit_siswa/'.$s->nis,'Edit',array('class'=>'btn btn-primary btn-sm')).' | '.anchor('c_kurikulum/delete_siswa/'.$s->nis,'Hapus',array('class'=>'btn btn-danger btn-sm'))?></td>
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
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
    </script>
  </body>
</html>