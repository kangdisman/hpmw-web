<?php echo form_open_multipart('admin/dashboard/tambah_foto', array('method' => 'POST', 'class' => 'form-horizontal')); ?>
<!-- <form multipart method="POST" action="<?php// echo base_url('admin/dashboard/tambah_foto'); ?>" class="form-horizontal"> -->
	<input type="hidden" name="id">
	<fieldset>
		<legend>Silahkan tambahkan foto kegiatan organisasi anda</legend>
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
			<label class="control-label">Nama foto</label>
			<div class="controls">
				<input name="nama_foto" type="text" class="span4" placeholder="Nama foto">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Pilih foto</label>
			<div class="controls">
				<input name="foto" type="file">
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-primary">Tambah foto</button>
				<button type="reset" class="btn" onclick="self.history.back()">Cancel</button>
			</div>
		</div>
	</fieldset>
<?php echo form_close(); ?>