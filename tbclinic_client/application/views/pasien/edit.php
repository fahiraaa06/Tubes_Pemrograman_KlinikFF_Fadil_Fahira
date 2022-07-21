<?php echo form_open('pasien/edit');?>
<?php echo form_hidden('id_pasien',$datapasien[0]->id_pasien);?>

<section class="konten mt-2">
    <div class="container-fluid">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">
                <?= $title; ?>

                <a href="<?= base_url();?>" class="btn btn-warning btn-sm float-right">Kembali</a>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('pasien/update'); ?>
                    <input type="hidden" name="id" value="<?php echo form_input('id_pasien');?>
                    <div class="form-group">
                        <label for="">Nama Pasien</label>
                        <?php echo form_input('nama_pasien');?> 
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="">
                            <option value="<?php echo form_input('jenis_kelamin');?></option>
                            <option value="L">L</option>
                            <option value="P">P</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Umur</label>
                      <?php echo form_input('umur');?>
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