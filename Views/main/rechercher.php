<?php
require_once ("./BBCode/bbcode.php");
$bbcode = new BBCode;
?>

<section id="rechercher">
    <div class="row my-3 windowTheme">
        <div class="col-7 my-auto">
            <h1 class="titre text-uppercase text-left">rechercher</h1>
        </div>
        <div class="col-5 text-right my-auto">
            <button class="btn btn-outline-light btn-sm" onclick="history.back()">Retour</button>
        </div>
    </div>

    <div class="searchResult row windowTheme">
        <div class="col-sm-10 offset-sm-1">
            <p class="textebleue">Résultat de la recherche de « <?= $_SESSION['search'] ?> » parmi les <b><u>adhérents</u></b> : <?= count($adherents) ?> résultat(s)</p>
            <?php foreach ($adherents as $adherent) : ?>
                <i class="fas fa-caret-right"></i>&ensp;
                <span class="texterouge">Login:</span> <?= $adherent->login ?> /
                <span class="texterouge">Prénom:</span> <?= $adherent->prenom ?> /
                <span class="texterouge">Téléphone:</span> <?= $adherent->tel ?> /
                <span class="texterouge">Email:</span> <?= $adherent->email ?>
                <hr>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="searchResult row windowTheme">
        <div class="col-sm-10 offset-sm-1">
            <p class="textebleue">Résultat de la recherche de « <?= $_SESSION['search'] ?> » parmi les <b><u>articles</u></b> : <?= count($articles) ?> résultat(s)</p>
            <?php foreach ($articles as $article) : ?>
                <a href="/articles/consulter/<?= $article->id ?>" target="_blank" class="btn btn-outline-success my-1 mx-1 btn-xs" role="button" title="Consulter l'article"><i class="far fa-eye"></i></a>
                <i class="fas fa-caret-right"></i>&ensp;<span class="texterouge">Titre:</span> <?= $article->titre ?>
                <hr>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="searchResult row windowTheme">
        <div class="col-sm-10 offset-sm-1">
            <p class="textebleue">Résultat de la recherche de « <?= $_SESSION['search'] ?> » parmi les <b><u>actualités</u></b> : <?= count($actualites) ?> résultat(s)</p>
            <?php foreach ($actualites as $actualite) : ?>
                <i class="fas fa-caret-right"></i>&ensp;
                <span class="texterouge">Date:</span> <span class="textegris"><?= strftime('%x', strtotime($actualite->date)) ?> /</span>
                <span class="texterouge">Titre:</span> <b><?= $actualite->titre ?></b><br>
                <span class="texterouge ml-3">Commentaire:</span> <span class="textegris noLink"><?= html_entity_decode($actualite->commentaire) ?></span>
                <hr>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="searchResult row windowTheme">
        <div class="col-sm-10 offset-sm-1">
            <p class="textebleue">Résultat de la recherche de « <?= $_SESSION['search'] ?> » parmi les <b><u>évènements</u></b> : <?= count($evenements) ?> résultat(s)</p>
            <?php foreach ($evenements as $evenement) : ?>
                <i class="fas fa-caret-right"></i>&ensp;
                <span class="texterouge">Type:</span> <b><?= $evenement->titre ?></b> /
                <span class="texterouge">Date:</span> <b><?= strftime('%x', strtotime($evenement->date)) ?></b> /
                <span class="texterouge">Lieu:</span> <b><?= $evenement->lieu ?></b><br>
                <span class="texterouge ml-3">Description:</span> <span class="textegris"><?= html_entity_decode($evenement->description) ?></span>
                <hr>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="searchResult row windowTheme">
        <div class="col-sm-10 offset-sm-1">
            <p class="textebleue">Résultat de la recherche de « <?= $_SESSION['search'] ?> » parmi les <b><u>messages du forum</u></b> : <?= count($f_messages) ?> résultat(s)</p>
            <?php foreach ($f_messages as $f_message) : ?>
                <a href="/forum/viewTopic/<?= $f_message->topic_id ?>" target="_blank" class="btn btn-outline-success btn-xs mx-1" role="button" title="Accéder au topic"><i class="fab fa-discourse"></i></a>
                <i class="fas fa-caret-right"></i>&ensp;
                <span class="texterouge">Sujet du topic:</span> <b><?= $f_message->topic_sujet ?></b> /
                <span class="texterouge">Auteur du message:</span> <b><?= $f_message->auteur_msg ?></b><br>
                <span class="texterouge ml-5">Message:</span> <span class="textegris"><?= $bbcode->toHTML(nl2br(html_entity_decode($f_message->contenu)))  ?></span>
                <hr>
            <?php endforeach; ?>
        </div>
    </div>

</section>
