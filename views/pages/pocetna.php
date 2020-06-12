
    <!-- Naslov -->

        <h1 class="text-center">SVE O PARTIZANU</h1>

    <!-- Kategorije sportova -->

    <div class="container sportovi">

        <div class="row">

            <div class="col-md-12">

                <ul class="listaSportovi">

                    <?php
                        $sportovi = executeQuery("SELECT * FROM menikategorije");
                        foreach ($sportovi as $p):
                    ?>

                    <li><a href="<?=$p->link?>"><img src="assets/img/<?=$p->putanja?>"></a></li>
                    <?php endforeach; ?>

                </ul>

        

            </div>

        </div>

    </div>

    <!-- Top News Area Start  -->
     <div class="top-news-area section-padding-50">
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

                <!-- Single News Area -->
               
                <?php endforeach;?>
              
                <div class="col-12">
                
                </div>

            </div>
            <div class="row" id="stranicenje">
              
              </div>
        </div>
    </div>


    <div class="container video">
        <div class="row">

            <div class="col-md-6 pedingpet">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/9g15WPjlzKU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div class="col-md-6 pedingpet">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/9g15WPjlzKU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            
        </div>
    </div>
   
    <div class="hero-area">
       
    </div>

    <section class="video-area bg-img bg-overlay bg-fixed" style="background-image: url(assets/img/hram.jpg);">
        <div class="container">
            <div class="row">
                <!-- Featured Video Area -->
                <div class="col-12">
                    <div class="featured-video-area d-flex align-items-center justify-content-center">
                        <div class="video-content text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Slideshow -->
        
    </section>
    <br/><br/><br/>
    <!-- ##### Video Area End ##### -->

   
    <!-- ##### Top News Area End ##### -->

    <!-- ##### Footer Area Start ##### -->