<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Action</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('action'); ?>">List Data</a></li>
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
                        <label for="action_id" class="col-sm-2 col-form-label">Action Id</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="action_id" name="action_id" value="<?= set_value('action_id'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('action_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="action_name" class="col-sm-2 col-form-label">Action Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="action_name" name="action_name" value=" <?= set_value('action_name'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('action_name') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="action_price" class="col-sm-2 col-form-label">Action Price</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="action_price" name="action_price" value=" <?= set_value('action_price'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('action_price') ?>
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

