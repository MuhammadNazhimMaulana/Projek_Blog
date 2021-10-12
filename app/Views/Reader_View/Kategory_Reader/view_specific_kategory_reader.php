<?= $this->extend('Dashboards/Dashboard_Reader') ?>
<?= $this->section('content_reader') ?>

<h1 class="text-center">Kategori</h1>

<!-- Awal Tampilan -->
<div class="konten clearfix">

    <!-- Konten Utama -->
<div class="konten-utama">
        <h1 class="judul-postingan-baru">Postingan Baru</h1>

    <?php foreach ($posting as $index => $posts) :?>
        <div class="postingan">
            <img src="<?= base_url('General/images/Rhino.jpg')?>" class="gambar-postingan">
            <div class="preview-postingan">
                <h2><a href="<?= site_url('Reader/Post_R/view/'. $posts->id_post) ?>"><?= $posts->judul_post ?></a></h2>
                <i class="far fa-user"> <?= $posts->nama ?></i>
                &nbsp;
                <i class="fas fa-calendar-week"> <?= $posts->created_at ?></i>
                <p class="preview-text"><?= $posts->summary ?></p>
                <a href="<?= site_url('Reader/Post_R/view/'. $posts->id_post) ?>" class="btn-baca read-more">Read More</a>
            </div>
        </div>
        <?php endforeach ?>
    </div>
    <!-- Konten Utama -->
    
    <div class="konten-sampingan">

        <div class="section kategories">
            <h2 class="judul-section">Kategori</h2>
            <ul>
                <?php foreach ($kategory_more as $index => $kategories) :?>
                    <li><a href="<?= base_url('reader/categories/view/' . $kategories->id_kategory) ?>"><?= $kategories->nama_kategori ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
        
</div>
    <!-- Akhir Tampilan -->


              

<?= $this->endSection() ?>
