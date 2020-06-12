<div class="container-fluid">
    <div class="row">
        <div class="col-12 pozBoja">
            <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link filtriranje" href="#" data-idFilter="0">Sve vesti</a>
                </li>
                <?php
                    $linkovii = dohvati_sve('kategorije');
                        foreach($linkovii as $l):
                ?>
                <li class="nav-item active">
                    <a class="nav-link filtriranje" href="#" data-idFilter="<?= $l->idKategorije ?>"><?= $l->naziv?></a>
                </li>
                        <?php endforeach; ?>
                <li class="nav-item active">
                    <a class="nav-link filtriranje" href="#" data-idFilter="datumNajnovije">Najnovije vesti</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link filtriranje" href="#" data-idFilter="datumNajstarije">Najstarije vesti</a>
                </li>
                </ul>
            </div>
            </nav>
        </div>
    </div>
</div>