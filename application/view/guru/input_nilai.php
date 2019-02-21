<!DOCTYPE html>
<html>
  <head>
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
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            <p> admin template</p>
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
              <h3 class="card-title">Input Nilai Kelas <?php echo $this->session->userdata('kelas')?></h3>
              <form action="<?php echo base_url('c_guru/input_nilai_siswa'); ?>" method="post">

			         <div class="row">
                  <div class="col-xs-12">
                    <table id="simple-table" class="table  table-bordered table-hover">
                      <thead>
                        <tr>
                          <th align="center">No</th>
                          <th align="center">Nama</th>
                          <th align="center">Nis</th>
                          <th align="center">Nilai</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($siswa as $g) {
                        ?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $g->nama;?></td>
                          <td><?php echo $g->nis;?></td>
                          <td><input class = "form-control" type="number" min="0" max="100" name="nilai|<?php echo $g->nis;?>" required="required"/></td>
                      </tr>
                      <?php
                          $no++;
                      }
                      ?>
                      </tbody>
                    </table>
                  </div>
                  <label class="col-lg-2 control-label"></label>
                       <button class="btn btn-primary" type="submit" name="submit">Submit</button> <br>
              <p style="font-size: 16px;">&nbsp;</p>
            </div>
          </form>
          </div>
          
        </div>
      </div>
    </div>
  </body>
</html>