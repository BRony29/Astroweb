<section id="loginSuccess">
    <div class="row justify-content-center">
        <div class="alert alert-success marginError text-center" role="alert">
            Bienvenue <?= $_SESSION['user']->login ?>.
            <hr>
            <?php if ($_SESSION['user']->fonction >= 2) : ?>
                <a href="/Administration/menuAdmin" class="btn btn-success ml-auto btn-sm my-2 mx-1" role="button">Administration</a>
            <?php endif; ?>
            <a href="/main/index" class="btn btn-success ml-auto btn-sm my-2 mx-1" role="button">Accueil</a>
            <hr>
            <?php if ($notifs['notifslues'] == 0 && $notifs['notifsnonlues'] == 0) : ?>
                <span>vous n'avez aucun message.</span><br>
            <?php else : ?>
                <?php if ($notifs['notifslues'] < 2) : ?>
                    <span>Vous avez <?= $notifs['notifslues'] ?> message lu.</span><br>
                <?php else : ?>
                    <span>Vous avez <?= $notifs['notifslues'] ?> messages lus.</span><br>
                <?php endif; ?>
                <?php if ($notifs['notifsnonlues'] < 2) : ?>
                    <span>Vous avez <?= $notifs['notifsnonlues'] ?> message non lu.</span><br>
                <?php else : ?>
                    <span>Vous avez <?= $notifs['notifsnonlues'] ?> messages non lus.</span><br>
                <?php endif; ?>
                <a href="/notifications/index" class="btn btn-outline-dark ml-auto btn-sm my-2" role="button">Messages</a>
            <?php endif; ?>
        </div>
    </div>
</section>