<?= $this->extend('Dashboards/Dashboard_Reader') ?>
<?= $this->section('content_reader') ?>

<!-- Awal Tampilan -->
<div class="konten clearfix">

    <!-- Konten Utama -->
    <div class="konten-utama single">
        <h1 class="judul-postingan"><?= $post->judul_post ?></h1>

        <div class="konten-postingan">
            <p><?= $post->body ?></p>
        </div>

    </div>
    <!-- Konten Utama -->
    
    <div class="konten-sampingan single">
        <div class="section postingan-populer">
            <h2 class="judul-section">Postingan Popuker</h2>

            <?php foreach ($postingan as $index => $posts) :?>
                <div class="postingan clearfix">
                    <img src="<?= base_url('upload/Foto Blog/' . $posts->foto_blog)?>" class="gambar-postingan">
                    <a href="#" class="judul"><h4><?= $posts->judul_post ?></h4></a>
                </div>
            <?php endforeach ?>
        </div>
        
        <div class="section kategories">
            <h2 class="judul-section">Kategori</h2>
            <ul>
                <?php foreach ($kategory as $index => $kategories) :?>
                    <li><a href="<?= base_url('reader/categories/view/' . $kategories->id_kategory) ?>"><?= $kategories->nama_kategori ?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>

            <!-- Bagian Komentar -->
            <div class="section postingan-populer">
                <h2 class="judul-section">Daftar Komentar</h2>
    
                <?php foreach ($komentar as $index => $comments) :?>
                    <div class="postingan clearfix">
                        <img src="<?= base_url('General/images/Rhino.jpg')?>" class="gambar-postingan">
                        <a href="#" class="judul-komen"><?= $comments->isi_komentar ?></a>
                    </div>
                <?php endforeach ?>
            </div>

    </div>
        
</div>

    <!-- Akhir Tampilan -->


              

<?= $this->endSection() ?>
