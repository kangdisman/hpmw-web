<form class="form-horizontal" action="<?php echo base_url('admin/cabang/add'); ?>" method="POST">
    <input type="hidden" name="kd_cbg">
    <fieldset>
        <legend>Silahkan masukkan data cabang</legend>
        <?php if (validation_errors()) : ?>
        <div class="alert alert-block alert-wrong">
            <button type="button" class="close" data-dismiss="alert">
                <i class="icon-remove"></i>
            </button>
            <strong class="green">
                <?php echo validation_errors(); ?>  
            </strong>
        </div>
        <?php endif; ?>
        <div class="control-group">
            <label class="control-label">Kode Cabang</label>
            <div class="controls">
                <input name="kd_cbg" type="text" class="span2" placeholder="Input kode cbg">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Nama Cabang</label>
            <div class="controls">
                <input name="nama_cbg" type="text" class="span4" placeholder="Input nama cabang">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Alamat Cabang</label>
            <div class="controls">
                <input name="alamat_cbg" type="text" class="span7" placeholder="Input alamat cabang">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Tahun Berdiri</label>
            <div class="controls">
                <div class="row-fluid input-append">
                    <input class="span2 date-picker" id="id-date-picker-1" name="th_berdiri" type="text" placeholder="Tahun berdiri">
                    <span class="add-on">
                        <i class="icon-calendar"></i>    
                    </span>   
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn btn-primary">Tambah cabang</button>
                <button type="reset" class="btn" onclick="self.history.back()">Cancel</button>
            </div>
        </div>
    </fieldset>
</form>