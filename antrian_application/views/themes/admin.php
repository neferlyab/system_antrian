<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title><?php echo $titles ?></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="icon" sizes="32x32" href="<?php echo site_url("assets/themes/front/img/logolpmp.jpg"); ?>">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/admin/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/themes/admin/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/admin/css/fonts.googleapis.com.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/admin/css/ace.min.css"
        class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/admin/css/ace-skins.min.css" />
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
    <?php
    if ($meta)
        foreach ($meta as $name => $content) {
            echo "\n"; ?>
    <meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
                                                                            }
                                                                        echo "\n";

                                                                        if ($canonical) {
                                                                            echo "\n"; ?>
    <link rel="canonical" href="<?php echo $canonical ?>" /><?php
                                                                        }
                                                                        echo "\n";
                                                                        foreach ($css as $file) {
                                                                            echo "\n"; ?>
    <link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
                                                                            }
                                                                            echo "\n";

                                                                            if (isset($css_files)) {
                                                                                foreach ($css_files as $file) : ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach;
                                                                            }
    ?>

    <script src="<?php echo base_url(); ?>assets/themes/admin/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
    function mulai(idnya, ulang = false) {
        $('button').prop('disabled', true);
        clearTimeout(timer);
        var res = idnya.split("-");
        var polik = res[3].toString();
        var idantrian = res[2].toString();
        var bagian = res[1].toString();
        var nomor = res[0].toString();
        var bagi = (bagian == 'Poli') ? polik : bagian;

        if (ulang == false) {
            var data = {
                bagiane: bagian,
                loket: polik,
                nomor: nomor,
                idantrian: idantrian
            };
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('admin/admin_antrian/saveAntrianLog') ?>",
                data: data,
                dataType: 'json',
                success: function(hasil) {
                    if (hasil.status) {
                        toast(hasil.msg);
                        //location.reload();
                    } else {
                        toast(hasil.msg);
                    }
                },
                error: function() {
                    location.reload();
                }
            });
        } else {
            location.reload();
        }

        /*document.getElementById('suarabel').play();
			    document.getElementById('suarabel').volume = 0.4;
			    document.getElementById('suarabel').addEventListener('ended', function() {
			    
			    document.getElementById('suarabelnomorurut').play();
			    document.getElementById('suarabelnomorurut').addEventListener('ended', function() {
			          var audioElement = document.createElement('audio');
			          audioElement.setAttribute('src', '<?php echo base_url(); ?>assets/rekaman/'+nomor.substr(0,1)+'.mp3');
			          audioElement.play();
			          audioElement.addEventListener('ended', function() {
			              var audioElementt = document.createElement('audio');
			              audioElementt.setAttribute('src', '<?php echo base_url(); ?>assets/rekaman/'+nomor.substr(1,1)+'.mp3');
			              audioElementt.play();
			              audioElementt.addEventListener('ended', function() {
			                var audioElementtt = document.createElement('audio');
			                audioElementtt.setAttribute('src', '<?php echo base_url(); ?>assets/rekaman/'+nomor.substr(2,1)+'.mp3');
			                audioElementtt.play();
			                audioElementtt.addEventListener('ended', function() {
			                  var audioElementttt = document.createElement('audio');
			                  audioElementttt.setAttribute('src', '<?php echo base_url(); ?>assets/rekaman/'+nomor.substr(3,1)+'.mp3');
			                  audioElementttt.play();
			                  audioElementttt.addEventListener('ended', function() {
			                    var audioElementtttlo = document.createElement('audio');
			                    audioElementtttlo.setAttribute('src', '<?php echo base_url(); ?>assets/rekaman/silahkanmenuju.mp3');
			                    audioElementtttlo.play();
			                    audioElementtttlo.addEventListener('ended', function() {
			                      
			                      var xx = document.getElementById('suarabell');
			                      var audioEl = document.createElement("audio");
								  audioEl.setAttribute('src','<?php echo base_url(); ?>assets/rekaman/'+ bagi +'.mp3');
								  xx.appendChild(audioEl);
								   audioEl.play();

			                      audioEl.addEventListener('ended', function() {
		                          	if(ulang==false){
			                          	var data = {loket:bagian,nomor:nomor,idantrian:idantrian};
				                        $.ajax({
				                          type: "POST",
				                          url : "<?php echo site_url('admin/admin_antrian/updateloket') ?>",
				                          data: data,
				                          success: function(){
				                            location.reload();
				                          },
				                          error:function(){
				                          	location.reload();
				                          }
				                        });
				                    }else{
				                    	location.reload();
				                    }
			                      });
			                  });
			                });
			              });
			            });
			          });
			        });
			    });*/
    }

    function ngantrilek() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url() ?>admin/admin_antrian/tellerpanggil",
            success: function(response) {
                $('#panganen').html(response);
                timer = setTimeout("ngantrilek()", 1000);
            }
        });
    }

    function toast(msg) {
        var x = document.getElementById("snackbar");
        x.innerHTML = msg;
        x.className = "show";
        setTimeout(function() {
            x.className = x.className.replace("show", "");
        }, 3000);
    }

    function selesaiLayanan(id) {
        $.ajax({
            url: '<?php echo site_url("selesai-layanan"); ?>',
            type: 'post',
            data: {
                idantrian: id
            },
            dataType: 'json',
            async: false,
            success: function(data, status) {
                toast(data.msg);
                //location.reload();
            },
            error: function(j, r, e) {
                alert(JSON.stringify(j));
            }
        })
    }

    $(document).keydown(function(e) {
        var p1 = $('#tombolpintas').data('nomor'),
            p2 = $('#tombolpintasulang').data('nomor'),
            p3 = $('#tombolselesaimelayani').data('nomor');

        if (e.key == 'Enter' && p1) {
            mulai(p1);
        }
        if (e.key == 'F9' && p2) {
            mulai(p2);
        }
        if (e.key == 'F2' && p3) {
            selesaiLayanan(p3);
        }
    });

    $(function() {

        ngantrilek();

    });
    </script>
    <script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write(
        "<script src='<?php echo base_url(); ?>assets/themes/admin/js/jquery.mobile.custom.min.js'>" + "<" +
        "/script>");
    </script>
    <script src="<?php echo base_url(); ?>assets/themes/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/admin/js/ace-elements.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/admin/js/ace.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/admin/js/jquery.PrintArea.js"></script>

    <script src="<?php echo base_url(); ?>assets/themes/admin/js/ace-extra.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>


    <?php
    if (isset($css_files)) {
        foreach ($js_files as $file) : ?>
    <script src="<?php echo $file; ?>"></script>
    <?php endforeach;
    }
    ?>
    <?php
    foreach ($js as $file) {
        echo "\n"; ?>
    <script src="<?php echo $file; ?>"></script>
    <?php
    }
    echo "\n";
    ?>
    <script type="text/javascript">
    $(function() {
        //setInterval(function(){ $('.ajax_refresh_and_loading').closest('.flexigrid').find('.filtering_form').trigger('submit');},5000);
        $('.image-thumbnail').fancybox({
            transitionIn: 'elastic',
            transitionOut: 'elastic',
            speedIn: 600,
            speedOut: 200,
            overlayShow: true,
            centerOnScroll: true,
            hideOnOverlayClick: true,
            hideOnContentClick: true,
            overlayColor: '#222',
            showCloseButton: false,
        });

        //$('#field-judul').colorpicker();
        //alert('ffff');
    });
    </script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-2950920904635085",
        enable_page_level_ads: true
    });
    </script>
</head>

<body class="skin-1">
    <!-- <?php if (!$this->ion_auth->is_admin()) { ?>
		<div id="top-menu" class="modal aside aside-top aside-hz aside-fixed aside-dark" data-fixed="true" data-placement="top" data-background="true" data-backdrop="invisible" tabindex="-1" style="display: block; position: fixed; padding-right: 15px;">
			<div class="modal-dialog">
				<div class="modal-content ace-scroll"><div class="scroll-track scroll-white no-track idle-hide" style="display: none; height: 123px;"><div class="scroll-bar" style="top: 0px; height: 70px;"></div></div>
					<div class="scroll-content" style="">
						<div class="modal-body container">
                            <div class="widget-body">
                              <div class="widget-main">
                              <div class="itemdiv dialogdiv">
                                <div class="user">
                                  <i class="fa fa-arrow-right"></i>
                                </div>
                                <div class="body">
                                  <div class="text">
                                              Klik satu kali untuk satu kali panggilan...
                                          </div>
                                        </div>
                                    </div>
                                    <div class="itemdiv dialogdiv">
                                        <div class="user">
                                  <i class="fa fa-arrow-right"></i>
                                </div>
                                        <div class="body">
                                  <div class="text">
                                              Tombol Pintasan pada keyboard : 
                                              <ul>
                                                <li>Tombol <strong>Enter</strong> Sebagai pintasan panggilan</li>
                                                <li>Tombol <strong>F2</strong> Sebagai pintasan selesai melayani</li>
                                                <li>Tombol <strong>F9</strong> Sebagai pintasan panggilan Ulang</li>
                                              </ul>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
						</div>
					</div>
				</div>

				<button class="btn btn-inverse btn-app btn-xs ace-settings-btn aside-trigger" data-target="#top-menu" data-toggle="modal" type="button">
					<i data-icon1="fa-chevron-down" data-icon2="fa-chevron-up" class="ace-icon fa-chevron-down fa bigger-110 icon-only"></i>
				</button>
			</div>
		</div>
		<?php }  ?> -->



    <div id="navbar" class="navbar navbar-default ace-save-state navbar-fixed-top">
        <div class="navbar-container ace-save-state" id="navbar-container">
            <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-header pull-left">
                <a href="javascript:void(0);" class="navbar-brand">
                    <small>
                        <img class="img-responsive center-block"
                            src="<?php echo site_url("assets/themes/front/img/logolpmp.jpg"); ?>"
                            style="display:inline;position: relative;height: auto;max-height: 25px;">
                        <!-- <i class="fa fa-leaf"></i> -->
                        <?php echo ucfirst("LPMP BENGKUlU"); ?>
                    </small>
                </a>
            </div>

            <div class="navbar-buttons navbar-header pull-right" role="navigation">
                <?php echo $this->load->get_section('navbar'); ?>
            </div>
        </div><!-- /.navbar-container -->
    </div>

    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
        try {
            ace.settings.loadState('main-container')
        } catch (e) {}
        </script>
        <div id="sidebar" class="sidebar  responsive ace-save-state sidebar-fixed sidebar-scroll menu-min">
            <?php echo $this->load->get_section('menu'); ?>
            <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
                    data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
            </div>
        </div>

        <div class="main-content">
            <div class="main-content-inner">
                <div class="page-content" style="padding-bottom: 8px;">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <?php echo $output; ?>
                            <!-- PAGE CONTENT ENDS -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.page-content -->
            </div>
        </div><!-- /.main-content -->

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
        <div id="snackbar"></div>
    </div><!-- /.main-container -->

    <audio id="suarabel" src="<?php echo base_url(); ?>assets/rekaman/Airport_Bell.mp3"></audio>
    <audio id="suarabelnomorurut" src="<?php echo base_url(); ?>assets/rekaman/nomor-urut.wav"></audio>
    <!-- <audio id="suarabelsuarabelloket" src="<?php echo base_url(); ?>assets/rekaman/loket.wav"  ></audio> -->
    <audio id="belas" src="<?php echo base_url(); ?>assets/rekaman/belas.wav"></audio>
    <audio id="sebelas" src="<?php echo base_url(); ?>assets/rekaman/sebelas.wav"></audio>
    <audio id="puluh" src="<?php echo base_url(); ?>assets/rekaman/puluh.wav"></audio>
    <audio id="sepuluh" src="<?php echo base_url(); ?>assets/rekaman/sepuluh.wav"></audio>
    <audio id="ratus" src="<?php echo base_url(); ?>assets/rekaman/ratus.wav"></audio>
    <audio id="seratus" src="<?php echo base_url(); ?>assets/rekaman/seratus.wav"></audio>

    <audio id="suarabelloketPendaftaran" src="<?php echo base_url(); ?>assets/rekaman/Pendaftaran.mp3"></audio>
    <audio id="suarabelloketPoli" src=""></audio>
    <div id="suarabell"></div>
</body>

</html>