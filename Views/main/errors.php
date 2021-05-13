<section id="error">
    <div class="row justify-content-center">
        <div class="alert alert-danger marginError text-center" role="alert">
            <?= $errors['msg'] ?><br>
            <a href="<?= $errors['redirect'] ?>" class="btn btn-danger my-2 btn-sm" role="button">Retour</a>
        </div>
    </div>
</section>