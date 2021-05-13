<?php
require_once ("./BBCode/bbcode.php");
$bbcode = new BBCode;
?>

<section>

    <div class="row my-3 windowTheme">
        <div class="col-7 my-auto">
            <h1 class="titre text-uppercase text-left">Actualités</h1>
        </div>
        <div class="col-5 text-right my-auto">
            <button class="btn btn-info btn-xs" type="button" data-toggle="modal" data-target="#ajoutModal" title="Nouveau"><i class="fas fa-plus"></i></button>
        </div>
    </div>

    <div id="tableActualites" class="table-responsive">
        <table class="table table-striped" id="table" data-toggle="table" data-buttons-class="light" data-page-size="25" data-search="true" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-columns="true" data-show-toggle="true" data-show-pagination-switch="true" data-show-fullscreen="true" data-buttons-prefix="btn-sm btn" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
            <thead>
                <tr>
                    <th scope="col" class="text-center table-texte tableth" data-field="outils">Outils</th>
                    <th scope="col" class="text-center table-texte tableth" data-field="id" data-visible="false">ID</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="date">Date</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="titre">Titre</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="commentaire">Commentaire</th>
                    <th scope="col" class="text-center table-texte tableth" data-field="vignette">Vignette</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actualites as $actualite) : ?>
                    <tr>
                        <td class="text-center align-middle tabletd">
                            <button type="button" class="btn btn-outline-info btn-xs my-1 mx-1" data-toggle="modal" data-target="#modifierTriple" title="Modifier l'actualité" data-idmodif="<?= $actualite->id ?>" data-sujetmodif="<?= $actualite->titre ?>" data-contenumodif="<?= $actualite->commentaire ?>"><i class="fas fa-pencil-alt"></i></button>
                            <button type="button" class="btn btn-outline-warning btn-xs my-1 mx-1" data-toggle="modal" data-target="#supprimerModal" title="Supprimer actualité" data-whatever="<?= $actualite->id ?>"><i class="far fa-trash-alt"></i></button>
                        </td>
                        <td class="text-center align-middle table-texte tabletd"><?= $actualite->id ?></td>
                        <td class="text-center align-middle table-texte tabletd"><?= strftime('%x', strtotime($actualite->date)) ?></td>
                        <td class="text-left align-middle table-texte tabletd"><?= $actualite->titre ?></td>
                        <td class="text-justify align-middle table-texte tabletd"><?= $bbcode->toHTML(nl2br(html_entity_decode($actualite->commentaire))) ?></td>
                        <td class="text-center align-middle table-texte tabletd"><img src="/public/actualites/<?= $actualite->imagePath ?>" class="img-fluid" alt="Vignette"></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- Modal ajout d'une actualité -->
    <div class="modal fade" id="ajoutModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Actualites/ajoutActualites" method="POST" class="modal-content" enctype="multipart/form-data">
                <div class="modal-header">
                    <h6 class="modal-title noire">Ajouter une actualité.</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body noire">
                    <input class="form-control form-control-sm text-dark mb-3" name="titre" placeholder="Titre" required>
                    <textarea class="form-control text-dark" name="commentaire" id="ultraEditor"></textarea>
                    <label for="fileVignette" class="col-form-label col-form-label-sm mt-1">Vignette (300px x 200px):</label>
                    <input type="file" class="form-control form-control-sm" name="fileVignette" accept="image/png, image/jpeg, image/jpg, image/gif" required>
                </div>
                <p class="noteModal"><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .gif, .png sont autorisés pour la vignette jusqu'à une taille maximale de <?= MAX_SIZE_THUMB ?> Ko.</p>
                <div class="modal-footer">
                    <input type="hidden" name="raison">
                    <button type="submit" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de confirmation de suppression d'une actualité -->
    <div class="modal fade" id="supprimerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/Actualites/supprimerActualites" method="POST">
                    <div class="modal-body noire">
                        <div class="form-group">
                            <h6>Confirmez vous la suppression de l'actualité ?</h6>
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

    <!-- Modal de modification d'une actualité -->
    <div class="modal fade" id="modifierTriple" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Actualites/modifieActualites" method="POST" class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title noire">Modifier une actualité.</h6>
                    <input type="hidden" name="id">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control form-control-sm text-dark mb-3" name="titre" placeholder="Titre" required>
                    <textarea class="form-control form-control-sm text-dark" rows="4" name="commentaire" required></textarea>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="raison">
                    <button type="submit" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</section>
