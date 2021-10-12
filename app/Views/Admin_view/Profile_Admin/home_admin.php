<?= $this->extend('Dashboards/Dashboard_Admin') ?>
<?= $this->section('content_admin') ?>

<h1>Halaman Home</h1>

<!-- Awal Kotak -->
<div id="kotak" class="penampung">
    <div class="kotak">
        <h2>1</h2>
        <h3>Layanan</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, obcaecati animi libero in sed necessitatibus fuga eaque error cumque cupiditate amet et quisquam adipisci maiores aspernatur iure, reiciendis porro accusantium culpa facere! Dolores, magnam voluptatum iure maxime hic ad, ullam voluptatem tenetur optio, consequatur inventore a assumenda maiores in voluptates?</p>
    </div>
    <div class="kotak">
        <h2>1</h2>
        <h3>Layanan</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, obcaecati animi libero in sed necessitatibus fuga eaque error cumque cupiditate amet et quisquam adipisci maiores aspernatur iure, reiciendis porro accusantium culpa facere! Dolores, magnam voluptatum iure maxime hic ad, ullam voluptatem tenetur optio, consequatur inventore a assumenda maiores in voluptates?</p>
    </div>
    <div class="kotak">
        <h2>1</h2>
        <h3>Layanan</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, obcaecati animi libero in sed necessitatibus fuga eaque error cumque cupiditate amet et quisquam adipisci maiores aspernatur iure, reiciendis porro accusantium culpa facere! Dolores, magnam voluptatum iure maxime hic ad, ullam voluptatem tenetur optio, consequatur inventore a assumenda maiores in voluptates?</p>
    </div>
</div>
<!-- Akhir Kotak -->

<!-- Awal Chart -->
<div class="row p-5 mt-5">
    <div class="col-md-4">
        <div class="card text-dark bg-light mb-3">
            <div class="card-header text-center">Jumlah Postingan</div>
            <div class="card-body">
                <div class="container-white">
                    <canvas id="post" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-dark bg-light mb-3">
            <div class="card-header text-center">Jumlah Komentar</div>
            <div class="card-body">
                <div class="container-white">
                    <canvas id="komentar" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-dark bg-light mb-3">
            <div class="card-header text-center">Jumlah Penulis</div>
            <div class="card-body">
                <div class="container-white">
                    <canvas id="pengguna" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart JS -->
<script src="<?= base_url('ChartJs/Chart.min.js') ?>"></script>
<script>
    // Chart Untuk post
    var kategori_post = document.getElementById('post');
    var data_post = [];
    var label_post = [];

    <?php foreach ($jumlah_per_post->getResult() as $key => $value) : ?>
        data_post.push(<?= $value->jumlah ?>);
        label_post.push('<?= $value->user ?>');
    <?php endforeach ?>

    var data_jumlah_per_post = {
        datasets: [{
            data: data_post,
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
            ],
        }],
        labels: label_post,
    }

    var chart_post = new Chart(kategori_post, {
        type: 'doughnut',
        data: data_jumlah_per_post
    });

    // Chart Untuk Komentar
    var kategori_komentar = document.getElementById('komentar');
    var data_komentar = [];
    var label_komentar = [];

    <?php foreach ($jumlah_per_komentar->getResult() as $key => $value) : ?>
        data_komentar.push(<?= $value->jumlah ?>);
        label_komentar.push('<?= $value->user ?>');
    <?php endforeach ?>

    var data_jumlah_per_komentar = {
        datasets: [{
            data: data_komentar,
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
            ],
        }],
        labels: label_komentar,
    }

    var chart_komentar = new Chart(kategori_komentar, {
        type: 'doughnut',
        data: data_jumlah_per_komentar
    });

    // Chart Untuk Pengguna
    var kategori_pengguna = document.getElementById('pengguna');
    var data_pengguna = [];
    var label_pengguna = [];

    <?php foreach ($jumlah_per_pengguna->getResult() as $key => $value) : ?>
        data_pengguna.push(<?= $value->jumlah ?>);
        label_pengguna.push('<?= $value->user ?>');
    <?php endforeach ?>

    var data_jumlah_per_pengguna = {
        datasets: [{
            data: data_pengguna,
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
            ],
        }],
        labels: label_pengguna,
    }

    var chart_pengguna = new Chart(kategori_pengguna, {
        type: 'doughnut',
        data: data_jumlah_per_pengguna
    });
</script>

<!-- Akhir Chart -->

<?= $this->endSection() ?>