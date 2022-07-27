<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Registry</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('registry'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Registry
                </div>
                <div class="card-body">
                <?php foreach ($data_registry as $data_registry) : ?>
                    <h5 class="card-title"><b>Registry ID:</b><br><?=$data_registry['registry_id']?></h5>
                    <p class="card-text"><b>Registry Date:</b><br> <?=$data_registry['registry_date']?></p>
                    <p class="card-text"><b>Registry Time:</b><br><?= $data_registry['registry_time']?></p>
                    <p class="card-text"><b>Registry Price:</b><br><?= $data_registry['registry_price']?></p>
                    <p class="card-text"><b>Paetience ID:</b><br><?= $data_registry['patience_id']?></p>
                    <p class="card-text"><b>Paetience Name:</b><br><?= $data_registry['patience_name']?></p>
                    <p class="card-text"><b>Doctor ID:</b><br><?= $data_registry['doctor_id']?></p>
                    <p class="card-text"><b>Doctor Name:</b><br><?= $data_registry['doctor_name']?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>registry" class="btn btn-primary">Kembali</a>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>
