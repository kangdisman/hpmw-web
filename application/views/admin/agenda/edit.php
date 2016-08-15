<form class="form-horizontal" action="<?php echo base_url('admin/agenda/update'); ?>" method="POST">
	<input type="hidden" name="id_agenda" value="<?php echo $agenda['id_agenda']; ?>">
	<fieldset>
		<legend>Silahkan update agenda organisasi anda</legend>
		<div class="control-group">
			<label class="control-label">Agenda</label>
			<div class="controls">
				<input name="agenda" type="text" class="span4" value="<?php echo $agenda['agenda']; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Tanggal</label>
			<div class="controls">
				<input name="tanggal" type="text" class="input-small datepicker" value="<?php echo $agenda['tanggal']; ?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Tempat</label>
			<div class="controls">
				<input name="tempat" class="span6" type="text" value="<?php echo $agenda['tempat']; ?>">
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-primary">Update agenda</button>
				<button type="reset" class="btn" onclick="self.history.back()">Cancel</button>
			</div>
		</div>
	</fieldset>
</form>
