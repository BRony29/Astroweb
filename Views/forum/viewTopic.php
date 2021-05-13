<?php
require_once("./BBCode/bbcode.php");
$bbcode = new BBCode;
?>

<div>
    <div class="row my-3 windowTheme">
        <div class="col-4 my-auto">
            <h1 class="titre text-uppercase text-left">forum</h1>
        </div>
        <div class="col-8 my-auto">
            <?php if ($_SESSION['user']->fonction == 0) : ?>
                <span class="titre float-right textebleue">Veuillez vous connecter !</span>
            <?php endif; ?>
        </div>
    </div>
</div>

<section id="forum">
    <div class="row mt-3 mb-0 windowTheme">
        <div class="col-12 my-auto">
            <span>Navigation :&ensp;</span>
            <span><a href="/forum/index"><i class="fas fa-home textejaune bbb"></i></a>&ensp;</span>
            <span><i class="fas fa-caret-right"></i>&ensp;<a class="textejaune bbb" href="/forum/viewCategorie/<?= $f_topics->id_f_categories ?>"><?= $f_topics->nom_f_categories ?></a>&ensp;</span>
            <span><i class="fas fa-caret-right"></i>&ensp;<a class="textejaune bbb" href="/forum/viewSouscategorie/<?= $f_topics->id_f_souscategories ?>"><?= $f_topics->nom_f_souscategories ?></a>&ensp;</span>
            <span><i class="fas fa-caret-right"></i>&ensp;<a class="texterouge bbb" href="#"><?= html_entity_decode($f_topics->sujet) ?></a></span>
        </div>
    </div>

    <div class="row">
        <div class="col-12 pt-4 sm-no-display">
            <table class="table table-striped" data-toggle="table" data-buttons-class="light" data-search="false" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-columns="false" data-show-toggle="false" data-show-pagination-switch="true" data-show-fullscreen="false" data-buttons-prefix="btn-sm btn">
                <!-- data-mobile-responsive="true" data-check-on-init="true" data-min-width="767" -->
                <thead>
                    <tr>
                        <th scope="col">
                            <span class="my-auto">Auteur :&ensp;</span><span class="font-weight-bold"><?= $f_topics->auteur_topic ?></span><br>
                            <?php if ($_SESSION['user']->login == $f_topics->auteur_topic || $_SESSION['user']->fonction >= 2) : ?>
                                <button type="button" class="btn btn-info btn-xs my-1" data-toggle="modal" data-target="#modifierDouble" title="Modifier le topic" data-idmodif="<?= $f_topics->id ?>" data-sujetmodif="<?= $f_topics->sujet ?>"><i class="fas fa-pencil-alt"></i></button>
                                <button type="button" class="float-right btn btn-danger btn-xs my-1" data-toggle="modal" data-target="#supprimerModal2" title="Supprimer le topic" data-whatever="<?= $f_topics->id ?>"><i class="far fa-trash-alt"></i></button>
                                <?php if ($_SESSION['user']->login == $f_topics->auteur_topic) : ?>
                                    <?php if ($f_topics->notif_createur == 1) : ?>
                                        <a href="/forum/watchUnwatch/<?= $f_topics->id ?>" class="btn btn-info btn-xs my-1" role="button" title="Ne plus suivre le topic."><i class="far fa-eye-slash"></i></a>
                                    <?php else : ?>
                                        <a href="/forum/watchUnwatch/<?= $f_topics->id ?>" class="btn btn-info btn-xs my-1" role="button" title="Suivre le topic."><i class="far fa-eye"></i></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php else : ?>
                                <br>
                            <?php endif; ?>
                        </th>
                        <th scope="col" data-width="75" data-width-unit="%">
                            <span class="font-weight-bold text-uppercase"><?= html_entity_decode($f_topics->sujet) ?></span>
                            <hr>
                            <span><i class="fas fa-caret-right"></i>&ensp;Créé <?= strftime('le %x à %R', strtotime($f_topics->dhc_topic)) ?></span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($f_messages as $f_message) : ?>
                        <tr>
                            <td class="tabletd">
                                <span class="textegris">Auteur :&ensp;</span><span class="textejaune font-weight-bold"><?= $f_message->login_auteur ?></span><br>
                                <?php if ($f_message->id_auteur != $_SESSION['user']->id && $_SESSION['user']->fonction != 0) : ?>
                                    <button class="btn btn-outline-primary btn-xs my-1" type="button" data-toggle="modal" data-target="#ajouterModal" title="Envoyer un message" data-whatever="<?= $f_message->id_auteur ?>"><i class="far fa-comments"></i></button>
                                <?php endif; ?>
                                <?php if ($_SESSION['user']->fonction != 0) : ?>
                                    <a href="/forum/citerMessage/<?= $f_message->id ?>" class="btn btn-outline-info btn-xs my-1" role="button" title="Citer le message"><i class="fas fa-quote-right"></i></a>
                                <?php endif; ?>
                                <?php if ($_SESSION['user']->login == $f_message->login_auteur || $_SESSION['user']->fonction >= 2) : ?>
                                    <a href="/forum/modifierMessage/<?= $f_message->id ?>" class="btn btn-outline-info btn-xs my-1" role="button" title="Modifier le message"><i class="fas fa-pencil-alt"></i></a>
                                <?php endif; ?>
                                <?php if ($_SESSION['user']->login == $f_message->login_auteur || $_SESSION['user']->fonction >= 2) : ?>
                                    <button type="button" class="float-right btn btn-outline-warning btn-xs my-1" data-toggle="modal" data-target="#supprimerModal" title="Supprimer le message" data-whatever="<?= $f_message->id ?>"><i class="far fa-trash-alt"></i></button>
                                <?php endif; ?>
                            </td>
                            <td class="tabletd">
                                <span class="textegris"><i class="fas fa-caret-right"></i>&ensp;Date :&ensp;<?= strftime('le %x à %R', strtotime($f_message->dhp_msg)) ?></span><br>
                                <span class="textegris"><i class="fas fa-caret-right"></i>&ensp;Edition :&ensp;<?= strftime('le %x à %R', strtotime($f_message->dhe_msg)) ?></span>
                                <hr>
                                <span><?= $bbcode->toHTML(nl2br(html_entity_decode($f_message->contenu))) ?></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if ($_SESSION['user']->fonction != 0) : ?>
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-outline-success btn-sm" type="button" data-toggle="collapse" data-target="#accordion1" aria-expanded="true" aria-controls="accordion1"><i class="fas fa-pen-fancy"></i>&ensp;Poster une réponse&ensp;<i class="fas fa-arrow-down"></i></button>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="col-12 pt-4 md-no-display">
            <table class="table table-striped" data-toggle="table" data-buttons-class="light" data-search="false" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-columns="false" data-show-toggle="false" data-show-pagination-switch="true" data-show-fullscreen="false" data-buttons-prefix="btn-sm btn">
                <!-- data-mobile-responsive="true" data-check-on-init="true" data-min-width="767" -->
                <thead>
                    <tr>
                        <th>
                            <?php if ($_SESSION['user']->login == $f_topics->auteur_topic || $_SESSION['user']->fonction >= 2) : ?>
                                <button type="button" class="float-right btn btn-danger btn-xs my-1" data-toggle="modal" data-target="#supprimerModal2" title="Supprimer le topic" data-whatever="<?= $f_topics->id ?>"><i class="far fa-trash-alt"></i></button>
                                <?php if ($_SESSION['user']->login == $f_topics->auteur_topic) : ?>
                                    <?php if ($f_topics->notif_createur == 1) : ?>
                                        <a href="/forum/watchUnwatch/<?= $f_topics->id ?>" class="float-right btn btn-info btn-xs mx-1 my-1" role="button" title="Ne plus suivre le topic."><i class="far fa-eye-slash"></i></a>
                                    <?php else : ?>
                                        <a href="/forum/watchUnwatch/<?= $f_topics->id ?>" class="float-right btn btn-info btn-xs mx-1 my-1" role="button" title="Suivre le topic."><i class="far fa-eye"></i></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <button type="button" class="float-right btn btn-info btn-xs my-1" data-toggle="modal" data-target="#modifierDouble" title="Modifier le topic" data-idmodif="<?= $f_topics->id ?>" data-sujetmodif="<?= $f_topics->sujet ?>"><i class="fas fa-pencil-alt"></i></button>
                            <?php else : ?>
                                <br>
                            <?php endif; ?>
                            <span class="my-auto">Auteur :&ensp;</span><span class="font-weight-bold"><?= $f_topics->auteur_topic ?></span><br>
                            <span><i class="fas fa-caret-right"></i>&ensp;Créé <?= strftime('le %x à %R', strtotime($f_topics->dhc_topic)) ?></span>
                            <hr>
                            <span class="font-weight-bold"><?= html_entity_decode($f_topics->sujet) ?></span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($f_messages as $f_message) : ?>
                        <tr>
                            <td class="tabletd">
                                <?php if ($_SESSION['user']->login == $f_message->login_auteur || $_SESSION['user']->fonction >= 2) : ?>
                                    <button type="button" class="float-right btn btn-outline-warning btn-xs ml-1 my-1" data-toggle="modal" data-target="#supprimerModal" title="Supprimer le message" data-whatever="<?= $f_message->id ?>"><i class="far fa-trash-alt"></i></button>
                                <?php endif; ?>
                                <?php if ($_SESSION['user']->login == $f_message->login_auteur || $_SESSION['user']->fonction >= 2) : ?>
                                    <a href="/forum/modifierMessage/<?= $f_message->id ?>" class="float-right btn btn-outline-info btn-xs my-1" role="button" title="Modifier le message"><i class="fas fa-pencil-alt"></i></a>
                                <?php endif; ?>
                                <?php if ($_SESSION['user']->fonction != 0) : ?>
                                    <a href="/forum/citerMessage/<?= $f_message->id ?>" class="float-right btn btn-outline-info btn-xs mx-1 my-1" role="button" title="Citer le message"><i class="fas fa-quote-right"></i></a>
                                <?php endif; ?>
                                <?php if ($f_message->id_auteur != $_SESSION['user']->id && $_SESSION['user']->fonction != 0) : ?>
                                    <button class="float-right btn btn-outline-primary btn-xs my-1" type="button" data-toggle="modal" data-target="#ajouterModal" title="Envoyer un message" data-whatever="<?= $f_message->id_auteur ?>"><i class="far fa-comments"></i></button>
                                <?php endif; ?>
                                <span class="textegris">Auteur :&ensp;</span><span class="textejaune font-weight-bold"><?= $f_message->login_auteur ?></span><br>
                                <span class="textegris"><i class="fas fa-caret-right"></i>&ensp;Date :&ensp;<?= strftime('le %x à %R', strtotime($f_message->dhp_msg)) ?></span><br>
                                <span class="textegris"><i class="fas fa-caret-right"></i>&ensp;Edition :&ensp;<?= strftime('le %x à %R', strtotime($f_message->dhe_msg)) ?></span>
                                <hr>
                                <span><?= $bbcode->toHTML(nl2br(html_entity_decode($f_message->contenu))) ?></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if ($_SESSION['user']->fonction != 0) : ?>
                        <tr>
                            <td class="text-center">
                                <button class="btn btn-outline-success btn-sm" type="button" data-toggle="collapse" data-target="#accordion1" aria-expanded="true" aria-controls="accordion1"><i class="fas fa-pen-fancy"></i>&ensp;Poster une réponse&ensp;<i class="fas fa-arrow-down"></i></button>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- accordéon1: ajout de message -->
    <div id="accordion1" class="collapse" data-parent="#forum">
        <div class="row windowTheme">
            <div class="col-12 my-auto">
                <form action="/forum/nouveauMessage" method="POST">
                    <div class="row">
                        <div class='col-sm-10 offset-sm-1 mb-3'>
                            <span class="textegris">Poster une réponse dans le forum : </span><span class="texterouge"><?= html_entity_decode($f_topics->sujet) ?></span>
                            <button type="button" class="close" data-toggle="collapse" data-target="#accordion1" aria-expanded="true" aria-controls="accordion1">
                                <span class="texteblanc">&times;</span>
                            </button>
                        </div>
                        <div class='col-sm-10 offset-sm-1 mb-3'>
                            <input type="hidden" name="raison">
                            <input type="hidden" name="id_topic" value="<?= $f_topics->id ?>">
                            <textarea id="editor" name="message"></textarea>
                        </div>
                        <div class="col-sm-10 offset-sm-1 mb-3">
                            <button type="submit" class="btn btn-outline-light btn-sm">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de suppression d'un message -->
    <div class="modal fade" id="supprimerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/forum/supprimerMessage" method="POST">
                    <div class="modal-body noire">
                        <div class="form-group">
                            <span>Voulez-vous supprimer le message ?</span>
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

    <!-- Modal de suppression de topic -->
    <div class="modal fade" id="supprimerModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/forum/supprimerTopic" method="POST">
                    <div class="modal-body noire">
                        <div class="form-group">
                            <span>Supprimer le topic supprimera aussi tous ses messages,</span><br><span>êtes vous sûr ?</span>
                            <input type="hidden" name="id_Asupprimer">
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

    <!-- Modal de modification d'un topic -->
    <div class="modal fade" id="modifierDouble" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/forum/modifierTopic" method="POST">
                    <div class="modal-header noire">
                        <span>Modifier le sujet d'un topic</span>
                        <input type="hidden" name="id_topic">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body noire">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" id="sujet" name="sujet" onBlur="checkSize50()">
                            <div id="msgErreur" class="form-check offset-sm-1 mb-2"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSubmit" class="btn btn-secondary btn-sm">Confirmer</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal d'envoi d'un message (notification) -->
    <div class="modal fade" id="ajouterModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/notifications/EnvoiMessage" method="POST">
                    <div class="modal-header noire">
                        <span>Envoyer un message </span>
                        <input type="hidden" name="id_destinataire">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body noire">
                        <div class="form-group">
                            <input type="hidden" name="login_expediteur" value="<?= $_SESSION['user']->login ?>">
                            <input type="hidden" name="id_expediteur" value="<?= $_SESSION['user']->id ?>">
                            <label for="message" class="col-form-label col-form-label-sm">Message :</label>
                            <textarea class="form-control form-control-sm" id="message" name="message"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="raison">
                        <button type="submit" class="btn btn-secondary btn-sm">Envoyer</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>