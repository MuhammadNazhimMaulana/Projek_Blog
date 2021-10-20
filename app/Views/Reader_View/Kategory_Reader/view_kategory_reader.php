<?= $this->extend('Dashboards/Dashboard_Reader') ?>
<?= $this->section('content_reader') ?>

<h1 class="text-center">Kategori</h1>

<!-- Awal Tampilan -->
<div class="konten clearfix">

    <!-- Konten Utama -->
<div class="konten-utama kategori">
        <h1 class="judul-postingan-baru">Postingan Baru</h1>

    <?php foreach ($kategory as $index => $kategories) :?>
        <div class="postingan">
            <img src="<?= base_url('General/images/Rhino.jpg')?>" class="gambar-postingan">
            <div class="preview-postingan">
                <h2><a href="<?= site_url('reader/categories/view/'. $kategories->id_kategory) ?>"><?= $kategories->nama_kategori ?></a></h2>
                <i class="far fa-user"> <?= $kategories->slug_kategori ?></i>
                &nbsp;
                <i class="fas fa-calendar-week"> <?= $kategories->created_at ?></i>
                <p class="preview-text"><?= $kategories->nama_kategori ?></p>
                <a href="<?= site_url('reader/categories/view/'. $kategories->id_kategory) ?>" class="btn-baca read-more">Read More</a>
            </div>
        </div>
        <?php endforeach ?>
    </div>
    <!-- Konten Utama -->

    <!-- Akhir Tampilan -->


              

<?= $this->endSection() ?>
