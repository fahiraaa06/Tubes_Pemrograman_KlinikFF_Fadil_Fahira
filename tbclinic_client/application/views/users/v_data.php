<?php echo form_open('pasien/v_data');?>
<section class="konten mt-2">
    <div class="container-fluid">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">
                <?= $title; ?>

                <a href="http://localhost/rest_ci_client/index.php/users/create" class="btn btn-success btn-sm float-right">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($datausers as $users){
                                echo "<tr>
                                <td>$users->username</td>
                                <td>$users->nama_lengkap</td>
                                    <td>".anchor('users/edit/'.$users->id,'<button type="button" class="btn btn-warning btn-sm">Edit</button>')."
                                        ".anchor('users/delete/'.$users->id,'<button type="button" class="btn btn-danger btn-sm">Delete</button>')."</td>
                                    </tr>";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
echo form_close();
?>