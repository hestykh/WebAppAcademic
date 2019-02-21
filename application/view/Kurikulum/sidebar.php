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
              <p class="designation"><?php echo $this->session->userdata('hakakses');?></p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="active"><a href="<?php echo base_url('c_kurikulum/index')?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <li class="treeview"><a href="#"><i class="fa fa-calendar"></i><span>Kelola Jadwal Mengajar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                 <li><a href="#" id="myBtn"><i class="fa fa-circle-o"></i> Lihat Jadwal Mengajar</a></li>
              </ul>
            </li>
        <li class="treeview"><a href="#"><i class="fa fa-calendar"></i><span>Kelola Jadwal Kelas </span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#" id= "BtnInputJadwalKelas"><i class="fa fa-circle-o"></i> Input Jadwal Kelas </a></li>
                <li><a href="#" id="BtnJadwal"><i class="fa fa-circle-o"></i> lihat Jadwal Kelas </a></li>
              </ul>
            </li>
       <li class="treeview"><a href="#"><i class="fa fa-laptop"></i><span> Data Guru </span><i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url('c_kurikulum/v_input_dataGuru')?>"><i class="fa fa-circle-o"></i> Input Data Guru </a></li>
                <li><a href="<?php echo base_url('c_kurikulum/v_dataguru')?>"><i class="fa fa-circle-o"></i> lihat Data Guru </a></li>
              </ul>
       <li class="treeview"><a href="#"><i class="fa fa-laptop"></i><span> Data Siswa </span><i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url('c_kurikulum/v_input_dataSiswa')?>"><i class="fa fa-circle-o"></i> Input Data Siswa </a></li>
                <li><a href="<?php echo base_url('c_kurikulum/v_datasiswa')?>"><i class="fa fa-circle-o"></i> lihat Data Siswa </a></li>
              </ul>
       <li class="treeview"><a href="#"><i class="fa fa-laptop"></i><span> Data Kelas </span><i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="#" id="BtninputKelasSiswa"><i class="fa fa-circle-o"></i> Input Data Kelas</a></li>
                <li><a href="#" id="BtnKelasSiswa"><i class="fa fa-circle-o"></i> Lihat Data Kelas</a></li>
              </ul>
       <li class="treeview"><a href="#"><i class="fa fa-laptop"></i><span> Data Master </span><i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url('c_kurikulum/v_input_data_kbm')?>"><i class="fa fa-circle-o"></i> Input Data kbm </a></li>
                <li><a href="<?php echo base_url('c_kurikulum/v_data_kbm')?>"><i class="fa fa-circle-o"></i> lihat Data kbm </a></li>
                <li><a href="<?php echo base_url('c_kurikulum/v_input_tahun_ajaran')?>"><i class="fa fa-circle-o"></i> Input Tahun Ajaran </a></li>
                <li><a href="<?php echo base_url('c_kurikulum/v_tahun_ajaran')?>"><i class="fa fa-circle-o"></i> Lihat Tahun Ajaran </a></li>
                <li><a href="<?php echo base_url('c_kurikulum/v_input_mapel')?>"><i class="fa fa-circle-o"></i> Input Data Mata Pelajaran </a></li>
                <li><a href="<?php echo base_url('c_kurikulum/v_mapel')?>"><i class="fa fa-circle-o"></i> Lihat Data Mata Pelajaran </a></li>
                <li><a href="<?php echo base_url('c_kurikulum/v_input_kelas')?>"><i class="fa fa-circle-o"></i> Input Nama Kelas </a></li>
                <li><a href="<?php echo base_url('c_kurikulum/v_kelas')?>"><i class="fa fa-circle-o"></i> Lihat Data Kelas </a></li>
                <li><a href="#" id="BtnKelasSiswa"><i class="fa fa-circle-o"></i> Lihat Data Nilai</a></li>
              </ul>
            </li>
          </ul>
        </section>
      </aside>
      <!-- The Modal jadwal ngajar -->
      <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Pilih Nama Guru</h2>
          </div>
          <div class="modal-body">
            <!-- setelah menekan tombil submit akan ke c_kurikulum/jadwal_ngajar-->
            <form action="<?php echo base_url('c_kurikulum/jadwal_ngajar'); ?>" method="post">
              <div class="form-group">
                <p>
                 <label class="col-lg-2 control-label" for="select">Nama Guru</label>
                  <div class="col-lg-10">
                   <select class="form-control" id="select" name="kode_guru">
                     <?php foreach($guru as $row){ ?>
                       <option value="<?php echo $row->kode_guru; ?>"><?php echo $row->kode_guru." - ".$row->nama;?></option> 
                     <?php } ?>
                   </select>
                   <br>
                  </div>
                </p>
                </div>
                <p><br></p>
                <label class="col-lg-2 control-label"></label>
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>

       <!-- The Modal  Input jadwal kelas  -->
      <div id="modalInputJadwalKelas" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <span class="closeInputJadwalKelas">&times;</span>
            <h2>Pilih Kelas</h2>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('c_kurikulum/v_input_jadwal'); ?>" method="post">
              <div class="form-group">
                <p>
                  <div class="form-group">
                    <label control-label>Pilih Kelas</label>
                    <select class="form-control" id="select" name="kode_kelas">
                     <?php foreach($kelas as $row){ ?>
                       <option value="<?php echo $row->kode_kelas; ?>"><?php echo $row->nama_kelas;?></option> 
                     <?php } ?>
                   </select>
                  </div>
                </p>
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>


       <!-- The Modal jadwal kelas  -->
      <div id="modalKelas" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <span class="closeKelas">&times;</span>
            <h2>Pilih Kelas</h2>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('c_kurikulum/jadwal_kelas'); ?>" method="post">
              <div class="form-group">
                <p>
                 <label class="col-lg-2 control-label" for="select">Nama Kelas</label>
                  <div class="col-lg-10">
                   <select class="form-control" id="select" name="kode_kelas">
                     <?php foreach($kelas as $row){ ?>
                       <option value="<?php echo $row->kode_kelas; ?>"><?php echo $row->nama_kelas;?></option> 
                     <?php } ?>
                   </select>
                   <br>
                  </div>
                </p>
                </div>
                <p><br></p>
                <label class="col-lg-2 control-label"></label>
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>

        <!-- The ModalinputkelasSiswa -->
      <div id="ModalinputKelasSiswa" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <span class="closeinputKelasSiswa">&times;</span>
            <h2>Pilih Kelas dan Tahun Ajaran</h2>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('c_kurikulum/modal_Inputsiswa_kelas'); ?>" method="post">
              <div class="form-group">
                <p>
                 <label class="col-lg-2 control-label" for="select">Nama Kelas</label>
                  <div class="col-lg-10">
                   <select class="form-control" id="select" name="kode_kelas">
                     <?php foreach($kelas as $row){ ?>
                       <option value="<?php echo $row->kode_kelas; ?>"><?php echo $row->nama_kelas;?></option> 
                     <?php } ?>
                   </select>
                   <br>
                  </div>
                </p>
                <p>
                  <label class="col-lg-2 control-label" for="select">Tahun Ajaran</label>
                  <div class="col-lg-10">
                   <select class="form-control" id="select" name="kode_ta">
                    <?php foreach ($kode_ta as $key) { ?>
                      <option value="<?php echo $key->kode_ta; ?>"><?php echo $key->tahun_ajaran;?></option> 
                    <?php }?>
                   </select>
                   <br>
                  </div>
                  </p>
                </div>
                <p><br></p>
                <label class="col-lg-2 control-label"></label>
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- The ModalkelasSiswa -->
      <div id="ModalKelasSiswa" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <span class="closeKelasSiswa">&times;</span>
            <h2>Pilih Kelas dan Tahun Ajaran</h2>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('c_kurikulum/v_SiswaKelas'); ?>" method="post">
              <div class="form-group">
                <p>
                 <label class="col-lg-2 control-label" for="select">Nama Kelas</label>
                  <div class="col-lg-10">
                   <select class="form-control" id="select" name="kode_kelas">
                     <?php foreach($kelas as $row){ ?>
                       <option value="<?php echo $row->kode_kelas; ?>"><?php echo $row->nama_kelas;?></option> 
                     <?php } ?>
                   </select>
                   <br>
                  </div>
                </p>
                <p>
                  <label class="col-lg-2 control-label" for="select">Tahun Ajaran</label>
                  <div class="col-lg-10">
                   <select class="form-control" id="select" name="tahun_ajaran">
                    <?php foreach ($kode_ta as $key) { ?>
                      <option value="<?php echo $key->kode_ta; ?>"><?php echo $key->tahun_ajaran;?></option> 
                    <?php }?>
                   </select>
                   <br>
                  </div>
                  </p>
                </div>
                <p><br></p>
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

// Get the modal kelas
var modalKelas = document.getElementById('modalKelas');

// Get the button that opens the modal
var BtnJadwal = document.getElementById("BtnJadwal");

// Get the <span> element that closes the modal
var spanKelas = document.getElementsByClassName("closeKelas")[0];

// When the user clicks the button, open the modal 
BtnJadwal.onclick = function() {
    modalKelas.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanKelas.onclick = function() {
    modalKelas.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalKelas) {
        modalKelas.style.display = "none";
    }
}

// Get the modal inputkelas siswa 
var modalinputKelasSiswa = document.getElementById('ModalinputKelasSiswa');

// Get the button that opens the modal
var BtninputKelasSiswa = document.getElementById("BtninputKelasSiswa");

// Get the <span> element that closes the modal
var spaninputKelasSiswa = document.getElementsByClassName("closeinputKelasSiswa")[0];

// When the user clicks the button, open the modal 
BtninputKelasSiswa.onclick = function() {
    modalinputKelasSiswa.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spaninputKelasSiswa.onclick = function() {
    modalinputKelasSiswa.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalinputKelasSiswa) {
        modalinputKelasSiswa.style.display = "none";
    }
}
// Get the modal lihat kelas siswa 
var modalKelasSiswa = document.getElementById('ModalKelasSiswa');

// Get the button that opens the modal
var BtnKelasSiswa = document.getElementById("BtnKelasSiswa");

// Get the <span> element that closes the modal
var spanKelasSiswa = document.getElementsByClassName("closeKelasSiswa")[0];

// When the user clicks the button, open the modal 
BtnKelasSiswa.onclick = function() {
    modalKelasSiswa.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanKelasSiswa.onclick = function() {
    modalKelasSiswa.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalKelasSiswa) {
        modalKelasSiswa.style.display = "none";
    }
}

// Get the modal Input Jadwal Kelas 
var modalInputJadwalKelas = document.getElementById('modalInputJadwalKelas');

// Get the button that opens the modal
var BtnInputJadwalKelas = document.getElementById("BtnInputJadwalKelas");

// Get the <span> element that closes the modal
var spanInputJadwalKelas = document.getElementsByClassName("closeInputJadwalKelas")[0];

// When the user clicks the button, open the modal 
BtnInputJadwalKelas.onclick = function() {
    modalInputJadwalKelas.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanInputJadwalKelas.onclick = function() {
    modalInputJadwalKelas.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalInputJadwalKelas) {
        modalInputJadwalKelas.style.display = "none";
    }
}


</script>
</body>
</html>