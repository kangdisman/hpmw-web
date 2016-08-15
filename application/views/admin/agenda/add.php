<form class="form-horizontal" action="<?php echo base_url('admin/agenda/add'); ?>" method="POST">
	<input type="hidden" name="id_agenda">
	<fieldset>
		<legend>Silahkan masukkan agenda organisasi anda</legend>
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
			<label class="control-label">Agenda</label>
			<div class="controls">
				<input name="agenda" type="text" class="span4" placeholder="Input agenda">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Tanggal</label>
			<div class="controls">
				<input name="tanggal" type="text" class="input-small datepicker" placeholder="Input tanggal">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Tempat</label>
			<div class="controls">
				<input name="tempat" class="span6" type="text" placeholder="Input tempat">
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-primary">Tambah agenda</button>
				<button type="reset" class="btn" onclick="self.history.back()">Cancel</button>
			</div>
		</div>
	</fieldset>
</form>