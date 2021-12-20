<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" sizes="32x32" href="<?php echo site_url("assets/themes/front/img/logolpmp.jpg"); ?>">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo base_url(); ?>assets/themes/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/themes/front/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/themes/front/owlcarousel/assets/owl.theme.green.min.css"
        rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/themes/front/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/front/owlcarousel/owl.carousel.min.js"></script>
    <style type="text/css">
    .text-antrian {
        color: #333;
        font-size: 45px;
        font-weight: bold;
        text-align: center
    }

    .total-antrian {
        color: #333;
        font-size: 68px;
        font-weight: bold;
        text-align: center;
        padding: 0px
    }

    .line {
        background: #333;
        height: 2px;
        align: center;
        width: 120px;
        margin: 0 auto;
        padding: 0px
    }

    .text-tutup {
        color: red;
        font-size: 45px;
        font-weight: bold;
        text-align: center
    }

    html,
    body,
    .col-md-12,
    .row {
        height: 100%;
    }

    .row>div {
        height: 100%;
    }

    .row .col-sm-2 {
        background-color: #eee;
    }

    .row .col-sm-10 {
        background-color: #ddd;
    }

    .gecontent {
        width: 100%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    </style>
    <script type="text/javascript">
    $(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            autoWidth: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            items: 2,
        });
    });
    </script>
</head>

<body>
    <div class="owl-carousel owl-theme">
        <?php
    if (isset($dataBagian)) {
      foreach ($dataBagian as $row) {
        $dataAntri = $this->antrian_model->antrianGanda($row->id_bagian);
        $totalAntrian = $this->antrian_model->totalantrianGanda($row->id_bagian);
        $totalDipanggil = $this->antrian_model->antrianGandaBlmPanggil($row->id_bagian);
        echo '<div class="item">
		    			<div class="panel panel-default" style="height: 100%;border-radius: 0;">
					        <div class="panel-heading bg-info" style="padding: 8px 0px;height: 23%;border-radius: 0;">
					            <h4 align="center" id="judulbagian">' . strtoupper($row->nama) . '</h4>
					        </div>
					        <div class="panel-body" style="background: #FCEFCE;">
					            <div class="text-tutup" id="tnoantrian" style="line-height: 1.5em;font-size: 60px;color:#F0AD4E;height: 54%;text-shadow:-1px -1px 0 #222, 2px -1px 0 #222,-1px 2px 0 #222,3px 3px 0 #222;">';
        echo (count($dataAntri) > 0) ? $dataAntri->nomor : '000';
        echo '</div>
					            <span><strong>&nbsp;</strong></span>
					        </div>
					        <div class="panel-footer bg-info" style="padding: 8px;margin:0px;height: 23%;">
					        <div class="row">
					        <div class="col-xs-6">
					        	<h4>Menunggu : ' . $totalDipanggil . ' antrian</h4>
					        </div>
					        <div class="col-xs-6 text-right">
					        	<h4>Dari : ' . $totalAntrian . ' antrian</h4>
					        </div>
					        </div>
					          
					        </div>
					  </div>
		    		</div>';
      }
    }
    ?>
    </div>
</body>

</html>