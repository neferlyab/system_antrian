<br><br><br>
<p align="center"><a><img src='assets/themes/front/img/logo_twt.jpg' width='100' height='100' alt='logo'/> <a><img src='assets/themes/front/img/logo2.jpeg' width='100' height='100' alt='logo'/> <a><img src='assets/themes/front/img/logolpmp.jpg' width='100' height='100' alt='logo'/></a>
        </p>
<div class="col-lg-12">
    <h1 class="page-header" align="center" style="color:red;font-size: 50px;font-weight: bolder;">SILAKAN AMBIL ANTRIAN
    </h1>
</div>
<?php
if ($getbagian) {
    $warna = array('btn-success', 'btn-warning', 'btn-info', 'btn-danger', 'btn-primary');
    foreach ($getbagian as $k => $row) {
        echo '<div class="col-md-12 text-center" style="padding-bottom:10px;">
                  <a href="' . site_url('pendaftaran/ambilantrian/' . $row->code . '/' . $row->id_bagian . '/OL') . '"><button type="button" class="btn btn-lg ' . $warna[$k] . ' tombol-jenis">' . strtoupper("AMBIL NOMOR") . '</button></a>
                </div>';
    }
}
?>