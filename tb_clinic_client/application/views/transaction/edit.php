<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Transaction</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('transaction'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes); ?>
                    <?php foreach ($data_transaction as $data_transaction) : ?>
                    <div class="form-group row">
                        <label for="transaction_id" class="col-sm-2 col-form-label">Transaction Id</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="transaction_id" name="transaction_id" value=" <?= $data_transaction['transaction_id']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('transaction_id') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="transaction_date" class="col-sm-2 col-formlabel">Transaction Date</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="transaction_date" name="transaction_date" value=" <?= $data_transaction['transaction_date']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('transaction_date') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="transaction_total" class="col-sm-2 col-formlabel">Transaction Total</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="transaction_total" name="transaction_total" value=" <?= $data_transaction['transaction_total']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('transaction_total') ?>
                            </small>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                    <label for="medical_id" class="col-sm-2 col-form-label">medical ID</label>
                    <div class="col-sm-5">
                            <select class="form-control" id="medical_id" name="medical_id">
                                <?php 
                                foreach ($data_medical as $row) :
                                ?>
                                <option value="<?= $row['medical_id'] ?>" <?php if ($data_transaction['medical_id'] == $row['medical_id']) : echo "selected"; endif; ?>> <?= $row['medical_id'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('medical_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="registry_id" class="col-sm-2 col-form-label">registry ID</label>
                    <div class="col-sm-5">
                            <select class="form-control" id="registry_id" name="registry_id">
                                <?php 
                                foreach ($data_registry as $row) :
                                ?>
                                <option value="<?= $row['registry_id'] ?>" <?php if ($data_transaction['registry_id'] == $row['registry_id']) : echo "selected"; endif; ?>> <?= $row['registry_id'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('registry_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="recipe_id" class="col-sm-2 col-form-label">recipe ID</label>
                    <div class="col-sm-5">
                            <select class="form-control" id="recipe_id" name="recipe_id">
                                <?php 
                                foreach ($data_recipe as $row) :
                                ?>
                                <option value="<?= $row['recipe_id'] ?>" <?php if ($data_transaction['recipe_id'] == $row['recipe_id']) : echo "selected"; endif; ?>> <?= $row['recipe_id'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('recipe_id') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>