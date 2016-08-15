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
<table class="table table-striped table-bordered table-hover" id="sample-table-1">
    <thead>
        <tr>
            <th class="center">No</th>
            <th>Nama</th>
            <th>Jenis kelamin</th>
            <th>Alamat</th>
            <th>Kampus</th>
            <th>Angkatan</th>
            <th>Pekerjaan</th>
            <th>Status</th>
            <th><a href="<?php echo base_url('admin/alumni/add'); ?>"><button class="btn btn-success btn-small">Tambah alumni</button></a></th>
        </tr>
    </thead>
    <tbody>
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
                <td width="125"><a href="<?php echo base_url('admin/alumni/edit/'.$row->id); ?>">
                        <button class="btn btn-mini btn-info">
                            <i class="icon-edit bigger-120"></i> Edit
                        </button></a>
                    <a onclick="return confirm('Anda yakin akan menghapus data ini?')" href="<?php echo base_url('admin/alumni/hapus/'.$row->id); ?>">
                        <button class="btn btn-mini btn-danger">
                            <i class="icon-trash bigger-120"></i> Delete
                        </button>
                    </a></td>
            </tr>
            <?php 
            $no++; 
            endforeach; 
            ?>
    </tbody>
</table>
<strong>Halaman : <?php echo $pagination; ?></strong>