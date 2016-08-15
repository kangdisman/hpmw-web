<form action="<?php echo base_url('alumni/add'); ?>" method="POST">
	<?php echo validation_errors(); ?>
	<table style="border: 1px dashed">
		<tr>
			<td>Nama Lengkap</td>
			<td><input type="text" name="nama" size="40" placeholder="Input nama anda"></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td><input type="radio" name="jk" value="pria" checked> Pria
				<input type="radio" name="jk" value="wanita"> Wanita</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><input type="text" name="alamat" size="50" placeholder="Input alamat"></td>
		</tr>
		<tr>
			<td>Universitas</td>
			<td><input type="text" name="kampus" size="20" placeholder="Input nama kampus"></td>
		</tr>
		<tr>
			<td>Kota</td>
			<td><input type="text" name="kota" size="15" placeholder="Input kota"></td>
		</tr>
		<tr>
			<td>Angkatan</td>
			<td><input type="text" name="angkatan" size="10" placeholder="Input angkatan"></td>
		</tr>
		<tr>
			<td>Pekarjaan</td>
			<td><input type="text" name="pekerjaan" size="60" placeholder="Input pekerjaan"></textarea></td>
		</tr>
		<tr>
			<td>Status</td>
			<td><input type="radio" name="status" value="kawin" checked> Kawin
				<input type="radio" name="status" value="belum kawin"> Belum Kawin</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" class="formbutton" value="Tambah data alumni"></td>
		</tr>
	</table> 
</form>