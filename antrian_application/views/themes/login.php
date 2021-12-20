<html>

<head>
    <title>System Admin</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="icon" sizes="32x32" href="<?php echo site_url("assets/themes/front/img/logolpmp.jpg"); ?>">
    <link href="<?php echo base_url(); ?>assets/themes/admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/themes/admin/font-awesome/4.5.0/css/font-awesome.min.css"
        rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/themes/admin/css/fonts.googleapis.com.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/themes/admin/css/ace.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/themes/admin/css/ace-rtl.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/themes/front/virtual_keyboard/keyboard/css/keyboard-basic.css"
        rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/themes/front/virtual_keyboard/keyboard/docs/css/jquery-ui.min.css"
        rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/themes/front/js/jquery.min.js"></script>
    <script type="text/javascript"
        src="<?php echo base_url(); ?>assets/themes/front/virtual_keyboard/keyboard/js/jquery.keyboard.js"></script>
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
        $('#usr,#pwd').keyboard({
            layout: 'qwerty',
            usePreview: false,
            autoAccept: true,
            openOn: null,
            stayOpen: false,
            css: {
                // input & preview
                // "label-default" for a darker background
                // "light" for white text
                input: 'form-control input-sm dark',
                // keyboard container
                container: 'center-block well',
                // default state
                buttonDefault: 'btn btn-default',
                // hovered button
                buttonHover: 'btn-primary',
                // Action keys (e.g. Accept, Cancel, Tab, etc);
                // this replaces "actionClass" option
                buttonAction: 'active',
                // used when disabling the decimal button {dec}
                // when a decimal exists in the input area
                buttonDisabled: 'disabled'
            }
        });

        $('#btn-usr').click(function() {
            var kb = $('#usr').getkeyboard();
            if (kb.isOpen) {
                kb.close();
            } else {
                kb.reveal();
            }
        });
        $('#btn-pwd').click(function() {
            var kb = $('#pwd').getkeyboard();
            if (kb.isOpen) {
                kb.close();
            } else {
                kb.reveal();
            }
        });
    });
    </script>
</head>

<body class="login-layout light-login">
    <div class="text-right" style="padding: 10px 10px;position: fixed;right: 0px;cursor:pointer;"
        onclick="toggleFullScreen();"><span id="fullsc" class="glyphicon glyphicon-resize-full"></span></div>
    <div class="main-container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="login-container">
                        <div class="center">
                            <h1>
                                <img class="img-responsive center-block"
                                    src="<?php echo site_url("assets/themes/front/img/logolpmp.jpg"); ?>"
                                    style="display:inline;position: relative;height: auto;max-height: 50px;">
                                <span class="red"></span>
                                <span class="white" id="id-text2">LPMP BENGKULU</span>
                            </h1>
                            <h4 class="blue" id="id-company-text"><?php echo $message; ?></h4>
                        </div>

                        <div class="space-6"></div>

                        <div class="position-relative">
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header blue lighter bigger">
                                            <i class="ace-icon fa fa-user green"></i>
                                            Silakan Login Terlebih Dahulu
                                        </h4>

                                        <div class="space-6"></div>

                                        <?php echo form_open('admin-login-proc'); ?>
                                        <fieldset>
                                            <label class="block clearfix">
                                                <div class="input-group">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" class="form-control" placeholder="Username"
                                                            name="identity" autofocus="true" id="usr" />
                                                        <i class="ace-icon fa fa-user"></i>
                                                    </span>
                                                    <span class="input-group-addon" id="btn-usr">
                                                        <i class="fa fa-keyboard-o"></i>
                                                    </span>
                                                </div>
                                            </label>

                                            <label class="block clearfix">
                                                <div class="input-group">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="password" name="pass" class="form-control"
                                                            placeholder="Password" id="pwd" />
                                                        <i class="ace-icon fa fa-lock"></i>
                                                    </span>
                                                    <span class="input-group-addon" id="btn-pwd">
                                                        <i class="fa fa-keyboard-o"></i>
                                                    </span>
                                                </div>
                                            </label>


                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <label class="inline">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"> Remember Me</span>
                                                </label>

                                                <button type="submit"
                                                    class="width-35 pull-right btn btn-sm btn-primary">
                                                    <i class="ace-icon fa fa-key"></i>
                                                    <span class="bigger-110">Login</span>
                                                </button>
                                            </div>

                                            <div class="space-4"></div>
                                        </fieldset>
                                        </form>

                                        <div class="social-or-login center">
                                            <span class="bigger-110">++++++</span>
                                        </div>

                                        <div class="space-6"></div>
                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.login-box -->
                        </div><!-- /.position-relative -->
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.main-content -->
    </div><!-- /.main-container -->
</body>

</html>