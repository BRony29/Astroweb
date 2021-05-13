<section id="header">
    <div class="row">
        <div class="col-2 my-auto text-center">
            <a href="/"><img src="/public/images/logo.png" class="logo" alt="Logo"></a>
        </div>
        <div class="col my-auto">
            <div class="row">
                <div class="col-sm-7 my-auto">
                    <a href="/"><img src="/public/images/titre.png" class="img-fluid mb-2" alt="Astro-Web"></a>
                </div>
                <div class="col-sm-5 my-auto text-right">
                    <h5>Espace & Astronomie</h5>
                    <h6>Projet Site Web Astro</h6>
                    <h6 class="texteblanc font-weight-bold"><?= $_SESSION['user']->login ?>
                        <?php if ($_SESSION['user']->fonction != 0) : ?>
                            <a href="/notifications/index" class="btn btn-light ml-1 btn-xs" role="button" data-toggle="tooltip" data-placement="top" title="Messages"><i class="far fa-comment-dots"></i></a>
                        <?php endif; ?>
                            <a href="/Calendar/index" class="btn btn-light btn-xs" role="button" data-toggle="tooltip" data-placement="top" title="Calendrier"><i class="far fa-calendar"></i></a>
                            <a href="/forum/index" class="btn btn-primary btn-xs" role="button" data-toggle="tooltip" data-placement="top" title="Forum"><i class="fab fa-stack-exchange"></i></a>
                        <?php if ($_SESSION['user']->fonction != 3 && $_SESSION['user']->fonction != 0) : ?>
                            <a href="/membres/contenu" class="btn btn-info ml-auto btn-xs" role="button" data-toggle="tooltip" data-placement="top" title="Gérer votre contenu"><i class="fas fa-meteor"></i></a>
                        <?php endif; ?>
                        <?php if ($_SESSION['user']->fonction != 0 && $_SESSION['user']->fonction != 3) : ?>
                            <a href="/Administration/profil" class="btn btn-warning ml-auto btn-xs" rol="button" data-toggle="tooltip" data-placement="top" title="Profil"><i class="fas fa-user-astronaut"></i></a>
                        <?php endif; ?>
                        <?php if ($_SESSION['user']->fonction == 0) : ?>
                            <a href="/Administration/login" class="btn btn-success ml-auto btn-xs" role="button" data-toggle="tooltip" data-placement="top" title="Connexion"><i class="fas fa-unlock-alt"></i></a>
                        <?php endif; ?>
                        <?php if ($_SESSION['user']->fonction >= 2) : ?>
                            <a href="/Administration/menuAdmin" class="btn btn-warning ml-auto btn-xs" role="button" data-toggle="tooltip" data-placement="top" title="Administration"><i class="fas fa-tools"></i></a>
                        <?php endif; ?>
                        <?php if ($_SESSION['user']->fonction != 0) : ?>
                            <a href="/Administration/logout" class="btn btn-danger ml-auto btn-xs" role="button" data-toggle="tooltip" data-placement="top" title="Déconnexion"><i class="fas fa-lock"></i></a>
                        <?php endif; ?>
                    </h6>
                    <form class="md-no-display mt-1" action="/main/rechercher" method="POST">
                        <span class="form d-flex flex-row-reverse form-sm">
                            <button type="submit" class="btn btn-light btn-xs" data-toggle="tooltip" data-placement="top" title="Rechercher"><i class="fas fa-search text-dark" aria-hidden="true"></i></button>
                            <input class="form-control form-control-sm mr-1" name="rechercher" type="search" placeholder="Rechercher" aria-label="Search">
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>