<?= $this->extend('Dashboards/Dashboard_Admin') ?>
<?= $this->section('content_admin') ?>
<?php
    
    $nama = [
        'name' => 'nama',
        'id' => 'nama',
        'value' => $profile->nama,
        'class' => 'form-control',
        'readonly' => true
    ];
    
    $username = [
        'name' => 'username',
        'id' => 'username',
        'value' => $profile->username,
        'class' => 'form-control',
        'readonly' => true
    ];
    
    $email = [
        'name' => 'email',
        'id' => 'email',
        'value' => $profile->email,
        'class' => 'form-control',
        'readonly' => true
    ];
    
    $password = [
        'name' => 'password',
        'id' => 'password',
        'value' => null,
        'class' => 'form-control',
        'type' => 'password'
    ];
    
    $usia = [
        'name' => 'usia',
        'id' => 'usia',
        'value' => $profile->usia,
        'class' => 'form-control',
        'type' => 'number',
        'readonly' => true
    ];
    
    $submit = [
        'name' => 'submit',
        'id' => 'submit',
        'value' => 'Update Profile',
        'class' => 'btn btn-success',
        'type' => 'submit'
    ];

$session = session();
$errors = $session->getFlashdata('errors');
?>
 
<div class="container profile">
    <div class="cover_profile">
        <div class="cover">

        </div>
        <div class="profil">
            <img src="<?= base_url('General/images/Rhino.jpg') ?>" >
        </div>
        <div class="name">
            <h1>Profile Anda</h1>
        </div>
        <div class="data">
            <div class="row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Admin</label>
            <div class="col-sm-9 d-flex justify-content-center form mb-4">
                <?= form_input($nama) ?>
            </div>
        </div>
        <div class="row">
            <label for="username" class="col-sm-2 col-form-label">Username Admin</label>
            <div class="col-sm-9 d-flex justify-content-center form mb-4">
                <?= form_input($username) ?>
                </div>
            </div>
            <div class="row">
                <label for="email" class="col-sm-2 col-form-label">Email Admin</label>
                <div class="col-sm-9 d-flex justify-content-center form mb-4">
                    <?= form_input($email) ?>
                </div>
            </div>
            <div class="row">
                <label for="usia" class="col-sm-2 col-form-label">Usia Admin</label>
                <div class="col-sm-9 d-flex justify-content-center form mb-4">
                    <?= form_input($usia) ?>
                </div>
            </div>
            <div class="row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-9 d-flex justify-content-center form mb-4">
                    <?= form_input($password) ?>
                </div>
            </div>
                <div class="d-flex justify-content-center mt-3">
                    <!-- Form submit terkait submit-->
                    <?= form_submit($submit) ?>
                </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>