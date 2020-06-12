<form action="../../models/admin/kategorije/unosKategorija.php" method="POST">
    <div class="form-group">
        <label for="">Kategorija</label>
        <input id="kat" type="text" class="form-control">
    </div>
    <div class="form-group">
        <button type="button" class="btn btn-danger" name="btnDodajKategoriju" id="btnDodajKategoriju">Dodaj</button>
    </div>
</form>
<div id="modalKategorija"></div>
<div id="prikazKategorija">
    <?php
        $kategorije = dohvati_sve("kategorije");
        if(count($kategorije)==0){
            echo "<p>Trenutno nema kategorija.</p>";
        }
        else{
            ?>
            <table class="table">
            <tr>
                <th>RB</th>
                <th>Naziv kategorije</th>
                <th></th><th></th>
            </tr>
            <?php
                $rb=1;
                foreach($kategorije as $k):
            ?>
            <tr>
                <td><?=$rb++ ?></td>
                <td><?= $k->naziv?></td>
                <td><a href="#" class="katBrisanje" data-brisanje="<?= $k->idKategorije ?>"><i class='fas fa-times'></i></a></td>
                <td><a href="#" class="katEditovanje" data-editovanje="<?= $k->idKategorije ?>"><i class='far fa-edit'></i></a></td>
            </tr>
                <?php endforeach;?>
            </table>
       <?php         
        }
    ?>
</div>