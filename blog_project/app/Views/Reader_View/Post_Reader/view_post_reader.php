<?= $this->extend('Dashboards/Dashboard_Reader') ?>
<?= $this->section('content_reader') ?>
<?php 
$keyword = [
  'name' => 'keyword',
  'value' => $keyword,
  'placeholder' => 'Keyword Pencarian...',
  'class' => 'form-control',
  'type' => 'text'
];

$submit = [
  'name' => 'submit',
  'value' => 'Cari',
  'type' =>'submit',
  'class' => 'btn btn-outline-dark'
];

?>

<h1 class="text-center">Post</h1>

<!-- Awal Tampilan -->
<div class="konten clearfix">

    <!-- Konten Utama -->
<div class="konten-utama">
        <h1 class="judul-postingan-baru">Postingan Baru</h1>

    <?php foreach ($post as $index => $posts) :?>
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
        <div class="section pencarian">
            <h2 class="judul-section">Search</h2>
            
                <!-- Awal Searching -->
                <?= form_open('Admin/Post_A/read') ?>
                <div class="input-group mb-3 justify-content-center">
                    <div>
                        <?= form_input($keyword) ?>
                    </div>
                    <div>
                        <?= form_submit($submit) ?>
                    </div>
                </div>
                <?= form_close() ?>
                <!-- Akhir Searching -->
        </div>

        <div class="section kategories">
            <h2 class="judul-section">Kategori</h2>
            <ul>
                <?php foreach ($kategory as $index => $kategories) :?>
                    <li><a href="<?= site_url('Reader/Kategory_R/view/' . $kategories->id_kategory) ?>"><?= $kategories->nama_kategori ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
        
</div>
    <!-- Akhir Tampilan -->


              

<?= $this->endSection() ?>
