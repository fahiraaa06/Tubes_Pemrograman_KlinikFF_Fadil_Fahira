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
            <a class="btn btn-primary mb-2" href="<?= base_url('doctor/add') ?>">Tambah Data</a>
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
                        <table class="table table-striped table-bordered tablehover text-sm" id="tableDOCTOR">
                            <thead>
                                <tr class="table-primary">
                                    <th>DOCTOR ID</th>
                                    <th>DOCTOR NAME</th>
                                    <th>DOCTOR ADDRESS</th>
                                    <th>DOCTOR GENDER</th>
                                    <th>DOCTOR PHONE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data_doctor as $row) :
                                ?>
                                    <tr>
                                        <td><?= $row['doctor_id'] ?></td>
                                        <td><?= $row['doctor_name'] ?></td>
                                        <td><?= $row['doctor_address'] ?></td>
                                        <td><?= $row['doctor_gender'] ?></td>
                                        <td><?= $row['doctor_phone'] ?></td>
                                       
                                        <td>
                                            <a href="<?= base_url('doctor/detail/'.$row['doctor_id'] )?>" class="btn btn-primary btn-sm"><i class="fa fa-info"></i></a>
                                            <a href="<?= base_url('doctor/edit/'.$row['doctor_id'] )?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('doctor/delete/'.$row['doctor_id'] )?>" class="btn btn-danger btn-sm item-delete tombol-hapus"><i class="fa fa-trash"></i></a>
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
    $('#tableDOCTOR').DataTable();
</script>