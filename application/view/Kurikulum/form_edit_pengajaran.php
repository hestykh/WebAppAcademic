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
						<h3 class="card-title">Form Edit Data Pengajaran</h3>
						<div class="form-group">
						<?php echo form_open_multipart('c_kurikulum/update_pengajaran');?>
							<?php foreach ($pengajaran as $x) { ?>
							<input type="hidden" name="kode_pengajaran" value="<?php echo $x->kode_pengajaran;?>">
							<label class="col-lg-2 control-label" for="select">Nama Guru</label>
							<div class="col-lg-10">
								<select class = "form-control" id= "select" type="text" name="kode_guru">
									<?php foreach($guru as $g){ ?>
									<option value="<?php echo $g->kode_guru; ?>"><?php $g->kode_guru;?> <?php echo $g->nama;?></option>
									<?php } ?>
									<br>
								</select>
								<br>
							</div>
							<label class="col-lg-2 control-label" for="select">Mata Pelajaran</label>
							<div class="col-lg-10">
								<select class = "form-control" type="text" name="kode_dataMapel">
									<option value="<?php echo $x->kode_dataMapel; ?>"><?php echo $x->nama_mapel; ?></option>
									  <?php foreach($kode_dataMapel as $row){ ?>
									  <option value="<?php echo $row->kode_dataMapel; ?>"><?php echo $row->nama_mapel; ?></option>
									  <?php } ?>
								</select>
								<br>
							</div>
							<label class="col-lg-2 control-label">Tahun AJaran</label>
							<div class="col-lg-10">
								<select class = "form-control" type="text" name="kode_ta"><br>
									 <?php foreach($tahun_ajaran as $row){ ?>
									 <option value="<?php echo $row->kode_ta; ?>" name="kode_ta"><?php $row->kode_ta;?> <?php echo $row->tahun_ajaran; ?>
									 </option>
									 <?php } ?>
								</select>
								<br>
							</div>
							<label class="col-lg-2 control-label">Kelas</label>
							<div class="col-lg-10">
								<select class = "form-control" type="text" name="kode_kelas" value="<?php echo $x->nama_kelas;?>"><br>
									  <?php foreach($kelas as $kls){ ?>
									  <option value="<?php echo $kls->kode_kelas; ?>"><?php $kls->kode_kelas;?> <?php echo $kls->nama_kelas;?></option> <br><?php } ?>
								</select>
								<br>
							</div>
							<label class="col-lg-2 control-label">Semester</label>
							<div class="col-lg-10">
								<select class = "form-control" type="text" name="kode_semester" value="<?php echo $x->nama_semester;?>"><br>
									 <?php foreach($semester as $smtr){ ?>
									 <option value="<?php echo $smtr->kode_semester; ?>"><?php $smtr->kode_semester;?> <?php echo $smtr->nama_semester;?></option> <br>
									 <?php } ?>
								</select>
								<br>
							</div>
            <button class="btn btn-primary" type="submit" name="submit">Submit</button> <br>

							<?php } ?>
						<?php echo form_close();?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>