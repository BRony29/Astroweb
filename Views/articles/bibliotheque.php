<section id="bibliotheque">
    <div class="row mt-3 mb-2 windowTheme">
        <div class="col-10 my-auto">
            <h1 class="titre text-uppercase text-left">Bibliothèque d'images</h1>
        </div>
        <div class="col-2 text-right my-auto">
            <button class="btn btn-info btn-xs" type="button" data-toggle="modal" data-target="#ajoutImageModal" title="Ajouter une image"><i class="fas fa-plus"></i></button>
        </div>
    </div>

    <div class="row windowTheme">
        <div class="col-sm-12 mb-2">
            <h5 class="minititre text-left textebleue">Cliquez sur une image pour l'afficher et ouvrir un carrousel.</h5>
        </div>
        <div class="row justify-content-around">
            <?php foreach ($articlesImages as $articlesImage) : ?>
                <div class="col-2 col-md-2 col-lg-1 imagesArticleBorder my-1 mx-1 text-center fancy">
                    <a data-fancybox="gallery" href="/public/articles/<?= $articlesImage->imagePath ?>"><img class="img-fluid mt-2" src="/public/articles/<?= $articlesImage->imagePath ?>" title="<?= $articlesImage->imagePath ?>" alt="<?= $articlesImage->imagePath ?>"></a>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <!-- Modal ajout d'image pour les articles -->
    <div class="modal fade" id="ajoutImageModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/articles/upload" method="POST" class="modal-content" enctype="multipart/form-data">
                <div class="modal-header">
                    <h6 class="modal-title noire">Ajouter une image à la bibilothèque :</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="file" class="form-control form-control-sm" name="fileImage">
                </div>
                <p class="noteModal"><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .gif, .png sont autorisés avec une taille maximale de <?= MAX_SIZE_FILE ?> Mo.</p>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

</section>