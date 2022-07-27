<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Medical</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('medical'); ?>">List Data</a></li>
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
                    <?php foreach ($data_medical as $data_medical) : ?>
                    <div class="form-group row">
                        <label for="medical_id" class="col-sm-2 col-form-label">Medical Id</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="medical_id" name="medical_id" value=" <?= $data_medical['medical_id']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('medical_id') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="medical_date" class="col-sm-2 col-formlabel">Medical Date</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="medical_date" name="medical_date" value=" <?= $data_medical['medical_date']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('medical_date') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="medical_diagnose" class="col-sm-2 col-formlabel">Medical Diagnose</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="medical_diagnose" name="medical_diagnose" value=" <?= $data_medical['medical_diagnose']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('medical_diagnose') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="medical_temperature" class="col-sm-2 col-formlabel">Medical Temperature</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="medical_temperature" name="medical_temperature" value=" <?= $data_medical['medical_temperature']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('medical_temperature') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="medical_blood_pressure" class="col-sm-2 col-formlabel">Medical Blood Pressure</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="medical_blood_pressure" name="medical_blood_pressure" value=" <?= $data_medical['medical_blood_pressure']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('medical_blood_pressure') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="medical_price" class="col-sm-2 col-formlabel">Medical Price</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="medical_price" name="medical_price" value=" <?= $data_medical['medical_price']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('medical_price') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="medical_status" class="col-sm-2 col-formlabel">Medical Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="medical_status" name="medical_status">
                                <option value="Sudah Diperiksa" selected disabled>Pilih</option>
                                <option value="Sudah Diperiksa" <?php if ($data_medical['medical_status'] == "Sudah Diperiksa") : echo "selected"; endif; ?>>Sudah Diperiksa</option>
                                <option value="Belum Diperiksa" <?php if ($data_medical['medical_status'] == "Belum Diperiksa") : echo "selected"; endif; ?>>Belum Diperiksa</option>
                                <option value="Sedang Diperiksa" <?php if ($data_medical['medical_status'] == "Sedang Diperiksa") : echo "selected"; endif; ?>>Sedang Diperiksa</option>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('medical_status') ?>
                            </small>
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                    <label for="patience_id" class="col-sm-2 col-form-label">Patience ID</label>
                    <div class="col-sm-5">
                            <select class="form-control" id="patience_id" name="patience_id">
                                <?php 
                                foreach ($data_patience as $row) :
                                ?>
                                <option value="<?= $row['patience_id'] ?>" <?php if ($data_medical['patience_id'] == $row['patience_id']) : echo "selected"; endif; ?>> <?= $row['patience_id'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('patience_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="doctor_id" class="col-sm-2 col-form-label">Doctor ID</label>
                    <div class="col-sm-5">
                            <select class="form-control" id="doctor_id" name="doctor_id">
                                <?php 
                                foreach ($data_doctor as $row) :
                                ?>
                                <option value="<?= $row['doctor_id'] ?>" <?php if ($data_medical['doctor_id'] == $row['doctor_id']) : echo "selected"; endif; ?>> <?= $row['doctor_id'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('doctor_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="action_id" class="col-sm-2 col-form-label">Action ID</label>
                    <div class="col-sm-5">
                            <select class="form-control" id="action_id" name="action_id">
                                <?php 
                                foreach ($data_action as $row) :
                                ?>
                                <option value="<?= $row['action_id'] ?>" <?php if ($data_medical['action_id'] == $row['action_id']) : echo "selected"; endif; ?>> <?= $row['action_id'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('action_id') ?>
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