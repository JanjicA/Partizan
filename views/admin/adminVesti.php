<form action="models/admin/vesti/unosVesti.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Kategorija</label>
                    <select class="form-control" name="ddlKat" id="ddlKat">
                        <option value="0">Izaberite</option>
                        <?php
                            $kategorije = dohvati_sve("kategorije");
                            foreach($kategorije as $kat):
                        ?>
                        <option value="<?=$kat->idKategorije?>"><?= $kat->naziv ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Naslov</label>
                    <input type="text" class="form-control" name="naslov">
                </div>
                <div class="form-group">
                    <label for="">Tekst</label>
                    <textarea name="tekst" id="tekst" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Slika</label>
                    <input type="file" class="form-control" name="slika">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-danger" name="btnDodajVest" id="btnDodajVest">Dodaj</button>
                </div>
                
            </form>

    <div id="vesti">
            <?php
                $vesti = dohvati_sve_vesti();
                // var_dump($vesti);
                if(count($vesti) == 0){
                    echo "<p>Trenutno nema vesti.</p>";
                }
                else{
                    ?>
                    <table class="table">
                        <tr>
                            <th>RB</th>
                            <th>Slika</th>
                            <th>Naziv kategorije</th>
                            <th>Naslov</th>
                            <th>Tekst</th>
                            <th>Datum</th>
                            <th></th><th></th>
                        </tr>
                <?php
                $rb=1;
                foreach($vesti as $v):
                    $datum = date("d.m.Y.",strtotime($v->datum));
                    $tekst = substr($v->tekst,0,50);
                    ?>
                    <tr>
                            <td><?=$rb++?></td>
                            <td ><img src="<?=$v->slikaMala?>" alt="vest"></td>
                            <td><?=$v->naziv?></td>
                            <td><?=$v->naslov?></td>
                            <td><?=$tekst?>...</td>
                            <td><?=$datum?></td>
                            <td><a href="#" class="vestBrisanje" data-brisanje="<?= $v->idVesti ?>"><i class='fas fa-times'></i></a></td>
                             <td><a href="#" class="vestEditovanje" data-editovanje="<?= $v->idVesti ?>"><i class='far fa-edit'></i></a></td>
                        </tr>
                <?php endforeach;
                }
            ?>
            </table>
        </div>
