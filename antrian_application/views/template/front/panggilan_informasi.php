<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" sizes="32x32" href="<?php echo site_url("assets/themes/front/img/logo2.jpeg"); ?>">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo base_url(); ?>assets/themes/front/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/themes/front/js/jquery.min.js"></script>
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
    var timers;

    function getNoantrian() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>pages/getnoantrian_pelayanan",
            dataType: 'json',
            async: true,
            cache: false,
            success: function(data) {
                if (data.status) {
                    $('#tnoantrian').text(data.datane.nomor);
                    $('#judulbagian').text(data.datane.nama.toUpperCase());
                    $('#tmenujuke').text('Ke Loket ' + data.datane.loket);
                    if (data.identitas) {
                        mulai(data.datane.nomor + '-' + data.datane.bagian + '-' + data.datane.id + '-' +
                            data.datane.loket + '-' + data.datane.iduser);
                    } else {
                        timers = setTimeout("getNoantrian()", 2000);
                    }
                } else {
                    timers = setTimeout("getNoantrian()", 2000);
                }
            },
            error: function(j, r, e) {
                location.reload();
            }
        });
    }

    $(function() {
        getNoantrian();
    });


    function mulai(idnya, ulang = false) {
        var res = idnya.split("-");
        var idun = res[4].toString();
        var polik = res[3].toString();
        var idantrian = res[2].toString();
        var bagian = res[1].toString();
        var nomor = res[0].toString();
        var bagi = polik; //(bagian=='Poli') ? polik : bagian;

        var xx = document.getElementById('suarabell');
        var xxx = document.getElementsByClassName('suarabele');
        var audioEl = document.createElement("audio");
        audioEl.setAttribute('src', '<?php echo base_url(); ?>assets/rekaman/Airport_Bell_pendek.mp3');
        xx.appendChild(audioEl);
        audioEl.play();
        audioEl.volume = 0.4;

        audioEl.addEventListener('ended', function() {
            var aunoUrut = document.createElement("audio");
            aunoUrut.setAttribute('src', '<?php echo base_url(); ?>assets/rekaman/nomor-urut.wav');
            xx.appendChild(aunoUrut);
            aunoUrut.play();

            aunoUrut.addEventListener('ended', function() {

                var audioElement = document.createElement('audio');
                audioElement.setAttribute('src', '<?php echo base_url(); ?>assets/rekaman/' + nomor
                    .substr(0, 1) + '.mp3');
                xx.appendChild(audioElement);
                audioElement.play();
                audioElement.addEventListener('ended', function() {
                    var audioElementt = document.createElement('audio');
                    audioElementt.setAttribute('src',
                        '<?php echo base_url(); ?>assets/rekaman/' + nomor.substr(1, 1) +
                        '.mp3');
                    xx.appendChild(audioElementt);
                    audioElementt.play();
                    audioElementt.addEventListener('ended', function() {
                        var audioElementtt = document.createElement('audio');
                        audioElementtt.setAttribute('src',
                            '<?php echo base_url(); ?>assets/rekaman/' + nomor
                            .substr(2, 1) + '.mp3');
                        xx.appendChild(audioElementtt);
                        audioElementtt.play();
                        audioElementtt.addEventListener('ended', function() {
                            var audioElementttt = document.createElement(
                                'audio');
                            audioElementttt.setAttribute('src',
                                '<?php echo base_url(); ?>assets/rekaman/' +
                                nomor.substr(3, 1) + '.mp3');
                            xx.appendChild(audioElementttt);
                            audioElementttt.play();
                            if (nomor.length == 5) {
                                audioElementttt.addEventListener('ended',
                                    function() {
                                        var audioElementtttlanjut = document
                                            .createElement('audio');
                                        audioElementtttlanjut.setAttribute(
                                            'src',
                                            '<?php echo base_url(); ?>assets/rekaman/' +
                                            nomor.substr(4, 1) + '.mp3');
                                        xx.appendChild(
                                            audioElementtttlanjut);
                                        audioElementtttlanjut.play();


                                        audioElementtttlanjut
                                            .addEventListener('ended',
                                                function() {
                                                    var audioElementtttlo =
                                                        document
                                                        .createElement(
                                                            'audio');
                                                    audioElementtttlo
                                                        .setAttribute('src',
                                                            '<?php echo base_url(); ?>assets/rekaman/keloket.mp3'
                                                        );
                                                    xx.appendChild(
                                                        audioElementtttlo
                                                    );
                                                    audioElementtttlo
                                                        .play();
                                                    audioElementtttlo
                                                        .addEventListener(
                                                            'ended',
                                                            function() {
                                                                var audioElbag =
                                                                    document
                                                                    .createElement(
                                                                        "audio"
                                                                    );
                                                                audioElbag
                                                                    .setAttribute(
                                                                        'src',
                                                                        '<?php echo base_url(); ?>assets/rekaman/' +
                                                                        polik +
                                                                        '.mp3'
                                                                    );
                                                                xx.appendChild(
                                                                    audioElbag
                                                                );
                                                                audioElbag
                                                                    .play();

                                                                audioElbag
                                                                    .addEventListener(
                                                                        'ended',
                                                                        function() {
                                                                            if (ulang ==
                                                                                false
                                                                            ) {
                                                                                var data = {
                                                                                    loket: polik,
                                                                                    nomor: nomor,
                                                                                    idantrian: idantrian,
                                                                                    un: idun
                                                                                };
                                                                                $.ajax({
                                                                                    type: "POST",
                                                                                    url: "<?php echo site_url('pages/updateLoket'); ?>",
                                                                                    data: data,
                                                                                    success: function() {
                                                                                        location
                                                                                            .reload();
                                                                                        var iframes =
                                                                                            parent
                                                                                            .document
                                                                                            .getElementById(
                                                                                                "tampilGanda"
                                                                                            );
                                                                                        iframes
                                                                                            .contentWindow
                                                                                            .location
                                                                                            .reload(
                                                                                                true
                                                                                            );
                                                                                    },
                                                                                    error: function() {
                                                                                        location
                                                                                            .reload();
                                                                                    }
                                                                                });
                                                                            } else {
                                                                                location
                                                                                    .reload();
                                                                            }
                                                                        });
                                                            });
                                                });


                                    });
                            } else {

                                audioElementttt.addEventListener('ended',
                                    function() {
                                        var audioElementtttlo = document
                                            .createElement('audio');
                                        audioElementtttlo.setAttribute(
                                            'src',
                                            '<?php echo base_url(); ?>assets/rekaman/keloket.mp3'
                                        );
                                        xx.appendChild(audioElementtttlo);
                                        audioElementtttlo.play();
                                        audioElementtttlo.addEventListener(
                                            'ended',
                                            function() {
                                                var audioElbag =
                                                    document
                                                    .createElement(
                                                        "audio");
                                                audioElbag.setAttribute(
                                                    'src',
                                                    '<?php echo base_url(); ?>assets/rekaman/' +
                                                    polik + '.mp3');
                                                xx.appendChild(
                                                    audioElbag);
                                                audioElbag.play();

                                                audioElbag
                                                    .addEventListener(
                                                        'ended',
                                                        function() {
                                                            if (ulang ==
                                                                false) {
                                                                var data = {
                                                                    loket: polik,
                                                                    nomor: nomor,
                                                                    idantrian: idantrian,
                                                                    un: idun
                                                                };
                                                                $.ajax({
                                                                    type: "POST",
                                                                    url: "<?php echo site_url('pages/updateLoket'); ?>",
                                                                    data: data,
                                                                    success: function() {
                                                                        location
                                                                            .reload();
                                                                        var iframes =
                                                                            parent
                                                                            .document
                                                                            .getElementById(
                                                                                "tampilGanda"
                                                                            );
                                                                        iframes
                                                                            .contentWindow
                                                                            .location
                                                                            .reload(
                                                                                true
                                                                            );
                                                                    },
                                                                    error: function() {
                                                                        location
                                                                            .reload();
                                                                    }
                                                                });
                                                            } else {
                                                                location
                                                                    .reload();
                                                            }
                                                        });
                                            });
                                    });

                            }

                        });
                    });
                });
            });
        });
    }
    </script>
</head>

<body>
    <div id="suarabell"></div>
    <div class="suarabele"></div>

    <div class="panel panel-default" style="height: 100%;border-radius: 0;">
        <div class="panel-heading bg-info" style="padding: 5px 0px;height: 23%;border-radius: 0;">
            <h1 align="center" id="judulbagian">NOMOR ANTRIAN</h1>
        </div>
        <div class="panel-body" style="background: #737730;">
            <div class="text-tutup" id="tnoantrian"
                style="line-height: 1.5em;font-size: 90px;color:yellow;height: 54%;text-shadow:-1px -1px 0 #222, 2px -1px 0 #222,-1px 2px 0 #222,3px 3px 0 #222;">
                000</div>
            <span><strong>&nbsp;</strong></span>
        </div>
        <div class="panel-footer bg-info" style="padding: 2px;margin:0px;height: 23%;">
            <h1 align="center" id="tmenujuke" style="font-size: 24px;">Ke </h1>
        </div>
    </div>
</body>

</html>