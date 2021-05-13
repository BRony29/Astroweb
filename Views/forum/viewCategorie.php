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
            <span><i class="fas fa-caret-right"></i>&ensp;<a class="texterouge bbb" href="#"><?= $f_categorie->nom ?></a></span>
        </div>
    </div>

    <div class="row">
        <div class="col-12 pt-4">
        <table class="table table-striped" id="table" data-toggle="table" data-buttons-class="light" data-search="false" data-search-align="left" data-show-search-clear-button="true" data-pagination="true" data-page-list="[10, 25, 50, 100, all]" data-show-columns="false" data-show-toggle="false" data-show-pagination-switch="true" data-show-fullscreen="false" data-buttons-prefix="btn-sm btn">
                <!-- data-mobile-responsive="true" data-check-on-init="true" data-min-width="767" -->
                <thead>
                    <tr class="text-uppercase text-center align-middle">
                        <th scope="col">Forums</th>
                        <th scope="col" class="sm-no-display" data-width="8" data-width-unit="%">Messages</th>
                        <th scope="col" class="sm-no-display" data-width="65" data-width-unit="%">Dernier message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($f_souscategories as $f_souscategorie) : ?>
                        <tr>
                            <td class="text-left"><span class="font-weight-bold"><a href="/forum/viewSouscategorie/<?= $f_souscategorie->id ?>"><i class="fab fa-discourse"></i>&ensp;<?= $f_souscategorie->nom ?></a></span></td>
                            <td class="text-center tabletd sm-no-display"><?= $f_souscategorie->compteur ?></td>
                            <td class="tabletd sm-no-display">
                                <?php if ($f_souscategorie->id_topic != NULL) : ?>
                                    <span class="texterouge">Topic : </span><span class="texterouge font-weight-bold"><a href="/forum/viewTopic/<?= $f_souscategorie->id_topic ?>"><i class="fab fa-discourse"></i>&ensp;<?= html_entity_decode($f_souscategorie->sujet) ?></a></span><hr>
                                    <span class="textegris"><i class="fas fa-caret-right"></i>&ensp;Auteur : </span><span class="textejaune font-weight-bold"><?= $f_souscategorie->auteur_msg ?></span><br>
                                    <span class="textegris"><i class="fas fa-caret-right"></i>&ensp;Date : <?= strftime('le %x à %R', strtotime($f_souscategorie->dhp_msg)) ?></span><br>
                                    <span class="textegris"><i class="fas fa-caret-right"></i>&ensp;Edition : <?= strftime('le %x à %R', strtotime($f_souscategorie->dhe_msg)) ?></span><br>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</section>