<?php
require_once ("./BBCode/bbcode.php");
$bbcode = new BBCode;
?>

<section id="livreDor">
    <div class="row my-3 windowTheme">
        <div class="col-7 my-auto">
            <h1 class="titre text-uppercase text-left">Livre D'or</h1>
        </div>
        <div class="col-5 text-right my-auto">
            <button class="btn btn-info btn-xs" type="button" data-toggle="modal" data-target="#livredorsModal" title="Ajouter un message"><i class="fas fa-plus"></i></button>
        </div>
    </div>

    <div id="livreDor_content" class="row">
        <div class="col-sm-12">
            <?php foreach ($livredors as $participation) : ?>
                <div class="row  windowTheme mb-3">
                    <div class="col-sm-3 col-lg-2 offset-sm-1">
                        <div class="row">
                            <div class="col-6 col-md-12 my-1">
                                <i class="far fa-user"></i>&emsp;<span class="textebleue"><?= $participation->pseudo ?></span>
                            </div>
                            <div class="col-6 col-md-12 my-1">
                                <i class="far fa-calendar-alt"></i>&emsp;<span><?= strftime('%x', strtotime($participation->date)) ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-lg-8 bookTheme">
                        <span class="my-1"><i class="fas fa-book-reader"></i>&emsp;<?= $bbcode->toHTML(nl2br(html_entity_decode($participation->message))) ?></span>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <!-- Modal ajout d'un message dans le livre d'or -->
    <div class="modal fade" id="livredorsModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Livredors/ajoutMessage" method="POST" class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title noire">Donnez nous votre avis. Déposez votre message.</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body noire">
                    <input type="hidden" name="raison">
                    <input type="text" class="form-control form-control-sm text-dark" name="pseudo" placeholder="Pseudo" pattern="^[-a-zA-Z0-9 àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$" maxlength="20" required>
                    <input type="email" class="form-control form-control-sm text-dark my-3" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                    <textarea class="form-control" id="miniEditor" name="message" placeholder="Message"></textarea>
                </div>
                <p class="noteModal">L'email est obligatoire pour la modération, il n'est pas affiché dans le livre d'or. Tout message irrespecteux sera supprimé.</p>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</section>
