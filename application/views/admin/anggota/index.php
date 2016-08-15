<?php if ($this->session->flashdata('message')) : ?>
<div class="alert alert-block alert-success">
    <button type="button" class="close" data-dismiss="alert">
        <i class="icon-remove"></i>
    </button>
    <strong class="green">
        <?php
        $msg = $this->session->flashdata('message');
        echo $msg == '' ? '' : '<p id="message">' . $msg . '</p>';
        ?>  
    </strong>
</div>
<?php endif; ?>
<table class="table table-striped table-bordered bootstrap-datatable datatable">
	<thead>
		<tr>
			<th class="center">No</th>
			<th>ID</th>
			<th>Nama</th>
			<th>Gender</th>
			<th>Jurusan</th>
			<th>Angkatan</th>
			<th>Kampus</th>
			<th>Alamat Asal</th>
			<th>Alamat Sekarang</th>
			<th><a href="<?php echo base_url('admin/anggota/add') ?>"><button class="btn btn-success btn-small">Tambah anggota</button></a></th>
		</tr>
	</thead>
	<tbody>
	<?php
	$no = 1;
	foreach ($anggota as $row) : ?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo strtoupper($row->kd_cbg) ."-". $row->id_angg; ?></td>
		<td><?php echo $row->nama; ?></td>
		<td><?php echo $row->jk; ?></td>
		<td><?php echo $row->jurusan; ?></td>
		<td><?php echo $row->angkatan; ?></td>
		<td><?php echo $row->kampus; ?></td>
		<td><?php echo $row->alamat_asal; ?></td>
		<td><?php echo $row->alamat_skrg; ?></td>
		<td width="125">
			<a href="<?php echo base_url('admin/anggota/edit'); ?>/<?php echo $row->id_angg; ?>">
				<button class="btn btn-mini btn-info">
					<i class="icon-edit bigger-120"></i> Edit
				</button>
			</a>
			<a onclick="return confirm('Anda yakin akan menghapus data ini?')" href="<?php echo base_url('admin/anggota/hapus'); ?>/<?php echo $row->id_angg; ?>">
				<button class="btn btn-mini btn-danger">
					<i class="icon-trash bigger-120"></i> Delete
				</button>
			</a>
         </td>

		</tr>
	<?php 
	$no++; 
	endforeach; 
	?>
	</tbody>
</table>
<strong>Halaman : <?php echo $pagination; ?></strong>