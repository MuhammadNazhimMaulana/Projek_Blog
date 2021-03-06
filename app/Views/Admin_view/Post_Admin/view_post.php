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

<h1 class="text-center">Post</h1>

<div class="row mt-5">
  <div class="col-md-12">
    <div class="card text-dark bg-light mb-3">
      <div class="card-header"></div>
      <div class="card-body">
        <a href="<?= site_url('admin/posts/create') ?>" class="btn btn-success">Tambah Postingan</a>
        <h5 class="card-title text-center">Daftar Seluruh Postingan</h5>

        <!-- Awal Searching -->
        <?= form_open('admin/posts') ?>
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

        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <table class="table text-center">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Kategory</th>
              <th scope="col">Nama Penulis</th>
              <th scope="col">Judul Postingan</th>
              <th scope="col">Slug</th>
              <th scope="col">Summary</th>
              <th scope="col">Isi</th>
              <th scope="col">Foto Blog</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
              <?php $i = 1;?>
              <?php foreach ($post as $index => $posts) :?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $posts->nama ?></td>
                  <td><?= $posts->username ?></td>
                  <td><?= $posts->judul_post ?></td>
                  <td><?= $posts->slug ?></td>
                  <td><?= $posts->summary ?></td>
                  <td><?= word_limiter($posts->body, 5) ?></td>
                  <td><img src="<?= base_url('upload/Foto Blog/' . $posts->foto_blog) ?>" alt="" width="100"></td>
                  <td class="col-md-3">
                    <a href="<?= site_url('admin/posts/view/' . $posts->id_post) ?>" class="btn btn-primary">View</a>
                    <a href="<?= site_url('admin/posts/update/' . $posts->id_post) ?>" class="btn btn-warning">Update</a>
                    <a href="#modalDelete<?= $posts->id_post ?>" data-bs-toggle="modal" onclick="" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                <?php endforeach ?>
              </table>
            </div>
              <div class="card-footer">
                <?= $pager->links('post', 'custom_pagination') ?>
              </div>
          </div>
        </div>
      </div>
      
      <!-- Modal -->
      <?php foreach ($post as $index => $posts) :?>
        <div class="modal fade" id="modalDelete<?= $posts->id_post ?>" tabindex="-1" data-bs-backdrop="static">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Penghapusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Apakah Anda yakin akan menghapus data ini?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-danger"><a href="<?= site_url('admin/posts/delete/' . $posts->id_post) ?>">Delete</a></button>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
        

<?= $this->endSection() ?>
