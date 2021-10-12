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

    <?= $this->include('Template/Header/Header_User') ?>

    <!-- Awal Dari Content -->

    <?= $this->renderSection('content_user') ?>

    <!-- Akhir dari Content -->

    <!-- Ini Footer -->
    <?= $this->include('Template/Footer/Footer_User') ?>    

    <script src="<?= base_url('bootstrap/js/bootstrap.bundle.min.js')?>"></script>
</body>
</html>
