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
						<h3 class="card-title">Form Edit Siswa Kelas</h3>
						<div class="form-group">
						<?php echo form_open_multipart('c_kurikulum/update_siswaKelas');?>
							<?php foreach ($y as $x) {?>
							<input class="form-control" type="hidden" name="kode_siswaKelas" value="<?php echo $x->kode_siswaKelas;?>" readonly>
							<div class="form-group">
								<label>NIS</label>
								<input class="form-control" type="text" placeholder="NIS" name="nis_baru" value="<?php echo $x->nis;?>" readonly>
		                    </div>
							<div class="form-group">
								<label>Nama</label>
								<input class = "form-control" type="text" value="<?php echo $x->nama;?>" name="nama" readonly/>
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<select class="form-control" id="select" name="jenis_kelamin" readonly>
									<option value="<?php echo $x->jenis_kelamin;?>"><?php echo $x->jenis_kelamin;?></option>
                   					<option value="Pria">Pria</option>
                   					<option value="Wanita">Wanita</option>
                				</select>
							</div>
							<div class="form-group">
								<label>Tahun Masuk</label>
								<input class = "form-control" type="text" name="tahun_masuk" value="<?php echo $x->tahun_masuk;?>" readonly>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<input class = "form-control" type="text" value="<?php echo $x->alamat;?>" name="alamat" readonly/>
							</div>
							<div class="form-group">
								<label>Telepon</label>
								<input class = "form-control" type="text" value="<?php echo $x->telepon;?>" name="telepon" readonly/>
							</div>
							<div class="form-group">
							<label class="" for="select">Nama Kelas</label>
                  			<div class="">
                   			  <select class="form-control" id="select" name="kode_kelas">
                    			 <?php foreach($kelas as $row){ ?>
                      				 <option value="<?php echo $row->kode_kelas; ?>"><?php echo $row->nama_kelas;?></option> 
                     			 <?php } ?>
                   			  </select>
                  			 <br>
                 			 </div>
							<button class="btn btn-primary" type="submit" name="submit">Submit</button>
							<?php }?>
						<?php echo form_close();?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>