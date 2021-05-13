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
            <span><i class="fas fa-caret-right"></i>&ensp;<a class="textejaune bbb" href="/forum/viewCategorie/<?= $f_souscategorie->id_f_categories ?>"><?= $f_souscategorie->categorie ?></a>&ensp;</span>
            <span><i class="fas fa-caret-right"></i>&ensp;<a class="texterouge bbb" href="#"><?= $f_souscategorie->nom ?></a></span>
        </div>
    </div>
    <div class="row">
        <div class="col-12 pt-4">
            <table class="table table-striped" id="table" data-toggle="table" data-buttons-class="light" data-search="false" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-columns="false" data-show-toggle="false" data-show-pagination-switch="true" data-show-fullscreen="false" data-buttons-prefix="btn-sm btn">
                <!-- data-mobile-responsive="true" data-check-on-init="true" data-min-width="767" -->
                <thead>
                    <tr class="text-center align-middle text-uppercase">
                        <th scope="col"><span>Topics du forum : <?= $f_souscategorie->nom ?></span></th>
                        <th scope="col" class="sm-no-display" data-width="50" data-width-unit="%">Dernier message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($f_topics as $f_topic) : ?>
                        <tr>
                            <td class="tabletd">
                                <span class="texterouge font-weight-bold">Topic : </span><span class="font-weight-bold"><a href="/forum/viewTopic/<?= $f_topic->id ?>"><i class="fab fa-discourse"></i>&ensp;<?= html_entity_decode($f_topic->sujet) ?></a></span>
                                <hr>
                                <span class="textegris"><i class="fas fa-caret-right"></i>&ensp;Auteur : </span><span class="textejaune font-weight-bold"><?= $f_topic->auteur_topic ?></span><br>
                                <?php if ($_SESSION['user']->login == $f_topic->auteur_topic || $_SESSION['user']->fonction >= 2) : ?>
                                    <button type="button" class="float-right btn btn-outline-danger btn-xs my-1" data-toggle="modal" data-target="#supprimerModal" title="Supprimer le topic" data-whatever="<?= $f_topic->id ?>"><i class="far fa-trash-alt"></i></button>
                                    <button type="button" class="float-right btn btn-outline-info btn-xs mx-1 my-1" data-toggle="modal" data-target="#modifierDouble" title="Modifier le topic" data-idmodif="<?= $f_topic->id ?>" data-sujetmodif="<?= $f_topic->sujet ?>"><i class="fas fa-pencil-alt"></i></button>
                                <?php endif; ?>
                                <?php if ($f_topic->auteur_topic_id != $_SESSION['user']->id && $_SESSION['user']->fonction != 0) : ?>
                                    <button class="float-right btn btn-outline-primary btn-xs my-1" type="button" data-toggle="modal" data-target="#ajouterModal" title="Envoyer un message" data-whatever="<?= $f_topic->auteur_topic_id ?>"><i class="far fa-comments"></i></button>
                                <?php endif; ?>
                                <span class="textegris"><i class="fas fa-caret-right"></i>&ensp;Date : <?= strftime('le %x à %R', strtotime($f_topic->dhc_topic)) ?></span>
                            </td>
                            <td class="tabletd sm-no-display">
                                <span class="textegris"><i class="fas fa-caret-right"></i>&ensp;Auteur : </span><span class="textejaune font-weight-bold"><?= $f_topic->auteur_msg ?></span><br>
                                <span class="textegris"><i class="fas fa-caret-right"></i>&ensp;Date : <?= strftime('le %x à %R', strtotime($f_topic->dhp_msg)) ?></span><br>
                                <span class="textegris"><i class="fas fa-caret-right"></i>&ensp;Edition : <?= strftime('le %x à %R', strtotime($f_topic->dhe_msg)) ?></span><br>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td class="text-center">
                            <?php if ($_SESSION['user']->fonction != 0) : ?>
                                <button class="btn btn-outline-success btn-sm" type="button" data-toggle="collapse" data-target="#accordion1" aria-expanded="true" aria-controls="accordion1"><i class="fas fa-pen-fancy"></i>&ensp;Créer un topic&ensp;<i class="fas fa-arrow-down"></i></button>
                            <?php endif; ?>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal de suppression de topic -->
    <div class="modal fade" id="supprimerModal" tabindex="-1" role="dialog" aria-hidden="true">
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

    <!-- accordéon1: ajout de topic -->
    <div id="accordion1" class="collapse" data-parent="#forum">
        <div class="row windowTheme">
            <div class="col-12 my-auto">
                <form action="/forum/nouveauTopic" method="POST">
                    <div class="form-row">
                        <div class='col-sm-10 offset-sm-1 mb-2'>
                            <span class="textegris">Créer un topic dans le sous-forum : </span><span class="textejaune"><?= $f_souscategorie->nom ?></span>
                            <button type="button" class="close" data-toggle="collapse" data-target="#accordion1" aria-expanded="true" aria-controls="accordion1">
                                <span class="texteblanc">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-10 offset-sm-1 mb-3">
                            <label for="sujet" class="col-form-label col-form-label-sm mt-1 textegris">Titre du topic:</label>
                            <input type="text" class="form-control form-control-sm mb-2" id="sujet" name="sujet" placeholder="Sujet" onBlur="checkSize50()" required>
                            <input type="hidden" name="raison">
                            <input type="hidden" name="id_souscategorie" value="<?= $f_souscategorie->id ?>">
                            <label for="editor" class="col-form-label col-form-label-sm textegris">Votre message :</label>
                            <textarea id="editor" name="message"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="msgErreur" class="form-check offset-sm-1 mb-2"></div>
                        <div class="form-check offset-sm-1">
                            <input class="form-check-input" type="checkbox" value="" id="tmail" name="tmail">
                            <label class="form-check-label" for="tmail">
                                Suivre le topic (recevoir une notification à chaque réponse).
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-10 offset-sm-1 mb-3">
                            <button type="submit" id="btnSubmit" class="btn btn-outline-success btn-sm">Valider</button>
                        </div>
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
                            <input type="text" class="form-control form-control-sm" id="sujet2" name="sujet" onBlur="checkSize50_2()">
                            <div id="msgErreur2" class="form-check offset-sm-1 mb-2"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSubmit2" class="btn btn-secondary btn-sm">Confirmer</button>
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
