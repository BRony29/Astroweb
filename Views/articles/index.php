<section id="articles">
    <div class="row my-3 windowTheme">
        <div class="col-9 my-auto">
            <h1 class="titre text-uppercase text-left">Bibliothèque d'articles</h1>
        </div>
    </div>

    <div class="row my-3 windowTheme">
        <div class="col-sm-12 my-auto">
            <div class="my-auto">
                <button class="btn btn-outline-info btn-sm mx-1 sm-no-display" type="button" data-toggle="collapse" data-target="#accordion1" aria-expanded="true" aria-controls="accordion1">Astronomie</button>
                <button class="btn btn-outline-info btn-xs mx-1 md-no-display" type="button" data-toggle="collapse" data-target="#accordion1" aria-expanded="true" aria-controls="accordion1">Astronomie</button>
                <button class="btn btn-outline-info btn-sm mx-1 sm-no-display" type="button" data-toggle="collapse" data-target="#accordion2" aria-expanded="false" aria-controls="accordion2">Informatique</button>
                <button class="btn btn-outline-info btn-xs mx-1 md-no-display" type="button" data-toggle="collapse" data-target="#accordion2" aria-expanded="false" aria-controls="accordion2">Informatique</button>
                <button class="btn btn-outline-info btn-sm mx-1 sm-no-display" type="button" data-toggle="collapse" data-target="#accordion3" aria-expanded="false" aria-controls="accordion3">Matériel</button>
                <button class="btn btn-outline-info btn-xs mx-1 md-no-display" type="button" data-toggle="collapse" data-target="#accordion3" aria-expanded="false" aria-controls="accordion3">Matériel</button>
                <button class="btn btn-outline-info btn-sm mx-1 sm-no-display" type="button" data-toggle="collapse" data-target="#accordion4" aria-expanded="false" aria-controls="accordion4">Observations</button>
                <button class="btn btn-outline-info btn-xs mx-1 md-no-display" type="button" data-toggle="collapse" data-target="#accordion4" aria-expanded="false" aria-controls="accordion4">Observations</button>
                <button class="btn btn-outline-info btn-sm mx-1 sm-no-display" type="button" data-toggle="collapse" data-target="#accordion5" aria-expanded="false" aria-controls="accordion5">Photographie</button>
                <button class="btn btn-outline-info btn-xs mx-1 md-no-display" type="button" data-toggle="collapse" data-target="#accordion5" aria-expanded="false" aria-controls="accordion5">Photographie</button>
                <button class="btn btn-outline-info btn-sm mx-1 sm-no-display" type="button" data-toggle="collapse" data-target="#accordion6" aria-expanded="false" aria-controls="accordion6">Tutorial</button>
                <button class="btn btn-outline-info btn-xs mx-1 md-no-display" type="button" data-toggle="collapse" data-target="#accordion6" aria-expanded="false" aria-controls="accordion6">Tutorial</button>
            </div>
        </div>
    </div>

    <div id="accordion1" class="collapse show" data-parent="#articles">
        <div class="table-responsive">
            <table class="table table-striped" id="table" data-buttons-class="light" data-page-size="25" data-toggle="table" data-search="true" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-toggle="true" data-show-pagination-switch="true" data-buttons-prefix="btn-sm btn" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
                <thead>
                    <tr>
                        <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="titre">Astronomie</th>
                        <th scope="col" class="text-center table-texte tableth">Outils</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article) : ?>
                        <?php if ($article->categorie == 'Astronomie') : ?>
                            <tr>
                                <td class="text-left align-middle table-texte tabletd"><?= $article->titre ?></td>
                                <td class="text-center align-middle table-texte tabletd">
                                    <a href="/articles/consulter/<?= $article->id ?>" class="btn btn-outline-success btn-sm" role="button">Consulter</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="accordion2" class="collapse" data-parent="#articles">
        <div class="table-responsive">
            <table class="table table-striped" id="table" data-buttons-class="light" data-page-size="25" data-toggle="table" data-search="true" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-toggle="true" data-show-pagination-switch="true" data-buttons-prefix="btn-sm btn" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
                <thead>
                    <tr>
                        <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="titre">Informatique</th>
                        <th scope="col" class="text-center table-texte tableth">Outils</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article) : ?>
                        <?php if ($article->categorie == 'Informatique') : ?>
                            <tr>
                                <td class="text-left align-middle table-texte tabletd"><?= $article->titre ?></td>
                                <td class="text-center align-middle table-texte tabletd">
                                    <a href="/articles/consulter/<?= $article->id ?>" class="btn btn-outline-success btn-sm" role="button">Consulter</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="accordion3" class="collapse" data-parent="#articles">
        <div class="table-responsive">
            <table class="table table-striped" id="table" data-buttons-class="light" data-page-size="25" data-toggle="table" data-search="true" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-toggle="true" data-show-pagination-switch="true" data-buttons-prefix="btn-sm btn" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
                <thead>
                    <tr>
                        <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="titre">Matériel</th>
                        <th scope="col" class="text-center table-texte tableth">Outils</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article) : ?>
                        <?php if ($article->categorie == 'Matériel') : ?>
                            <tr>
                                <td class="text-left align-middle table-texte tabletd"><?= $article->titre ?></td>
                                <td class="text-center align-middle table-texte tabletd">
                                    <a href="/articles/consulter/<?= $article->id ?>" class="btn btn-outline-success btn-sm" role="button">Consulter</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="accordion4" class="collapse" data-parent="#articles">
        <div class="table-responsive">
            <table class="table table-striped" id="table" data-buttons-class="light" data-page-size="25" data-toggle="table" data-search="true" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-toggle="true" data-show-pagination-switch="true" data-buttons-prefix="btn-sm btn" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
                <thead>
                    <tr>
                        <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="titre">Observations</th>
                        <th scope="col" class="text-center table-texte tableth">Outils</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article) : ?>
                        <?php if ($article->categorie == 'Observations') : ?>
                            <tr>
                                <td class="text-left align-middle table-texte tabletd"><?= $article->titre ?></td>
                                <td class="text-center align-middle table-texte tabletd">
                                    <a href="/articles/consulter/<?= $article->id ?>" class="btn btn-outline-success btn-sm" role="button">Consulter</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="accordion5" class="collapse" data-parent="#articles">
        <div class="table-responsive">
            <table class="table table-striped" id="table" data-buttons-class="light" data-page-size="25" data-toggle="table" data-search="true" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-toggle="true" data-show-pagination-switch="true" data-buttons-prefix="btn-sm btn" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
                <thead>
                    <tr>
                        <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="titre">Photographie</th>
                        <th scope="col" class="text-center table-texte tableth">Outils</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article) : ?>
                        <?php if ($article->categorie == 'Photographie') : ?>
                            <tr>
                                <td class="text-left align-middle table-texte tabletd"><?= $article->titre ?></td>
                                <td class="text-center align-middle table-texte tabletd">
                                    <a href="/articles/consulter/<?= $article->id ?>" class="btn btn-outline-success btn-sm" role="button">Consulter</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="accordion6" class="collapse" data-parent="#articles">
        <div class="table-responsive">
            <table class="table table-striped" id="table" data-buttons-class="light" data-page-size="25" data-toggle="table" data-search="true" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-toggle="true" data-show-pagination-switch="true" data-buttons-prefix="btn-sm btn" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
                <thead>
                    <tr>
                        <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="titre">Tutorial</th>
                        <th scope="col" class="text-center table-texte tableth">Outils</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article) : ?>
                        <?php if ($article->categorie == 'Tutorial') : ?>
                            <tr>
                                <td class="text-left align-middle table-texte tabletd"><?= $article->titre ?></td>
                                <td class="text-center align-middle table-texte tabletd">
                                    <a href="/articles/consulter/<?= $article->id ?>" class="btn btn-outline-success btn-sm" role="button">Consulter</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</section>