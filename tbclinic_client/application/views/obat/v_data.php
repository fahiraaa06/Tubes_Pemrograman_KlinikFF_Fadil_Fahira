<?php echo form_open('obat/v_data');?>
<section class="konten mt-2">
    <div class="container-fluid">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">
                <?= $title; ?>

                <a href="http://localhost/rest_ci_client/index.php/obat/create" class="btn btn-success btn-sm float-right">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama obat</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($dataobat as $obat){
                                echo "<tr>
                                    <td>$obat->id_obat</td>
                                    <td>$obat->nama_obat</td>
                                    <td>$obat->harga</td>
                                    <td>".anchor('obat/edit/'.$obat->id_obat,'<button type="button" class="btn btn-warning btn-sm">Edit</button>')."
                                        ".anchor('obat/delete/'.$obat->id_obat,'<button type="button" class="btn btn-danger btn-sm">Delete</button>')."</td>
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