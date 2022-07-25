<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Transaksi</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('data_transaksi'); ?>">List Data</a></li>
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
                        <label for="id_transaksi" class="col-sm-2 col-form-label">ID TRANSAKSI</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" value="<?= set_value('id_transaksi'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_transaksi') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="id_pasien" class="col-sm-2 col-form-label">ID PASIEN</label>
                    <div class="col-sm-5">
                            <select class="form-control" id="id_pasien" name="id_pasien">
                               <option value="">Silahkan Pilih Nama Pasien</option>
                                <?php 
                                foreach ($nama_pasien as $row) :
                                ?>
                                <option value="<?= $row['id_pasien'] ?>"><?= $row['nama_pasien'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('id_pasien') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="id_obat" class="col-sm-2 col-form-label">ID OBAT</label>
                    <div class="col-sm-5">
                            <select class="form-control" id="id_obat" name="id_obat">
                            <option value="">Silahkan Pilih Nama Obat</option>
                                <?php 
                                foreach ($nama_obat as $row) :
                                ?>
                                <option value="<?= $row['id_obat'] ?>"><?= $row['nama_obat'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('id_obat') ?>
                            </small>
                        </div>
                    </div> 
                    
                    <div class="form-group row">
                        <label for="harga_obat" class="col-sm-2 col-form-label">HARGA OBAT</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" id="harga_obat" name="harga_obat" value="" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-2 col-form-label">TANGGAL</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value=" <?= set_value('tanggal'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('tanggal') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="qty" class="col-sm-2 col-form-label">QTY</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="qty" name="qty" value=" <?= set_value('qty'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('qty') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">STATUS</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="status" name="status">
                                <option value="Kembali" selected disabled>Pilih</option>
                                <option value="Pending" <?php if (set_value('status') == "Pending") : echo "selected"; endif; ?>>Pending</option>
                                <option value="Sukses" <?php if (set_value('status') == "Sukses") : echo "selected"; endif; ?>>Sukses</option>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('status') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="total" class="col-sm-2 col-form-label">TOTAL</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="total" name="total" value="<?= set_value('total'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('total') ?>
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
<script>
    $('#id_obat').change(function () {
        var id_obat = $('#id_obat').val();

        $.ajax({
            type: 'GET',
            url: 'http://localhost/ci_rest/obat/getharga?KEY=ulbi123&id_obat='+id_obat,
            beforeSend: function (xhr) {
                xhr.setRequestHeader ("Authorization", "Basic " + btoa("ulbi" + ":" + "pemrograman3"));
            },
            success: function (data) {
                $('#harga_obat').val(data.data.harga)
            }
        })
    })
</script>