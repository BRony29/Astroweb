<section id="detailMembres" class="accordion">

    <div id="detailMembres2" class="row my-3 windowTheme">
        <div class="col-7 my-auto">
            <h1 class="titre text-uppercase text-left">détails</h1>
            <h6 class="minititre text-left textebleue"><?= $membre->login ?>: <?= $membre->prenom ?> <?= $membre->nom ?></h6>
        </div>
        <div class="col-5 text-right my-auto">
            <button class="btn btn-outline-info btn-xs" type="button" title="Profil <?= $membre->login ?>" data-toggle="collapse" data-target="#accordion1" aria-expanded="true" aria-controls="accordion1"><i class="fas fa-user"></i></button>
            <button class="btn btn-outline-info btn-xs" type="button" title="Mot de passe <?= $membre->login ?>" data-toggle="collapse" data-target="#accordion2" aria-expanded="false" aria-controls="accordion2"><i class="fas fa-key"></i></button>
        </div>
    </div>

    <!-- modification du profil adhérent -->
    <div id="accordion1" class="collapse show" data-parent="#detailMembres">
        <form id="detailMembresForm1" class="windowTheme" action="/Membres/modifierMembre/<?= $membre->id ?>" method="POST">
            <div class="form-row my-1">
                <div class="col-sm-5 mb-3 offset-sm-1">
                    <input type="text" class="form-control form-control-sm text-dark" placeholder="Login" name="login" value="<?= $membre->login ?>" pattern="^[-a-zA-Z0-9 àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$" maxlength="20" required>
                </div>
                <div class="col-sm-5 mb-3">
                    <input type="text" class="form-control form-control-sm text-dark" placeholder="Nom" name="nom" value="<?= $membre->nom ?>" pattern="^[-a-zA-Z àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$" maxlength="20" required>
                </div>
            </div>
            <div class="form-row my-1">
                <div class="col-sm-5 mb-3 offset-sm-1">
                    <input type="text" class="form-control form-control-sm text-dark" placeholder="Prénom" name="prenom" value="<?= $membre->prenom ?>" pattern="^[-a-zA-Z àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$" maxlength="20" required>
                </div>
                <div class="col-sm-5 mb-3">
                    <input type="text" class="form-control form-control-sm text-dark" placeholder="Adresse" name="adresse" pattern="^[-a-zA-Z0-9 àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$" value="<?= $membre->adresse ?>">
                </div>
            </div>
            <div class="form-row my-1">
                <div class="col-sm-5 mb-3 offset-sm-1">
                    <input type="text" class="form-control form-control-sm text-dark" placeholder="Code postale" name="codePostale" pattern="\d{2}[ ]?\d{3}" value="<?= $membre->codePostale ?>">
                </div>
                <div class="col-sm-5 mb-3">
                    <input type="text" class="form-control form-control-sm text-dark" placeholder="Ville" name="ville" pattern="^[-a-zA-Z àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$" value="<?= $membre->ville ?>">
                </div>
            </div>
            <div class="form-row my-1">
                <div class="col-sm-5 mb-3 offset-sm-1">
                    <input type="text" class="form-control form-control-sm text-dark" placeholder="Téléphone" name="tel" pattern="(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$" value="<?= $membre->tel ?>">
                </div>
                <div class="col-sm-5 mb-3">
                    <input type="email" class="form-control form-control-sm text-dark" placeholder="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?= $membre->email ?>">
                </div>
            </div>
            <div class="form-row my-1">
                <div class="col-sm-5 offset-sm-1 mb-3">
                    <label for="actif" class="textebleue">Compte actif :</label>
                    <select type="text" class="form-control form-control-sm text-dark" name="actif" value="<?= $membre->actif ?>">
                        <option>oui</option>
                        <option>non</option>
                    </select>
                </div>
            </div>
            <div class="form-row hidden">
                <div class="col-sm-5 mb-3 offset-sm-1">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" name="id" value="<?= $membre->id ?>" readonly="true">
                </div>
            </div>
            <div class="form-group">
                <div class="form-check offset-sm-1">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                    <label class="form-check-label" for="invalidCheck2">
                        Confirmation des changements*
                    </label>
                </div>
            </div>

            <div class="form-row">
                <div class="col-sm-3 mb-3 offset-sm-1 text-center">
                    <button class="btn btn-outline-success btn-sm my-2" type="submit">Envoyer</button>
                </div>
                <div class="col-sm-4 mb-3 text-center">
                    <a href="/Membres/supprimerMembre/<?= $membre->id ?>" class="btn btn-outline-warning btn-sm my-2" role="button" value="Supprimer adhérent">Supprimer</a>
                </div>
                <div class="col-sm-3 mb-3 text-center">
                    <a href="/Membres/index" class="btn btn-outline-light btn-sm my-2" role="button">Annuler</a>
                </div>
            </div>
        </form>
    </div>

    <!-- modification du mot de passe adhérent -->
    <div id="accordion2" class="collapse" data-parent="#detailMembres">
        <form id="detailMembresForm2" class="windowTheme" action="/Membres/editMembrePwd" method="POST">
            <div class="form-row">
                <div class="col-sm-5 offset-sm-1 mb-3">
                    <label for="motDePasse1" class="textebleue">Nouveau mot de passe:</label>
                    <input type="password" class="form-control" id="motDePasse1" placeholder="Mot de passe" name="motDePasse1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required onBlur="checkPass()">
                </div>
                <div class="col-sm-5 mb-3">
                    <label for="motDePasse2" class="textebleue">Confirmer le mot de passe:</label>
                    <input type="password" class="form-control" id="motDePasse2" placeholder="Mot de passe" name="motDePasse2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required onBlur="checkPass()">
                </div>
                <div id="divcomp" class="offset-sm-1 col-sm-5">
                </div>
            </div>
            <div class="form-row hidden">
                <div class="col-sm mb-3">
                    <label for="id">ID:</label>
                    <input type="text" class="form-control" value="<?= $membre->id ?>" name="id">
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-5 offset-sm-1 mb-2 text-center">
                    <button type="submit" id="btnValid" class="btn btn-outline-success btn-sm offset-sm-1 my-1">Valider</button>
                </div>
                <div class="col-sm-5 mb-2 text-center">
                    <a href="/Membres/index" class="btn btn-outline-light btn-sm my-2" role="button">Annuler</a>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-10 offset-sm-1 my-1">
                    <h6 class="minititre text-justify textebleue">Les mots de passe doivent contenir au minimum 8 caractères dont une minuscule, une majuscule et un chiffre.</h6>
                    <h6 class="minititre text-justify textebleue">Les caractères \ / <> & \ ' " sont à exclure.</h6>
                </div>
            </div>
        </form>
    </div>

</section>