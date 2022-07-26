<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Doctor</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('doctor'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Doctor
                </div>
                <div class="card-body">
                    <h5 class="card-title"><b>Doctor ID:</b><br><?=$data_doctor['doctor_id']?></h5>
                    <p class="card-text"><b>Doctor Name:</b><br> <?=$data_doctor['doctor_name']?></p>
                    <p class="card-text"><b>Doctor Address:</b><br><?= $data_doctor['doctor_address']?></p>
                    <p class="card-text"><b>Doctor Gender:</b><br><?= $data_doctor['doctor_gender']?></p>
                    <p class="card-text"><b>Doctor Phone:</b><br><?= $data_doctor['doctor_phone']?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>doctor" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>