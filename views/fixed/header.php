<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="newsbox-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container-fluid">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="newsboxNav">

                        <!-- Nav brand -->
                        <a href="index.php" class="nav-brand"><img src="assets/img/grb.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                <?php
                                    include "models/functions.php";
                                    $linkovi = dohvati_glavni_navigacioni_meni(1);
                                    if(isset($_SESSION['korisnik'])){
                                    $linkovi = dohvati_glavni_navigacioni_meni_ulogovani();

                                    }
                                    if(isset($_SESSION['korisnik'])&& $_SESSION['korisnik']->idUloga==1){
                                        $linkovi = dohvati_glavni_navigacioni_meni(2);
    
                                        }
                                    foreach($linkovi as $link):
                                ?>
                                    <li><a href="index.php?page=<?= $link->parametar?>"><?= $link->naziv?></a></li>
                                    <?php endforeach; ?>

                                <?php
                                    if(isset($_SESSION['korisnik'])):
                                ?>
                                <li><a href="models/logout.php">Izloguj se</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>