<?= $this->extend('Dashboards/Dashboard_Admin') ?>
<?= $this->section('content_admin') ?>
<?php
    
    $nama_kategori = [
        'name' => 'nama_kategori',
        'id' => 'nama_kategori',
        'value' => null,
        'class' => 'form-control'
    ];

    $slug_kategori = [
        'name' => 'slug_kategori',
        'id' => 'slug_kategori',
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

<div class="container mt-4 vh-100">
    <div class="row justify-content-center h-100">
        <div class="card w-50 my-auto">
            <div class="card-header text-center">
                <h1>Form Tambah Kategori</h1>
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
                <?= form_open('admin/categories/create') ?>
                <div class="form-group mt-3">
                    <?= form_label("Nama Kategori", "nama_kategori") ?>
                    <?= form_input($nama_kategori) ?>
                </div>
                <div class="form-group mt-3">
                    <?= form_label("Slug", "slug_kategori") ?>
                    <?= form_input($slug_kategori) ?>
                </div>
                <div class="d-flex justify-content-end mt-3">
                <!-- Form submit terkait submit-->
                <?= form_submit($submit) ?>
                </div>
                <?= form_close() ?>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>