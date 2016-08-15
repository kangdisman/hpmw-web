<?php 
if (empty($agenda)) {
    echo "Belum ada agenda untuk cabang ini. Silahkan login untuk memasukkan agenda kegiatan organisasi anda";
} else { ?>

<table width="100%">
    <tr>
        <th>No</th><th>Agenda</th><th>Tanggal</th><th>Tempat</th>
    </tr>
    <?php 
    $no = 1;
    foreach ($agenda as $row) : 
     ?>
        <tr>
            <td style="border: 1px dotted"><?= $no; ?></td>
            <td style="border: 1px dotted"><?= $row->agenda; ?></td>
            <td style="border: 1px dotted"><?= $row->tanggal; ?></td>
            <td style="border: 1px dotted"><?= $row->tempat; ?></td>
        </tr>
    <?php $no++;
    endforeach; ?>
</table>
<?php } ?>