<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $antrian ?></title>
    <link href="<?php echo base_url(); ?>assets/themes/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/themes/front/css/modern-business.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/themes/front/css/font-awesome.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" align="center">
                    Nomor Anda:
                </h1>
            </div>
            <div class="col-md-12" id="cetak" style="padding:0px;">
                <div style="color:#000;font-size:20px;font-weight: bold;text-align: center;margin-bottom:2px">
                    <?php echo strtoupper("LPMP PROVINSI BENGKULU"); ?>
                </div>
                <div style="color:#000;font-size:20px;font-weight: bold;text-align: center;margin-bottom:0px">
                    <?php
          if ($jenis) {
            echo strtoupper($jenis);
          }
          ?>
                </div>
                <div style="color:#000;font-size:50px;font-weight: bold;text-align: center">
                    <?php echo $antrian ?>
                </div>
                <div style="color:#000;font-size:20px;font-weight: bold;text-align: center;margin-bottom:0px">
                    Jumlah antri: <?php echo $jmlantrian; ?>
                </div>
                <div style="color:#000;font-size:14px;font-weight: bold;text-align: center;margin-bottom:10px">
                    <?php
          echo tgl_indo($tanggal) . ' ' . date("H:i", strtotime($waktu)) . ' ';
          ?>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/themes/front/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/front/js/jquery.PrintArea.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/front/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $('#cetak').printArea();
    var redirectURL = '<?php echo site_url('pendaftaran') ?>';
    setTimeout(function() {
        location.href = redirectURL;
    }, 3000);
    </script>
</body>

</html>