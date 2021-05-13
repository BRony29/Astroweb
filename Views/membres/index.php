<section id="membresAdministrations">

    <div id="membresMenu" class="row my-3 windowTheme">
        <div class="col-7 my-auto">
            <h1 class="titre text-uppercase text-left">Adhérents</h1>
        </div>
        <div class="col-5 text-right my-auto">
            <button class="btn btn-info btn-xs" type="button" data-toggle="modal" data-target="#ajoutModal" title="Ajouter un adhérent"><i class="fas fa-plus"></i></button>
        </div>
    </div>

    <div id="tableMembres" class="table-responsive">
        <table class="table table-sm table-striped" id="table" data-buttons-class="light" data-toggle="table" data-search="true" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-columns="true" data-show-toggle="true" data-show-pagination-switch="true" data-show-fullscreen="true" data-buttons-prefix="btn-sm btn" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
            <thead>
                <tr>
                    <th scope="col" class="text-center table-texte tableth" data-field="outils">Outils</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="id" data-visible="false">ID</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="login">Login</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="nom">Nom</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="prenom">Prenom</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="actif">Actif</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="fonction">Fonction</th>
                    <th scope="col" class="text-center table-texte tableth" data-field="adresse" data-visible="false">Adresse</th>
                    <th scope="col" class="text-center table-texte tableth" data-field="codePostale" data-visible="false">C.P.</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="ville" data-visible="false">Ville</th>
                    <th scope="col" class="text-center table-texte tableth" data-field="tel" data-visible="false">Téléphone</th>
                    <th scope="col" class="text-center table-texte tableth" data-field="email" data-visible="false">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($membres as $membre) : ?>
                    <?php if ($membre->fonction != 0 && $membre->fonction != 3) : ?>
                        <?php if ($_SESSION['user']->fonction == 2 && $membre->fonction != 2) : ?>
                            <tr>
                                <td class="text-center tabletd">
                                    <button class="btn btn-outline-primary btn-xs my-1 mx-2" type="button" data-toggle="modal" data-target="#ajouterModal" title="Envoyer un message" data-whatever="<?= $membre->id ?>"><i class="far fa-comments"></i></button>
                                    <a href="/Membres/detailMembre/<?= $membre->id ?>" class="btn btn-outline-info ml-auto my-1 mx-1 btn-xs" role="button" title="Voir/Modifier"><i class="fas fa-user-edit"></i></a>
                                    <button type="button" class="btn btn-outline-warning btn-xs my-1 mx-1" data-toggle="modal" data-target="#supprimerModal" title="Supprimer adhérent" data-whatever="<?= $membre->id ?>"><i class="far fa-trash-alt"></i></button>
                                </td>
                                <td class="text-center my-auto table-texte tabletd"><?= $membre->id ?></td>
                                <td class="text-center my-auto table-texte tabletd"><?= $membre->login ?></td>
                                <td class="text-center my-auto table-texte tabletd"><?= $membre->nom ?></td>
                                <td class="text-center my-auto table-texte tabletd"><?= $membre->prenom ?></td>
                                <td class="text-center my-auto table-texte tabletd">
                                    <a href="/Membres/actifMembre/<?= $membre->id ?>" class="btn btn-outline-info ml-auto my-1 mx-1 btn-sm sm-no-display" role="button" title="Activer/Désactiver">
                                        <?php if ($membre->actif == 1) echo 'oui' ?>
                                        <?php if ($membre->actif == 0) echo 'non' ?>
                                    </a>
                                </td>
                                <td class="text-center my-auto table-texte tabletd">
                                    <?php
                                    if ($membre->fonction == 1) {
                                        echo 'Adérent';
                                    }
                                    if ($membre->fonction == 2) {
                                        echo 'Modérateur';
                                    } ?>
                                </td>
                                <td class="text-center my-auto table-texte tabletd"><?= $membre->adresse ?></td>
                                <td class="text-center my-auto table-texte tabletd"><?= $membre->codePostale ?></td>
                                <td class="text-center my-auto table-texte tabletd"><?= $membre->ville ?></td>
                                <td class="text-center my-auto table-texte tabletd"><?= $membre->tel ?></td>
                                <td class="text-center my-auto table-texte tabletd"><?= $membre->email ?></td>
                            </tr>
                        <?php endif; ?>
                        <?php if ($_SESSION['user']->fonction == 3) : ?>
                            <tr>
                                <td class="text-center tabletd">
                                    <button class="btn btn-outline-primary btn-xs my-1 mx-2" type="button" data-toggle="modal" data-target="#ajouterModal" title="Envoyer un message" data-whatever="<?= $membre->id ?>"><i class="far fa-comments"></i></button>
                                    <a href="/Membres/detailMembre/<?= $membre->id ?>" class="btn btn-outline-info ml-auto my-1 mx-1 btn-xs" role="button" title="Voir/Modifier"><i class="fas fa-user-edit"></i></a>
                                    <button type="button" class="btn btn-outline-warning btn-xs my-1 mx-1" data-toggle="modal" data-target="#supprimerModal" title="Supprimer adhérent" data-whatever="<?= $membre->id ?>"><i class="far fa-trash-alt"></i></button>
                                </td>
                                <td class="text-center my-auto table-texte tabletd"><?= $membre->id ?></td>
                                <td class="text-center my-auto table-texte tabletd"><?= $membre->login ?></td>
                                <td class="text-center my-auto table-texte tabletd"><?= $membre->nom ?></td>
                                <td class="text-center my-auto table-texte tabletd"><?= $membre->prenom ?></td>
                                <td class="text-center my-auto table-texte tabletd">
                                    <a href="/Membres/actifMembre/<?= $membre->id ?>" class="btn btn-outline-info ml-auto my-1 mx-1 btn-sm sm-no-display" role="button" title="Activer/Désactiver">
                                        <?php if ($membre->actif == 1) echo 'oui' ?>
                                        <?php if ($membre->actif == 0) echo 'non' ?>
                                    </a>
                                </td>
                                <td class="text-center my-auto table-texte tabletd">
                                    <?php
                                    if ($membre->fonction == 1) {
                                        echo 'Adérent';
                                    }
                                    if ($membre->fonction == 2) {
                                        echo 'Modérateur';
                                    } ?>
                                </td>
                                <td class="text-center my-auto table-texte tabletd"><?= $membre->adresse ?></td>
                                <td class="text-center my-auto table-texte tabletd"><?= $membre->codePostale ?></td>
                                <td class="text-center my-auto table-texte tabletd"><?= $membre->ville ?></td>
                                <td class="text-center my-auto table-texte tabletd"><?= $membre->tel ?></td>
                                <td class="text-center my-auto table-texte tabletd"><?= $membre->email ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal ajout d'un adhérent -->
    <div class="modal fade" id="ajoutModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Membres/ajoutMembreConfirme" method="POST" class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title noire">Ajouter un adhérent.</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input class="form-control form-control-sm text-dark" name="login" pattern="^[-a-zA-Z0-9 àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$" placeholder="Login">
                    <input class="form-control form-control-sm text-dark my-3" name="nom" pattern="^[-a-zA-Z àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$" placeholder="Nom">
                    <input class="form-control form-control-sm text-dark" name="prenom" pattern="^[-a-zA-Z àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$" placeholder="Prénom">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de confirmation de suppression d'un membre -->
    <div class="modal fade" id="supprimerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/Membres/supprimerMembre" method="POST">
                    <div class="modal-body noire">
                        <div class="form-group">
                            <h6>Confirmez vous la suppression de l'adhérent ?</h6>
                            <input type="hidden" id="recipient-name" name="id_Asupprimer">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary btn-sm">Confirmer</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal d'envoi d'un message -->
    <div class="modal fade" id="ajouterModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/notifications/EnvoiMessage" method="POST">
                    <div class="modal-header noire">
                        <h6>Envoyer un message.</h6>
                        <input type="hidden" name="id_destinataire">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="login_expediteur" value="<?= $_SESSION['user']->login ?>">
                            <input type="hidden" name="id_expediteur" value="<?= $_SESSION['user']->id ?>">
                            <textarea class="form-control form-control-sm text-dark" rows="4" type="text" name="message" placeholder="Message"></textarea>
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

</section>