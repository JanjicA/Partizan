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
                            <h4 class="mb-50">Registracija</h4>
 <?php
    if(isset($_SESSION['greskeRegistracija'])){
        foreach($_SESSION['greskeRegistracija'] as $g){
            echo "<p>$g</p>";
        }
        unset($_SESSION['greskeRegistracija']);
        // var_dump( $_SESSION['greskeRegistracija']);
    }

 ?>
                            <form method="POST" action="models/reg.php">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <span>Ime*</span>
                                            <input type="text" class="form-control" id="tbName" name="tbName">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <span>Prezime*</span>
                                            <input type="text" class="form-control" id="tbLast" name="tbLast">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                        <span>Email adresa*</span>
                                        <input type="email" class="form-control" id="tbEmail" name="tbEmail">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                        <span>Lozinka*</span>
                                        <input type="password" class="form-control" id="tbPassword" name="tbPassword">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" name="submitAccount" value="Registruj se" class="btn newsbox-btn mt-30">
                                    </div>
                                </div>
                            </form>
                        </div>

                        

                    </div>
                </div>

            </div>
        </div>
    </section>
