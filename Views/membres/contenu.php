<?php
    $_SESSION['redirect'] = '/membres/contenu';
?>

<section id="contenu" class="accordion">

    <div class="row my-3 windowTheme">
        <div class="col-9 my-auto">
            <h1 class="titre text-uppercase text-left">Gérer votre contenu</h1>
        </div>
    </div>

    <div id="contenu_content" class="windowTheme">
        <div class="form-row">
            <div class="col-sm-10 offset-sm-1">
                <p class="text-justify">ici, c'est votre rubrique, vous pouvez proposer, modifier et ajouter du contenu pour faire vivre le site.</p>
            </div>
        </div>
        <div class="form-row my-1">
            <div class="col-sm-10 offset-sm-1 mb-1 ligneSuperieure">
                <p class="text-uppercase textebleue my-1">Proposer une photo</p>
                <p class="text-justify my-1">Vous faites de la photo ? Alors cliquer sur le bouton ci-dessous vous permettra de soumettre une photo et son commentaire afin de l'intégrer à la galerie. Après votre envoi, l'administrateur traitera votre demande et ajoutera votre photo à la galerie. N'hésitez pas à être exhaustif dans votre commentaire : matériels utilisés, temps de pose, traitements...</p>
            </div>
            <div class="col-sm-10 offset-sm-1 mb-3 text-center">
                <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#galerieModal" title="Proposer une photo">Proposer une photo</button>
            </div>
        </div>
        <div class="form-row my-1">
            <div class="col-sm-10 offset-sm-1 mb-1 ligneSuperieure">
                <p class="text-uppercase textebleue my-1">Rédiger un article</p>
                <p class="text-justify my-1">Ce bouton ouvre une interface de type « CMS » (système de gestion de contenu) où vous pouvez rédiger des articles afin d'enrichir les bibliothèques d'articles en proposant du contenu scientifique, des tutoriaux concernant du matériel, l'informatique ou les bonnes pratiques de l'observation astronomique. Votre article est immédiatement publié dès son envoi.</p>
            </div>
            <div class="col-sm-10 offset-sm-1 mb-3 text-center">
                <a href="/articles/nouvelArticle" class="btn btn-outline-success btn-sm mx-1" role="button">Rédiger un article</a>
            </div>
        </div>
        <div class="form-row my-1">
            <div class="col-sm-10 offset-sm-1 mb-1 ligneSuperieure">
                <p class="text-uppercase textebleue my-1">Bibliothèque d'images</p>
                <p class="text-justify my-1">Ce bouton ouvre la bibliothèque d'images. Vous pouvez ajouter des images dans la bibliothèque pour ensuite les insérer dans vos articles, en copiant/collant une partie de l'hyperlien (voir Aide). Une image n'est pas exclusive à un article, elle peut être utiliser pour illustrer plusieurs articles, C'est pour cela que seuls les modérateurs et l'administrateur peuvent supprimer des images de la bibliothèque.</p> 
            </div>
            <div class="col-sm-10 offset-sm-1 mb-3 text-center">
                <a href="/articles/bibliotheque" class="btn btn-outline-success btn-sm mx-1" role="button">Bibliothèque d'images</a>
            </div>
        </div>
        <div class="form-row my-1">
            <div class="col-sm-10 offset-sm-1 mb-2 ligneSuperieure">
                <p class="text-uppercase textebleue my-1">Modifier un article</p>
                <p class="text-justify my-1">Ci-dessous la liste des articles que vous avez rédigé. Vous pouvez les corriger, les mettre à jour ou les supprimer.</p>
                <p class="text-justify my-1">Vous avez rédigé <?= count($articles) ?> articles :</p>
            </div>
            <div class="col-sm-10 offset-sm-1">
                <?php foreach ($articles as $article) : ?>
                    <div class="row">
                        <div class="col-sm-9">
                            <p><i class="fas fa-caret-right"></i>&ensp;<?= $article->titre ?></p>
                        </div>
                        <div class="col-sm-3 text-right">
                            <a href="/articles/consulter/<?= $article->id ?>" class="btn btn-outline-success my-1 btn-xs" role="button" title="Consulter l'article"><i class="far fa-eye"></i></a>
                            <a href="/articles/editArticles/<?= $article->id ?>" class="btn btn-outline-info my-1 mx-1 btn-xs" role="button" title="Modifier l'article"><i class="fas fa-pencil-alt"></i></a>
                            <button type="button" class="btn btn-outline-warning btn-xs my-1" data-toggle="modal" data-target="#supprimerModal" title="Supprimer l'article" data-whatever="<?= $article->id ?>"><i class="far fa-trash-alt"></i></button>
                        </div>
                    </div><hr>
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <!-- Modal ajout d'image dans la galerie -->
    <div class="modal fade" id="galerieModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Galerie/soumettre" method="POST" class="modal-content" enctype="multipart/form-data">
                <div class="modal-header">
                    <h6 class="modal-title noire">Proposer une photo.</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea class="form-control form-control-sm text-dark mb-3" rows="4" name="description" placeholder="description" required></textarea>
                    <input type="file" class="form-control form-control-sm" name="fileImage" required>
                </div>
                <p class="noteModal"><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de <?= MAX_SIZE_FILE ?> Mo et 100 Ko pour l'aperçu.</p>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de confirmation de suppression d'un article -->
    <div class="modal fade" id="supprimerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/Articles/supprimerArticles" method="POST">
                    <div class="modal-body noire">
                        <div class="form-group">
                            <span>Confirmez vous la suppression de l'article ?</span>
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