<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Medicine</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('medicine'); ?>">List Data</a></li>
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
                        <label for="medicine_id" class="col-sm-2 col-form-label">Medicine Id</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="medicine_id" name="medicine_id" value="<?= set_value('medicine_id'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('medicine_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="medicine_name" class="col-sm-2 col-form-label">Medicine Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="medicine_name" name="medicine_name" value=" <?= set_value('medicine_name'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('medicine_name') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="medicine_category" class="col-sm-2 col-form-label">Medicine Category</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="medicine_category" name="medicine_category" value=" <?= set_value('medicine_category'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('medicine_category') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="medicine_price" class="col-sm-2 col-form-label">Medicine Price</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="medicine_price" name="medicine_price" value=" <?= set_value('medicine_price'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('medicine_price') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
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