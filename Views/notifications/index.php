<section id="notifications">

    <div class="row my-3 windowTheme">
        <div class="col-4 my-auto">
            <h6 class="titre text-uppercase text-left">messages</h6>
        </div>
        <?php if (count($notifications) >= 2) : ?>
            <div class="col-8 my-auto text-right">
                <button type="button" class="btn btn-outline-success btn-xs my-1" data-toggle="modal" data-target="#touLuModal" title="marquer tous comme lus"><i class="fas fa-check"></i></button>
                <button type="button" class="btn btn-outline-warning btn-xs my-1 mx-1" data-toggle="modal" data-target="#toutNonLuModal" title="marquer tous comme non lus"><i class="fas fa-check"></i></button>
                <b>-/-</b>
                <button type="button" class="btn btn-outline-success btn-xs my-1" data-toggle="modal" data-target="#supprimerLuModal" title="Supprimer tous les messages lus"><i class="far fa-trash-alt"></i></button>
                <button type="button" class="btn btn-outline-warning btn-xs my-1 mx-1" data-toggle="modal" data-target="#supprimerNonLuModal" title="Supprimer tous les messages non lus"><i class="far fa-trash-alt"></i></button>
                <button type="button" class="btn btn-outline-danger btn-xs my-1" data-toggle="modal" data-target="#supprimerToutModal" title="Supprimer tous les messages"><i class="far fa-trash-alt"></i></button>
            </div>
        <?php endif; ?>
    </div>

    <div class="table-responsive">
        <table class="table table-striped" id="table" data-buttons-class="light" data-page-size="10" data-toggle="table" data-pagination="true" data-show-toggle="true" data-show-pagination-switch="true" data-buttons-prefix="btn-sm btn" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
            <thead>
                <tr>
                    <th scope="col" class="text-center table-texte tableth" data-field="description">Messages</th>
                    <th scope="col" class="text-center table-texte tableth" data-field="Lue">Lue</th>
                    <th scope="col" class="text-center table-texte tableth" data-field="outils">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notifications as $notification) : ?>
                    <tr>
                        <td class="text-left my-auto table-texte tabletd"><?= $notification->titre ?></td>
                        <td class="text-center my-auto tabletd">
                            <?php if ($notification->lue == 1) : ?>
                                <a href="/notifications/modifierVue/<?= $notification->id ?>" class="btn btn-outline-success ml-auto my-1 btn-xs" role="button" title="marquer comme non lu"><i class="fas fa-check"></i></a>
                            <?php endif; 
                            if ($notification->lue == 0) : ?>
                                <a href="/notifications/modifierVue/<?= $notification->id ?>" class="btn btn-outline-warning ml-auto my-1 btn-xs" role="button" title="marquer lu"><i class="fas fa-check"></i></a>
                            <?php endif; ?>
                        </td>
                        <td class="text-center tabletd">
                            <button type="button" class="btn btn-outline-warning btn-xs my-1" data-toggle="modal" data-target="#supprimerModal" title="Supprimer Notification" data-whatever="<?= $notification->id ?>"><i class="far fa-trash-alt"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal de confirmation de suppression d'une notification -->
    <div class="modal fade" id="supprimerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/notifications/supprimerNotification" method="POST">
                    <div class="modal-body noire">
                        <div class="form-group">
                            <span>Supprimer le message ?</span>
                            <input type="hidden" id="recipient-name" name="id_Asupprimer">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="raison">
                        <button type="submit" class="btn btn-secondary btn-sm">Confirmer</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de confirmation toutes les notifications lues -->
    <div class="modal fade" id="touLuModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/notifications/modifierTout" method="POST" class="modal-content">
                <div class="modal-body noire">
                    <div class="form-group">
                        <span">Marquer tous les messages comme lus ?</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <input type="hidden" class="form-control form-control-sm" name="modification" value="lu">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="raison">
                    <button type="submit" class="btn btn-secondary btn-sm">Confirmer</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de confirmation toutes les notifications non lues -->
    <div class="modal fade" id="toutNonLuModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/notifications/modifierTout" method="POST" class="modal-content">
                <div class="modal-body noire">
                    <div class="form-group">
                        <span">Marquer tous les messages comme non lus ?</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <input type="hidden" class="form-control form-control-sm" name="modification" value="nonlu">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="raison">
                    <button type="submit" class="btn btn-secondary btn-sm">Confirmer</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de confirmation de suppression de toutes les notifications -->
    <div class="modal fade" id="supprimerToutModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/notifications/supprimerTout" method="POST" class="modal-content">
                <div class="modal-body noire">
                    <div class="form-group">
                        <span">Supprimer tous les messages ?</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="raison">
                    <button type="submit" class="btn btn-secondary btn-sm">Confirmer</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de confirmation de suppression de toutes les notifications lues -->
    <div class="modal fade" id="supprimerLuModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/notifications/supprimerSelection" method="POST" class="modal-content">
                <div class="modal-body noire">
                    <div class="form-group">
                        <span">Supprimer tous les messages lus ?</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <input type="hidden" class="form-control form-control-sm" name="modification" value="lu">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="raison">
                    <button type="submit" class="btn btn-secondary btn-sm">Confirmer</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de confirmation de suppression de toutes les notifications lues -->
    <div class="modal fade" id="supprimerNonLuModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/notifications/supprimerSelection" method="POST" class="modal-content">
                <div class="modal-body noire">
                    <div class="form-group">
                        <span">Supprimer tous les messages non lus ?</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <input type="hidden" class="form-control form-control-sm" name="modification" value="nonlu">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="raison">
                    <button type="submit" class="btn btn-secondary btn-sm">Confirmer</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal d'envoi d'un message -->
    <div class="modal fade" id="ajouterModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/notifications/EnvoiMessage" method="POST">
                    <div class="modal-header noire">
                        <h6>Envoyer un message </h6>
                        <input type="hidden" name="id_destinataire">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="login_expediteur" value="<?= $_SESSION['user']->login ?>">
                            <input type="hidden" name="id_expediteur" value="<?= $_SESSION['user']->id ?>">
                            <textarea class="form-control form-control-sm text-dark" rows="4" type="text" name="message" placeholder="Message"></textarea>
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




<!-- <td class="text-center my-auto table-texte tabletd">
    <a href="/notifications/modifierVue/<?= $notification->id ?>">
        <?php if ($notification->lue == 1) {

            echo '<button type="button" class="btn btn-outline-success ml-auto my-1 btn-xs" title="marquer comme non lu"><i class="fas fa-check"></i>';
        }

        if ($notification->lue == 0) {

            echo '<button type="button" class="btn btn-outline-warning ml-auto my-1 btn-xs" title="marquer comme lu"><i class="fas fa-check"></i>';
        } ?>
        </button>
    </a>
</td> -->