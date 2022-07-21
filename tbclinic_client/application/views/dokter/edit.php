<?php echo form_open('dokter/edit');?>
<?php echo form_hidden('id_dokter',$datadokter[0]->id_dokter);?>

<section class="konten mt-2">
    <div class="container-fluid">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">
                <?= $title; ?>

                <a href="<?= base_url();?>" class="btn btn-warning btn-sm float-right">Kembali</a>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('dokter/update'); ?>
                    <input type="hidden" name="id" value="<?php echo form_input('id_dokter');?>
                    <div class="form-group">
                        <label for="">Nama dokter</label>
                        <?php echo form_input('nama_dokter');?> 
                    </div>
                   
                    <div class="form-group">
                        <label for="">Spesialis</label>
                      <?php echo form_input('spesialis');?>
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