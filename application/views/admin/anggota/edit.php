<form class="form-horizontal" action="<?php echo base_url('admin/anggota/update'); ?>" method="POST">
	<input type="hidden" name="id_angg" value="<?php echo $anggota['id_angg']; ?>">
	<fieldset>
		<legend>Silahkan update data anggota organisasi anda</legend>
		<div class="control-group">
			<label class="control-label">Id Anggota</label>
			<div class="controls">
				<input class="span2" type="text" name="id_angg" value="<?php echo $anggota['id_angg']; ?>" disabled="">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Nama Lengkap</label>
			<div class="controls">
				<input type="text" name="nama" class="span4" value="<?php echo $anggota['nama']; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Jenis Kelamin</label>
			<div class="controls">
				<?php 
				if ($anggota['jk'] == 'pria') { ?>

				<label class="radio">
					<input type="radio" name="jk" value="pria" checked="">
					<span class="lbl">Pria</span> 
				</label>
				<div style="clear:both"></div>
				<label class="radio">
					<input type="radio" name="jk" value="wanita">
					<span class="lbl">Wanita</span>
				</label>

				<?php
					
				}
				else { 
					?>
				<label class="radio">
					<input type="radio" name="jk" value="pria">
					<span class="lbl">Pria</span>
				</label>
				<div style="clear:both"></div>
				<label class="radio">
					<input type="radio" name="jk" value="wanita" checked="">
					<span class="lbl">Wanita</span>
				</label>

				<?php					
				}
				 ?>
				
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Jurusan</label>
			<div class="controls">
				<input type="text" name="jurusan" class="span4" value="<?php echo $anggota['jurusan']; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Angkatan</label>
			<div class="controls">
				<input class="span2" type="text" name="angkatan" value="<?php echo $anggota['angkatan']; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Universitas</label>
			<div class="controls">
				<input type="text" name="kampus" class="span4" value="<?php echo $anggota['kampus']; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Alamat Asal</label>
			<div class="controls">
				<input type="text" name="alamat_asal" class="span7" value="<?php echo $anggota['alamat_asal']; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Alamat Sekarang</label>
			<div class="controls">
				<input type="text" name="alamat_skrg" class="span7" value="<?php echo $anggota['alamat_skrg']; ?>">
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-primary">Update anggota</button>
			<button type="submit" onclick="self.history.back()" class="btn">Cancel</button>
		</div>
	</fieldset>
</form>