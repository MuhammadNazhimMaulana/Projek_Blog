<?= $this->extend('Dashboards/Dashboard_Admin') ?>
<?= $this->section('content_admin') ?>
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
  'class' => 'btn btn-outline-secondary'
];

  ?>

<h1 class="text-center">Komentar</h1>

<div class="row mt-5">
  <div class="col-md-12">
    <div class="card text-dark bg-light mb-3">
      <div class="card-header"></div>
      <div class="card-body">
        <a href="<?= site_url('Admin/Komentar_A/create') ?>" class="btn btn-success">Tambah Komentar</a>
        <h5 class="card-title text-center mb-3">Daftar Seluruh Komentar</h5>

        <!-- Awal Searching -->
        <?= form_open('Admin/Komentar_A/read') ?>
        <div class="input-group mb-3 justify-content-end">
              <div>
                <?= form_input($keyword) ?>
              </div>
              <div>
                <?= form_submit($submit) ?>
              </div>
        </div>
        <?= form_close() ?>
        <!-- Akhir Searching -->

        <p class="card-text mt-3">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <table class="table text-center">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Komentator</th>
              <th scope="col">Judul Postingan</th>
              <th scope="col">Isi Komentar</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
              <?php $i = 1;?>
              <?php foreach ($komentar as $index => $comments) :?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $comments->nama_komentator ?></td>
              <td><?= $comments->judul_post ?></td>
              <td><?= $comments->isi_komentar ?></td>
              <td>
                <a href="<?= site_url('Admin/Komentar_A/view/' . $comments->id_komentar) ?>" class="btn btn-primary">View</a>
                <a href="<?= site_url('Admin/Komentar_A/update/' . $comments->id_komentar) ?>" class="btn btn-warning">Update</a>
                <a href="#modalDelete<?= $comments->id_komentar ?>" data-bs-toggle="modal" onclick="" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            <?php endforeach ?>
          </table>
        </div>
          <div class="card-footer">
            <?= $pager->links('komentar', 'custom_pagination') ?>
          </div>
      </div>
    </div>
  </div>
  
  <!-- Modal -->
  <?php foreach ($komentar as $index => $comments) :?>
    <div class="modal fade" id="modalDelete<?= $comments->id_komentar ?>" tabindex="-1" data-bs-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Konfirmasi Penghapusan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Apakah Anda yakin akan menghapus data komentar pada postingan <?= $comments->judul_post ?> ini?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button class="btn btn-danger"><a href="<?= site_url('Admin/Komentar_A/delete/' . $comments->id_komentar) ?>">Delete</a></button>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach ?>
    

<?= $this->endSection() ?>
