<?php
require_once ("./BBCode/bbcode.php");
$bbcode = new BBCode;
?>

<section id="livreDorGestion">

    <div class="row my-3 windowTheme">
        <div class="col-9 my-auto">
            <h1 class="titre text-uppercase text-left">Livre D'or</h1>
        </div>
    </div>

    <div id="livreDor_content" class="row">
        <div class="col-sm-12">
            <?php foreach ($livredors as $participation) : ?>
                <div class="row  windowTheme mb-3">
                    <div class="col-1 text-center my-auto sm-no-display">
                        <button type="button" class="btn btn-outline-warning btn-xs my-1 mx-1" data-toggle="modal" data-target="#supprimerModal" title="Supprimer commentaire" data-whatever="<?= $participation->id ?>"><i class="far fa-trash-alt"></i></button>
                    </div>
                    <div class="col-sm-3 col-lg-2 my-auto">
                        <div class="row">
                            <div class="col-5 col-md-12 my-auto">
                                <i class="far fa-user"></i>&emsp;<span class="textebleue"><?= $participation->pseudo ?></span>
                            </div>
                            <div class="col-5 col-md-12 my-auto">
                                <i class="far fa-calendar-alt"></i>&emsp;<span><?= strftime('%x', strtotime($participation->date)) ?></span>
                            </div>
                            <div class="col-1 text-center my-2 md-no-display">
                                <button type="button" class="btn btn-outline-light btn-xs my-1 mx-1" data-toggle="modal" data-target="#supprimerModal" title="Supprimer commentaire" data-whatever="<?= $participation->id ?>"><i class="far fa-trash-alt"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-lg-8 bookTheme">
                        <span class="my-1"><i class="fas fa-at"></i>&emsp;<?= $participation->email ?></span><br>
                        <span class="my-1"><i class="fas fa-book-reader"></i>&emsp;<?= $bbcode->toHTML(nl2br(html_entity_decode($participation->message))) ?></span>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <!-- Modal de confirmation de suppression d'un commentaire -->
    <div class="modal fade" id="supprimerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/Livredors/supprimerLivredors" method="POST">
                    <div class="modal-body noire">
                        <div class="form-group">
                            <span>Confirmez vous la suppression du commentaire ?</span>
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