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
    <style>
    .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}
</style>
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
              <h3 class="card-title">Lihat Data Guru</h3>
              <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row" align="center">
                  <div class="col-xs-12" align="center">
                    <table id="sampleTable" class="table table-bordered table-hover" align="center">
                      <thead>
                        <tr align="center">
                          <th align="center">No</th>
                          <th align="center">Profil</th>
                          <th align="center">Nama</th>
                          <th align="center">Nip</th>
                          <th align="center" width="150">Pendidikan</th>
                          <th align="center" width="200">Alamat</th>
                          <th align="center">Telepon</th>
                          <th align="center">Tanggal Lahir</th>
                          <th align="center" colspan="2">Pengaturan</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($guru as $g) {
                        ?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td align="center">
                            <?php 
                              if($g->foto != null){ 
                              ?> 
                                <div class="pull-left image"><img class="img-circle" src="<?php echo base_url().$g->foto;?>" width="50"></div>
                              <?php
                                }else{
                              ?> 
                                  <div class="pull-left image"><img class="img-circle" src="<?php echo base_url()?>dataSMP/smile2.png" width="50"></div>
                            <?php } ?>
                          </td>
                          <td align="center"><?php echo $g->nama;?></td>
                          <td align="center"><?php echo $g->nip;?></td>
                          <td align="center" width="150"><?php echo $g->pendidikan;?></td>
                          <td align="center" width="200"><?php echo $g->alamat;?></td>
                          <td align="center"><?php echo $g->telepon;?></td>
                          <td align="center"><?php echo $g->tanggal_lahir;?></td>
                          <td align="center" colspan="2"><?php echo anchor('c_kurikulum/form_edit_guru/'.$g->kode_guru,'Edit',array('class'=>'btn btn-primary btn-sm')).'|'.anchor('c_kurikulum/delete_dGuru/'.$g->kode_guru,'Hapus',array('class'=>'btn btn-danger btn-sm'));?></td>
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