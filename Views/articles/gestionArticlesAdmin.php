<?php
    $_SESSION['redirect'] = '/articles/gestion';
?>

<section id="articles">
    <div class="row mt-3 mb-2 windowTheme">
        <div class="col-12 my-auto">
            <h1 class="titre text-uppercase text-left">articles</h1>
        </div>
    </div>

    <div class="row my-3 windowTheme">
        <div class="col-sm-12 my-auto">
            <div class="my-auto">
                <button class="btn btn-outline-info btn-sm mx-1 my-1 sm-no-display" type="button" data-toggle="collapse" data-target="#accordion1" aria-expanded="true" aria-controls="accordion1">Astronomie</button>
                <button class="btn btn-outline-info btn-xs mx-1 md-no-display" type="button" data-toggle="collapse" data-target="#accordion1" aria-expanded="true" aria-controls="accordion1">Astronomie</button>
                <button class="btn btn-outline-info btn-sm mx-1 my-1 sm-no-display" type="button" data-toggle="collapse" data-target="#accordion2" aria-expanded="false" aria-controls="accordion2">Informatique</button>
                <button class="btn btn-outline-info btn-xs mx-1 md-no-display" type="button" data-toggle="collapse" data-target="#accordion2" aria-expanded="false" aria-controls="accordion2">Informatique</button>
                <button class="btn btn-outline-info btn-sm mx-1 my-1 sm-no-display" type="button" data-toggle="collapse" data-target="#accordion3" aria-expanded="false" aria-controls="accordion3">Matériel</button>
                <button class="btn btn-outline-info btn-xs mx-1 md-no-display" type="button" data-toggle="collapse" data-target="#accordion3" aria-expanded="false" aria-controls="accordion3">Matériel</button>
                <button class="btn btn-outline-info btn-sm mx-1 my-1 sm-no-display" type="button" data-toggle="collapse" data-target="#accordion4" aria-expanded="false" aria-controls="accordion4">Observations</button>
                <button class="btn btn-outline-info btn-xs mx-1 md-no-display" type="button" data-toggle="collapse" data-target="#accordion4" aria-expanded="false" aria-controls="accordion4">Observations</button>
                <button class="btn btn-outline-info btn-sm mx-1 my-1 sm-no-display" type="button" data-toggle="collapse" data-target="#accordion5" aria-expanded="false" aria-controls="accordion5">Photographie</button>
                <button class="btn btn-outline-info btn-xs mx-1 md-no-display" type="button" data-toggle="collapse" data-target="#accordion5" aria-expanded="false" aria-controls="accordion5">Photographie</button>
                <button class="btn btn-outline-info btn-sm mx-1 my-1 sm-no-display" type="button" data-toggle="collapse" data-target="#accordion6" aria-expanded="false" aria-controls="accordion6">Tutorial</button>
                <button class="btn btn-outline-info btn-xs mx-1 md-no-display" type="button" data-toggle="collapse" data-target="#accordion6" aria-expanded="false" aria-controls="accordion6">Tutorial</button>
            </div>
        </div>
    </div>

    <!-- Bibliothèque d'articles Astronomie -->
    <div id="accordion1" class="collapse show table-responsive" data-parent="#articles">
        <table class="table table-striped" id="table" data-toggle="table" data-buttons-class="light" data-page-size="25" data-search="true" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-columns="true" data-show-toggle="true" data-show-pagination-switch="true" data-show-fullscreen="true" data-buttons-prefix="btn-sm btn" data-show-toggle="true" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
            <thead>
                <tr>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="titre">Astronomie</th>
                    <th scope=col class="text-center table-texte tableth">Outils</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article) : ?>
                    <?php if ($article->categorie == 'Astronomie') : ?>
                        <tr>
                            <td class="text-left align-middle table-texte tabletd"><?= $article->titre ?></td>
                            <td class="text-center align-middle table-texte tabletd">
                                <a href="/articles/consulter/<?= $article->id ?>" class="btn btn-outline-success my-1 btn-xs" role="button" title="Consulter l'article"><i class="far fa-eye"></i></a>
                                <a href="/articles/editArticles/<?= $article->id ?>" class="btn btn-outline-info my-1 mx-1 btn-xs" role="button" title="Modifier l'article"><i class="fas fa-pencil-alt"></i></a>
                                <button type="button" class="btn btn-outline-warning btn-xs my-1" data-toggle="modal" data-target="#supprimerModal" title="Supprimer l'article" data-whatever="<?= $article->id ?>"><i class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- Bibliothèque d'articles Informatique -->
    <div id="accordion2" class="collapse table-responsive" data-parent="#articles">
        <table class="table table-striped" id="table" data-toggle="table" data-buttons-class="light" data-page-size="25" data-search="true" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-columns="true" data-show-toggle="true" data-show-pagination-switch="true" data-show-fullscreen="true" data-buttons-prefix="btn-sm btn" data-show-toggle="true" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
            <thead>
                <tr>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="titre">Informatique</th>
                    <th scope=col class="text-center table-texte tableth">Outils</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article) : ?>
                    <?php if ($article->categorie == 'Informatique') : ?>
                        <tr>
                            <td class="text-left align-middle table-texte tabletd"><?= $article->titre ?></td>
                            <td class="text-center align-middle table-texte tabletd">
                                <a href="/articles/consulter/<?= $article->id ?>" class="btn btn-outline-success my-1 btn-xs" role="button" title="Consulter l'article"><i class="far fa-eye"></i></a>
                                <a href="/articles/editArticles/<?= $article->id ?>" class="btn btn-outline-info my-1 mx-1 btn-xs" role="button" title="Modifier l'article"><i class="fas fa-pencil-alt"></i></a>
                                <button type="button" class="btn btn-outline-warning btn-xs my-1" data-toggle="modal" data-target="#supprimerModal" title="Supprimer l'article" data-whatever="<?= $article->id ?>"><i class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- Bibliothèque d'articles Matériel -->
    <div id="accordion3" class="collapse table-responsive" data-parent="#articles">
        <table class="table table-striped" id="table" data-toggle="table" data-buttons-class="light" data-page-size="25" data-search="true" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-columns="true" data-show-toggle="true" data-show-pagination-switch="true" data-show-fullscreen="true" data-buttons-prefix="btn-sm btn" data-show-toggle="true" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
            <thead>
                <tr>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="titre">Matériel</th>
                    <th scope=col class="text-center table-texte tableth">Outils</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article) : ?>
                    <?php if ($article->categorie == 'Matériel') : ?>
                        <tr>
                            <td class="text-left align-middle table-texte tabletd"><?= $article->titre ?></td>
                            <td class="text-center align-middle table-texte tabletd">
                                <a href="/articles/consulter/<?= $article->id ?>" class="btn btn-outline-success my-1 btn-xs" role="button" title="Consulter l'article"><i class="far fa-eye"></i></a>
                                <a href="/articles/editArticles/<?= $article->id ?>" class="btn btn-outline-info my-1 mx-1 btn-xs" role="button" title="Modifier l'article"><i class="fas fa-pencil-alt"></i></a>
                                <button type="button" class="btn btn-outline-warning btn-xs my-1" data-toggle="modal" data-target="#supprimerModal" title="Supprimer l'article" data-whatever="<?= $article->id ?>"><i class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- Bibliothèque d'articles Observations -->
    <div id="accordion4" class="collapse table-responsive" data-parent="#articles">
        <table class="table table-striped" id="table" data-toggle="table" data-buttons-class="light" data-page-size="25" data-search="true" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-columns="true" data-show-toggle="true" data-show-pagination-switch="true" data-show-fullscreen="true" data-buttons-prefix="btn-sm btn" data-show-toggle="true" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
            <thead>
                <tr>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="titre">Observations</th>
                    <th scope=col class="text-center table-texte tableth">Outils</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article) : ?>
                    <?php if ($article->categorie == 'Observations') : ?>
                        <tr>
                            <td class="text-left align-middle table-texte tabletd"><?= $article->titre ?></td>
                            <td class="text-center align-middle table-texte tabletd">
                                <a href="/articles/consulter/<?= $article->id ?>" class="btn btn-outline-success my-1 btn-xs" role="button" title="Consulter l'article"><i class="far fa-eye"></i></a>
                                <a href="/articles/editArticles/<?= $article->id ?>" class="btn btn-outline-info my-1 mx-1 btn-xs" role="button" title="Modifier l'article"><i class="fas fa-pencil-alt"></i></a>
                                <button type="button" class="btn btn-outline-warning btn-xs my-1" data-toggle="modal" data-target="#supprimerModal" title="Supprimer 'article" data-whatever="<?= $article->id ?>"><i class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- Bibliothèque d'articles Photographie -->
    <div id="accordion5" class="collapse table-responsive" data-parent="#articles">
        <table class="table table-striped" id="table" data-toggle="table" data-buttons-class="light" data-page-size="25" data-search="true" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-columns="true" data-show-toggle="true" data-show-pagination-switch="true" data-show-fullscreen="true" data-buttons-prefix="btn-sm btn" data-show-toggle="true" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
            <thead>
                <tr>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="titre">Photographie</th>
                    <th scope=col class="text-center table-texte tableth">Outils</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article) : ?>
                    <?php if ($article->categorie == 'Photographie') : ?>
                        <tr>
                            <td class="text-left align-middle table-texte tabletd"><?= $article->titre ?></td>
                            <td class="text-center align-middle table-texte tabletd">
                                <a href="/articles/consulter/<?= $article->id ?>" class="btn btn-outline-success my-1 btn-xs" role="button" title="Consulter l'article"><i class="far fa-eye"></i></a>
                                <a href="/articles/editArticles/<?= $article->id ?>" class="btn btn-outline-info my-1 mx-1 btn-xs" role="button" title="Modifier l'article"><i class="fas fa-pencil-alt"></i></a>
                                <button type="button" class="btn btn-outline-warning btn-xs my-1" data-toggle="modal" data-target="#supprimerModal" title="Supprimer l'article" data-whatever="<?= $article->id ?>"><i class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- Bibliothèque d'articles Tutorial -->
    <div id="accordion6" class="collapse table-responsive" data-parent="#articles">
        <table class="table table-striped" id="table" data-toggle="table" data-buttons-class="light" data-page-size="25" data-search="true" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-columns="true" data-show-toggle="true" data-show-pagination-switch="true" data-show-fullscreen="true" data-buttons-prefix="btn-sm btn" data-show-toggle="true" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
            <thead>
                <tr>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="titre">Tutorial</th>
                    <th scope=col class="text-center table-texte tableth">Outils</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article) : ?>
                    <?php if ($article->categorie == 'Tutorial') : ?>
                        <tr>
                            <td class="text-left align-middle table-texte tabletd"><?= $article->titre ?></td>
                            <td class="text-center align-middle table-texte tabletd">
                                <a href="/articles/consulter/<?= $article->id ?>" class="btn btn-outline-success my-1 btn-xs" role="button" title="Consulter l'article"><i class="far fa-eye"></i></a>
                                <a href="/articles/editArticles/<?= $article->id ?>" class="btn btn-outline-info my-1 mx-1 btn-xs" role="button" title="Modifier l'article"><i class="fas fa-pencil-alt"></i></a>
                                <button type="button" class="btn btn-outline-warning btn-xs my-1" data-toggle="modal" data-target="#supprimerModal" title="Supprimer l'article" data-whatever="<?= $article->id ?>"><i class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach ?>
            </tbody>
        </table>
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