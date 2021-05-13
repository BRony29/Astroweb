<?php
$_SESSION['redirect'] = '/evenements/gestionAdmin';
?>

<section>

    <div class="row my-3 windowTheme">
        <div class="col-7 my-auto">
            <h1 class="titre text-uppercase text-left">évènements</h1>
        </div>
    </div>

    <div id="tableEvenements" class="table-responsive">
        <table class="table table-striped" id="table" data-toggle="table" data-buttons-class="light" data-search="true" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-columns="true" data-show-toggle="true" data-show-pagination-switch="true" data-show-fullscreen="true" data-buttons-prefix="btn-sm btn" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
            <thead>
                <tr>
                    <th scope="col" class="text-center table-texte tableth" data-field="outils">Outils</th>
                    <th scope="col" class="text-center table-texte tableth" data-field="id" data-visible="false">ID</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="date">Date</th>
                    <th scope="col" class="text-center table-texte tableth" data-field="titre">Titre</th>
                    <th scope="col" class="text-center table-texte tableth" data-field="description">Description</th>
                    <th scope="col" class="text-center table-texte tableth" data-field="Lieu">Lieu</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($evenements as $evenement) : ?>
                    <tr>
                        <td class="text-center align-middle tabletd">
                            <button type="button" class="btn btn-outline-info btn-xs my-1 mx-1" data-toggle="modal" data-target="#modifierFive" title="Modifier l'évènement" data-idmodif="<?= $evenement->id ?>" data-sujetmodif="<?= $evenement->titre ?>" data-contenumodif="<?= $evenement->description ?>" data-lieu="Lieu: <?= $evenement->lieu ?>" data-date="Date et heure: <?= strftime('%x %R', strtotime($evenement->date)) ?>"><i class="fas fa-pencil-alt"></i></button>
                        </td>
                        <td class="text-center align-middle table-texte tabletd"><?= $evenement->id ?></td>
                        <td class="text-center align-middle table-texte tabletd"><?= strftime('%x %R', strtotime($evenement->date)) ?></td>
                        <td class="text-left align-middle table-texte tabletd"><?= $evenement->titre ?></td>
                        <td class="text-justify align-middle table-texte tabletd"><?= nl2br(html_entity_decode($evenement->description)) ?></td>
                        <td class="text-left align-middle table-texte tabletd"><?= $evenement->lieu ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- Modal de visualisation et gestion d'un évènement -->
    <div class="modal fade" id="modifierFive" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title noire">Détails de l'évènement.</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body0">
                        <input type="text" class="form-control form-control-sm text-dark bg-light border-0" name="titre" readonly>
                    </div>
                    <div class="modal-body1">
                        <input type="text" class="form-control form-control-sm text-dark bg-light border-0 my-1" name="lieu" readonly>
                    </div>
                    <div class="modal-body2">
                        <input type="text" class="form-control form-control-sm text-dark bg-light border-0 mb-1" name="date" readonly>
                    </div>
                    <div class="modal-body3">
                        <textarea class="form-control form-control-sm text-dark bg-light border-0 noresize" rows="5" name="description" readonly></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Ok</button>
                </div>
                <?php if ($_SESSION['user']->fonction >= 2) : ?>
                    <form action="/Evenements/gestion" method="POST" class="modal-footer">
                        <h6 class="noire">Gestion de l'évènement</h6>
                        <input type="hidden" name="id">
                        <button type="submit" class="btn btn-warning btn-sm ml-2" title="Gestion de l'évènement" data-whatever="<?= $evenement->id ?>"><i class="fas fa-wrench"></i></button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

</section>