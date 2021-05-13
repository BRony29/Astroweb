<?php
require_once ("./BBCode/bbcode.php");
$bbcode = new BBCode;
?>

<section>

    <div class="row my-3 windowTheme">
        <div class="col-9 my-auto">
            <h1 class="titre text-uppercase text-left">Actualités</h1>
        </div>
    </div>

    <div id="tableActualites" class="table-responsive">
        <table class="table table-striped" id="table" data-buttons-class="light" data-toggle="table" data-search="true" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-columns="true" data-show-toggle="true" data-show-pagination-switch="true" data-show-fullscreen="true" data-buttons-prefix="btn-sm btn" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
            <thead>
                <tr>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="date">Date</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="titre">Titre</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="commentaire">Commentaire</th>
                    <th scope="col" class="text-center table-texte tableth" data-field="vignette">Vignette</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actualites as $actualite) : ?>
                    <tr>
                        <td class="text-center align-middle table-texte tabletd"><?= strftime('%x', strtotime($actualite->date)) ?></td>
                        <td class="text-center align-middle table-texte tabletd"><?= $actualite->titre ?></td>
                        <td class="text-justify align-middle table-texte tabletd"><?= $bbcode->toHTML(nl2br(html_entity_decode($actualite->commentaire))) ?></td>
                        <td class="text-center align-middle"><img src="/public/actualites/<?= $actualite->imagePath ?>" class="img-fluid" alt="Vignette"></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>
