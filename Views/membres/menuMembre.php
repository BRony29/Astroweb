<section id="menuMembres" class="accordion">

    <div class="row my-2 windowTheme">
        <div class="col-7 my-auto">
            <h1 class="titre text-uppercase text-left">Paramètres</h1>
        </div>
        <div class="col-5 text-right my-auto">
            <button class="btn btn-outline-info btn-xs mx-1" type="button" title="Profil" data-toggle="collapse" data-target="#accordion1" aria-expanded="true" aria-controls="accordion1"><i class="fas fa-user"></i></button>
            <button class="btn btn-outline-info btn-xs" type="button" title="Mot de passe" data-toggle="collapse" data-target="#accordion2" aria-expanded="false" aria-controls="accordion2"><i class="fas fa-key"></i></button>
        </div>
    </div>

    <!-- Profil utilisateur -->
    <div id="accordion1" class="collapse show" data-parent="#menuMembres">
        <form class="windowTheme" action="/Membres/editMembre" method="POST">
            <div class="form-row">
                <div class="col-sm-10 offset-sm-1 mb-3">
                    <h1 class="titre text-uppercase text-left textebleue">profil</h1>
                    <h6 class="minititre text-left textejaune"><?= $_SESSION['user']->login ?>: <?= $_SESSION['user']->prenom ?> <?= $_SESSION['user']->nom ?></h6>
                </div>
                <div class="col-sm-5 offset-sm-1 mb-2">
                    <input type="text" class="form-control form-control-sm text-dark" value="<?= $_SESSION['user']->login ?>" placeholder="Login" name="login" pattern="^[-a-zA-Z0-9 àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$" maxlength="20" required>
                </div>
                <div class="col-sm-5 mb-2">
                    <input type="text" class="form-control form-control-sm text-dark" value="<?= $_SESSION['user']->nom ?>" placeholder="Nom" name="nom" pattern="^[-a-zA-Z àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$" maxlength="20" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-5 offset-sm-1 my-2">
                    <input type="text" class="form-control form-control-sm text-dark" value="<?= $_SESSION['user']->prenom ?>" placeholder="Prénom" name="prenom" pattern="^[-a-zA-Z àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$" maxlength="20" required>
                </div>
                <div class="col-sm-5 my-2">
                    <input type="text" class="form-control form-control-sm text-dark" value="<?= $_SESSION['user']->adresse ?>" placeholder="Adresse" pattern="^[-a-zA-Z0-9 àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$" name="adresse">
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-5 offset-sm-1 my-2">
                    <input type="text" class="form-control form-control-sm text-dark" value="<?= $_SESSION['user']->codePostale ?>" placeholder="Code postale" pattern="\d{2}[ ]?\d{3}" name="codePostale">
                </div>
                <div class="col-sm-5 my-2">
                    <input type="text" class="form-control form-control-sm text-dark" value="<?= $_SESSION['user']->ville ?>" placeholder="Ville" pattern="^[-a-zA-Z àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$" name="ville">
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-5 offset-sm-1 my-2">
                    <input type="text" class="form-control form-control-sm text-dark" value="<?= $_SESSION['user']->tel ?>" placeholder="Téléphone" pattern="(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$" name="tel">
                </div>
                <div class="col-sm-5 my-2">
                    <input type="email" class="form-control form-control-sm text-dark" value="<?= $_SESSION['user']->email ?>" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email">
                </div>
            </div>
            <div class="form-row hidden">
                <div class="col-sm mb-3">
                    <label for="id" class="textebleue">ID:</label>
                    <input type="text" class="form-control" value="<?= $_SESSION['user']->id ?>" name="id">
                </div>
            </div>
            <div class="form-group form-check">
                <label class="form-check-label col-sm-10 offset-sm-1 text-justify  textebleue">
                    <input class="form-check-input" type="checkbox" required>Confirmer la mise à jour du profil et accepter les mises à jour d'informations personnelles. Vous devrez vous reconnecter après la mise à jour.
                </label>
            </div>
            <div class="row text-center">
                <div class="col-sm-5 offset-1">
                    <button type="submit" class="btn btn-outline-success btn-sm offset-sm-1 mb-3">Valider</button>
                </div>
                <div class="col-sm-5">
                    <button class="btn btn-outline-light btn-sm" onclick="history.back()">Annuler</button>
                </div>
            </div>
        </form>
    </div>

    <!-- changement de mot de passe -->
    <div id="accordion2" class="collapse" data-parent="#menuMembres">
        <form id="menuMembresForm3" class="windowTheme" action="/Membres/editMembrePwd" method="POST">
            <div class="form-row">
                <div class="col-sm-10 offset-sm-1 mb-3">
                    <h1 class="titre text-uppercase text-left textebleue">mot de passe</h1>
                    <h6 class="minititre text-left textejaune"><?= $_SESSION['user']->login ?>: <?= $_SESSION['user']->prenom ?> <?= $_SESSION['user']->nom ?></h6>
                </div>
                <div class="col-sm-5 offset-sm-1 mb-3">
                        <input type="password" class="form-control form-control-sm text-dark" id="motDePasse1" placeholder="Nouveau mot de passe" name="motDePasse1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required onBlur="checkPass()">
                </div>
                <div class="col-sm-5 mb-2">
                    <input type="password" class="form-control form-control-sm text-dark" id="motDePasse2" placeholder="Confirmez le mot de passe" name="motDePasse2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required onBlur="checkPass()">
                </div>
                <div id="divcomp" class="offset-sm-1 col-sm-5 mb-2">
                </div>
            </div>
            <div class="form-row hidden">
                <div class="col-sm mb-3">
                    <label for="id">ID:</label>
                    <input type="text" class="form-control" value="<?= $_SESSION['user']->id ?>" name="id">
                </div>
            </div>
            <div class="row text-center">
                <div class="col-sm-5 offset-1">
                    <button type="submit" class="btn btn-outline-success btn-sm offset-sm-1 mb-3">Valider</button>
                </div>
                <div class="col-sm-5">
                    <button class="btn btn-outline-light btn-sm" onclick="history.back()">Annuler</button>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-10 offset-sm-1 my-2">
                    <h6 class="minititre text-justify textebleue">Les mots de passe doivent contenir au minimum 8 caractères dont une minuscule, une majuscule et un chiffre.</h6>
                    <h6 class="minititre text-justify textebleue">Les caractères \ / <> & \ ' " sont à exclure.</h6>
                </div>
            </div>
        </form>
    </div>

</section>