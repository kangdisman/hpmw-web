<strong><a href="<?php echo base_url('anggota/index'); ?>">Lihat anggota cabang lain</a></strong>
	<table width="100%">
	<tr>
		<th>No</th>
		<th>Nama Lengkap</th>
		<th>Jenis Kelamin</th>
		<th>Jurusan</th>
		<th>Angkatan</th>
		<th>Universitas</th>
	</tr>
		<?php 
		$no = 1;
		foreach ($anggota as $row) : 
		 ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $row->nama; ?></td>
			<td><?php echo $row->jk; ?></td>
			<td><?php echo $row->jurusan; ?></td>
			<td><?php echo $row->angkatan; ?></td>
			<td><?php echo $row->kampus; ?></td>
		</tr>
		<?php $no++; 
		endforeach; ?>
</table>