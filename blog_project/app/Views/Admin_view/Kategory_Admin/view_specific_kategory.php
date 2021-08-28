<?= $this->extend('Dashboards/Dashboard_Admin') ?>
<?= $this->section('content_admin') ?>
<div class="text">

    <div class="row justify-content-center">
        <div class="col-md-6 mt-5 ms-5">
            <div class="card">
                <h2 class="card-header text-center">Data Kategori</h2>
                <div class="card-body">
                    <a href="<?= site_url('Admin/Kategory_A/read') ?>" class="btn btn-primary mb-3">Kembali ke Daftar</a>
                    <h3 class="text-center mb-5"><?= $kategory->nama ?></h3>
                    <p><?= $kategory->slug ?> adalah slugnya</p>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>