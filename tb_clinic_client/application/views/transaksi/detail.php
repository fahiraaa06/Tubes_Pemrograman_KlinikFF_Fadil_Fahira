<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>transaksi</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('transaksi'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Transaksi
                </div>
                <?php
                foreach ($data_transaksi as $row) :
                ?>
                <div class="card-body">
                    <h5 class="card-title"><b>ID Transaksi :</b><br><?= $row['id_transaksi'] ?></h5>
                    <p class="card-text"><b>Nama :</b><br><?= $row['nama_pasien'] ?></p>
                    <p class="card-text"><b>Alamat :</b><br><?= $row['alamat'] ?></p>
                    <p class="card-text"><b>Deskripsi :</b><br><?= $row['deskripsi'] ?></p>
                    <p class="card-text"><b>No Telp :</b><br><?= $row['no_telp'] ?></p>
                    <p class="card-text"><b>Nama Obat :</b><br><?= $row['nama_obat'] ?></p>
                    <p class="card-text"><b>Harga :</b><br><?= $row['harga']?></p>
                    <p class="card-text"><b>Qty :</b><br><?= $row['qty']?></p>
                    <p class="card-text"><b>Status :</b><br><?= $row['status']?></p>
                    <p class="card-text"><b>Tanggal :</b><br><?= $row['tanggal']?></p>
                    <p class="card-text"><b>Total :</b><br><?= $row['total']?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>transaksi" class="btn btn-primary">Kembali</a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>