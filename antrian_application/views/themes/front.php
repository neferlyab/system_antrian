<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $this->config->item('nama'); ?></title>
    <meta name="viewport" content="width=device-width, user-scalable=no" />
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo site_url("assets/themes/front/img/logolpmp.jpg"); ?>">
    <meta name="description" content="<?php echo $this->config->item('nama'); ?>" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/themes/front/materialize/css/materialize.min.css" rel="stylesheet"
        media="screen,projection" />
    <link href="<?php echo base_url(); ?>assets/themes/front/css/styleku.css" rel="stylesheet"
        media="screen,projection" />
    <?php
	echo "\n";
	foreach ($css as $file) {
		echo "\n"; ?>
    <link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
																			}
																			echo "\n";
																				?>

    <script src="<?php echo base_url(); ?>assets/themes/front/js/jquery.min.js"></script>
    <?php



	foreach ($js as $file) {
		echo "\n"; ?>
    <script src="<?php echo $file; ?>"></script>
    <?php
	}
	echo "\n";
	?>
    <style type="text/css">
    .bgs {
        position: relative;
        background: rgba(0, 0, 0, 0.4);
        width: 100%;
        height: 100%;
    }

    .text-run {
        width: 65%;
        float: left;
        display: inline-block;
    }

    @media screen and (max-width: 768px) and (min-width: 342px),
    (max-width:992px) {
        .text-run {
            width: 100%;
            float: left;
        }
    }

    @media screen and (min-width: 769px) and (max-width:992px) {
        .text-run {
            width: 55%;
            float: left;
        }
    }
    </style>
</head>

<body>
    <?php if (!$this->agent->is_mobile()) { ?>
    <nav>
        <div class="container-fluid" style="padding: 5px 5px;">
            <div class="nav-wrapper">
                <a href="<?php echo site_url(); ?>" class="brand-logo left"
                    style="font-size: 1.5rem;position: unset;"><i><img class="img-responsive"
                            src="<?php echo site_url("assets/themes/front/img/" . $this->config->item('logo')); ?>"
                            style="max-width: 55px;" /></i><?php echo strtoupper($this->config->item('nama')); ?></a>
                <?php if ($this->session->has_userdata('noprint') && $this->ion_auth->logged_in() && $this->ion_auth->in_group("daftarlangsung")) { ?>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="<?php echo site_url($this->session->userdata('noprint')); ?>"><i
                                class="material-icons left">print</i> Print Ulang</a></li>
                </ul>
                <?php } ?>
            </div>
        </div>
    </nav>
    <?php } ?>
    <?php if ($this->agent->is_mobile()) { ?>
    <header>
        <div class="navbar-fixed">
            <nav class="navbar indigo accent-2">
                <div class="container-fluid" style="padding: 5px 5px;">
                    <div class="nav-wrapper">
                        <a href="javascript:void(0);" class="brand-logo left"
                            style="font-size: 1.5rem;width:100%;position: unset;"><i><img
                                    class="img-responsive hide-on-med-and-down"
                                    src="<?php echo site_url("assets/themes/front/img/" . $this->config->item('logo')); ?>"
                                    style="max-width: 45px;" /></i>
                            <h1 class="center" style="font-size: 1.5rem;margin:0.67em 0;">
                                <?php echo strtoupper($this->config->item('nama')); ?></h1>
                        </a>

                    </div>
                </div>
            </nav>
        </div>
    </header>
    <?php } ?>
    <?php
	$bg = '';
	$mask = '';
	if ($this->config->item("bg")) {
		if (file_exists('./assets/uploads/images/' . $this->config->item("bg"))) {
			if (!$this->agent->is_mobile()) {
				$bg = ' style="background-image: url(\'./assets/uploads/images/' . $this->config->item("bg") . '\');background-position: center;background-repeat: no-repeat;background-size: cover;flex:1 0 auto;"';
				$mask = ' class="bgs"';
			}
		}
	}
	?>

    <main<?php echo $bg; ?>>
        <div<?php echo $mask; ?>>
            <?php echo $output ?>
            </div>
            </main>

            <?php if (!$this->agent->is_mobile()) { ?>
            <footer class="page-footer" style="padding-top: 0px;">
                <div class="footer-copyright">
                    <div class="container">
                        © 2018 Gloosoft
                    </div>
                </div>
            </footer>
            <?php } ?>


            <script src="<?php echo base_url(); ?>assets/themes/front/materialize/js/materialize.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/html2canvas.min.js"></script>


            <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function() {
                $('.preloader-background').delay(1700).fadeOut('slow');

                $('.preloader-wrapper')
                    .delay(1700)
                    .fadeOut();
            });

            $(document).ready(function() {
                $('.modal').modal();
            });
            </script>
</body>

</html>