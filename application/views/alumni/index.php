<table>
	<tbody>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Gender</th>
			<th>Alamat</th>
			<th>Kampus</th>
			<th>Angkatan</th>
			<th>Pekerjaan</th>
			<th>Status</th>
		</tr>
		<?php 
		$no = 1;
		foreach ($alumni as $key => $row) : 
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $row->nama; ?></td>
			<td><?php echo $row->jk; ?></td>
			<td><?php echo $row->alamat; ?></td>
			<td><?php echo $row->kampus; ?></td>
			<td><?php echo $row->angkatan; ?></td>
			<td><?php echo $row->pekerjaan; ?></td>
			<td><?php echo $row->status; ?></td>
		</tr>
		<?php 
		$no++;
		endforeach;
		 ?>
	</tbody>
</table>
<?php echo $pagination; ?>