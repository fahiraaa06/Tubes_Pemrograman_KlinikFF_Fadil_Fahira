<div class="container pt-5">
    <h3><?= $title ?></h3>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Transaksi</a></li>
            <li class="breadcrumb-item active" aria-current="page">List Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
              <a class="btn btn-primary mb-2" href="<?= base_url('transaksi/add') ?>">Tambah Data</a>
            <div mb-2>
                <!-- Menampilkan flash data (pesan saat data error)-->
                <?php if ($this->session->flashdata('message')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Error! <?= $this->session->flashdata('message'); ?>
                        <button type="button" class="close" data-dismiss="alert" arialabel="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered tablehover text-sm" id="tableMahasiswa">
                            <thead>
                                <tr class="table-primary">
                                    <th class="text-center">ID TRANSAKSI</th>
                                    <th class="text-center">NAMA PASIEN</th>
                                    <th class="text-center">NAMA OBAT</th>
                                    <th class="text-center">QTY</th>
                                    <th class="text-center">STATUS</th>
                                    <th class="text-center">TOTAL</th>
                                    <th class="text-center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data_transaksi as $row) :
                                ?>
                                    <tr>
                                        <td align="center"><?= $row['id_transaksi'] ?></td>
                                        <td><?= $row['nama_pasien'] ?></td>
                                        <td><?= $row['nama_obat'] ?></td>
                                        <td><?= $row['qty'] ?></td>
                                        <td><?= $row['status'] ?></td>
                                        <td><?= $row['total'] ?></td>
                                        <td align="center">
                                            <a href="<?= base_url('transaksi/detail/'.$row['id_transaksi'])?>" class="btn btn-primary btn-sm"><i class="fa fa-info"></i></a>
                                            <a href="<?= base_url('transaksi/delete/'.$row['id_transaksi'] )?>" class="btn btn-danger btn-sm item-delete tombol-hapus"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //menampilkan data ketabel dengan plugin datatables
    $('#tableMahasiswa').DataTable();
</script>