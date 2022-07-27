<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Transaction</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('transaction'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Transaction
                </div>
                <div class="card-body">
                <?php foreach ($data_transaction as $data_transaction) : ?>
                    <h5 class="card-title"><b>Transaction ID:</b><br><?=$data_transaction['transaction_id']?></h5>
                    <p class="card-text"><b>Transaction Date:</b><br> <?=$data_transaction['transaction_date']?></p>
                    <p class="card-text"><b>Transaction Total:</b><br><?= $data_transaction['transaction_total']?></p>               
                    <p class="card-text"><b>Medical ID:</b><br><?= $data_transaction['medical_id']?></p>
                    <p class="card-text"><b>Registry ID:</b><br><?= $data_transaction['registry_id']?></p>
                    <p class="card-text"><b>Recipe ID:</b><br><?= $data_transaction['recipe_id']?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>transaction" class="btn btn-primary">Kembali</a>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>
