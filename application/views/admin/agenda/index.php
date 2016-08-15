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
            <th>Agenda</th>
            <th>Tanggal</th>
            <th>Tempat</th>
            <th><a href="<?php echo base_url('admin/agenda/add'); ?>"><button class="btn btn-success btn-small">Tambah agenda</button></a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($agenda as $row) :
            ?>
            <tr>
                <td class="center"><?php echo $no; ?></td>
                <td><?php echo $row->agenda; ?></td>
                <td><?php echo $row->tanggal; ?></td>
                <td><?php echo $row->tempat; ?></td>
                <td><a href="<?php echo base_url('admin/agenda/edit'); ?>/<?php echo $row->id_agenda; ?>">
                        <button class="btn btn-mini btn-info">
                            <i class="icon-edit bigger-120"></i> Edit
                        </button></a>
                    <a onclick="return confirm('Anda yakin akan menghapus data ini?')" href="<?php echo base_url('admin/agenda/hapus'); ?>/<?php echo $row->id_agenda; ?>">
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