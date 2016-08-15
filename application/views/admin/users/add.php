<form class="form-horizontal" action="<?php echo base_url('admin/users/add'); ?>" method="POST">
	<fieldset>
		<legend>Silahkan tambahkan user baru</legend>
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
			<label class="control-label">Username</label>
			<div class="controls">
				<input name="username" type="text" class="span3" placeholder="Input username">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Password</label>
			<div class="controls">
				<input name="password" type="password" class="span3" placeholder="Input password">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Nama Lengkap</label>
			<div class="controls">
				<input name="full_name" class="span5" type="text" placeholder="Input full name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" id="level">Level</label>
			<div class="controls">
				<select id="level" name="level">
					<option>-- Pilih Level --</option>
					<option>Administrator</option>
					<option>Operator</option>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" id="level">Login Cabang</label>
			<div class="controls">
				<select id="level" name="kd_cbg">
					<option>-- Pilih Cabang --</option>
					<?php foreach ($cabang as $key => $row) { ?>
					<option value='<?php echo $row->kd_cbg; ?>'><?php echo $row->nama_cbg; ?></option>
					<?php						
					} ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-primary">Tambah user</button>
				<button type="reset" class="btn" onclick="self.history.back()">Cancel</button>
			</div>
		</div>
	</fieldset>
</form>