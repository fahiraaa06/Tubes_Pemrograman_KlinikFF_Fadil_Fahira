<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Doctor</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('action'); ?>">List Data</a></li>
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
                    <div class="form-group row">
                        <label for="doctor_id" class="col-sm-2 col-form-label">Doctor Id</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="doctor_id" name="doctor_id" value=" <?= $data_doctor['doctor_id']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('doctor_id') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="doctor_name" class="col-sm-2 col-formlabel">Doctor Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="doctor_name" name="doctor_name" value=" <?= $data_doctor['doctor_name']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('doctor_name') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="doctor_address" class="col-sm-2 col-formlabel">Doctor Address</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="doctor_address" name="doctor_address" rows="3"><?= $data_doctor['doctor_address']; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('doctor_address') ?>
                            </small>
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Doctor Gender</legend>
                            <div class="col-sm-5">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="doctor_gender" name="doctor_gender" value="L" <?php if ($data_doctor['doctor_gender'] == "L") : echo "checked"; endif; ?>>
                                    <label class="form-check-label" for="doctor_gender">
                                        L
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="doctor_gender2" name="doctor_gender" value="P" <?php if ($data_doctor['doctor_gender'] == "P") : echo "checked"; endif; ?>>
                                    <label class="form-check-label" for="doctor_gender2">
                                        P
                                    </label>
                                </div>
                                <small class="text-danger">
                                    <?php echo form_error('doctor_gender') ?>
                                </small>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <label for="doctor_phone" class="col-sm-2 col-formlabel">Doctor Phone</label>
                        <div class="col-sm-5">
                            <textarea class="form-control" id="doctor_phone" name="doctor_phone" rows="3"><?= $data_doctor['doctor_phone']; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('doctor_phone') ?>
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