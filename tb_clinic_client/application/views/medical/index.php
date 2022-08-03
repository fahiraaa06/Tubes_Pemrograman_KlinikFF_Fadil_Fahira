<div class="container pt-5">
    <h3><?= $title ?></h3>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Doctor</a></li>
            <li class="breadcrumb-item active" aria-current="page">List Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary mb-2" href="<?= base_url('medical/add') ?>">Tambah Data</a>
            <div mb-2>
                <!-- Menampilkan flash data (pesan saat data error)-->
                <?php if ($this->session->flashdata('message')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Error! <?= $this->session->flashdata('message'); ?>
                        <button type="button" class="close" data-dismiss="alert" arialabel="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered tablehover text-sm" id="tableMEDICAL">
                            <thead>
                                <tr class="table-primary">
                                    <th>MEDICAL ID</th>
                                    <th>MEDICAL DATE</th>
                                    <th>MEDICAL DIAGNOSE</th>
                                    <th>MEDICAL TEMPERATURE</th>
                                    <th>MEDICAL BLOOD PRESSURE</th>
                                    <th>MEDICAL PRICE</th>
                                    <th>MEDICAL STATUS</th>
                                    <th>REGISTRY ID</th>
                                    <th>ACTION ID</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data_medical as $row) :
                                ?>
                                    <tr>
                                        <td><?= $row['medical_id'] ?></td>
                                        <td><?= $row['medical_date'] ?></td>
                                        <td><?= $row['medical_diagnose'] ?></td>
                                        <td><?= $row['medical_temperature'] ?></td>
                                        <td><?= $row['medical_blood_pressure'] ?></td>
                                        <td><?= $row['medical_price'] ?></td>
                                        <td><?= $row['medical_status'] ?></td>
                                        <td><?= $row['registry_id'] ?></td>
                                        <td><?= $row['action_id'] ?></td>
                                       
                                        <td>
                                            <a href="<?= base_url('medical/detail/'.$row['medical_id'] )?>" class="btn btn-primary btn-sm"><i class="fa fa-info"></i></a>
                                            <a href="<?= base_url('medical/edit/'.$row['medical_id'] )?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('medical/delete/'.$row['medical_id'] )?>" class="btn btn-danger btn-sm item-delete tombol-hapus"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //menampilkan data ketabel dengan plugin datatables
    $('#tableMEDICAL').DataTable();
</script>