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
<table id="sample-table-1" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th class="center">No</th>
            <th>Nama Cabang</th>
            <th>Alamat</th>
            <th>Tahun Berdiri</th>
            <th><a href="<?php echo base_url('admin/cabang/add'); ?>"><button class="btn btn-success btn-small">Tambah cabang</button></a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($cabang as $key => $row) :
        ?>
            <tr>
                <td class="center"><?php echo $no; ?></td>
                <td><?php echo $row->nama_cbg; ?></td>
                <td><?php echo $row->alamat_cbg; ?></td>
                <td><?php echo $row->th_berdiri; ?></td>
                <td><a href="<?php echo base_url('admin/cabang/edit'); ?>/<?php echo $row->kd_cbg; ?>">
                        <button class="btn btn-mini btn-info">
                            <i class="icon-edit bigger-120"></i> Edit
                        </button></a>
                    <a onclick="return confirm('Anda yakin akan menghapus data ini?')" href="<?php echo base_url('admin/cabang/hapus'); ?>/<?php echo $row->kd_cbg; ?>">
                        <button class="btn btn-mini btn-danger">
                            <i class="icon-trash bigger-120"></i> Delete
                        </button></a>
            </tr>
        <?php
        $no++;
        endforeach;
        ?>
    </tbody>
</table>