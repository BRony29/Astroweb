<?php
require_once("./BBCode/bbcode.php");
$bbcode = new BBCode;
?>

<section id="articles">
    <div class="row my-3 windowTheme">
        <div class="col-8 my-auto">
            <h1 class="titre text-uppercase text-left">consulter un article</h1>
        </div>
        <div class="col-4 my-auto text-right">
            <button class="btn btn-outline-light btn-sm" onclick="history.back()">Retour</button>
        </div>
    </div>

    <div class="row my-3 windowTheme">
        <div class="col-12 my-auto">
            <h1 class="titreArticles text-center textebleue"><span class="text-uppercase"><?= $article->categorie ?></span> : <?= $article->titre ?></h1>
        </div>
    </div>

    <div id="articlesContent" class="row windowTheme">
        <div class="row">
            <div class="container-fluid"><?= $bbcode->toHTML(nl2br(html_entity_decode($article->contenu))) ?></div>
        </div>
    </div>
</section>