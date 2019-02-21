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
						<h3 class="card-title">Form Edit Data Tahun Ajaran</h3>
						<div class="form-group">
						<?php echo form_open_multipart('c_kurikulum/update_ta');?>
							<?php foreach ($ta as $x) { ?>
							<input type="hidden" name="kode_ta" value="<?php echo $x->kode_ta;?>">
							<div class="form-group">
			                    <label>Tahun Ajaran</label>
			                    <input class="form-control" type="text" placeholder="Tahun Ajaran" name="tahun_ajaran" value="<?php echo $x->tahun_ajaran;?>" required>
			                </div>
								<br>
							</div>
            				<?php echo anchor('c_kurikulum/v_tahun_ajaran','Back',array('class'=>'btn btn-primary'))?>
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