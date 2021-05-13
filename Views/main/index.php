<?php
require_once ("./BBCode/bbcode.php");
$bbcode = new BBCode;
?>

<section id="accueil">
    <div class="row windowTheme">
        <div class="col-md-5 text-center sm-no-display">
            <img class="img-fluid my-3 rounded" src="/public/images/accueil.png" alt="Accueil">
        </div>
        <div class="col-sm-12 col-md-7">
            <h5 class="text-uppercase my-2 pb-1 text-left ligneInferieure textejaune">Accueil</h5>
            <p class="text-justify">J'ai développé ce site web dans le cadre de mon projet de stage lors de ma formation de "Développeur Web et Web Mobile" à l'AFPA de Brest en 2020. A  l'origine, il était destiné au club d'astronomie Pégase de  l'Amicale Laïque de Saint-Renan.</p>
            <p class="text-justify">Le développement complet, du cahier des charges au site final, en passant par la maquette et le codage, m'a pris environ trois mois. Étant en apprentissage et assimilant de nouvelles fonctions php et JavaScript tous les jours, j'ai du revenir régulièrement en arrière afin d'optimiser et d'améliorer le code. Évidement, il est très loin d'être parfait et nécessite encore de longues heures de travail. Mais je pense que pour un premier vrai site, ce n'est déjà pas si mal.</p>
            <p class="text-justify">Vous trouverez des informations techniques sur la page "A propos" du site.</p>
            <p class="text-justify">Un compte de test est disponible, il bénéficie de droits limités mais il vous permettra de tester quelques fonctionnalités. C'est le compte Guest avec mdp "Guest2021". Vous trouverez le compte administrateur dans la base de données</p>
            <p>Bonne visite et merci du temps que vous prenez pour naviguer sur le site !</p>
        </div>
    </div>

    <div class="row my-3 windowTheme">
        <div class="col-sm-12">
            <div class="row ligneInferieure">
                <div class="col-sm-12">
                    <h5 class="text-uppercase my-1 textejaune">évènements</h5>
                </div>
            </div>
        </div>
        <?php foreach (array_slice($evenements, 0, 4) as $evenement) : ?>
            <div class="col-sm-12 ligneInferieure">
                <div class="row cursorHover">
                    <div class="col-sm-7 offset-sm-2">
                        <h6 class="textebleue my-2"><?= $evenement->lieu ?></h6>
                    </div>
                    <div class="col-sm-3">
                        <h6 class=" my-2 text-right textebleue"><?= strftime('%x %R', strtotime($evenement->date)) ?></h6>
                    </div>
                    <div class="col-sm-2 text-center">
                    <p class="text-uppercase text-justify textebleue"><?= $evenement->titre ?></p>
                    </div>
                    <div class="col-sm-10">
                        <p class="text-justify"><?= $bbcode->toHTML(nl2br(html_entity_decode($evenement->description))) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <div class="col-sm-10 offset-sm-1">
            <h6 class="my-3 text-right lienAccueil"><a class="textejaune" href="/calendar/index">Calendrier...</a></h6>
        </div>
    </div>

    <div class="row windowTheme">
        <div class="col-sm-12">
            <div class="row ligneInferieure">
                <div class="col-sm-12">
                    <h5 class="text-uppercase my-1 textejaune">actualités</h5>
                </div>
            </div>
        </div>
        <?php foreach (array_slice($actualites, 0, 4) as $actualite) : ?>
            <div class="col-sm-12 ligneInferieure">
                <div class="row cursorHover">
                    <div class="col-sm-7 offset-sm-3">
                        <h6 class="text-uppercase my-2 textebleue"><?= $actualite->titre ?></h6>
                    </div>
                    <div class="col-sm-2">
                        <h6 class="text-uppercase my-2 text-right textebleue"><?= strftime('%x', strtotime($actualite->date)) ?></h6>
                    </div>
                    <div class="col-sm-3 text-center sm-no-display">
                        <img src="/public/actualites/<?= $actualite->imagePath ?>" class="img-fluid mb-3 rounded" alt="Illustration actualité">
                    </div>
                    <div class="col-sm-9">
                        <p class="text-justify lienAccueil"><?= $bbcode->toHTML(nl2br(html_entity_decode($actualite->commentaire))) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <div class="col-sm-10 offset-sm-1">
            <h6 class="my-3 text-right lienAccueil"><a href="/actualites/index">Plus d'actualités...</a></h6>
        </div>
    </div>

</section>