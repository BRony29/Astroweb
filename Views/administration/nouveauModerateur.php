<section id="Settings">

    <div class="row my-3 windowTheme">
        <div class="col-9 my-auto">
            <h1 class="titre text-uppercase text-left">administration</h1>
        </div>
    </div>

    <div id="SettingsMenu" class="windowTheme">
        <div class="row">
            <div class="col-sm-10 offset-sm-1 textebleue my-1">
                Ajouter un modérateur
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-10 offset-sm-1 my-1">
                Liste des adhérents trouvés :
            </div>
        </div>
        <hr>
        <?php foreach ($login_search as $modo) : ?>
            <div class="row">
                <div class="col-8 col-sm-8 offset-sm-1 my-1">
                    <i class="fas fa-caret-right"></i>&ensp;
                    <span class="textegris">Login: </span>
                    <?= $modo->login ?> (<?= $modo->nom ?>&ensp;<?= $modo->prenom ?>)
                </div>
                <div class="col-4 col-sm-2 text-right">
                    <button type="button" class="btn btn-outline-success ml-auto btn-xs" title="Ajouter comme modérateur" data-toggle="modal" data-target="#modifierDouble" data-idmodif="<?= $modo->id ?>" data-sujetmodif="<?= $modo->login ?> : (<?= $modo->nom ?> <?= $modo->prenom ?>)"><i class="fas fa-plus"></i></button>
                </div>
            </div>
            <hr>
        <?php endforeach; ?>
        <?php foreach ($nom_search as $modo) : ?>
            <div class="row">
                <div class="col-8 col-sm-8 offset-sm-1 my-1">
                    <i class="fas fa-caret-right"></i>&ensp;
                    <span class="textegris">Nom: </span>
                    <?= $modo->login ?> (<?= $modo->nom ?>&ensp;<?= $modo->prenom ?>)
                </div>
                <div class="col-4 col-sm-2 text-right">
                    <button type="button" class="btn btn-outline-success ml-auto btn-xs" title="Ajouter comme modérateur" data-toggle="modal" data-target="#modifierDouble" data-idmodif="<?= $modo->id ?>" data-sujetmodif="<?= $modo->login ?> : (<?= $modo->nom ?> <?= $modo->prenom ?>)"><i class="fas fa-plus"></i></button>
                </div>
            </div>
            <hr>
        <?php endforeach; ?>
        <?php foreach ($prenom_search as $modo) : ?>
            <div class="row">
                <div class="col-8 col-sm-8 offset-sm-1 my-1">
                    <i class="fas fa-caret-right"></i>&ensp;
                    <span class="textegris">Prénom: </span><?= $modo->login ?>
                    (<?= $modo->nom ?>&ensp;<?= $modo->prenom ?>)
                </div>
                <div class="col-4 col-sm-2 text-right">
                    <button type="button" class="btn btn-outline-success ml-auto btn-xs" title="Ajouter comme modérateur" data-toggle="modal" data-target="#modifierDouble" data-idmodif="<?= $modo->id ?>" data-sujetmodif="<?= $modo->login ?> : (<?= $modo->nom ?> <?= $modo->prenom ?>)"><i class="fas fa-plus"></i></button>
                </div>
            </div>
            <hr>
        <?php endforeach; ?>
    </div>

    <!-- Modal d'ajout d'un nouveau modérateur -->
    <div class="modal fade" id="modifierDouble" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/Settings/ajoutModerateurConfirme" method="POST">
                    <div class="modal-header noire">
                        <h6>Confirmer l'ajout de ce modérateur :</h6>
                        <input type="hidden" name="id_modo">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm border-0 bg-white text-dark" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="raison">
                        <button type="submit" class="btn btn-secondary btn-sm">Confirmer</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>