<?php foreach ($artikel as $row) : ?>
	<h3><a href="<?php echo base_url('artikel/readmore/' .$row->id_artikel); ?>"><?php echo $row->judul; ?></a></h3>
	<?php echo $row->date; ?>
	Author <strong><?php echo $row->full_name; ?></strong><hr>
	<p><?php echo word_limiter ($row->content, 40); ?> <?php echo anchor('artikel/readmore/' .$row->id_artikel, 'Readmore'); ?></p>
<?php endforeach; ?>