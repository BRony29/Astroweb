<section>

    <div class="row my-3 windowTheme">
        <div class="col-9 align-middle">
            <h1 class="titre text-uppercase text-left">évènements</h1>
        </div>
    </div>

    <div id="tableEvenements" class="table-responsive">
        <table class="table table-striped" id="table" data-buttons-class="light" data-toggle="table" data-search="true" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-columns="true" data-show-toggle="true" data-show-pagination-switch="true" data-show-fullscreen="true" data-buttons-prefix="btn-sm btn" data-mobile-responsive="true" data-check-on-init="true" data-min-width="767">
            <thead>
                <tr>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="titre">Titre</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="date">Date</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="lieu">Lieu</th>
                    <th scope="col" class="text-center table-texte tableth" data-sortable="true" data-field="description">Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($evenements as $evenement) : ?>
                    <tr>
                        <td class="text-left align-middle table-texte tabletd"><?= $evenement->titre ?></td>
                        <td class="text-center align-middle table-texte tabletd"><?= strftime('%x', strtotime($evenement->date)) ?></td>
                        <td class="text-left align-middle table-texte tabletd"><?= $evenement->lieu ?></td>
                        <td class="text-justify align-middle table-texte tabletd"><?= nl2br(html_entity_decode($evenement->description)) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>