<section id="administrations">

    <div id="vieduclubMenu" class="row my-3 windowTheme">
        <div class="col-9 my-auto">
            <h1 class="titre text-uppercase text-left">administration</h1>
        </div>
    </div>

    <div class="row justify-content-around">
        <a class="col-3 col-md-2 boite text-center" href="/actualites/gestion" data-toggle="tooltip" data-placement="top" title="Actualités">
            <img class="my-auto img-fluid mb-2" src="/public/images/actualites.png" alt="Actualités">
        </a>
        <a class="col-3 col-md-2 boite text-center" href="/membres" data-toggle="tooltip" data-placement="top" title="Adhérents">
            <img class="my-auto img-fluid mb-2" src="/public/images/terre.png" alt="Adhérents">
        </a>
        <?php if ($_SESSION['user']->fonction == 3) : ?>
            <a class="col-3 col-md-2 boite text-center" href="/Administration/configAdmin" data-toggle="tooltip" data-placement="top" title="Administrateur">
                <img class="my-auto img-fluid mb-2" src="/public/images/soleil.png" alt="Administrateur">
            </a>
        <?php endif; ?>
        <a class="col-3 col-md-2 boite text-center" href="/articles/gestion" data-toggle="tooltip" data-placement="top" title="Articles">
            <img class="my-auto img-fluid mb-2" src="/public/images/articles.png" alt="Articles">
        </a>
        <a class="col-3 col-md-2 boite text-center" href="/Association" data-toggle="tooltip" data-placement="top" title="Association">
            <img class="my-auto img-fluid mb-2" src="/public/images/systemeSolaire.png" alt="Association">
        </a>
        <a class="col-3 col-md-2 boite text-center" href="/articles/bibliothequeGestion" data-toggle="tooltip" data-placement="top" title="Bibliothèque d'images">
            <img class="my-auto img-fluid mb-2" src="/public/images/bibliotheque.png" alt="Bibliothèque">
        </a>
        <a class="col-3 col-md-2 boite text-center" href="/calendar/index" data-toggle="tooltip" data-placement="top" title="Calendrier">
            <img class="my-auto img-fluid mb-2" src="/public/images/calendrier.png" alt="Calendrier">
        </a>
        <a class="col-3 col-md-2 boite text-center" href="/evenements/gestionAdmin" data-toggle="tooltip" data-placement="top" title="Evènements">
            <img class="my-auto img-fluid mb-2" src="/public/images/evenements.png" alt="Evènements">
        </a>
        <a class="col-3 col-md-2 boite text-center" href="/forum/gestion" data-toggle="tooltip" data-placement="top" title="Forum">
            <img class="my-auto img-fluid mb-2" src="/public/images/forum.png" alt="Forum">
        </a>
        <a class="col-3 col-md-2 boite text-center" href="/galerie/gestionGalerieAdmin" data-toggle="tooltip" data-placement="top" title="Galerie">
            <img class="my-auto img-fluid mb-2" src="/public/images/galeries.png" alt="Galeries">
        </a>
        <a class="col-3 col-md-2 boite text-center" href="/livredors/gestion" data-toggle="tooltip" data-placement="top" title="Livre d'or">
            <img class="my-auto img-fluid mb-2" src="/public/images/livredor.png" alt="Livre d'or">
        </a>
    </div>
</section>