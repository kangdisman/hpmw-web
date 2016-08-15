<form class="form-horizontal" action="<?php echo base_url('admin/alumni/update'); ?>" method="POST">
	<input type="hidden" name="id" value="<?php echo $alumni['id']; ?>">
	<fieldset>
		<legend>Silahkan update data alumni</legend>
		<?php echo validation_errors(); ?>
		<div class="control-group">
			<label class="control-label">Nama Lengkap</label>
			<div class="controls">
				<input type="text" name="nama" class="span4" value="<?php echo $alumni['nama']; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Jenis Kelamin</label>
			<div class="controls">
				<?php 
				if ($alumni['jk'] == 'pria') { ?>
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
			<label class="control-label">Alamat</label>
			<div class="controls">
				<input type="text" name="alamat" class="span7" value="<?php echo $alumni['alamat']; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Kampus</label>
			<div class="controls">
				<input type="text" name="kampus" value="<?php echo $alumni['kampus']; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Kota</label>
			<div class="controls">
				<input type="text" name="kota" class="span4" value="<?php echo $alumni['kota']; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Angkatan</label>
			<div class="controls">
				<input type="text" name="angkatan" class="span2" value="<?php echo $alumni['angkatan']; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Pekerjaan</label>
			<div class="controls">
				<input type="text" name="pekerjaan" class="span5" value="<?php echo $alumni['pekerjaan']; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Status</label>
			<div class="controls">
				<?php 
				if ($alumni['status'] == 'kawin') { ?>
				<label class="radio">
					<input type="radio" name="status" value="kawin" checked="">
					<span class="lbl">Kawin</span>
				</label>
				<div style="clear:both"></div>
				<label class="radio">
					<input type="radio" name="status" value="belum kawin">
					<span class="lbl">Belum kawin</span>
				</label>
				<?php
				}
				else {
				?>
				<label class="radio">
					<input type="radio" name="status" value="kawin">
					<span class="lbl">Kawin</span>
				</label>
				<div style="clear:both"></div>
				<label class="radio">
					<input type="radio" name="status" value="belum kawin" checked="">
					<span class="lbl">Belum kawin</span>
				</label>
				<?php 
				}
				 ?>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-primary">Update data alumni</button>
			<button type="reset" class="btn" onclick="self.history.back()">Cancel</button>
		</div>
	</fieldset>
</form>