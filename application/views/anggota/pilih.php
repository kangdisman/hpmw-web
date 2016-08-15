<form action="<?php echo base_url('anggota/cabang/'); ?>" method="POST">
	<table width="100%">
		<tr>
			<td>
				<strong>Pilih cabang untuk menampilkan anggota</strong>
				<select id="kd_cbg" name="kd_cbg">
					<option>-- Pilih Cabang --</option>
					<?php foreach ($cabang as $row) { ?>
					<option value='<?php echo $row->kd_cbg; ?>'><?php echo $row->nama_cbg; ?></option>
					<?php						
					} ?>
				</select>
				<input class="formbutton" type="submit" value="Tampilkan" />
			</td>
		</tr>
	</table>	
</form>