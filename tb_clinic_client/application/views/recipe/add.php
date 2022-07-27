<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Recipe</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('recipe'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>
                    <div class="form-group row">
                        <label for="recipe_id" class="col-sm-2 col-form-label">Recipe Id</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="recipe_id" name="recipe_id" value="<?= set_value('recipe_id'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('recipe_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="recipe_amount" class="col-sm-2 col-form-label">Amount</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="recipe_amount" name="recipe_amount" value=" <?= set_value('recipe_amount'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('recipe_amount') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="recipe_total" class="col-sm-2 col-form-label">Recipe Total</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="recipe_total" name="recipe_total" value="<?= set_value('recipe_total'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('recipe_total') ?>
                            </small>
                        </div>
                    </div>
            
                    <div class="form-group row">
                        <label for="medicine_id" class="col-sm-2 col-form-label">Medicine Id</label>
                        <div class="col-sm-5">
                        <select class="form-control" name="medicine_id" id="medicine_id">
                                <?php foreach ($data_medicine as $med) : ?>
                                    <option value="<?= $med['medicine_id'] ?>"><?= $med['medicine_id'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('medicine_id') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="medical_id" class="col-sm-2 col-form-label">Medical Id</label>
                        <div class="col-sm-5">
                        <select class="form-control" name="medical_id" id="medical_id">
                                <?php foreach ($data_medical as $cal) : ?>
                                    <option value="<?= $cal['medical_id'] ?>"><?= $cal['medical_id'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('medical_id') ?>
                            </small>
                        </div>
                    </div>
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>