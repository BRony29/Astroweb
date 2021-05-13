<section id="Settings">

    <div class="row my-3 windowTheme">
        <div class="col-7 my-auto">
            <h1 class="titre text-uppercase text-left">Administrateur</h1>
        </div>
    </div>

    <div id="SettingsMenu" class="windowTheme">
        <div class="row">
            <div class="col-sm-10 offset-sm-1 textebleue my-1">
                Paramètres administrateur
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-5 offset-sm-1">
                <i class="fas fa-caret-right"></i>&ensp;Login administrateur
            </div>
            <div class="col-6 col-sm-4">
                <?= $administrateur->login ?>
            </div>
            <div class="col-6 col-sm-1 text-right">
                <button type="button" class="btn btn-outline-info ml-auto btn-xs" title="modifier" data-toggle="modal" data-target="#adminLoginModal"><i class="fas fa-pencil-alt"></i></button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-5 offset-sm-1">
                <i class="fas fa-caret-right"></i>&ensp;Adresse email de l'administrateur
            </div>
            <div class="col-6 col-sm-4">
                <?= $administrateur->email ?>
            </div>
            <div class="col-6 col-sm-1 text-right">
                <button type="button" class="btn btn-outline-info ml-auto btn-xs" title="modifier" data-toggle="modal" data-target="#adminEmailModal"><i class="fas fa-pencil-alt"></i></button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-5 offset-sm-1">
                <i class="fas fa-caret-right"></i>&ensp;Mot de passe administrateur
            </div>
            <div class="col-6 col-sm-4">
                non visible
            </div>
            <div class="col-6 col-sm-1 text-right">
                <button type="button" class="btn btn-outline-info ml-auto btn-xs" title="modifier" data-toggle="modal" data-target="#adminPwdModal"><i class="fas fa-pencil-alt"></i></button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-10 offset-sm-1 textebleue my-1">
                Paramètres du site
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-5 offset-sm-1">
                <i class="fas fa-caret-right"></i>&ensp;Mot de passe par défaut
            </div>
            <div class="col-6 col-sm-4">
                non visible
            </div>
            <div class="col-6 col-sm-1 text-right">
                <button type="button" class="btn btn-outline-info ml-auto btn-xs" title="modifier" data-toggle="modal" data-target="#pwdModal"><i class="fas fa-pencil-alt"></i></button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-5 offset-sm-1">
                <i class="fas fa-caret-right"></i>&ensp;Nombre d'essais avant vérrouillage du compte
            </div>
            <div class="col-6 col-sm-4">
                <?= MAX_LOGIN_ERROR ?>
            </div>
            <div class="col-6 col-sm-1 text-right">
                <button type="button" class="btn btn-outline-info ml-auto btn-xs" title="modifier" data-toggle="modal" data-target="#lockModal"><i class="fas fa-pencil-alt"></i></button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-5 offset-sm-1">
                <i class="fas fa-caret-right"></i>&ensp;Durée maximale de session inactive (secondes)
            </div>
            <div class="col-6 col-sm-4">
                <?= MAX_TIMEOUT ?>
            </div>
            <div class="col-6 col-sm-1 text-right">
                <button type="button" class="btn btn-outline-info ml-auto btn-xs" title="modifier" data-toggle="modal" data-target="#sessionModal"><i class="fas fa-pencil-alt"></i></button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-5 offset-sm-1">
                <i class="fas fa-caret-right"></i>&ensp;Poids maximum des photos (Mo)
            </div>
            <div class="col-6 col-sm-4">
                <?= MAX_SIZE_FILE ?>
            </div>
            <div class="col-6 col-sm-1 text-right">
                <button type="button" class="btn btn-outline-info ml-auto btn-xs" title="modifier" data-toggle="modal" data-target="#tailleModal"><i class="fas fa-pencil-alt"></i></button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-5 offset-sm-1">
                <i class="fas fa-caret-right"></i>&ensp;Poids maximum des vignettes (ko)
            </div>
            <div class="col-6 col-sm-4">
                <?= MAX_SIZE_THUMB ?>
            </div>
            <div class="col-6 col-sm-1 text-right">
                <button type="button" class="btn btn-outline-info ml-auto btn-xs" title="modifier" data-toggle="modal" data-target="#thumbModal"><i class="fas fa-pencil-alt"></i></button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-10 offset-sm-1 textebleue my-1">
                Gestion des modérateurs
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-5 offset-sm-1">
                <i class="fas fa-caret-right"></i>&ensp;Ajouter un modérateur
            </div>
            <div class="col-6 col-sm-4">
            </div>
            <div class="col-6 col-sm-1 text-right">
                <button type="button" class="btn btn-outline-success ml-auto btn-xs" title="Ajouter un modérateur" data-toggle="modal" data-target="#ajouterModerateurModal"><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <hr>
        <?php foreach ($moderateurs as $moderateur) : ?>
            <div class="row">
                <div class="col-sm-5 offset-sm-1">
                    <i class="fas fa-caret-right"></i>&ensp;Modérateur :
                </div>
                <div class="col-6 col-sm-4">
                    <?= $moderateur->login ?> (<?= $moderateur->nom ?> <?= $moderateur->prenom ?>)
                </div>
                <div class="col-6 col-sm-1 text-right">
                    <button type="button" class="btn btn-outline-warning ml-auto btn-xs" title="Retirer modérateur" data-toggle="modal" data-target="#supprimerModal" data-whatever="<?= $moderateur->id ?>"><i class="far fa-trash-alt"></i></button>
                </div>
            </div>
            <hr>
        <?php endforeach; ?>
    </div>

    <!-- Modal modifier le login de l'administrateur -->
    <div class="modal fade" id="adminLoginModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Administration/administrateurLogin" method="POST" class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title noire">Nouveau login de l'administrateur :</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control form-control-sm text-dark" placeholder="Login actuel : <?= $administrateur->login ?>" name="login" pattern="^[A-Za-z '-']+$" required>
                    <h6 class="minititreNoir text-justify my-1"><br>Vous devrez vous reconnecter après le changement.</h6>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal modifier l'adresse email de l'administrateur -->
    <div class="modal fade" id="adminEmailModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Administration/administrateurEmail" method="POST" class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title noire">Nouvelle adresse email de l'administrateur :</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="email" class="form-control form-control-sm text-dark" placeholder="Adresse actuelle : <?= $administrateur->email ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required name="email">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal modifier le mot de passe de l'administrateur -->
    <div class="modal fade" id="adminPwdModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Administration/administrateurPwd" method="POST" class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title noire">Nouveau mot de passe administrateur :</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="password" class="form-control form-control-sm text-dark mb-3" id="motDePasse1" placeholder="Nouveau mot de passe" name="motDePasse1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required onBlur="checkPass()">
                    <input type="password" class="form-control form-control-sm text-dark" id="motDePasse2" placeholder="Confirmez le mot de passe" name="motDePasse2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required onBlur="checkPass()">
                    <div id="divcomp" class="col-sm-12 mt-1">
                    </div>
                    <h6 class="minititreNoir text-justify my-1"><br>Les mots de passe doivent contenir au minimum 8 caractères dont une minuscule, une majuscule et un chiffre. Les caractères \ / <> & \ ' " sont à exclure.</h6>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnValid" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal modifier le mot de passe par défaut -->
    <div class="modal fade" id="pwdModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Settings/defaultpwd" method="POST" class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title noire">Nouveau mot de passe par défaut :</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="password" class="form-control form-control-sm text-dark mb-3" id="motDePasse3" placeholder="Nouveau mot de passe" name="motDePasse3" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required onBlur="checkPass2()">
                    <input type="password" class="form-control form-control-sm text-dark" id="motDePasse4" placeholder="Confirmez le mot de passe" name="motDePasse4" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required onBlur="checkPass2()">
                    <div id="divcomp2" class="col-sm-12 mt-1">
                    </div>
                    <h6 class="minititreNoir text-justify my-1"><br>Les mots de passe doivent contenir au minimum 8 caractères dont une minuscule, une majuscule et un chiffre. Les caractères \ / <> & \ ' " sont à exclure.</h6>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnValid2" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal modifier le nombre d'essais avant verrouillage -->
    <div class="modal fade" id="lockModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Settings/parametreSite" method="POST" class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title noire">Modifier le nombre d'essais avant verrouillage (1-5) :</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body noire hidden">
                    <label for="param" class="col-form-label col-form-label-sm">param:</label>
                    <input type="text" class="form-control form-control-sm" name="param" value="limite" readonly>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control form-control-sm text-dark" placeholder="Valeur actuelle : <?= MAX_LOGIN_ERROR ?>" name="limite" id="limite" pattern="[1-5]" onBlur="checkLimite()" required>
                    <div id="divlimite" class="col-sm-12 mt-1"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnValid6" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal modifier la durée de session inactive -->
    <div class="modal fade" id="sessionModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Settings/parametreSite" method="POST" class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title noire">Nouvelle durée de session inactive (600-3600 sec):</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body noire hidden">
                    <label for="param" class="col-form-label col-form-label-sm">param:</label>
                    <input type="text" class="form-control form-control-sm" name="param" value="duree" readonly>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control form-control-sm text-dark" name="duree" id="duree" placeholder="Valeur actuelle : <?= MAX_TIMEOUT ?> secondes" pattern="[0-9]{3,4}" onBlur="checkDuree()" required>
                    <div id="divduree" class="col-sm-12 mt-1"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnValid3" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal modifier le poids maximale des photos -->
    <div class="modal fade" id="tailleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Settings/parametreSite" method="POST" class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title noire"> Nouveau poids maximum des photos (1-5 Mo) :</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body noire hidden">
                    <label for="param" class="col-form-label col-form-label-sm">param:</label>
                    <input type="text" class="form-control form-control-sm" name="param" value="taille" readonly>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control form-control-sm text-dark" name="taille" id="taille" placeholder="Valeur actuelle : <?= MAX_SIZE_FILE ?> Mo" pattern="[1-5]"  onBlur="checkTaille()" required>
                    <div id="divtaille" class="col-sm-12 mt-1"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnValid5" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal modifier le poids maximale des vignette -->
    <div class="modal fade" id="thumbModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Settings/parametreSite" method="POST" class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title noire">Nouveau poids maximum des vignettes (100-500 ko) :</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body noire hidden">
                    <label for="param" class="col-form-label col-form-label-sm">param:</label>
                    <input type="text" class="form-control form-control-sm" name="param" value="thumb" readonly>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control form-control-sm text-dark" name="thumb" id="thumb" placeholder="Valeur actuelle : <?= MAX_SIZE_THUMB ?> Ko" pattern="[0-9]{3}" onBlur="checkThumb()" required>
                    <div id="divthumb" class="col-sm-12 mt-1"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnValid4" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal d'ajouter d'un modérateur -->
    <div class="modal fade" id="ajouterModerateurModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/Settings/ajoutModerateur" method="POST">
                    <div class="modal-header noire">
                    <h6>Remplissez au minimum un des champs ci-dessous<br>afin de nommer un nouveau modérateur :</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body noire">
                        <div class="form-group">
                            <input class="form-control form-control-sm text-dark" type="text" name="login_moderateur" placeholder="Login">
                            <input class="form-control form-control-sm text-dark my-3" type="text" name="nom_moderateur" placeholder="Nom">
                            <input class="form-control form-control-sm text-dark" type="text" name="prenom_moderateur" placeholder="Prénom">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="raison">
                        <button type="submit" class="btn btn-secondary btn-sm">Envoyer</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de confirmation de suppression d'un modérateur -->
    <div class="modal fade" id="supprimerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/Settings/supprimerModerateur" method="POST">
                    <div class="modal-body noire">
                        <div class="form-group">
                            <h6>Confirmez vous le retrait de ce modérateur ?</h6>
                            <input type="hidden" id="recipient-name" name="id_Asupprimer">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
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