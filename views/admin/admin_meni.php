<div class="container-fluid">
    <div class="row">
        <div class="col-12 pozBoja">
            <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <?php
                    $linkovii = dohvati_glavni_navigacioni_meni(3);
                        foreach($linkovii as $l):
                ?>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?page=admin&str=<?= $l->parametar?>"><?= $l->naziv?></a>
                </li>
                        <?php endforeach; ?>
                </ul>
            </div>
            </nav>
        </div>
    </div>
</div>