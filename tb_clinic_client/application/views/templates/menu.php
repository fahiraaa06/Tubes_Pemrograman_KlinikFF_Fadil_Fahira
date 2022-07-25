<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">Rest Client - PEMROGRAMAN III</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('pasien'); ?>">Pasien</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('obat'); ?>">Obat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('transaksi'); ?>">Transaksi</a>
            </li>
        </ul>
    </div>
</nav>