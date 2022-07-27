<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Medical</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('medical'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Medical
                </div>
                <div class="card-body">
                <?php foreach ($data_medical as $data_medical) : ?>
                    <h5 class="card-title"><b>Medical ID:</b><br><?=$data_medical['medical_id']?></h5>
                    <p class="card-text"><b>Medical Date:</b><br> <?=$data_medical['medical_date']?></p>
                    <p class="card-text"><b>Medical Diagnose:</b><br><?= $data_medical['medical_diagnose']?></p>
                    <p class="card-text"><b>Medical Temperature:</b><br><?= $data_medical['medical_temperature']?></p>
                    <p class="card-text"><b>Medical Blood Pressure:</b><br><?= $data_medical['medical_blood_pressure']?></p>
                    <p class="card-text"><b>Medical Price:</b><br><?= $data_medical['medical_price']?></p>
                    <p class="card-text"><b>Medical Status:</b><br><?= $data_medical['medical_status']?></p>
                    <p class="card-text"><b>Paetience ID:</b><br><?= $data_medical['patience_id']?></p>
                    <p class="card-text"><b>Paetience Name:</b><br><?= $data_medical['patience_name']?></p>
                    <p class="card-text"><b>Doctor ID:</b><br><?= $data_medical['doctor_id']?></p>
                    <p class="card-text"><b>Doctor Name:</b><br><?= $data_medical['doctor_name']?></p>
                    <p class="card-text"><b>Action ID:</b><br><?= $data_medical['action_id']?></p>
                    <p class="card-text"><b>Action Name:</b><br><?= $data_medical['action_name']?></p>
                    <p class="card-text"><b>Action Price:</b><br><?= $data_medical['action_price']?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>medical" class="btn btn-primary">Kembali</a>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>
