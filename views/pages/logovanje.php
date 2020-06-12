 <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12 col-lg-8">
                    <div class="contact-content mb-100">

                        <!-- Contact Form Area -->
                        <div class="contact-form-area mb-70">
                            <!-- Logo -->
                        <a href="#" class="d-block mb-50"><img src="img/core-img/logo.png" alt=""></a>
                            <h4 class="mb-50">Logovanje</h4>
                        <?php
                            if(isset($_SESSION['greskeLogovanje'])){
                                foreach($_SESSION['greskeLogovanje'] as $g){
                                    echo "<p>$g</p>";
                                }
                                unset($_SESSION['greskeLogovanje']);
                                // var_dump( $_SESSION['greskeLogovanje']);
                            }
                            if(isset($_SESSION['greskeUser'])){
                                echo $_SESSION['greskeUser'];
                                unset($_SESSION['greskeUser']);
                                // var_dump( $_SESSION['greskeLogovanje']);
                            }
                        ?>
                            <form action="models/log.php" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="email" placeholder="Unesite e-mail...">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="Unesite lozinku...">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn newsbox-btn mt-30" type="submit"name="prijaviSe">Ulogujte se</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        

                    </div>
                </div>

            </div>
        </div>
    </section>
