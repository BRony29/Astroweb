<?php
require_once("./BBCode/bbcode.php");
$bbcode = new BBCode;
?>

<section>

    <div class="row my-3 windowTheme">
        <div class="col-9 my-auto">
            <h1 class="titre text-uppercase text-left">article édition</h1>
        </div>
        <div class="col-3 text-right my-auto">
            <button class="btn btn-outline-light btn-sm" onclick="history.back()">Annuler</button>
        </div>
    </div>

    <form action="/articles/modifierArticles" method="POST">
        <div class="row windowTheme">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-4 text-center align-middle">
                        <button class="btn btn-outline-info btn-sm my-1" type="button" data-toggle="modal" data-target="#aideModal" title="Aide">Aide</button>
                    </div>
                    <div class="col-sm-4 text-center my-auto">
                        <a href="/articles/bibliotheque" target="_blank" class="btn btn-outline-info btn-sm my-1" role="button" title="Ouvrir la bibliothèque dans une nouvelle fenêtre">Bibliothèque d'images</a>
                    </div>
                    <div class="col-sm-4 text-center align-middle">
                        <button class="btn btn-outline-success btn-sm my-1" type="submit" title="Envoyer votre article">Envoyer</button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id_Membres" value="<?= $article->id_Membres ?>">
            <input type="hidden" name="id" value="<?= $article->id ?>">
            <input type="hidden" name="raison">
            <div class="col-md-9 my-3">
                <input type="text" class="form-control form-control-sm text-dark" name="titre" value="<?= $article->titre ?>" required>
            </div>
            <div class="col-md-3 my-3">
                <select type="text" class="form-control form-control-sm text-dark" name="categorie" id="categorie" required>
                    <option value="Astronomie">Astronomie</option>
                    <option value="Informatique">Informatique</option>
                    <option value="Matériel">Matériel</option>
                    <option value="Observations">Observations</option>
                    <option value="Photographie">Photographie</option>
                    <option value="Tutorial">Tutorial</option>
                </select>
            </div>
        </div>
        <div class="my-3">
            <textarea id="maxiEditor" name="contenu" placeholder="Rédigez votre article..."><?= $article->contenu ?></textarea>
        </div>
    </form>

    <!-- Modal aide -->
    <div class="modal fade" id="aideModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Galerie/upload" method="POST" class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title noire">Aide.</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body noire">
                    <ul class="text-justify">
                        <li>Hébergez vos images dans la bibliothèque d'images.</li>
                        <li>Vous pouvez utiliser des images extérieures au site, mais rien ne garantie leur disponibilité dans le temps.</li>
                        <li>Dans la bibliothèque, cliquez droit sur une image pour copier son chemin afin de l'insérer (icône "Image") dans votre article.</li>
                        <li>Attention à ne coller que le chemin relatif : /public/articles/image.ext</li>
                        <li>Cliquez sur une image dans la bibliothèque pour l'afficher et ouvrir un carousel.</li>
                        <li>Renseignez le titre, la catégorie de l'article et le champ description qui servira à générer une actualité.</li>
                        <li>Cliquez sur le bouton "Envoyez" pour soumettre votre article.</li>
                        <li>Astuce: vous pouvez utiliser un éditeur externe puis copier coller votre article.</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">OK</button>
                </div>
            </form>
        </div>
    </div>

</section>