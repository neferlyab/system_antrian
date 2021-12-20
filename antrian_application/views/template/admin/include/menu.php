
<ul class="nav nav-list">
	<li class="">
		<a href="<?php echo site_url('admin/adminpages') ?>">
			<i class="menu-icon fa fa-tachometer"></i>
			<span class="menu-text"> Dashboard </span>
		</a>

		<b class="arrow"></b>
	</li>
	<?php
	if($this->ion_auth->logged_in() && $this->ion_auth->in_group('pendaftaran')){
		echo '<li class="">
			<a href="'.site_url('admin/Manage_antrian').'">
				<i class="menu-icon fa fa-list-alt"></i>
				<span class="menu-text"> List antrian per poli </span>
			</a>

			<b class="arrow"></b>
		</li>';
	}
	?>
	<!-- <li class="">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-list-alt"></i>
			<span class="menu-text"> Kategori </span>

			<b class="arrow fa fa-angle-down"></b>
		</a>
		<b class="arrow"></b>
		<ul class="submenu">
			<li class="">
				<a href="<?php echo site_url('admin/manage_kategori/berita') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Berita
				</a>

				<b class="arrow"></b>
			</li>
		</ul>
	</li>
	<li class="">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-image"></i>
			<span class="menu-text"> Galeri </span>

			<b class="arrow fa fa-angle-down"></b>
		</a>
		<b class="arrow"></b>
		<ul class="submenu">
			<li class="">
				<a href="<?php echo site_url('admin/manage_galeri/kategori') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Kategori Galeri
				</a>

				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?php echo site_url('admin/manage_galeri') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Galeri
				</a>

				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?php echo site_url('admin/manage_galeri/slider') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Slide
				</a>

				<b class="arrow"></b>
			</li>
		</ul>
	</li> -->
	<?php if($this->ion_auth->is_admin()){?>
	<li class="">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-folder"></i>
			<span class="menu-text"> Data Master </span>

			<b class="arrow fa fa-angle-down"></b>
		</a>
		<b class="arrow"></b>
		<ul class="submenu">
			<li class="">
				<a href="<?php echo site_url('admin/manage_master/bagian') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Bagian
				</a>

				<b class="arrow"></b>
			</li>
			<!-- <li class="">
				<a href="<?php echo site_url('admin/manage_master/dokter') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Dokter
				</a>

				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?php echo site_url('admin/manage_master/pasien') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Pasien
				</a>

				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?php echo site_url('admin/manage_master/pasien_baru') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Pasien Baru
				</a>

				<b class="arrow"></b>
			</li> -->
		</ul>
	</li>

	<li class="">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-cog"></i>
			<span class="menu-text"> Pengaturan </span>

			<b class="arrow fa fa-angle-down"></b>
		</a>
		<b class="arrow"></b>
		<ul class="submenu">
			<!-- <li class="">
				<a href="<?php echo site_url('admin/manage_konten/berita') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Berita
				</a>

				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?php echo site_url('admin/manage_konten/pengumuman') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Pengumuman
				</a>

				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?php echo site_url('admin/manage_konten/agenda') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Agenda
				</a>

				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?php echo site_url('admin/manage_konten/download') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					File
				</a>

				<b class="arrow"></b>
			</li> -->
			<!-- <li class="">
				<a href="<?php echo site_url('admin/manage_konten/halamanstatis') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Header
				</a>

				<b class="arrow"></b>
			</li> -->
			<li class="">
				<a href="<?php echo site_url('admin/manage_konten/perusahaan') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Lembaga
				</a>

				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?php echo site_url('admin/manage_konten/video') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Video
				</a>

				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?php echo site_url('admin/manage_konten/users') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					User
				</a>
				<b class="arrow"></b>
			</li>
			<!-- <li class="">
				<a href="<?php echo site_url('admin/manage_konten/bpjs') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					BPJS API
				</a>
				<b class="arrow"></b>
			</li> -->
		</ul>
	</li>
	<?php }?>
	<!-- <li class="">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-list-alt"></i>
			<span class="menu-text"> Manage Menu </span>
			<b class="arrow fa fa-angle-down"></b>
		</a>
		<b class="arrow"></b>
		<ul class="submenu">
			<li class="">
				<a href="<?php echo site_url('admin/manage_menu') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Top Menu
				</a>

				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?php echo site_url('admin/manage_menu/submenu') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Sub Menu
				</a>

				<b class="arrow"></b>
			</li>
		</ul>
	</li> -->
</ul><!-- /.nav-list -->
