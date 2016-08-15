<form class="form-horizontal" action="<?php echo base_url('admin/cabang/update'); ?>" method="POST">
	<input type="hidden" name="kd_cbg" value="<?php echo $cabang['kd_cbg']; ?>">
	<fieldset>
		<legend>Silahkan update data cabang</legend>
		<div class="control-group">
			<label class="control-label">Nama Cabang</label>
			<div class="controls">
				<input name="nama_cbg" type="text" class="span4" value="<?php echo $cabang['nama_cbg']; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Alamat Cabang</label>
			<div class="controls">
				<input name="alamat_cbg" type="text" class="span7" value="<?php echo $cabang['alamat_cbg']; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Tahun Berdiri</label>
			<div class="controls">
				<input name="th_berdiri" class="span3" type="text" value="<?php echo $cabang['th_berdiri']; ?>">
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-primary">Update cabang</button>
			<button type="submit" onclick="self.history.back()" class="btn">Cancel</button>
		</div>
	</fieldset>
</form>