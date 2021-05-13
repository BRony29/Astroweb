<section id="gestionGalerieAdmin" class="accordion">

    <div class="row my-3 windowTheme">
        <div class="col-7 my-auto">
            <h1 class="titre text-uppercase text-left">galerie</h1>
        </div>
        <div class="col-5 text-right my-auto">
            <button class="btn btn-info btn-xs" type="button" data-toggle="collapse" data-target="#accordion1" aria-expanded="true" aria-controls="accordion1" title="Liste des photos"><i class="fas fa-list-ul"></i></button>
            <button class="btn btn-info btn-xs" type="button" data-toggle="collapse" data-target="#accordion2" aria-expanded="false" aria-controls="accordion2" title="Photos en attente"><i class="far fa-list-alt"></i></button>
            <button class="btn btn-info btn-xs" type="button" data-toggle="modal" data-target="#galerieModal" title="Ajouter une photo à la galerie"><i class="fas fa-plus"></i></button>
        </div>
    </div>

    <!-- Tableau des images -->
    <div id="accordion1" class="collapse show" data-parent="#gestionGalerieAdmin">
        <div class="table-responsive">
            <div class="titles windowTheme">
                <span>Liste des photos de la galerie</span>
            </div>
            <table class="table table-striped" id="table" data-buttons-class="light" data-toggle="table" data-search="true" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-columns="true" data-show-toggle="true" data-show-pagination-switch="true" data-show-fullscreen="true" data-buttons-prefix="btn-sm btn" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
                <thead>
                    <tr>
                        <th scope="col" class="text-center table-texte tableth" data-field="outils">Outils</th>
                        <th scope="col" class="text-center table-texte tableth" data-field="id" data-visible="false">ID</th>
                        <th scope="col" class="text-center table-texte tableth" data-field="fichier">Fichier</th>
                        <th scope="col" class="text-center table-texte tableth" data-field="description">Description</th>
                        <th scope="col" class="text-center table-texte tableth" data-field="vignette">Vignette</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($galeries as $galerie) : ?>
                        <tr>
                            <td class="text-center tabletd">
                                <button type="button" class="btn btn-outline-info btn-xs my-1 mx-1" data-toggle="modal" data-target="#modifierTriple" title="Modifier la description de la photo" data-idmodif="<?= $galerie->id ?>" data-sujetmodif="" data-contenumodif="<?= $galerie->dataCaption ?>"><i class="fas fa-pencil-alt"></i></button>
                                <button type="button" class="btn btn-outline-warning btn-xs my-1 mx-1" data-toggle="modal" data-target="#supprimerModal" title="Supprimer photo" data-whatever="<?= $galerie->id ?>"><i class="far fa-trash-alt"></i></button>
                            </td>
                            <td class="text-center my-auto table-texte tabletd"><?= $galerie->id ?></td>
                            <td class="text-center my-auto table-texte tabletd"><?= $galerie->imagePath ?></td>
                            <td class="text-center my-auto table-texte tabletd"><?= $galerie->dataCaption ?></td>
                            <td class="text-center my-auto table-texte tabletd"><img src="/public/thumb/<?= $galerie->imagePath ?>" class="img-fluid miniGalerie" alt="Aperçu"></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tableau des pending -->
    <div id="accordion2" class="collapse" data-parent="#gestionGalerieAdmin">
        <div class="table-responsive">
            <div class="titles windowTheme">
                <span>Liste des photos en attente</span>
            </div>
            <table class="table table-striped" id="table" data-buttons-class="light" data-toggle="table" data-search="true" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-columns="true" data-show-toggle="true" data-show-pagination-switch="true" data-show-fullscreen="true" data-buttons-prefix="btn-sm btn" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
                <thead>
                    <tr>
                        <th scope="col" class="text-center table-texte tableth" data-field="outils">Outils</th>
                        <th scope="col" class="text-center table-texte tableth" data-field="id" data-visible="false">ID</th>
                        <th scope="col" class="text-center table-texte tableth" data-field="auteur">Auteur</th>
                        <th scope="col" class="text-center table-texte tableth" data-field="fichier">Fichier</th>
                        <th scope="col" class="text-center table-texte tableth" data-field="description">Description</th>
                        <th scope="col" class="text-center table-texte tableth" data-field="vignette">Vignette</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pendings as $pending) : ?>
                        <tr>
                            <td class="text-center tabletd">
                                <a href="/public/pending/<?= $pending->imagePath ?>" download="" class="btn btn-outline-info ml-auto btn-xs" role="button" title="Télécharger"><i class="fas fa-file-download"></i></a>
                                <button type="button" class="btn btn-outline-warning btn-xs my-1 mx-1" data-toggle="modal" data-target="#supprimerModal2" title="Supprimer photo" data-whatever="<?= $pending->id ?>"><i class="far fa-trash-alt"></i></button>
                            </td>
                            <td class="text-center my-auto table-texte tabletd"><?= $pending->id ?></td>
                            <td class="text-center my-auto table-texte tabletd"><?= $pending->login ?></td>
                            <td class="text-center my-auto table-texte tabletd"><?= $pending->imagePath ?></td>
                            <td class="text-justify my-auto table-texte tabletd"><?= $pending->description ?></td>
                            <td class="text-center my-auto table-texte tabletd"><img src="/public/pending/<?= $pending->imagePath ?>" class="img-fluid miniGalerie" alt="Aperçu"></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal ajout d'image dans la galerie -->
    <div class="modal fade" id="galerieModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Galerie/upload" method="POST" class="modal-content" enctype="multipart/form-data">
                <div class="modal-header">
                    <h6 class="modal-title noire">Ajouter une photo à la galerie.</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body noire">
                    <textarea class="form-control" rows="3" name="description" placeholder="Description"></textarea>
                    <label for="fileImage" class="col-form-label col-form-label-sm mt-1">Photo originale:</label>
                    <input type="file" class="form-control form-control-sm" name="fileImage">
                    <label for="fileFiligrane" class="col-form-label col-form-label-sm mt-1">Photo filigrane:</label>
                    <input type="file" class="form-control form-control-sm" name="fileFiligrane">
                    <label for="fileThumb" class="col-form-label col-form-label-sm mt-1">Vignette (300px x 200px):</label>
                    <input type="file" class="form-control form-control-sm" name="fileThumb">
                </div>
                <p class="noteModal"><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .gif, .png sont autorisés avec une taille maximale de <?= MAX_SIZE_FILE ?> Mo et <?= MAX_SIZE_THUMB ?> Ko pour l'aperçu.</p>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de confirmation de suppression d'une photo de la galerie -->
    <div class="modal fade" id="supprimerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/Galerie/supprimerGalerie" method="POST">
                    <div class="modal-body noire">
                        <div class="form-group">
                            <span>Confirmez vous la suppression de la photo ?</span>
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

    <!-- Modal de confirmation de suppression d'une photo de la zone pending -->
    <div class="modal fade" id="supprimerModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/Galerie/supprimerPending" method="POST">
                    <div class="modal-body noire">
                        <div class="form-group">
                            <span>Confirmez vous la suppression de la photo ?</span>
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

    <!-- Modal de modification du commentaire d'une photo -->
    <div class="modal fade" id="modifierTriple" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Galerie/modifierPhoto" method="POST" class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title noire">Modifier la description d'une photo.</h6>
                    <input type="hidden" name="id">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control form-control-sm" name="titre">
                    <textarea class="form-control form-control-sm text-dark" rows="3" name="dataCaption"></textarea>
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