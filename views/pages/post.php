<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];

       $vest = dohvati_jednuVest($id);
        $datum = date("d.m.Y.",strtotime($vest->datum));
        ?>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center single-post">
                    <img src="<?=$vest->slikaVelika?>" alt="Vest">
                    <h2><i><?=$vest->naslov?></i></h2><br>  
                    <p class="text-center"><?=$vest->tekst?></p>
                    <p class="text-right"><?=$datum?></p>
                </div>
            </div>
        </div>
        <?php
    }

?>