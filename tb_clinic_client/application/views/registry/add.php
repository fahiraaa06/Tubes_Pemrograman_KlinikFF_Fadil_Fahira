<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Registry</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('registry'); ?>">List Data</a></li>
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
                        <label for="registry_id" class="col-sm-2 col-form-label">Registry Id</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="registry_id" name="registry_id" value="<?= set_value('registry_id'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('registry_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="registry_date" class="col-sm-2 col-form-label">Registry Date</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" id="registry_date" name="registry_date" value=" <?= set_value('registry_date'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('registry_date') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="registry_time" class="col-sm-2 col-form-label">Registry Time</label>
                        <div class="col-sm-5">
                            <input type="time" class="form-control" id="registry_time" name="registry_time" value="<?= set_value('registry_time'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('registry_time') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="registry_price" class="col-sm-2 col-form-label">Registry Price</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="registry_price" name="registry_price" value="<?= set_value('registry_price'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('registry_price') ?>
                            </small>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="patience_id" class="col-sm-2 col-form-label">Patience Id</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="patience_id" id="patience_id">
                                <?php foreach ($data_patience as $ptc) : ?>
                                    <option value="<?= $ptc['patience_id'] ?>"><?= $ptc['patience_id'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('patience_id') ?>
                            </small>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="doctor_id" class="col-sm-2 col-form-label">Doctor Id</label>
                        <div class="col-sm-5">
                        <select class="form-control" name="doctor_id" id="doctor_id">
                                <?php foreach ($data_doctor as $dct) : ?>
                                    <option value="<?= $dct['doctor_id'] ?>"><?= $dct['doctor_id'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('doctor_id') ?>
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