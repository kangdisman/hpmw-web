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
            <th class="center">No</th><th>Nama</th><th>Pesan</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($pesan as $key => $row) :
        ?>
        <tr>
            <td class="center"><?php echo $no; ?></td>
            <td><?php echo $row->nama; ?></td>
            <td><?php echo $row->pesan; ?></td>
            <td width="125"><a onclick="return confirm('Anda yakin akan menghapus data ini?')" href="<?php echo base_url('admin/dashboard/hapus_pesan'); ?>/<?php echo $row->id_pesan; ?>">
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