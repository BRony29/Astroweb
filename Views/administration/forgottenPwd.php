<br><br><br>
<div class="row justify-content-sm-center">
    <div class="col-sm-6 text-center my-auto windowTheme">
        <p class="my-0 textejaune">Mot de passe oublié ?</p>
    </div>
</div>

<?php if (
    isset($_SESSION['recup_email']) && !empty($_SESSION['recup_email']) && !$_SESSION['code']
) : ?>
    <div class="row justify-content-sm-center">
        <form id="forgottenPwdForm1" class="col-sm-6 windowTheme" action="/Administration/forgottenPwdVerifCode" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" value="<?= $_SESSION['recup_email'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="code">Entrez le code de vérification</label>
                <input type="text" class="form-control" name="code" placeholder="Entrez le code de vérification">
                <p class="mt-3">Veuillez renseigner le code qui vous a été envoyé par mail.</p>
            </div>
            <div class="row form-group">
                <div class="col-6">
                    <button type="submit" class="btn btn-outline-light btn-sm">Envoyer</button>
                </div>
            </div>
        </form>
    </div>
<?php endif; ?>

<?php if (
    isset($_SESSION['recup_email']) && !empty($_SESSION['recup_email']) && $_SESSION['code']
) : ?>
    <div class="row justify-content-sm-center">
        <form id="forgottenPwdForm2" class="col-sm-6 windowTheme" action="/Administration/forgottenPwdValide" method="POST">
            <div class="form-group">
                <label for="motDePasse1">Mot de passe :</label>
                <input type="password" class="form-control" id="motDePasse1" name="motDePasse1" placeholder="Mot de passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required onBlur="checkPass()">
            </div>
            <div class="form-group">
                <label for="motDePasse2">Confirmez le mot de passe :</label>
                <input type="password" class="form-control" id="motDePasse2" name="motDePasse2" placeholder="Confirmez le mot de passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required onBlur="checkPass()">
                <p class="mt-3">Veuillez renseigner et confirmer votre nouveau mot de passe.</p>
            </div>
            <div id="divcomp" class="col-sm-12">
                </div>
            <div class="row form-group">
                <div class="col-6">
                    <button type="submit" class="btn btn-outline-light btn-sm">Envoyer</button>
                </div>
            </div>
        </form>
    </div>
<?php endif; ?>

<?php if (
    !isset($_SESSION['recup_email'])
) : ?>
    <div class="row justify-content-sm-center">
        <form id="forgottenPwdForm3" class="col-sm-6 windowTheme" action="/Administration/forgottenPwdVerifMail" method="POST">
            <div class="form-group">
                <label for="email">Entrez votre adresse mail</label>
                <input type="email" class="form-control" name="email" placeholder="Entrez votre adresse mail">
                <p class="mt-3">Si votre adresse email est associée à un compte, un code vous sera envoyé par email afin de récupérer votre mot de passe.</p>
            </div>
            <div class="row form-group">
                <div class="col-6">
                    <button type="submit" class="btn btn-outline-light btn-sm">Envoyer</button>
                </div>
            </div>
        </form>
    </div>
<?php endif; ?>