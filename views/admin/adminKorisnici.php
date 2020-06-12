
<div class="container">
    <div class="row">
        <div class="col-7 mx-auto">
            <form action="">
                <div class="form-group">
                    <label for="">Korisnici</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-danger" name="btnDodajKorisnika" id="btnDodajKorisnika">Dodaj</button>
                </div>
            </form>
            <div id="prikaziKorisnika">
    <?php
        $korisnici = dohvati_korisnike();
        if(count($korisnici)==0){
            echo "<p>Nema korisnika.</p>";
        }
        else{
            ?>
            <table class="table">
            <tr>
                <th>RB</th>
                <th>Ime </th>
                <th>Prezime </th>
                <th>Email </th>
            </tr>
            <?php
                $rb=1;
                foreach($korisnici as $k):
            ?>
            <tr>
                <td><?=$rb++ ?></td>
                <td><?= $k->ime?></td>
                <td><?= $k->prezime?></td>
                <td><?= $k->email?></td>
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