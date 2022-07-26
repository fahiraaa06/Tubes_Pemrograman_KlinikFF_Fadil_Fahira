<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Patience</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('patience'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Patience
                </div>
                <div class="card-body">
                    <h5 class="card-title"><b>Patience ID:</b><br><?=$data_patience['patience_id']?></h5>
                    <p class="card-text"><b>Patience Name:</b><br> <?=$data_patience['patience_name']?></p>
                    <p class="card-text"><b>Patience Address:</b><br><?= $data_patience['patience_address']?></p>
                    <p class="card-text"><b>Patience Blood:</b><br><?= $data_patience['patience_blood']?></p>
                    <p class="card-text"><b>Patience Age:</b><br><?= $data_patience['patience_age']?></p>
                    <p class="card-text"><b>Patience Gender:</b><br><?= $data_patience['patience_gender']?></p>
                    <p class="card-text"><b>Patience Phone:</b><br><?= $data_patience['patience_phone']?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>patience" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>