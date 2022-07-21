<?php echo form_open('pasien/v_data');?>
<section class="konten mt-2">
    <div class="container-fluid">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">
                <?= $title; ?>

                <a href="http://localhost/rest_ci_client/index.php/pasien/create" class="btn btn-success btn-sm float-right">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Pasien</th>
                                <th>L/P</th>
                                <th>Umur</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($datapasien as $pasien){
                                echo "<tr>
                                    <td>$pasien->id_pasien</td>
                                    <td>$pasien->nama_pasien</td>
                                    <td>$pasien->jenis_kelamin</td>
                                    <td>$pasien->umur</td>
                                    <td>".anchor('pasien/edit/'.$pasien->id_pasien,'<button type="button" class="btn btn-warning btn-sm">Edit</button>')."
                                        ".anchor('pasien/delete/'.$pasien->id_pasien,'<button type="button" class="btn btn-danger btn-sm">Delete</button>')."</td>
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