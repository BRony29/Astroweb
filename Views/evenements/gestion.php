<section>
    <div class="row my-3 windowTheme">
        <div class="col-12 my-auto">
            <h1 class="titre text-uppercase text-left">Gestion d'un évènement</h1>
        </div>
    </div>

    <form class="windowTheme" action="/Evenements/modifieEvenements" method="POST">
        <div class="form-row my-3">
            <div class="col-sm-5 offset-sm-1">
                <div class="row">
                    <div class="col-sm-12">
                        <input type="text" class="form-control form-control-sm text-dark" name="titre" placeholder="Type d'évènement" value="<?= $evenement->titre ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <input type="text" class="form-control form-control-sm text-dark my-3" name="lieu" placeholder="Lieu" value="<?= $evenement->lieu ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm text-dark mb-3" name="date" placeholder="Date (jj/mm/AAAA)" value="<?= strftime('%x', strtotime($evenement->date)) ?>" pattern="^(?:(?:31(\/)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm text-dark mb-3" name="heure" placeholder="Heure (hh:mm)" value="<?= strftime('%R', strtotime($evenement->date)) ?>"  pattern="^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$" required>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 offset-sm-1">
                <textarea class="form-control form-control-sm text-dark noresize" rows="5" name="description" placeholder="Description" required><?= html_entity_decode($evenement->description) ?></textarea>
            </div>
            <div class="hidden">
                <input name="raison">
                <input name="id" value="<?= $evenement->id ?>">
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col-sm-10 offset-sm-1 d-flex flex-row align-items-center justify-content-between">
                <button type="submit" class="btn btn-outline-success btn-sm" title="Confirmer les modifications">Confirmer</button>
                <button type="button" class="btn btn-outline-light btn-sm" title="Annuler toute modification" onclick="history.back()">Annuler</button>
                <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#supprimerModal" title="Supprimer l'évènement" data-whatever="<?= $evenement->id ?>"><i class="far fa-trash-alt"></i></button>
            </div>
        </div>
    </form>

    <!-- Modal de confirmation de suppression d'un évènement -->
    <div class="modal fade" id="supprimerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/Evenements/supprimerEvenements" method="POST">
                    <div class="modal-body noire">
                        <div class="form-group">
                            <h6>Confirmez vous la suppression de l'évènement ?</h6>
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