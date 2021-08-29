<?= $this->extend('Dashboards/Dashboard_Admin') ?>
<?= $this->section('content_admin') ?>
<?php

    $id_post = [
        'name' => 'id_post',
        'id' => 'id_post',
        'options' => $daftar_postingan,
        'class' => 'form-control'
    ];

    $nama_komentator = [
        'name' => 'nama_komentator',
        'id' => 'nama_komentator',
        'value' => null,
        'class' => 'form-control'
    ];

    $isi_komentar = [
        'name' => 'isi_komentar',
        'id' => 'isi_komentar',
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
                <h1>Form Tambah Komentar</h1>
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
                <?= form_open('Admin/Komentar_A/create') ?>

                <div class="form-group mt-3">
                        <?= form_label("Judul Postingan", "id_post") ?>
                        <?= form_dropdown($id_post) ?>
                </div>

                <div class="form-group mt-3">
                    <?= form_label("Nama Komentator", "nama_komentator") ?>
                    <?= form_input($nama_komentator) ?>
                </div>

                <div class="form-group mt-3">
                    <?= form_label("Isi Komentar", "isi_komentar") ?>
                    <?= form_input($isi_komentar) ?>
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