<h3>Selamat datang</h3>
<p>Anda login sebagai <strong><?php echo $this->session->userdata('level'); ?> 
	<?php echo $this->session->userdata('full_name'); ?></strong></p>
<p>Aplikasi ini dikembangkan menggunakan framework codeigniter dan bootstrap css, dimaksudkan untuk
memudahkan Anda dalam memaintenance data-data organisasi <strong>(Himpunan Pelajar Mahasiswa Wapulaka)</strong>.
Dengan aplikasi ini Anda dapat memanajemen data anggota, data cabang, data user, data alumni, 
data agenda, dan data-data lain yang berhubungan dengan <strong>HPMW</strong>.</p>
<?php echo br(3); ?>
<p align="left"><h5><strong>Tanggal hari ini : <?php echo date("d-m-Y"); ?></strong></h5></p>