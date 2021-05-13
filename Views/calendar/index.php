<?php
$start = $calendar->getStartingDay();
$start = $start->format('N') === '1' ? $start : $calendar->getStartingDay()->modify('last monday');
$weeks = $calendar->getWeeks();

if (isset($_GET) && !empty($_GET)) {
    $_SESSION['redirect'] = '/' . $_GET['p'];
}
?>

<section id="calendar">

    <div class="row my-3 windowTheme">
        <div class="col-9 my-auto">
            <h1 class="titre text-uppercase text-left">Calendrier</h1>
        </div>
    </div>

    <div class="row windowTheme">
        <div class="col-sm-12 my-auto px-0">
            <div class="d-flex flex-row align-items-center justify-content-between mx-2">
                <span class="titre textebleue"><?= $calendar->toString() ?></span>
                <div>
                    <?php if ($_SESSION['user']->fonction >= 2) : ?>
                        <button class="btn btn-info btn-xs" type="button" data-toggle="modal" data-target="#ajoutModal" title="Ajouter un Evènement"><i class="fas fa-plus"></i></button>
                    <?php endif; ?>
                    <a href="/calendar/index/<?= $calendar->previousSixMonth()->month; ?>/<?= $calendar->previousSixMonth()->year; ?>" class="btn btn-outline-light btn-xs mx-1" role="button"><i class="fas fa-arrow-circle-left"></i></a>
                    <a href="/calendar/index/<?= $calendar->previousMonth()->month; ?>/<?= $calendar->previousMonth()->year; ?>" class="btn btn-outline-light btn-xs" role="button"><i class="fas fa-arrow-left"></i></a>
                    <a href="/calendar/index/<?= $calendar->nextMonth()->month; ?>/<?= $calendar->nextMonth()->year; ?>" class="btn btn-outline-light btn-xs mx-1" role="button"><i class="fas fa-arrow-right"></i></a>
                    <a href="/calendar/index/<?= $calendar->nextSixMonth()->month; ?>/<?= $calendar->nextSixMonth()->year; ?>" class="btn btn-outline-light btn-xs" role="button"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <table class="calendar_table calendar_table--<?= $weeks; ?>weeks my-3">
                <?php for ($i = 0; $i < $weeks; $i++) : ?>
                    <tr>
                        <?php foreach ($calendar->days as $k => $day) :
                            $date = $start->modify("+" . ($k + $i * 7) . "days");
                            $eventsForDay = $eventListByDay[$date->format('Y-m-d')] ?? [];
                        ?>
                            <td class="<?= $calendar->withinMonth($date) ? '' : 'calendar_othermonth'; ?> <?= $calendar->currentDay($date) ? 'calendar_today' : ''; ?> ">
                                <?php if ($i === 0) : ?>
                                    <div class="calendar_weekday texterouge"><?= $day; ?></div>
                                <?php endif; ?>
                                <div class="calendar_day textebleue"> <?= $date->format('d'); ?></div>
                                <?php foreach ($eventsForDay as $event) : ?>
                                    <div class="calendar_event">
                                        <?= (new DateTime($event->date))->format('H:i') ?>&ensp;
                                        <!-- <?= $event->titre; ?> -->
                                        <a href="" data-toggle="modal" data-target="#modifierFive" title="Détails..." data-idmodif="<?= $event->id ?>" data-sujetmodif="<?= $event->titre ?>" data-contenumodif="<?= $event->description ?>" data-lieu="Lieu: <?= $event->lieu ?>" data-date="Date et heure: <?= strftime('%x %R', strtotime($event->date)) ?>"><?= $event->titre; ?></a>
                                    </div>
                                <?php endforeach; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endfor; ?>
            </table>
        </div>
    </div>

    <!-- Modal de visualisation et gestion d'un évènement -->
    <div class="modal fade" id="modifierFive" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title noire">Détails de l'évènement.</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body0">
                        <input type="text" class="form-control form-control-sm text-dark bg-light border-0" name="titre" readonly>
                    </div>
                    <div class="modal-body1">
                        <input type="text" class="form-control form-control-sm text-dark bg-light border-0 my-1" name="lieu" readonly>
                    </div>
                    <div class="modal-body2">
                        <input type="text" class="form-control form-control-sm text-dark bg-light border-0 mb-1" name="date" readonly>
                    </div>
                    <div class="modal-body3">
                        <textarea class="form-control form-control-sm text-dark bg-light border-0 noresize" rows="5" name="description" readonly></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Ok</button>
                </div>
                <?php if ($_SESSION['user']->fonction >= 2) : ?>
                    <form action="/Evenements/gestion" method="POST" class="modal-footer">
                        <h6 class="noire">Gestion de l'évènement</h6>
                        <input type="hidden" name="id">
                        <button type="submit" class="btn btn-warning btn-sm ml-2" title="Gestion de l'évènement" data-whatever="<?= $event->id ?>"><i class="fas fa-wrench"></i></button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Modal ajout d'un évènement -->
    <div class="modal fade" id="ajoutModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/Evenements/ajoutEvenements" method="POST" class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title noire">Ajouter un évènement.</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control form-control-sm text-dark" name="titre" placeholder="Type d'évènement" required>
                    <input type="text" class="form-control form-control-sm text-dark my-2" name="lieu" placeholder="Lieu" required>
                    <input type="text" class="form-control form-control-sm text-dark" name="date" placeholder="Date (jj/mm/AAAA)" pattern="^(?:(?:31(\/)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" required>
                    <input type="text" class="form-control form-control-sm text-dark my-2" name="heure" placeholder="Heure (hh:mm)" pattern="^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$" required>
                    <textarea class="form-control form-control-sm text-dark noresize" rows="5" name="description" placeholder="Description"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary btn-sm">Valider</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

</section>

