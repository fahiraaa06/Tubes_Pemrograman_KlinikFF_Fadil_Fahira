<div class="container pt-5" id="app">
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
                        <label for="registry_id" class="col-sm-2 col-form-label">Registry Id</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="registry_id" id="registry_id">
                                <?php foreach ($data_registry as $rgs) : ?>
                                    <option value="<?= $rgs['registry_id'] ?>"><?= $rgs['registry_id'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('registry_id') ?>
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
                            <input type="number" class="form-control" id="medical_price" name="medical_price">
                            <small class="text-danger">
                                <?php echo form_error('medical_price') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="action_id" class="col-sm-2 col-form-label">Tindakan</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="action_id" id="action_id">
                            <option value="">Silahkan Pilih Tindakan</option>
                                <?php foreach ($data_action as $act) : ?>
                                    <option value="<?= $act['action_id'] ?>"><?= $act['action_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('action_id') ?>
                            </small>
                        </div>
                    </div>

                        <div class="form-group row">
                            <label for="harga_aksi" class="col-sm-2 col-form-label">Harga Tindakan</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="harga_aksi" name="harga_aksi" value="" disabled>
                            </div>
                        </div>
                        
                        <a href="#" class="btn btn-primary" v-on:click="RecipeObat">coba vue</a href="#">
                        <div class="form-group row card border-success">
                            <div class="card-header bg-success text-white">
                                Resep Obat
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?= base_url('recipe'); ?>">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <select name="medicine" id="medicine" class="form-control">
                                                    <?php foreach ($data_medicine as $mdc) { ?>
                                                        <option value="<?= $mdc['medicine_id']; ?>"><?= $mdc['medicine_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-5">
                                                <label for="recipe_qty"> </label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="recipe_qty" name="recipe_qty" value="<?= set_value('recipe_qty'); ?>">
                                                    <small class="text-danger">
                                                        <?php echo form_error('recipe_qty') ?>
                                                    </small>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-success">+</button>
                                            </div>
                                        </div>

                                </form>

                                <hr>
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Obat</th>
                                            <th>Harga Obat</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="">

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
            url: 'http://localhost/Tubes_Pemrograman_KlinikFF_Fadil_Fahira/tbclinic_server/action/getharga?KEY=ulbi123&action_id'+action_id,
            beforeSend: function (xhr) {
                xhr.setRequestHeader ("Authorization", "Basic " + btoa("ulbi" + ":" + "pemrograman3"));
            },
            success: function (data) {
                $('#harga_aksi').val(data.data.action_price)
            }
        })
    })
</script>

<script src="<?= base_url('assets/vue.js'); ?>"></script>
<script>
    var app = new Vue({

        el: '#app',
        data: {
            tabledata: []
        },
        methods: {
            RecipeObat: function() {
                var medicine_id = $('#medicine').val()
                var recipe_qty = $('#recipe_qty').val()
                var recipe_total = 0
                var medicine_price = 0
                var fillTableData = []

                $.ajax({
                    type: 'GET',
                    url: 'http://localhost/Tubes_Pemrograman_KlinikFF_Fadil_Fahira/tbclinic_server/medicine/getharga?KEY=ulbi123&medicine_id=' + medicine_id,
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader("Authorization", "Basic " + btoa("ulbi" + ":" + "pemrograman3"));
                    },
                    success: function(data) {
                        medicine_price = data.data.medicine_price
                        recipe_total = recipe_qty * medicine_price
                        var obj = {
                            nama_obat: data.data.medicine_name,
                            harga_obat: medicine_price,
                            qty: recipe_qty,
                            total: recipe_total
                        }
                        fillTableData.push(obj)
                        console.log(fillTableData[0])
                    }

                })
                console.log(fillTableData[0])
            }
        }  
    })
</script>
