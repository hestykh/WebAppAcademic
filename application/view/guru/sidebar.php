<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
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
    background-color: #4b338e;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #4b338e;
    color: white;
}

#myDIV {
    width: 100%;
}
</style>
</head>
<body>
<!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
          <?php foreach ($foto as $key) { ?>
            <?php 
            if($key->foto != null){ 
            ?> 
              <div class="pull-left image"><img class="img-circle" src="<?php echo base_url().$key->foto;?>"></div>
            <?php
              }else{
            ?> 
               <div class="pull-left image"><img class="img-circle" src="<?php echo base_url()?>dataSMP/smile2.png"></div>
            <?php } ?>
          <?php } ?>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('nama');?></p>
              <p class="designation"><?php echo $this->session->userdata('kode_guru');?></p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="active"><a href="<?php echo base_url('c_guru/index')?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <li class="treeview"><a href="#"><i class="fa fa-laptop"></i><span>Nilai</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#" id="myBtn"><i class="fa fa-circle-o"></i> Input Nilai</a></li>
                <li><a href="#" id="btnLihat"><i class="fa fa-circle-o"></i> lihat nilai</a></li>
              </ul>
            </li>
      <li class="treeview"><a href="#"><i class="fa fa-laptop"></i><span>Kehadiran</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#" id="BtnPresensi"><i class="fa fa-circle-o"></i> Input kehadiran</a></li>
                <li><a href="#" id="BtnvPresensi"><i class="fa fa-circle-o"></i> lihat detail kehadiran</a></li>
                <li><a href="<?php echo base_url('c_guru/v_presensi')?>" ><i class="fa fa-circle-o"></i> Rekap KBM</a></li>

        <li><a href="ui-font-awesome.html"><i class="fa fa-circle-o"></i> lihat grafik kehadiran</a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url('c_guru/jadwal_ngajar')?>"><i class="fa fa-calendar"></i><span>Lihat Jadwal Mengajar </span></a></li>
      <li><a href="<?php echo base_url('c_guru/bahan_ajar')?>"><i  class="fa fa-upload" aria-hidden="true"></i><span>Upload Bahan Ajar </span></a></li>
              
          </ul>
        </section>
      </aside>
      <!-- The Modal input nilai -->
      <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Pilih Jenis Nilai</h2>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('c_guru/input_nilai'); ?>" method="post">
              <div class="form-group">
                <p>
                  <label class="col-lg-2 control-label" for="select">Pilih kategori</label>
                  <div class="col-lg-10">
                   <select class="form-control" id="select" name="kode_kategori">
                     <?php foreach($kategori as $row){ ?>
                       <option value="<?php echo $row->kode_kategori; ?>"><?php echo $row->nama_kategori;?></option> 
                     <?php } ?>
                   </select>
                   <br>
                  </div>
                </p>
                <p>
                  <label class="col-lg-2 control-label">Jenis Nilai</label>
                  <div class="col-lg-10">
                    <select class="form-control" id="select" name="jenis_nilai">
                      <?php foreach($jenisnilai as $row){ ?>
                       <option value="<?php echo $row->kode_jenis; ?>"><?php echo $row->nama_jenis;?></option> 
                     <?php } ?>
                    </select> <br>
                  </div>
                </p>
                <p>
                  <label class="col-lg-2 control-label" for="select">Pilih kbm</label>
                  <div class="col-lg-10">
                   <select class="form-control" id="select" name="kode_kbm">
                     <?php foreach($kbm as $row){ ?>
                       <option value="<?php echo $row->kode_kbm;?>"><?php echo $row->nama_kelas." - ".$row->nama_mapel;?></option>
                     <?php } ?>
                   </select>
                   <br>
                  </div>
                </p>
                <p><br><br></p>

                </div>
                <p><br></p>
                <label class="col-lg-2 control-label"></label>
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- The Modal lihat nilai -->
      <div id="modalLihat" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <span class="closeLihat">&times;</span>
            <h2>Pilih Kelas</h2>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('c_guru/vnilai_siswa'); ?>" method="post">
              <div class="form-group">
                <p>
                  <label class="col-lg-2 control-label" for="select">Pilih kategori</label>
                  <div class="col-lg-10">
                   <select class="form-control" id="select" name="kode_kategori">
                     <?php foreach($kategori as $row){ ?>
                       <option value="<?php echo $row->kode_kategori; ?>"><?php echo $row->nama_kategori;?></option> 
                     <?php } ?>
                   </select>
                   <br>
                  </div>
                </p>
                <p>
                  <label class="col-lg-2 control-label">Jenis Nilai</label>
                  <div class="col-lg-10">
                    <select class="form-control" id="select" name="jenis_nilai">
                      <?php foreach($jenisnilai as $row){ ?>
                       <option value="<?php echo $row->kode_jenis; ?>"><?php echo $row->nama_jenis;?></option> 
                     <?php } ?>
                    </select> <br>
                  </div>
                </p>
                <p>
                  <label class="col-lg-2 control-label" for="select">Pilih kbm</label>
                  <div class="col-lg-10">
                   <select class="form-control" id="select" name="kode_kbm">
                     <?php foreach($kbm as $row){ ?>
                       <option value="<?php echo $row->kode_kbm;?>"><?php echo $row->nama_kelas." - ".$row->nama_mapel;?><input type="hidden" name="kode_kelas" value="<?php echo $row->kode_kelas;?>"></option>
                     <?php } ?>
                   </select>
                   <br>
                  </div>
                </p>
                <p><br><br></p>
                <label class="col-lg-2 control-label"></label>
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>

       <!-- The Modal -->
      <div id="modalPresensi" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <span class="closePresinsi">&times;</span>
            <h2>Pilih Kelas</h2>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('c_guru/v_input_presensi'); ?>" method="post">
              <div class="form-group">
                <p>
                  <label class="col-lg-2 control-label">Kelas</label>
                  <div class="col-lg-10">
                    <select class="form-control" id="select" name="kode_kbm">
                      <?php foreach($kbm as $row){ ?>
                      <option value="<?php echo $row->kode_kbm; ?>"><?php echo $row->nama_kelas." - ".$row->nama_mapel;?></option> 
                      <?php } ?>
                    </select>
                    <br>
                  </div>
                 </p>             
                <p><br><br></p>
                <label class="col-lg-2 control-label"></label>
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
       <!-- The Modal -->
      <div id="modalvPresensi" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <span class="closevPresinsi">&times;</span>
            <h2>Pilih Kelas</h2>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('c_guru/tanggal_presensi'); ?>" method="post">
              <div class="form-group">
                <p>
                  <label class="col-lg-2 control-label">kelas</label>
                  <div class="col-lg-10">
                    <select class="form-control" id="select" name="kode_jadwal">
                      <?php foreach($kbm as $row){ ?>
                      <option value="<?php echo $row->kode_kbm; ?>"><?php echo $row->kode_kbm." - ".$row->nama_kelas;?></option> 
                      <?php } ?>
                    </select>
                    <br>
                  </div>
                 </p>             
                <p><br><br></p>
                <label class="col-lg-2 control-label"></label>
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
              </div>
            </form>
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

function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

// Get the modal
var mdl = document.getElementById('modalLihat');

// Get the button that opens the modal
var btnLihat = document.getElementById("btnLihat");

// Get the <span> element that closes the modal
var spanLihat = document.getElementsByClassName("closeLihat")[0];

// When the user clicks the button, open the modal 
btnLihat.onclick = function() {
    mdl.style.display = "block";
}

// When the user clicks on <span> (x), close the modal

spanLihat.onclick = function() {
    mdl.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == mdl) {
        mdl.style.display = "none";
    }
}
// Get the modal inpt presensi
var modalPresensi = document.getElementById('modalPresensi');

// Get the button that opens the modal
var btnPresensi = document.getElementById("BtnPresensi");

// Get the <span> element that closes the modal
var spanPresensi = document.getElementsByClassName("closePresinsi")[0];

// When the user clicks the button, open the modal 
btnPresensi.onclick = function() {
    modalPresensi.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanPresensi.onclick = function() {
    modalPresensi.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalPresensi) {
        modalPresensi.style.display = "none";
    }
}

function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
// Get the modal lihat presensi
var modalvPresensi = document.getElementById('modalvPresensi');

// Get the button that opens the modal
var btnvPresensi = document.getElementById("BtnvPresensi");

// Get the <span> element that closes the modal
var spanvPresensi = document.getElementsByClassName("closevPresinsi")[0];

// When the user clicks the button, open the modal 
btnvPresensi.onclick = function() {
    modalvPresensi.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanvPresensi.onclick = function() {
    modalvPresensi.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalvPresensi) {
        modalvPresensi.style.display = "none";
    }
}

function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>
</body>
</html>