<?php echo form_open('users/edit');?>
<?php echo form_hidden('id',$datausers[0]->id);?>

<section class="konten mt-2">
    <div class="container-fluid">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">
                <?= $title; ?>

                <a href="<?= base_url();?>" class="btn btn-warning btn-sm float-right">Kembali</a>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('users/update'); ?>
                    <div class="form-group">
                        <label for="">Username</label>
                        <?php echo form_input('username');?> 
                    </div>
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                      <?php echo form_input('nama_lengkap');?>
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                      <?php echo form_input('password');?>
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