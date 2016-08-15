<form class="form-horizontal" action="<?php echo base_url('admin/alumni/add'); ?>" method="POST">
	<input type="hidden" name="id">
	<fieldset>
		<legend>Silahkan masukkan data alumni</legend>
		<?php if (validation_errors()) : ?>
		<div class="alert alert-block alert-wrong">
		    <button type="button" class="close" data-dismiss="alert">
		        <i class="icon-remove"></i>
		    </button>
		    <strong class="green">
		        <?php echo validation_errors();?>  
		    </strong>
		</div>
		<?php endif; ?>
		<div class="control-group">
			<label class="control-label">Nama Lengkap</label>
			<div class="controls">
				<input type="text" name="nama" class="span4" placeholder="Input nama lengkap">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Jenis Kelamin</label>
			<div class="controls">
				<label class="radio">
					<input type="radio" name="jk" value="pria" checked=""> 
					<span class="lbl">Pria</span>
				</label>
				<div style="clear:both"></div>
				<label class="radio">
					<input type="radio" name="jk" value="wanita">
					<span class="lbl">Wanita</span> 
				</label>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Alamat</label>
			<div class="controls">
				<input type="text" name="alamat" class="span7" placeholder="Input alamat">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Kampus</label>
			<div class="controls">
				<input type="text" name="kampus" placeholder="Input nama kampus">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Kota</label>
			<div class="controls">
				<input type="text" name="kota" class="span4" placeholder="Input kota">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Angkatan</label>
			<div class="controls">
				<input type="text" name="angkatan" class="span2" placeholder="Input angkatan">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Pekerjaan</label>
			<div class="controls">
				<input type="text" name="pekerjaan" class="span5" placeholder="Input pekerjaan">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Status</label>
			<div class="controls">
				<label class="radio">
					<input type="radio" name="status" value="kawin" checked="">
					<span class="lbl">Kawin</span> 
				</label>
				<div style="clear:both"></div>
				<label class="radio">
					<input type="radio" name="status" value="belum kawin">
					<span class="lbl">Belum kawin</span>
				</label>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-primary">Tambah data alumni</button>
			<button type="reset" class="btn" onclick="self.history.back()">Cancel</button>
		</div>
	</fieldset>
</form>