<footer class="footer-area">
        <!-- Footer Logo -->
        <div class="footer-logo mb-100">
            <a href="index.php"><img src="assets/img/logo.png" alt=""></a>
        </div>
        <!-- Footer Content -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-content text-center">
                        <!-- Footer Nav -->
                        <div class="footer-nav">
                        <ul>
                                <?php
                                    $linkovi = dohvati_navigacioni_meni();
                                    foreach($linkovi as $link):
                                        if($link->naziv=="Kontakt"||$link->naziv=="Autor"):
                                ?>
                                    <li><a href="index.php?page=<?= $link->parametar?>"><?= $link->naziv?></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <!-- <li><a href="models/export_excel.php">Export kategorije u Excel</a></li> -->
                                    <li><a href="dokumentacija.pdf">Dokumentacija</a></li>
                         </ul>
                        </div>
                        <!-- Social Info -->
                        <div class="footer-social-info">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="git"><i class="fa fa-git" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>


                        <!-- Copywrite Text -->
                        <p class="copywrite-text"><a href="#">
Copyright &copy; aleksandar.janjic.331.16@ict.edu.rs</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="assets/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="assets/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="assets/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/active.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
</body>

</html>