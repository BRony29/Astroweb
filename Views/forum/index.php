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
        </div>
    </div>

    <div class="row">
        <div class="col-12 pt-4">
            <table class="table table-striped" id="table" data-toggle="table" data-buttons-class="light" data-search="false" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-columns="false" data-show-toggle="false" data-show-pagination-switch="true" data-show-fullscreen="false" data-buttons-prefix="btn-sm btn">
                <!-- data-mobile-responsive="true" data-check-on-init="true" data-min-width="767" -->
                <thead>
                    <tr class="text-uppercase text-center align-middle">
                        <th scope="col" data-width="45" data-width-unit="%">Forums</th>
                        <th scope="col" class="sm-no-display" data-width="7" data-width-unit="%">Messages</th>
                        <th scope="col" class="sm-no-display" data-width="48" data-width-unit="%">Dernier message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($f_categories as $f_categorie) : ?>
                        <tr>
                            <td class="text-left">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p class="text-uppercase font-weight-bold"><a href="/forum/viewCategorie/<?= $f_categorie->id ?>"><i class="fab fa-discourse"></i>&ensp;<?= $f_categorie->nom ?></a></p>
                                    </div>
                                    <?php foreach ($f_souscategories as $f_souscategorie) :; ?>
                                        <div class="col-sm-10 offset-1 offset-sm-2">
                                            <?php if ($f_souscategorie->id_f_categories == $f_categorie->id) :
                                                $souscategorieMenu = '<a href="/forum/viewSouscategorie/' .  $f_souscategorie->id . '"><i class="fab fa-discourse"></i>&ensp;' . $f_souscategorie->nom . '</a>'; ?>
                                                <span class="font-weight-bold"><?= $souscategorieMenu ?></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </td>
                            <td class="text-center tabletd sm-no-display"><?= $f_categorie->compteur ?></td>
                            <td class="tabletd sm-no-display">
                                <?php if (!empty($f_categorie->sujet)) : ?>
                                    <span class="texterouge">Topic : </span><span class="font-weight-bold"><a href="/forum/viewTopic/<?= $f_categorie->id_topic ?>"><i class="fab fa-discourse"></i>&ensp;<?= html_entity_decode($f_categorie->sujet) ?></a></span><br>
                                    <span class="textegris"><i class="fas fa-caret-right"></i>&ensp;Auteur : </span><span class="textejaune font-weight-bold"><?= $f_categorie->auteur_msg ?></span><br>
                                    <span class="textegris"><i class="fas fa-caret-right"></i>&ensp;Date : <?= strftime('le %x à %R', strtotime($f_categorie->dhp_msg)) ?></span><br>
                                    <span class="textegris"><i class="fas fa-caret-right"></i>&ensp;Edition : <?= strftime('le %x à %R', strtotime($f_categorie->dhe_msg)) ?></span><br>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</section>