<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Medical</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('medical'); ?>">List Data</a></li>
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
                        <label for="medical_id" class="col-sm-2 col-form-label">Medical Id</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="medical_id" name="medical_id" value="<?= set_value('medical_id'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('medical_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="medical_date" class="col-sm-2 col-form-label">Medical Date</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" id="medical_date" name="medical_date" value=" <?= set_value('medical_date'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('medical_date') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="medical_diagnose" class="col-sm-2 col-form-label">Medical Diagnose</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="medical_diagnose" name="medical_diagnose" value="<?= set_value('medical_diagnose'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('medical_diagnose') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="medical_temperature" class="col-sm-2 col-form-label">Medical Temperature</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="medical_temperature" name="medical_temperature" value="<?= set_value('medical_temperature'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('medical_temperature') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="medical_blood_pressure" class="col-sm-2 col-form-label">Medical Blood Pressure</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="medical_blood_pressure" name="medical_blood_pressure" value="<?= set_value('medical_blood_pressure'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('medical_blood_pressure') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="medical_price" class="col-sm-2 col-form-label">Medical Price</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="medical_price" name="medical_price" value="<?= set_value('medical_price'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('medical_price') ?>
                            </small>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="medical_status" class="col-sm-2 col-form-label">Medical Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="medical_status" name="medical_status">
                                <option value="Sudah Diperiksa" selected disabled>Pilih</option>
                                <option value="Sudah Diperiksa" <?php if (set_value('medical_status') == "Sudah Diperiksa") : echo "selected"; endif; ?>>Sudah Diperiksa</option>
                                <option value="Belum Diperiksa" <?php if (set_value('medical_status') == "Belum Diperiksa") : echo "selected"; endif; ?>>Belum Diperiksa</option>
                                <option value="Sedang Diperiksa" <?php if (set_value('medical_status') == "Sedang Diperiksa") : echo "selected"; endif; ?>>Sedang Diperiksa</option>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('medical_status') ?>
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
                    <div class="form-group row">
                        <label for="action_id" class="col-sm-2 col-form-label">Action Id</label>
                        <div class="col-sm-5">
                        <select class="form-control" name="action_id" id="action_id">
                                <?php foreach ($data_action as $act) : ?>
                                    <option value="<?= $act['action_id'] ?>"><?= $act['action_id'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('action_id') ?>
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
<script>
    $('#action_id').change(function () {
        var action_id = $('#action_id').val();

        $.ajax({
            type: 'GET',
            url: 'http://localhost/Tubes_Pemrograman_KlinikFF_Fadil_Fahira/tbclinic_server/action/getharga?action_id='+action_id,
            beforeSend: function (xhr) {
                xhr.setRequestHeader ("Authorization", "Basic " + btoa("ulbi" + ":" + "pemrograman3"));
            },
            success: function (data) {
                $('#action_price').val(data.data.harga)
            }
        })
    })
</script>