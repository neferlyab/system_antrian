<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="<?php echo strip_tags($this->config->item('nama')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>asset/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo site_url("assets/themes/front/img/logolpmp.jpg"); ?>">
        <a><img src='assets/themes/front/img/logo_twt.jpg' width='60' height='50' alt='logo'/> <a><img src='assets/themes/front/img/logo2.jpeg' width='60' height='50' alt='logo'/> <a><img src='assets/themes/front/img/logolpmp.jpg' width='60' height='50' alt='logo'/><a><font size="6"><b> LPMP PROVINSI BENGKULU</b></font></a>
    <link rel="manifest" href="<?php echo base_url(); ?>assets/favicon/manifest.json">
    <link rel="mask-icon" href="<?php echo base_url(); ?>assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    <title><?php echo $title ?></title>
    <link href="<?php echo base_url(); ?>assets/themes/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/themes/front/css/modern-business.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/themes/front/css/font-awesome.css" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    .text-antrian {
        color: red;
        font-size: 68px;
        font-weight: bold;
        text-align: center
    }

    .text-bagian {
        font-size: 45px;
        font-weight: bold;
        text-align: start
    }

    .tombol-jenis {
        height: 250px;
        width: 100%;
        font-size: 90px
    }

    .gecontent {
        width: 100%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    </style>
</head>

<body>
    <div class="gecontent">
        <div class="container">
            <div class="row">
                <?php $this->load->view($main) ?>
            </div>
            <footer>
                <div class="row">
                    <div class="col-lg-12">

                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/themes/front/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/front/js/bootstrap.min.js"></script>
</body>

</html>