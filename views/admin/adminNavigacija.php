
<div class="container">
    <div class="row">
        <div class="col-7 mx-auto">
            <form action="../../models/admin/meni/unosMenija.php" method="POST">
                <div class="form-group">
                    <label for="">Navigacioni Meni</label>
                    <input type="text" class="form-control" id="meni">
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-danger" name="btnDodajNavigaciju" id="btnDodajNavigaciju">Dodaj</button>
                </div>
            </form>
            <div id="modalMenija"></div>
            <div id="prikazMenija">
    <?php
        $meni = dohvati_sve("meni");
        if(count($meni)==0){
            echo "<p>Nema navigacionog menija.</p>";
        }
        else{
            ?>
            <table class="table">
            <tr>
                <th>RB</th>
                <th>Naziv menija</th>
                <th></th><th></th>
            </tr>
            <?php
                $rb=1;
                foreach($meni as $m):
            ?>
            <tr>
                <td><?=$rb++ ?></td>
                <td><?= $m->naziv?></td>
                <td><a href="#" class="meniBrisanje" data-brisanje="<?= $m->idMeni ?>"><i class='fas fa-times'></i></a></td>
                <td><a href="#" class="meniEditovanje" data-editovanje="<?= $m->idMeni ?>"><i class='far fa-edit'></i></a></td>
            </tr>
                <?php endforeach;?>
            </table>
       <?php         
        }
    ?>
</div>
        </div>
    </div>
</div>