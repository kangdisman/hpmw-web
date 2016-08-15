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
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th>Level</th>
            <th><a href="<?php echo base_url('admin/users/add'); ?>"><button class="btn btn-success btn-small">Tambah user</button></a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($users as $row) :
        ?>
            <tr>
                <td class="center"><?php echo $no; ?></td>
                <td><?php echo $row->username; ?></td>
                <td><?php echo $row->full_name; ?></td>
                <td><?php echo $row->level; ?></td>
                <td><a onclick="return confirm('Anda yakin akan menghapus data ini?')" href="<?php echo base_url('admin/users/hapus'); ?>/<?php echo $row->username; ?>">
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