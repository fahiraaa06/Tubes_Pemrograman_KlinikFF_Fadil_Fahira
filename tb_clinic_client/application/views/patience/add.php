<div class="container pt-5">
    <h3><?= $title ?></h3>
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
                        <label for="patience_id" class="col-sm-2 col-form-label">Patience Id</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="patience_id" name="patience_id" value="<?= set_value('patience_id'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('patience_id') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="patience_name" class="col-sm-2 col-form-label">Patience Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="patience_name" name="patience_name" value=" <?= set_value('patience_name'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('patience_name') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="patience_address" class="col-sm-2 col-form-label">Patience Address</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="patience_address" name="patience_address" rows="3"><?= set_value('patience_address'); ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('patience_address') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="patience_blood" class="col-sm-2 col-form-label">Patience Blood</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="patience_blood" name="patience_blood">
                                <option value="A" selected disabled>Pilih</option>
                                <option value="A" <?php if (set_value('patience_blood') == "A") : echo "selected"; endif; ?>>A</option>
                                <option value="B" <?php if (set_value('patience_blood') == "B") : echo "selected"; endif; ?>>B</option>
                                <option value="O" <?php if (set_value('patience_blood') == "O") : echo "selected"; endif; ?>>O</option>
                                <option value="AB" <?php if (set_value('patience_blood') == "AB") : echo "selected"; endif; ?>>AB</option>

                            </select>
                            <small class="text-danger">
                                <?php echo form_error('patience_blood') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="patience_age" class="col-sm-2 col-form-label">Patience Age</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" id="patience_age" name="patience_age" value=" <?= set_value('patience_age'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('patience_age') ?>
                            </small>
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Patience Gender</legend>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="patience_gender" name="patience_gender" value="L"
                                        <?php if (set_value('patience_gender') == "L") : echo "checked"; endif; ?>>
                                    <label class="form-check-label" for="patience_gender">
                                        L
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="doctor_gender2" name="patience_gender" value="P"
                                        <?php if (set_value('patience_gender') == "P") : echo "checked"; endif; ?>>
                                    <label class="form-check-label" for="doctor_gender2">
                                        P
                                    </label>
                                </div>
                                <small class="text-danger">
                                    <?php echo form_error('patience_gender') ?>
                                </small>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <label for="patience_phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="patience_phone" name="patience_phone" value="<?= set_value('patience_phone'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('patience_phone') ?>
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