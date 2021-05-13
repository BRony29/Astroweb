<nav id="menu" class="navbar navbar-expand-sm navbar-light bg-light radius10">
    <div class="col-12">
        <div class="row">
            <div class="col-12 col-sm-8 align-self-center">
                <span class="openbtn" onclick="openNav()"><i class="fas fa-bars"></i></span>
                <span class="openbtn">&ensp;<a href="/vieduclub/index">Vie du club</a></span>
            </div>
            <div><hr></div>
            <div class="col-12 col-sm-4 text-right sm-no-display">
                <form class="form d-flex flex-row-reverse form-sm" action="/main/rechercher" method="POST">
                    <button type="submit" class="btn btn-light btn-xs" data-toggle="tooltip" data-placement="top" title="Rechercher"><i class="fas fa-search text-dark" aria-hidden="true"></i></button>
                    <input class="form-control form-control-sm mr-1 text-dark" name="rechercher" type="search" placeholder="Rechercher" aria-label="Search">
                </form>
            </div>
        </div>
    </div>
</nav>

<div>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" title="Fermer" class="closebtn" onclick="closeNav()">&times;</a>
        <a class="text-uppercase mb-1">Astro-Web</a>
        <hr>
        <a href="/vieduclub/index">Vie du club</a>
        <hr>
        <a href="/main/index" class="mb-1">Accueil</a>
        <a href="/vieduclub/acces">Accès</a>
        <a href="/actualites/index">Actualités</a>
        <a href="/articles/index" class="mb-1">Articles</a>
        <a href="/calendar/index" class="mb-1">Calendrier</a>
        <a href="/contact/index" class="mb-1">Contact</a>
        <a href="/forum/index">Forum</a>
        <a href="/galerie/index" class="mb-1">Galerie</a>
        <a href="/livredors/index" class="mb-1">Livre d'or</a>
        <a href="/main/aPropos" class="mb-1">A propos</a>
        <hr>
        <?php if ($_SESSION['user']->fonction != 0 && $_SESSION['user']->fonction != 3) : ?>
            <a href="/Membres/Contenu">Gérer votre contenu</a>
            <a href="/Administration/menuAdmin">Profil</a>
            <hr>
        <?php endif; ?>
        <?php if ($_SESSION['user']->fonction != 0) : ?>
            <a href="/contact/annuaire">Annuaire</a>
            <?php if ($_SESSION['user']->fonction >= 2) : ?>
                <a href="/Administration/menuAdmin">Administration</a>
            <?php endif; ?>
            <a href="/Notifications/index">Messages</a>
            <hr>
            <a href="/Administration/logout">Deconnexion</a>
        <?php endif; ?>
        <?php if ($_SESSION['user']->fonction == 0) : ?>
            <a href="/Administration/login">Connexion</a>
        <?php endif; ?>
    </div>
</div>