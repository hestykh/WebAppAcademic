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
						<h3 class="card-title">Form Edit Data Siswa </h3>
						<div class="form-group">
						<?php echo form_open_multipart('c_kurikulum/update_siswa');?>
							<?php foreach ($y as $x) {?>
							<input class="form-control" type="hidden" name="nis" value="<?php echo $x->nis;?>" required>
							<div class="form-group">
			                	<label class="control-label">Foto Profil</label>
			                	<br>
			                	<input type="hidden" name="foto" value="<?php echo $x->foto;?>">
			                	<img src="<?php echo base_url().$x->foto;?>" alt="<?php echo $x->nis;?>" width="150">
			                	<input type="file" name="userfoto"></input>
			                	<small>Pas Photo, Size Max 100KB</small>
			                </div>
							<div class="form-group">
								<label>NIS</label>
								<input class="form-control" type="text" placeholder="NIS" name="nis_baru" value="<?php echo $x->nis;?>" required>
		                    </div>
							<div class="form-group">
								<label>Nama</label>
								<input class = "form-control" type="text" value="<?php echo $x->nama;?>" name="nama" required="required"/>
							</div>
							<div class="form-group">
								<label>Agama</label>
								<input class = "form-control" type="text" value="<?php echo $x->agama;?>" name="agama" required="required"/>
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<select class="form-control" id="select" name="jenis_kelamin">
									<option value="<?php echo $x->jenis_kelamin;?>"><?php echo $x->jenis_kelamin;?></option>
                   					<option value="Pria">Pria</option>
                   					<option value="Wanita">Wanita</option>
                				</select>
							</div>
							<div class="form-group">
								<label>Tahun Masuk</label>
								<input class = "form-control" type="text" name="tahun_masuk" value="<?php echo $x->tahun_masuk;?>">
							</div>
							<div class="form-group">
			                	<label>Status</label>
			                	<div class="animated-radio-button">
			                		<label>
			                			<input type="radio" name="status" value="6" <?php echo ($x->status=='6')?'checked':'';?>><span class="label-text">Aktif</span>
			                		</label>
			                	</div>
			                	<div class="animated-radio-button">
			                		<label>
			                			<input type="radio" name="status" value="7" <?php echo ($x->status=='7')?'checked':'';?>><span class="label-text">Nonaktif</span>
			                		</label>
			                	</div>
			                </div>
							<div class="form-group">
								<label>Alamat</label>
								<input class = "form-control" type="text" value="<?php echo $x->alamat;?>" name="alamat" required="required"/>
							</div>
							<div class="form-group">
								<label>Telepon</label>
								<input class = "form-control" type="text" value="<?php echo $x->telepon;?>" name="telepon" required="required"/>
							</div>
							<?php echo anchor('c_kurikulum/v_datasiswa','Back',array('class'=>'btn btn-primary'))?>
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