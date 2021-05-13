<section id="bibliotheque">
    <div class="row mt-3 mb-2 windowTheme">
        <div class="col-10 my-auto">
            <h1 class="titre text-uppercase text-left">Bibliothèque d'images</h1>
        </div>
    </div>

    <div class="row windowTheme">
        <div class="col-sm-12 mb-2">
            <h5 class="minititre text-left textebleue">Cliquez sur une image pour l'afficher et ouvrir un carrousel.</h5>
        </div>
        <div class="row justify-content-around">
            <?php foreach ($articlesImages as $articlesImage) : ?>
                <div class="col-2 col-md-2 col-lg-1 imagesArticleBorder my-1 mx-1 text-center fancy">
                    <button type="button" class="btn btn-outline-warning btn-xs my-1 mx-1" data-toggle="modal" data-target="#supprimerModal2" title="Supprimer image" data-whatever="<?= $articlesImage->id ?>"><i class="far fa-trash-alt"></i></button>
                    <a data-fancybox="gallery" href="/public/articles/<?= $articlesImage->imagePath ?>"><img class="img-fluid mt-2" src="/public/articles/<?= $articlesImage->imagePath ?>" title="<?= $articlesImage->imagePath ?>" alt="<?= $articlesImage->imagePath ?>"></a>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <!-- Modal de confirmation de suppression d'une image de la bibliothèque -->
    <div class="modal fade" id="supprimerModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/Articles/supprimerImages" method="POST">
                    <div class="modal-body noire">
                        <div class="form-group">
                            <span>Confirmez vous la suppression de l'image ?</span>
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