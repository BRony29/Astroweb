<section id="login">
    <br><br><br>
    <div class="row justify-content-sm-center">
        <form id="loginForm" class="col-sm-6 windowTheme" action="/Administration/connexion" method="POST">
            <div class="form-group">
                <label for="login">Login</label>
                <?php if (isset($_COOKIE['pegase']) && $_COOKIE['pegase'] != 'invité') : ?>
                    <input type="text" class="form-control" name="login" aria-describedby="emailHelp" value="<?= $_COOKIE['pegase']; ?>">
                <?php else : ?>
                    <input type="text" class="form-control" name="login" aria-describedby="emailHelp" placeholder="Login">
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="MotDePasse">Mot de passe</label>
                <input type="password" class="form-control" name="MotDePasse" placeholder="Mot de passe">
            </div>
            <div class="row form-group">
                <div class="col-6">
                    <button type="submit" class="btn btn-outline-light btn-sm">Envoyer</button>
                </div>
                <div class="col-6 text-right">
                    <a href="/administration/forgottenPwd">Mot de passe oublié ?</a>
                </div>
            </div>
        </form>
    </div>
</section>