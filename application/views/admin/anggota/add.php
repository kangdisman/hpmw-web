<form class="form-horizontal" action="<?php echo base_url('admin/anggota/add'); ?>" method="POST">
	<fieldset>
		<legend>Silahkan tambahkan data anggota organisasi anda</legend>
		<?php if (validation_errors()) : ?>
		<div class="alert alert-block alert-wrong">
            <button type="button" class="close" data-dismiss="alert">
                <i class="icon-remove"></i>
            </button>
            <strong class="green">
                <?php echo validation_errors(); ?>  
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
			<label class="control-label">Jurusan</label>
			<div class="controls">
				<input type="text" name="jurusan" class="span4" placeholder="Input jurusan">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Angkatan</label>
			<div class="controls">
				<input type="text" class="span2" name="angkatan" placeholder="Input angkatan">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Universitas</label>
			<div class="controls">
				<input type="text" name="kampus" class="span4" placeholder="Input nama universitas">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Alamat Asal</label>
			<div class="controls">
				<input type="text" name="alamat_asal" class="span7" placeholder="Input alamat asal">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Alamat Sekarang</label>
			<div class="controls">
				<input type="text" name="alamat_skrg" class="span7" placeholder="Input alamat sekarang">
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-primary">Tambah anggota</button>
			<button type="reset" class="btn" onclick="self.history.back()">Cancel</button>
		</div>
	</fieldset>
</form>