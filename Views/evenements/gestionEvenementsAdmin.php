<?php
require_once ("./BBCode/bbcode.php");
$bbcode = new BBCode;
?>

<section>

    <div class="row my-3 windowTheme">
        <div class="col-7 my-auto">
            <h1 class="titre text-uppercase text-left">évènements</h1>
        </div>
        <div class="col-5 text-right my-auto">
            <button class="btn btn-info btn-xs" type="button" data-toggle="modal" data-target="#ajoutModal" title="Nouveau"><i class="fas fa-plus"></i></button>
        </div>
    </div>

    <divclass="table-responsive">
        <table class="table table-striped" id="table" data-toggle="table" data-buttons-class="light" data-search="true" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-columns="true" data-show-toggle="true" data-show-pagination-switch="true" data-show-fullscreen="true" data-buttons-prefix="btn-sm btn" data-show-toggle="true" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
            <thead>
                <tr>
                    <th scope="col" class="text-center table-texte tableth" data-field="outils">Outils</th>
                    <th scope="col" class="text-center table-texte tableth" data-field="id" data-visible="false">ID</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="date">Date</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="titre">Titre</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="description">Description</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="Lieu">Lieu</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($evenements as $evenement) : ?>
                    <tr>
                        <td class="text-center align-middle tabletd">
                            <button type="button" class="btn btn-outline-info btn-xs my-1 mx-1" data-toggle="modal" data-target="#modifierFive" title="Modifier l'évènement" data-idmodif="<?= $evenement->id ?>" data-sujetmodif="<?= $evenement->titre ?>" data-contenumodif="<?= $evenement->description ?>" data-lieu="<?= $evenement->lieu ?>" data-date="<?= strftime('%x', strtotime($evenement->date)) ?>"><i class="fas fa-pencil-alt"></i></button>
                            <button type="button" class="btn btn-outline-warning btn-xs my-1 mx-1" data-toggle="modal" data-target="#supprimerModal" title="Supprimer l'évènement" data-whatever="<?= $evenement->id ?>"><i class="far fa-trash-alt"></i></button>
                        </td>
                        <td class="text-center align-middle table-texte tabletd"><?= $evenement->id ?></td>
                        <td class="text-center align-middle table-texte tabletd"><?= strftime('%x', strtotime($evenement->date)) ?></td>
                        <td class="text-left align-middle table-texte tabletd"><?= $evenement->titre ?></td>
                        <td class="text-justify align-middle table-texte tabletd"><?= $bbcode->toHTML(nl2br(html_entity_decode($evenement->description))) ?></td>
                        <td class="text-left align-middle table-texte tabletd"><?= $evenement->lieu ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </divclass=>

    <!-- Modal ajout d'un évènement -->
    <div class="modal fade" id="ajoutModal" tabindex="-1" role="dialog" aria-labelledby="ajoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Evenements/ajoutEvenements" method="POST" class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title noire" id="ajoutModalLabel">Ajouter un évènement.</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control form-control-sm text-dark" name="date" placeholder="Date (jj/mm/AAAA)" required>
                    <input type="text" class="form-control form-control-sm text-dark my-3" name="titre" placeholder="Titre" required>
                    <input type="text" class="form-control form-control-sm text-dark mb-3" name="lieu" placeholder="Lieu" required>
                    <textarea class="form-control" name="description" id="ultraEditor" placeholder="Description"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de confirmation de suppression d'un évènement -->
    <div class="modal fade" id="supprimerModal" tabindex="-1" role="dialog" aria-labelledby="supprimerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/Evenements/supprimerEvenements" method="POST">
                    <div class="modal-body noire">
                        <div class="form-group">
                            <h6>Confirmez vous la suppression de l'évènement ?</h6>
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

    <!-- Modal de modification d'un évènement -->
    <div class="modal fade" id="modifierFive" tabindex="-1" role="dialog" aria-labelledby="modifierFiveLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Evenements/modifieEvenements" method="POST" class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title noire" id="modifierFiveLabel">Modifier un évènement.</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body noire">
                    <div class="modal-body0">
                        <input type="text" class="form-control form-control-sm" name="titre" placeholder="Titre" required>
                    </div>
                    <div class="modal-body1">
                        <input type="text" class="form-control form-control-sm my-3" name="lieu" placeholder="Lieu" required>
                    </div>
                    <div class="modal-body2">
                        <input type="text" class="form-control form-control-sm mb-3" name="date" placeholder="Date (jj/mm/AAAA)" required>
                    </div>
                    <div class="modal-body3">
                        <textarea class="form-control" name="description" required></textarea>
                    </div>
                    <div class="modal-body4">
                        <input type="hidden" name="raison">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id">
                    <button type="submit" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

</section>