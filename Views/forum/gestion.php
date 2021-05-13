<section>
    <div class="row my-3 windowTheme">
        <div class="col-7 my-auto">
            <h1 class="titre text-uppercase text-left">Forum</h1>
        </div>
    </div>
</section>

<section id="forum">

    <div class="row windowTheme">
        <div class="col-sm-8 offset-sm-2">
            <div class="row">
                <div class="col-9 my-auto">
                    <span class="textebleue font-weight-bold">Liste des catégories :</span>
                </div>
                <div class="col-3 my-auto text-right">
                    <button class="btn btn-outline-info btn-xs my-1 mx-1" type="button" data-toggle="modal" data-target="#ajoutCategorie" title="Ajouter une catégorie"><i class="fas fa-plus"></i></button>
                </div>
            </div>
            <hr>
            <?php foreach ($f_categories as $categorie) : ?>
                <div class="row">
                    <div class="col-12 col-sm-8">
                        <span class="textejaune font-weight-bold"><i class="fas fa-caret-right"></i>&ensp;<?= $categorie->nom ?></span>
                    </div>
                    <div class="col-12 col-sm-4 text-right">
                        <button type="button" class="btn btn-outline-success btn-xs my-1 mx-1" data-toggle="collapse" data-target="#accordion<?= $categorie->id ?>" aria-expanded="true" aria-controls="accordion<?= $categorie->id ?>" title="Liste des sous-catégories"><i class="fas fa-list"></i></button>
                        <button type="button" class="btn btn-outline-info btn-xs my-1 mx-1" data-toggle="modal" data-target="#modifierDouble" title="Modifier la catégorie '<?= $categorie->nom ?>'" data-idmodif="<?= $categorie->id ?>" data-sujetmodif="<?= $categorie->nom ?>"><i class="fas fa-pencil-alt"></i></button>
                        <button type="button" class="btn btn-outline-warning btn-xs my-1 mx-1" data-toggle="modal" data-target="#supprimerModal2" title="Supprimer la catégorie '<?= $categorie->nom ?>'" data-whatever="<?= $categorie->id ?>"><i class="far fa-trash-alt"></i></button>
                    </div>
                </div>
                <hr>
            <?php endforeach ?>
        </div>
    </div>

    <?php foreach ($f_categories as $categorie) : ?>
        <div id="accordion<?= $categorie->id ?>" class="collapse" data-parent="#forum">
            <div class="row windowTheme">
                <div class="col-sm-8 offset-sm-2">
                    <div class="row">
                        <div class="col-12">
                            <p class="textejaune font-weight-bold"><i class="fas fa-caret-right"></i>&ensp;<?= $categorie->nom ?>
                                <button type="button" class="close" data-toggle="collapse" data-target="#accordion1" aria-expanded="true" aria-controls="accordion<?= $categorie->id ?>">
                                    <span class="texteblanc">&times;</span>
                                </button>
                            </p>
                        </div>
                        <div class="col-6">
                            <p class="textebleue font-weight-bold">Liste des sous-catégories : </p>
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-outline-info btn-xs my-1 mx-1" type="button" data-toggle="modal" data-target="#ajouterModal" title="Ajouter une sous-catégorie" data-whatever="<?= $categorie->id ?>"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <hr>
                    <?php foreach ($f_souscategories as $souscategorie) :;
                        if ($souscategorie->id_f_categories == $categorie->id) : ?>
                            <div class="row">
                                <div class="col-sm-5 offset-sm-1">
                                    <span><i class="fas fa-caret-right"></i>&ensp;<?= $souscategorie->nom ?></span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button type="button" class="btn btn-outline-info btn-xs my-1 mx-1" data-toggle="modal" data-target="#modifierDouble2" title="Modifier la sous-catégorie '<?= $souscategorie->nom ?>'" data-idmodif="<?= $souscategorie->id ?>" data-sujetmodif="<?= $souscategorie->nom ?>"><i class="fas fa-pencil-alt"></i></button>
                                    <button type="button" class="btn btn-outline-warning btn-xs my-1 mx-1" data-toggle="modal" data-target="#supprimerModal" title="Supprimer la sous-catégorie '<?= $souscategorie->nom ?>'" data-whatever="<?= $souscategorie->id ?>"><i class="far fa-trash-alt"></i></button>
                                </div>
                            </div>
                            <hr>
                    <?php endif;
                    endforeach; ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>

    <!-- Modal d'ajout d'une catégorie' -->
    <div class="modal fade" id="ajoutCategorie" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/forum/ajoutCategorie" method="POST">
                    <div class="modal-header noire">
                        <span>Ajouter une catégorie :</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="raison">
                            <input class="form-control form-control-sm text-dark" type="text" placeholder="Titre" name="ajoutCategorie">
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

    <!-- Modal de modification d'une catégorie -->
    <div class="modal fade" id="modifierDouble" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/forum/modifierCategorie" method="POST">
                    <div class="modal-header noire">
                        <span>Modifier le sujet d'une catégorie</span>
                        <input type="hidden" name="id_categorie">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm text-dark" placeholder="Titre" name="sujet_categorie">
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

    <!-- Modal de suppression d'une categorie -->
    <div class="modal fade" id="supprimerModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/forum/supprimerCategorie" method="POST">
                    <div class="modal-body noire">
                        <div class="form-group">
                            <span class="text-justify">Supprimer la catégorie supprimera aussi tous ses sous-catégories, ses topics et tous ses messages, êtes vous sûr ?</span>
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

    <!-- Modal d'ajout d'une sous-categorie -->
    <div class="modal fade" id="ajouterModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/forum/ajouterSouscategorie" method="POST">
                    <div class="modal-header noire">
                        <span>Ajouter une sous-catégorie </span>
                        <input type="hidden" name="id_categorie">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control form-control-sm text-dark" type="text" placeholder="Titre" name="ajoutSouscategorie">
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

    <!-- Modal de modification d'une sous-catégorie -->
    <div class="modal fade" id="modifierDouble2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/forum/modifierSouscategorie" method="POST">
                    <div class="modal-header noire">
                        <span>Modifier le sujet d'une catégorie</span>
                        <input type="hidden" name="id_souscategorie">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm text-dark" placeholder="Titre" name="sujet_souscategorie">
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

    <!-- Modal de suppression d'une sous-categorie -->
    <div class="modal fade" id="supprimerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/forum/supprimerSouscategorie" method="POST">
                    <div class="modal-body noire">
                        <div class="form-group">
                            <span class="text-justify">Supprimer la sous-catégorie supprimera aussi tous ses topics et tous ses messages, êtes vous sûr ?</span>
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
</section>