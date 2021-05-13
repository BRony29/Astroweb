<section id="association">

    <div class="row my-3 windowTheme">
        <div class="col-9 my-auto">
            <h1 class="titre text-uppercase text-left">Association</h1>
        </div>
    </div>

    <form class="windowTheme" action="/Association/associationUpdate" method="POST">
        <div class="form-row my-3">
            <div class="col-sm-5 offset-sm-1">
                <input type="text" class="form-control form-control-sm text-dark" name="nom" placeholder="Nom" pattern="^[-a-zA-Z0-9 àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$" value="<?= $association->nom ?>">
            </div>
            <div class="col-sm-5">
                <input type="text" class="form-control form-control-sm text-dark" name="adresse" placeholder="Adresse" pattern="^[-a-zA-Z0-9 àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$" value="<?= $association->adresse ?>">
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col-sm-5 offset-sm-1">
                <input type="text" class="form-control form-control-sm text-dark" name="codePostale" placeholder="Code postale" pattern="\d{2}[ ]?\d{3}" value="<?= $association->codePostale ?>">
            </div>
            <div class="col-sm-5">
                <input type="text" class="form-control form-control-sm text-dark" name="ville" placeholder="Ville" pattern="^[-a-zA-Z0-9 àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$" value="<?= $association->ville ?>">
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col-sm-5 offset-sm-1">
                <input type="text" class="form-control form-control-sm text-dark" name="tel" placeholder="Téléphone" pattern="(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$" value="<?= $association->tel ?>">
            </div>
            <div class="col-sm-5">
                <input type="text" class="form-control form-control-sm text-dark" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?= $association->email ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-5 offset-sm-1">
                <input type="text" class="form-control form-control-sm text-dark" name="nSiret" placeholder="N° de SIRET" value="<?= $association->nSiret ?>">
            </div>
            <div class="col-sm-5">
                <input type="text" class="form-control form-control-sm text-dark" name="nRNA" placeholder="N° RNA" value="<?= $association->nRNA ?>">
            </div>
        </div>
        <div class="form-group form-check mt-3">
            <label class="form-check-label offset-sm-1">
                <input class="form-check-input" type="checkbox" required> Confirmer la mise à jour de l'association
            </label>
        </div>
        <div class="form-row">
            <div class="col-sm-5 offset-sm-1 mb-2 text-center">
                <button type="submit" class="btn btn-outline-success btn-sm offset-sm-1 my-3">Valider</button>
            </div>
            <div class="col-sm-5 mb-2 text-center">
                <a href="/Administration/menuAdmin" class="btn btn-outline-light btn-sm my-2" role="button">Annuler</a>
            </div>
        </div>
    </form>

</section>