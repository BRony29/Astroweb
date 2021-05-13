<section id="annuaire" class="accordion">

    <div id="annuaireMenu" class="row my-3 windowTheme">
        <div class="col-9 my-auto">
            <h1 class="titre text-uppercase text-left">Annuaire</h1>
        </div>
        <div class="col-3 align-middle text-right">
            <button class="btn btn-outline-light btn-sm" onclick="history.back()">Retour</button>
        </div>
    </div>

    <div id="tableAnnuaire" class="table-responsive">
        <table class="table table-striped" id="table" data-buttons-class="light" data-toggle="table" data-search="true" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-columns="true" data-show-toggle="true" data-show-pagination-switch="true" data-show-fullscreen="true" data-buttons-prefix="btn-sm btn" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
            <thead>
                <tr>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="login">Login</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="nom" data-visible="false">Nom</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="prenom">Prenom</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="fonction">Fonction</th>
                    <th scope="col" class="text-center table-texte tableth" data-field="adresse" data-visible="false">Adresse</th>
                    <th scope="col" class="text-center table-texte tableth" data-field="codePostale" data-visible="false">C.P.</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="ville" data-visible="false">Ville</th>
                    <th scope="col" class="text-center table-texte tableth" data-field="tel">Téléphone</th>
                    <th scope="col" class="text-center table-texte tableth" data-field="email">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($membres as $membre) : ?>
                    <?php if ($membre->fonction != 0) : ?>
                        <tr>
                            <td class="text-center table-texte tabletd">
                                <button class="float-left btn btn-outline-primary btn-xs my-1 mx-2" type="button" data-toggle="modal" data-target="#ajouterModal" title="Envoyer un message" data-whatever="<?= $membre->id ?>"><i class="far fa-comments"></i></button>
                                <?= $membre->login ?>
                            </td>
                            <td class="text-center align-middle table-texte tabletd"><?= $membre->nom ?></td>
                            <td class="text-center align-middle table-texte tabletd"><?= $membre->prenom ?></td>
                            <td class="text-center align-middle table-texte tabletd">
                                <?php if ($membre->fonction == 1) {
                                    echo 'adhérent';
                                } elseif ($membre->fonction == 2) {
                                    echo 'modérateur';
                                } else {
                                    echo 'administrateur';
                                }
                                ?>
                            </td>
                            <td class="text-center align-middle table-texte tabletd"><?= $membre->adresse ?></td>
                            <td class="text-center align-middle table-texte tabletd"><?= $membre->codePostale ?></td>
                            <td class="text-center align-middle table-texte tabletd"><?= $membre->ville ?></td>
                            <td class="text-center align-middle table-texte tabletd"><?= $membre->tel ?></td>
                            <td class="text-center align-middle table-texte tabletd"><a href="mailto:<?= $membre->email ?>?subject=Astroweb%20Annuaire%20-%20<?= $_SESSION['user']->login ?>%20:"><i class="far fa-envelope"></i>&ensp;<?= $membre->email ?></a></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- Modal d'envoi d'un message -->
    <div class="modal fade" id="ajouterModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/notifications/EnvoiMessage" method="POST">
                    <div class="modal-header noire">
                        <h6>Envoyer un message </h6>
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