<?php foreach ($artikel as $row) : ?>
	<h3><a href="<?php echo base_url('artikel/index/'); ?>"><?php echo $row->judul; ?></a></h3>
	<?php echo $row->date; ?>
	Author <strong><?php echo $row->full_name; ?></strong><hr>
	<p><?php echo $row->content; ?></p>
	<p><?php echo anchor('artikel/index', 'Kembali'); ?></p>
<?php endforeach; ?>
<?php if(isset($comment)):?>
<h3>Komentar</h3>
<?php foreach ($comment as $row) : ?>
	<li>
		<h4><?php echo $row->nama; ?></h4><?php echo $row->date; ?>
		<p><?php echo $row->comment; ?></p>
	</li>
<?php endforeach; ?>
<?php endif;?>
<?php echo validation_errors();?>
<?php echo form_open("artikel/readmore");?>
<table style="border: 1px dashed">
	<input type="hidden" name="id_artikel" value="<?php echo $artikel[0]->id_artikel;?>">
	<tr>
		<td>Nama <span style="color: red">*</span></td><td><input type="text" name="nama" size="20"></td>
	</tr>
	<tr>
		<td>Email <span style="color: red">*</span></td><td><input type="text" name="email" size="30"></td>
	</tr>
	<tr>
		<td>Website</td><td><input type="text" name="url" size="50"></td>
	</tr>
	<tr>
		<td>Komentar <span style="color: red">*</span></td><td><textarea name="comment" id="comment" cols="60" rows="5"></textarea></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" class="formbutton" name="submit" value="Comment"></td>
	</tr>
</table>
<?php echo form_close();?>
<?= br(2); ?>