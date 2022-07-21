<?php echo form_open_multipart('obat/create');?>
<section class="konten mt-2">
    <div class="container-fluid">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">
                <?= $title; ?>

                <a href="<?= base_url();?>" class="btn btn-warning btn-sm float-right">Kembali</a>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('obat/insert'); ?>
                    <input type="hidden" name="id" value="<?php echo form_input('id_obat');?>
                    <div class="form-group">
                        <label for="">Nama obat</label>
                        <?php echo form_input('nama_obat');?> 
                    </div>
    
                    <div class="form-group">
                        <label for="">Harga</label>
                      <?php echo form_input('harga');?>
                    </div>

                    <div class="form-group">
                    <?php echo form_submit('submit','Simpan');?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
echo form_close();
?>