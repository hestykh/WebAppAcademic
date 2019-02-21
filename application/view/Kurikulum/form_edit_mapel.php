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
						<h3 class="card-title">Form Edit Mata Pelajaran</h3>
						<div class="form-group">
						<?php echo form_open_multipart('c_kurikulum/update_mapel');?>
							<?php foreach ($mapel as $x) { ?>
							<input type="hidden" name="kode_mapel" value="<?php echo $x->kode_mapel;?>">
							<div class="form-group">
			                    <label>Kode Mata Pelajaran</label>
			                    <input class="form-control" type="text" placeholder="Tahun Ajaran" name="kode_mapel_new" value="<?php echo $x->kode_mapel;?>" required>
			                </div>
			                <br>
							<div class="form-group">
			                    <label>Mata Pelajaran</label>
			                    <input class="form-control" type="text" placeholder="Tahun Ajaran" name="nama_mapel" value="<?php echo $x->nama_mapel;?>" required>
			                </div>
								<br>
							</div>
							<!-- <button><a class="btn btn-primary" href="<?php echo base_url('c_kurikulum/v_mapel')?>"> Back </a></button> -->
							<?php echo anchor('c_kurikulum/v_mapel','Back',array('class'=>'btn btn-primary'))?>
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