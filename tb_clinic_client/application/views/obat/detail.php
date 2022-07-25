<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Obat</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('obat'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Obat
                </div>
                <div class="card-body">
                    <h5 class="card-title"><b>ID Obat :</b><br><?=$data_obat['id_obat']?></h5>
                    <p class="card-text"><b>Nama Obat :</b><br> <?=$data_obat['nama_obat']?></p>
                    <p class="card-text"><b>Deskripsi Obat :</b><br> <?=$data_obat['deskripsi']?></p>
                    <p class="card-text"><b>Apoteker :</b><br><?= $data_obat['pembuat_obat']?></p>
                    <p class="card-text"><b>Stok Obat :</b><br><?= $data_obat['stok_obat']?></p>
                    <p class="card-text"><b>Harga Obat :</b><br><?= $data_obat['harga']?></p>
                    <p class="card-text"><b>Kadaluarsa :</b><br><?= $data_obat['tanggal_kadaluarsa']?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>obat" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>