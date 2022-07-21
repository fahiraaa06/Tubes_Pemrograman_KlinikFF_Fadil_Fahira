<?php echo form_open('dokter/v_data');?>
<section class="konten mt-2">
    <div class="container-fluid">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">
                <?= $title; ?>

                <a href="http://localhost/rest_ci_client/index.php/dokter/create" class="btn btn-success btn-sm float-right">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama dokter</th>
                                <th>Spesialis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($datadokter as $dokter){
                                echo "<tr>
                                    <td>$dokter->id_dokter</td>
                                    <td>$dokter->nama_dokter</td>
                                    <td>$dokter->spesialis</td>
                                    <td>".anchor('dokter/edit/'.$dokter->id_dokter,'<button type="button" class="btn btn-warning btn-sm">Edit</button>')."
                                        ".anchor('dokter/delete/'.$dokter->id_dokter,'<button type="button" class="btn btn-danger btn-sm">Delete</button>')."</td>
                                    </tr>";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>   
<?php
echo form_close();
?>