    <!-- Awal Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="#" class="navbar-brand ms-3">Bonevian</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Menu_Navbar" aria-controls="Menu_Navbar" aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse"></div>
            <div class="collapse navbar-collapse" id="Menu_Navbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link <?= $title == 'Dashboard' ? 'active' : ''?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('Reader/Post_R/read') ?>" class="nav-link">Post</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Pages</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contact Us</a>
                    </li>
                </ul>

                <form class="form-inline my-2 my-lg-0">
                    <button class="btn menu-right-btn border" type="submit">
                        Template
                    </button>
                </form>
            </div>
        </nav>
    </header>

    <!-- Akhir Header -->