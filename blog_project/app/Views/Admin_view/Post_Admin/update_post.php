<?= $this->extend('Dashboards/Dashboard_Admin') ?>
<?= $this->section('content_admin') ?>
<?php
    
    $id_kategory = [
        'name' => 'id_kategory',
        'id' => 'id_kategory',
        'options' => $daftar_kategory,
        'class' => 'form-control',
        'selected' => $post->id_kategory
    ];
    
    $id_pengguna = [
        'name' => 'id_pengguna',
        'id' => 'id_pengguna',
        'options' => $daftar_pengguna,
        'class' => 'form-control',
        'selected' => $post->id_pengguna
    ];

    $judul_post = [
        'name' => 'judul_post',
        'id' => 'judul_post',
        'value' => $post->judul_post,
        'class' => 'form-control'
    ];

    $slug = [
        'name' => 'slug',
        'id' => 'slug',
        'value' => $post->slug,
        'class' => 'form-control',
    ];

    $summary = [
        'name' => 'summary',
        'id' => 'summary',
        'value' => $post->summary,
        'class' => 'form-control'
    ];

    $body = [
        'name' => 'body',
        'id' => 'body',
        'value' => $post->body,
        'class' => 'form-control',
    ];

    $foto_blog = [
        'name' => 'foto_blog',
        'id' => 'foto_blog',
        'value' => null,
        'class' => 'form-control',
    ];

    
    $submit = [
        'name' => 'submit',
        'id' => 'submit',
        'value' => 'Submit',
        'class' => 'btn btn-success',
        'type' => 'submit'
    ];

$session = session();
$errors = $session->getFlashdata('errors');
?>

<div class="container mt-4 vh-200 mb-4">
    <div class="row justify-content-center h-200">
        <div class="card w-50 my-auto">
            <div class="card-header text-center">
                <h1>Form Tambah Postingan</h1>
            </div>
            <div class="card-body">
                <?php if ($errors != null) : ?>
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Terjadi Kesalahan</h4>
                        <hr>
                        <p class="mb-0">
                            <?php foreach ($errors as $err) {
                                echo $err . '<br>';
                            }

                            ?>
                        </p>
                    </div>
                <?php endif ?>

                <!-- Membuat Form dengan Form Helper -->
                <?= form_open_multipart('Admin/Post_A/update/' . $post->id_post) ?>

                <div class="form-group mt-3">
                        <?= form_label("Nama Kategori", "id_kategory") ?>
                        <?= form_dropdown($id_kategory) ?>
                </div>

                <div class="form-group mt-3">
                        <?= form_label("Nama Penulis", "id_pengguna") ?>
                        <?= form_dropdown($id_pengguna) ?>
                </div>

                <div class="form-group mt-3">
                    <?= form_label("Judul Postingan", "judul_post") ?>
                    <?= form_input($judul_post) ?>
                </div>

                <div class="form-group mt-3">
                    <?= form_label("Slug", "slug") ?>
                    <?= form_input($slug) ?>
                </div>

                <div class="form-group mt-3">
                    <?= form_label("Ringkasan Isi", "summary") ?>
                    <?= form_input($summary) ?>
                </div>

                <div class="form-group mt-3">
                    <?= form_label("Isi Postingan", "body") ?>
                    <?= form_input($body) ?>
                </div>

                <div class="text-center">
                        <img class="img-fluid mb-3 mt-3" width="100" src="<?= base_url('upload/Foto Blog/' . $post->foto_blog) ?>" alt="image">
                </div>

                <div class="form-group mt-3">
                        <?= form_label("Foto Postingan", "foto_blog") ?>

                        <!-- Form Upload karena mau upload foto_blog -->
                        <?= form_upload($foto_blog) ?>
                </div>

                <div class="d-flex justify-content-end mt-3">
                <!-- Form submit terkait submit-->
                <?= form_submit($submit) ?>
                </div>

                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>