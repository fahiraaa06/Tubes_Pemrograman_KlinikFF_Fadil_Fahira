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
                <a class="nav-link" href="<?= base_url('action'); ?>">Action</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('doctor'); ?>">Doctor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('medicine'); ?>">Medicine</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('patience'); ?>">Patience</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('medical'); ?>">Medical</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('recipe'); ?>">Recipe</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('registry'); ?>">Registry</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('transaction'); ?>">Transaction Belum</a>
            </li>
        </ul>
    </div>
</nav>