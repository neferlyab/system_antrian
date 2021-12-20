<?php if(!$this->ion_auth->is_admin()){;?>
<style type="text/css">
  .selesai{
     background-color: #6f5 !important;
  }
  .blmpanggil{
     background-color: #65f !important;
  }
  .fixed {position:fixed; top:0; left:0; z-index:9999; width:100%;}
</style>
 <div class="widget-box" style="border: 0px">
    <div class="widget-body">
      <div class="widget-main no-padding">
        <!-- <div class="dialogs ace-scroll"> -->
          <!-- <div class="dscroll-track dscroll-active" style="display: block; height: 400px;">
            <div class="dscroll-bar" style="height: 400px; top: 0px;"></div>
          </div> -->
          <!-- <div class="scroll-contentg" style="max-height: 470px;"> -->

                <div class="box box-solid">
                  <div class="box-body">
                    <div class="row">
                        <!-- <div class="col-md-4">
                          <div id="panganen"></div>
                        </div> -->
                        <div class="col-md-12">
                          <div class="widget-box" style="border: 0px;">
                            <div class="widget-header">
                              <h4 class="widget-title lighter smaller">
                                <i class="ace-icon fa fa-phone blue"></i>
                                Daftar Antrian
                              </h4>
                            </div>

                            <div class="widget-body">
                              <div id="task_flyout" class="alert" style="background: #F2F2F2;margin-bottom: 0px;font-size: 11px;">
                                Keterangan : </br>
                                <table class="table table-responsive table-condensed" cellpadding="5" cellspacing="0" border="0">
                                  <tr align="left" valign="top">
                                    <td><span class="label label-default" style="background: #6655ff;border: 1px solid#222;"> &nbsp;</span> Belum dipanggil</td>
                                    <td><span class="label label-default" style="background: #F6FF00;border: 1px solid#222;"> &nbsp;</span> Sedang dipanggil</td>
                                    <td><span class="label label-default" style="background: #66FF55;border: 1px solid#222;"> &nbsp;</span> Selesai Melayani</td>
                                  </tr>
                                </table>
                              </div>
                              <div style="height: auto;max-height:;overflow: hidden;">
                                <?php echo $output;?>
                              </div>
                            </div>
                          </div>
                          
                              <!-- <div class="widget-box" style="border: 0px;">
                                <div class="widget-header">
                                  <h4 class="smaller">List Antrian</h4>
                                </div>

                                <div class="widget-body">
                                  <div class="widget-main" style="padding: 0px;">
                                   <IFRAME src=<?php echo base_url('admin/multigrid/listAntrian');?> width="100%" frameborder="0" height="auto" style="padding: 0px;margin: 0px;"></IFRAME>
                                    <table class="table table-condensed table-bordered">
                                      <thead>
                                        <tr><th>No</th><th>No Antrian</th><th>Nama</th><th>Tujuan</th></tr>
                                      </thead>
                                    </table>
                                  </div>
                                </div>
                              </div> -->
                            
                        </div>
                    </div>
                  </div>
                </div>

          <!-- </div> -->
       <!--  </div> -->
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(window).scroll(function(){
      if ($(this).scrollTop() > 135) {
          $('#task_flyout').addClass('fixed').fadeIn();
      } else {
          $('#task_flyout').removeClass('fixed');
      }
  });
  </script>
<?php }?>

<?php if($this->ion_auth->is_admin()){;?>
	<div class="col-md-12 text-center">
		<h3>Selamat Datang Di System Administrator LPMP <?php echo strtolower($this->config->item('nama'));?></h3>	
	</div>
<?php } ?>