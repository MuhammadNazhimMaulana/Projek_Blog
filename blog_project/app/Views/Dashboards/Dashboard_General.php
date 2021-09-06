<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonevian Blog</title>
    
    <!-- Link Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Link Css bootstrap -->
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>">

    <!-- Link custom css -->
    <link rel="stylesheet" href="<?= base_url ('General/css/style.css')?>">
    

</head>
<body>

    <?= $this->include('Template/Header/Header_Reader') ?>

    <!-- Awal Main -->
    <main>
        <div class="container-fluid p-0">
            <div class="site-content">
                <div class="d-flex justify-content-center text-center">
                    <div class="d-flex flex-column">
                        <h1 class="site-title">Blog Bonevian</h1>
                        <p class="site-desc">Lorem ipsum dolor sit amet consectetu veniam quos eo.</p>

                        <div class="d-flex flex-row">
                            <input type="button" value="Baca Berita" class="btn site-btn_1 px-4 py-3 me-4 btn-dark">
                            <input type="button" value="Ketahui Berita" class="btn site-btn_2 px-4 py-3 me-4 btn-light">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Awal Bagian Feature -->
        
        <div class="section-1">
            <div class="container text-center">
                <h1 class="heading-1">Fitur yang Fantastis</h1>
                <h1 class="heading-2">& Banyak Yang Lain</h1>
                <p class="para-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil reiciendis neque quam, molestias nobis optio molestiae quibusdam, commodi facilis, ducimus dignissimos possimus sit obcaecati eius excepturi voluptatum quis perspiciatis sint.</p>
                
                <div class="row justify-content-center text-center">
                    <!-- ini Kartu -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="Assets/Buku Lain.jpg" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">Responsive</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores libero, voluptatum amet commodi quae adipisci magnam vero dolore eius dolorum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="Assets/Buku Lain.jpg" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">Responsive</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores libero, voluptatum amet commodi quae adipisci magnam vero dolore eius dolorum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Akhir Bagian Feature -->
    
    <!-- After Feature -->
    <div class="section-2">
        <div class="container-fluid">
            <div class="d-flex justify-content-end">
                <div class="d-flex flex-column">
                    <h1 class="heading-1">Like & Share Jika Suka</h1>
                    <p class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, delectus ratione.</p>
                    
                    <input type="button" value="Show" class="btn btn-danger">
                </div>
            </div>
        </div>
    </div>
    <!-- After Feature -->
    
    <div class="section-3">
        <div class="container">
            
            <!-- First Row -->
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex flex-row">
                        <i class="fas fa-question fa-3x m-2"></i>
                        <div class="d-flex flex-column">
                            <h3 class="m-2">24/7</h3>
                            <p class="m-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat sint aperiam molestiae.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex flex-row">
                        <i class="fas fa-seedling fa-3x m-2"></i>
                        <div class="d-flex flex-column">
                            <h3 class="m-2">Pasar</h3>
                            <p class="m-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat sint aperiam molestiae.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex flex-row">
                        <i class="fas fa-rocket fa-3x m-2"></i>
                        <div class="d-flex flex-column">
                            <h3 class="m-2">Cepat</h3>
                            <p class="m-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat sint aperiam molestiae.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Second Row -->
            
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="d-flex flex-row">
                        <i class="fas fa-user-shield fa-3x m-2"></i>
                        <div class="d-flex flex-column">
                            <h3 class="m-2">Authorisasi</h3>
                            <p class="m-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat sint aperiam molestiae.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex flex-row">
                        <i class="fas fa-search fa-3x m-2"></i>
                        <div class="d-flex flex-column">
                            <h3 class="m-2">Pencarian</h3>
                            <p class="m-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat sint aperiam molestiae.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex flex-row">
                        <i class="fas fa-sliders-h fa-3x m-2"></i>
                        <div class="d-flex flex-column">
                            <h3 class="m-2">Pengaturan</h3>
                            <p class="m-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat sint aperiam molestiae.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Section 4 -->
    
    <div class="section-4 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <img src="Assets/Elephant.jpg" width="590">
                </div>
                <div class="col-md-5">
                    <h1 class="text-white">Mulai Dari Mana?</h1>
                    <a href="#">Bergabung Dengan Kami</a>

                    <p class="para-1">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente incidunt cum neque doloremque atque. Libero quia neque iusto eaque quaerat animi reiciendis quidem culpa, recusandae ipsam nobis iure dolores, facilis voluptas! Iste libero ipsa blanditiis veniam. Non laudantium provident accusantium illum repudiandae eos odit rerum dolorem earum architecto aliquam, laborum at nesciunt officia iste omnis?
                    </p>
                    
                </div>
            </div>
        </div>
    </div>
</main> 
    
    <!-- Akhir Main -->

    <!-- Ini Footer -->
    <?= $this->include('Template/Footer/Footer_Reader') ?>    

    <script src="<?= base_url('bootstrap/js/bootstrap.bundle.min.js')?>"></script>
</body>
</html>
