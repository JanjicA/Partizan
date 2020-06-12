<?php include "filterMeni.php";?>
<div class="top-news-area section-padding-100">
        <div class="container">
            <div class="row" id="listaVesti">

            <?php
                $limit =  isset($_GET['limit'])? $_GET['limit'] : 0;
                $sveVesti = dohvati_vestiSlike($limit);
                foreach($sveVesti as $s):
                    $datum = date("d.m.Y.",strtotime($s->datum));
                    $tekst = substr($s->tekst,0,50);
            ?>

                <div class="col-md-4 pedingpet dogadjajicol">
                    <div class="card">

                
                        <div class="card-block">

                            <div class="imgbox">
                                <img src="<?=$s->slikaVelika?>" alt="Slika"/>
                            </div>

                            
                            
                            <div class="card-title text-center">
                                <h4><b><?=$s->naslov?></b></h4>
                            </div>

                            <div class="card-text text-right">
                                <span class="post-date"><?=$datum?></span>
                            </div>

                            <div class="content">
                                <h4>SAZNAJ VISE</h4>
                                <p>Vise informacija o ovom postu mozete naci na nasoj stranici</p>
                                <a href="index.php?page=post&id=<?=$s->idVesti?>"><button class='btn'>POSETI STRANICU</button></a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            
                <?php endforeach;?>

            </div>
        </div>
    </div>