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
            <th>Titel</th>
            <th>Profil</th>
            <th><a href="add_profil"><button class="btn btn-success btn-small">Tambah profil</button></a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($profil as $key => $row) :
        ?>
        <tr>
            <td class="center"><?php echo $no; ?></td>
            <td width="170"><?php echo $row->judul; ?></td>
            <td><?php echo word_limiter($row->profil, 50); ?></td>
            <td width="120"><a href="<?php echo base_url('admin/dashboard/edit_profil'); ?>/<?php echo $row->id; ?>">
                    <button class="btn btn-mini btn-info">
                        <i class="icon-edit bigger-120"></i> Edit
                    </button></a>
        </tr>
        <?php
        $no++;
        endforeach;
        ?>
    </tbody>
</table>