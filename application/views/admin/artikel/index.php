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
            <th>Judul</th>
            <th>Content</th>
            <th><a href="<?php echo base_url('admin/artikel/add'); ?>"><button class="btn btn-success btn-small">Tambah artikel</button></a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($artikel as $key => $row) :
        ?>
            <tr>
                <td class="center"><?php echo $no; ?></td>
                <td width="150"><?php echo $row->judul; ?></td>
                <td><?php echo word_limiter($row->content, 30); ?></td>
                <td width="125"><a href="<?php echo base_url('admin/artikel/edit'); ?>/<?php echo $row->id_artikel; ?>">
                        <button class="btn btn-mini btn-info">
                            <i class="icon-edit bigger-120"></i> Edit
                        </button></a>
                    <a onclick="return confirm('Anda yakin akan menghapus data ini?')" href="<?php echo base_url('admin/artikel/hapus'); ?>/<?php echo $row->id_artikel; ?>">
                        <button class="btn btn-mini btn-danger">
                            <i class="icon-trash bigger-120"></i> Delete
                        </button>
                    </a></td>
            </tr>
            <?php $no++; endforeach; ?>
    </tbody>
</table>
<strong>Halaman : <?php echo $pagination; ?></strong>