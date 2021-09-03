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

<h1 class="text-center">Kategory</h1>

<div class="row mt-5">
  <div class="col-md-12">
    <div class="card text-dark bg-light mb-3">
      <div class="card-header"></div>
      <div class="card-body">
        <a href="<?= site_url('Admin/Kategory_A/create') ?>" class="btn btn-success">Tambah Kategori</a>
        <h5 class="card-title text-center mb-3">Daftar Seluruh Kategori</h5>

        <!-- Awal Searching -->
        <?= form_open('Admin/Kategory_A/read') ?>
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
              <th scope="col">Nama Kategori</th>
              <th scope="col">Slug</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
              <?php $i = 1;?>
              <?php foreach ($kategory as $index => $categories) :?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $categories->nama_kategori ?></td>
              <td><?= $categories->slug_kategori ?></td>
              <td>
                <a href="<?= site_url('Admin/Kategory_A/view/' . $categories->id_kategory) ?>" class="btn btn-primary">View</a>
                <a href="<?= site_url('Admin/Kategory_A/update/' . $categories->id_kategory) ?>" class="btn btn-warning">Update</a>
                <a href="#modalDelete<?= $categories->id_kategory ?>" data-bs-toggle="modal" onclick="" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            <?php endforeach ?>
        </table>
      </div>
          <div class="card-footer">
            <?= $pager->links('kategory', 'custom_pagination') ?>
          </div>
    </div>
  </div>
</div>

<!-- Modal -->
<?php foreach ($kategory as $index => $categories) :?>
<div class="modal fade" id="modalDelete<?= $categories->id_kategory ?>" tabindex="-1" data-bs-backdrop="static">
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
          <button class="btn btn-danger"><a href="<?= site_url('Admin/Kategory_A/delete/' . $categories->id_kategory) ?>">Delete</a></button>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>


<?= $this->endSection() ?>
