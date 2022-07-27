<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Recipe</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('recipe'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Recipe
                </div>
                <div class="card-body">
                <?php foreach ($data_recipe as $data_recipe) : ?>
                    <h5 class="card-title"><b>Recipe ID:</b><br><?=$data_recipe['recipe_id']?></h5>
                    <p class="card-text"><b>Recipe Amount:</b><br> <?=$data_recipe['recipe_amount']?></p>
                    <p class="card-text"><b>Recipe Total:</b><br><?= $data_recipe['recipe_total']?></p>
                    <p class="card-text"><b>Medicine ID:</b><br><?= $data_recipe['medicine_id']?></p>
                    <p class="card-text"><b>Medical ID:</b><br><?= $data_recipe['medical_id']?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>recipe" class="btn btn-primary">Kembali</a>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>