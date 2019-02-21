<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>SMPN 39 BANDUNG </title>
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url ('assets/css/main.css'); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="<?php echo base_url('asset/css/style.css');?>">

  
</head>

<body style="background: url('<?php echo base_url(); ?>dataSMP/SMP39_2.jpg');  background-attachment: fixed; background-position: center;">
  
<!-- Mixins-->
<!-- Pen Title--><br><br>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <div align="center"><img class="img-circle" src="<?php echo base_url(); ?>dataSMP/LOGO.jpg"></div>
    <h1 class="title">Login</h1>
    <form class="login-form" action="<?php echo base_url('c_login/authenticate'); ?>" method="post">
      <div class="input-container">
        <div class="col-lg-12">
          <br>
          <br>
        </div>
        <div class="col-lg-12">
          <input class = "form-control" type="text" name="username" required="required" placeholder = "NIP / NIS"/>
          <div class="bar"></div>
        </div>
        <div class="col-lg-12">
          <input class = "form-control" type="password" name="password" required="required" placeholder = "Password"/>
          <div class="bar"></div>
        </div>
        <div class="col-lg-12">
          <input type="text" readonly>
        </div>
      </div>
      <div class="button-container">
        <button><span>Go</span></button>
      </div>
    </form>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="js/index.js"></script>

</body>
</html>
