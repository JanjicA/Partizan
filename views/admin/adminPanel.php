<?php
    include "admin_meni.php";
?>
<div class="container">
    <div class="row">
        <div class="col-7 mx-auto">
            <?php 
                if(isset($_GET['str'])){
                    switch($_GET['str'])
                    {
                      case 'kategorije':
                        include "adminKategorije.php";
                        break;
                      case 'vesti': 
                        include "adminVesti.php";
                        break;
                      case 'korisnici': 
                        include "adminKorisnici.php";
                        break;
                      case 'navigacija': 
                        include "adminNavigacija.php";
                        break;
                    }
                  } else {
                    include "adminKategorije.php";
                  }
            ?>
        </div>
    </div>
</div>