<div id="content">
    <div id="slider">
        <ul>       
        <?php foreach ($foto as $key => $row) : ?>
            <li><img src="<?php echo base_url('./foto/' .$row->foto); ?>"/></li>
        <?php endforeach; ?>         
        </ul>
    </div>
</div>
