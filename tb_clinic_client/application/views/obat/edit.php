<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Obat</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('obat'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes); ?>
                    <div class="form-group row">
                        <label for="id_obat" class="col-sm-2 col-form-label">ID Obat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_obat" name="id_obat" value=" <?= $data_obat['id_obat']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('id_obat') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_obat" class="col-sm-2 col-formlabel">Nama Obat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat" value=" <?= $data_obat['nama_obat']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('nama_obat') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-formlabel">Deskripsi Obat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value=" <?= $data_obat['deskripsi']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('deskripsi') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pembuat_obat" class="col-sm-2 col-formlabel">Apoteker</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="pembuat_obat" name="pembuat_obat" rows="3"><?= $data_obat['pembuat_obat']; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('pembuat_obat') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok_obat" class="col-sm-2 col-formlabel">Stok</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="stok_obat" name="stok_obat" rows="3"><?= $data_obat['stok_obat']; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('stok_obat') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-formlabel">Harga Obat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="harga" name="harga" rows="3"><?= $data_obat['harga']; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('harga') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_kadaluarsa" class="col-sm-2 col-form-label">Kadaluarsa</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" value="<?= $data_obat['tanggal_kadaluarsa']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('tanggal_kadaluarsa') ?>
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