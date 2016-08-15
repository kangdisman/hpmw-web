<form class="form-horizontal" action="<?php echo base_url('admin/users/ubah_password'); ?>" method="POST">
	<fieldset>
		<legend>Silahkan ubah password anda</legend>
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
			<label class="control-label">Password sekarang</label>
			<div class="controls">
				<input name="curent_password" type="password" class="span3" placeholder="Input curent password">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Password baru</label>
			<div class="controls">
				<input name="new_password" type="password" class="span3" placeholder="Input new password">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Konfirmasi password</label>
			<div class="controls">
				<input name="confirm_password" type="password" class="span3" placeholder="Input confirm password">
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-primary">Ubah password</button>
				<button type="reset" class="btn" onclick="self.history.back()">Cancel</button>
			</div>
		</div>
	</fieldset>
</form>