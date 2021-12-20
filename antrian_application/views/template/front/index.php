<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" sizes="32x32" href="<?php echo site_url("assets/themes/front/img/logolpmp.jpg"); ?>">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <script src="<?php echo base_url(); ?>assets/themes/front/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/front/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/clock.js"></script>
    <script type="text/javascript">
    function toggleFullScreen() {
        var doc = window.document;
        var docEl = doc.documentElement;

        var requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl
            .webkitRequestFullScreen || docEl.msRequestFullscreen;
        var cancelFullScreen = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc
            .msExitFullscreen;

        if (!doc.fullscreenElement && !doc.mozFullScreenElement && !doc.webkitFullscreenElement && !doc
            .msFullscreenElement) {
            document.getElementById("fullsc").className = "glyphicon glyphicon-resize-small";
            requestFullScreen.call(docEl);
        } else {
            document.getElementById("fullsc").className = "glyphicon glyphicon-resize-full";
            cancelFullScreen.call(doc);
        }
    }

    $(function() {
        setTimeout(function() {
            document.getElementById("tampilGanda").contentWindow.location.reload(true);
        }, 60000);
    });
    </script>
    <style type="text/css">
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: red;
        color: white;
        text-align: center;
        padding: 10px;
    }
    </style>
</head>

<body onLoad="tampilWaktu();">
    <div class="center-block">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="javascript:void(0);" style="padding: 0px 5px;">
                       
                        <a><img src='assets/themes/front/img/logo_twt.jpg' width='60' height='50' alt='logo'/> <a><img src='assets/themes/front/img/logo2.jpeg' width='60' height='50' alt='logo'/> <a><img src='assets/themes/front/img/logolpmp.jpg' width='60' height='50' alt='logo'/><a><font size="6"><b> LPMP PROVINSI BENGKULU</b></font></a>
                    </a>
                </div>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="javascript:void(0);" style="font-size: 36px;font-weight: bold;"><abbr
                                id="clock"></abbr></a></li>
                    <li><a href="javascript:void(0);"><span style="z-index: 100;" onclick="toggleFullScreen();"><span
                                    id="fullsc" class="glyphicon glyphicon-resize-full"></span></span></a></li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="col-lg-6 col-md-6 col-sm-6" style="padding:2px;">
                <div class="panel panel-success">
                    <div class="panel-heading" style="padding:8px;">
                        <div class="embed-responsive embed-responsive-16by9" style="min-height: 350px;">
                            <?php
                            function isConnected()
                            {
                                $connected = @fsockopen("www.google.com", 80);
                                if ($connected) {
                                    fclose($connected);
                                    return true;
                                }
                                return false;
                            }

                            $url = array();
                            if (count($getvideo)) {
                                foreach ($getvideo as $vid) {
                                    array_push($url, $vid->link);
                                }
                                $c = implode(',', array_slice($url, 1));
                                if (isConnected()) {
                                    echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/UrDgw4Z90zQ?playlist=UrDgw4Z90zQ&loop=1"> </iframe>';
                                } else {
                                    echo '<div class="jumbotron" style="display:inline !important;position:absolute;left:30%;top:30%;background:none;"><p>konten tidak ada</p></div>';
                                }
                            } else {
                                echo '<div class="jumbotron" style="display:inline !important;position:absolute;left:30%;top:30%;background:none;"><p>konten tidak ada</p></div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6" style="padding:2px;">
                <div class="panel panel-success">
                    <div class="panel-heading" style="padding:8px;">
                        <div class="embed-responsive embed-responsive-16by9" style="min-height: 350px;">
                            <iframe style="width:100%;overflow: hidden;height: 100%;"
                                src="<?php echo site_url("pages/view_informasi"); ?>" title="antrian rumah sakit"
                                frameborder="0" scrolling="no" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background: none;height: 270px;max-height: 300px;">
        <iframe id="tampilGanda" name="ganda" style="width:100%;overflow: hidden;height: 100%;"
            src="<?php echo site_url("pages/view_ganda"); ?>" title="antrian rumah sakit" frameborder="0" scrolling="no"
            allowfullscreen></iframe>
    </div>
</body>

</html>