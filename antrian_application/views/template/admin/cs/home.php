<div class="row">
<div class="col-xs-12">
	<?php	
		$user 	= $this->ion_auth->user()->row();
		$warna 	= array('btn-success','btn-warning','btn-info','btn-danger','btn-primary');
		$getnomor = $this->antrian_model->getnomor($user->bagian,$user->kode_poli,NULL,(int)$user->loket);
		$poli = ($user->bagian == 'Poli' && $user->kode_poli==$getnomor['kodepoli']) ? $this->slug->post_slug($getnomor['nama']) : '';
  		if($getdokter){
  			$judul = $getdokter->namapoli;
  		}else{
  			$judul = 'Loket '. $user->bagian;
  		};
	?>
	<div class="panel panel-default">
        <div class="panel-heading" style="background-color: #88cb7b;">
          <h2 class="text-center"><strong> <?php echo ucwords($judul);?></strong></h2>
        </div>
        <div class="panel-body">
          <?php
				echo '<div class="col-xs-12" style="padding-bottom:10px;">';
				echo '<div class="alert alert-info text-center"><h4></h4></div>';
				if(count($getnomor) > 0){
					$antrian =  $getnomor['noantrian'];
					$idantrian =  $getnomor['id'];
					echo '<div class="text-antrian" id="nomorantrian">'.$antrian.'</div>';
						echo '<input type="hidden" value="'.$antrian.'" id="nomor">';
						$tcounter = $antrian;
						$panjang  = strlen($tcounter);
						$antrian  = $tcounter;
						for($i=0;$i<$panjang;$i++){
						?>
						<audio id="<?php echo $antrian.''.$i; ?>" src="<?php echo base_url();?>assets/rekaman/<?php echo substr($tcounter,$i,1); ?>.mp3" ></audio>
						<?php
						}
					echo '<center><button class="btn btn-block btn-lg blink_text" id="tombolpintas" data-nomor="'.$antrian.'-'.$user->bagian.'-'.$idantrian.'-'.$poli.'" onclick="mulai($(this).data(\'nomor\'));"><h4 style="margin:4px;">Panggil ke '.$user->bagian.'</h4></button></center>';
				}else{
					echo '<div class="text-antrian" id="nomorantrian">000</div>';
					echo '<center><button class="btn btn-danger btn-block btn-lg" disabled><h4 style="margin:4px;">Menunggu Antrian</h4></button></center>';
				}
				echo '</div>';
          ?>
          
          <div class="col-xs-12" style="padding-top: 10px;">
          	<?php
          		if($getulangan){
	          		$poliulang = ($user->bagian == 'Poli' && $user->kode_poli==$getulangan->kodepoli) ? $this->slug->post_slug($getulangan->nama) : '';
	          	}
          		$non1 = ($getulangan) ? '' : 'disabled';
          		$btn1 = ($getulangan) ? 'Selesai Melayani nomor <strong>'.$getulangan->noantrian.'</strong>' : 'Selesai melayani';
          		
          	?>
	          <button class="btn btn-block btn-flat btn-success" id="tombolselesaimelayani" data-nomor="<?php echo ($getulangan) ? (int) $getulangan->id : '';?>" onclick="selesaiLayanan($(this).data('nomor'),true);" <?php echo $non1.'>'.$btn1;?></button>
	      </div>

          <div class="col-xs-12" style="padding-top: 10px;">
          	<?php
          		$non = ($getulangan) ? '' : 'disabled';
          		$btn = ($getulangan) ? 'Panggil Ulang Nomor <strong>'.$getulangan->noantrian.'</strong>' : 'Panggilan ulang belum tersedia';
          		
          	?>
	          <button class="btn btn-block btn-flat btn-primary" id="tombolpintasulang" data-nomor="<?php echo ($getulangan) ? $getulangan->noantrian.'-'.$user->bagian.'-'.$getulangan->id.'-'.$poliulang : '';?>" onclick="mulai($(this).data('nomor'));" <?php echo $non.'>'.$btn;?></button>
	      </div>
        </div>
			
		<div class="panel-footer text-center" style="background-color: #e38a18;padding: 20px;">
			<div class="row">
			<?php
				echo '<div class="col-xs-6">';
				echo '<strong>Sisa antrian : '.$this->antrian_model->antrianloket($user->kode_poli,$user->loket,$user->bagian).'</strong>';
				echo '</div>';
		 	?>
			</div>
		</div>
	</div>
</div>
</div>