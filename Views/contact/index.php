<section id="contact">

    <div class="row my-3 windowTheme">
        <div class="col-9 my-auto">
            <h1 class="titre text-uppercase text-left">Contact</h1>
        </div>
    </div>

    <form action="/contact/envoiMail" method="POST" class="windowTheme my-3">
        <div class="form-row my-1">
            <div class="col-sm-5 mb-3 offset-sm-1">
                <input type="text" class="form-control form-control-sm bg-light text-dark" name="nom" placeholder="Votre nom" pattern="^[-a-zA-Z àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$" maxlength="20" required>
            </div>
            <div class="col-sm-5 mb-3">
                <input type="text" class="form-control form-control-sm bg-light text-dark" name="prenom" placeholder="Votre prénom" pattern="^[-a-zA-Z àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$" maxlength="20" required>
            </div>
        </div>
        <div class="form-row my-1">
            <div class="col-sm-5 mb-3 offset-sm-1">
                <input type="email" class="form-control form-control-sm bg-light text-dark" name="email" placeholder="Votre email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
            </div>
            <div class="col-sm-5 mb-3">
                <input type="text" class="form-control form-control-sm bg-light text-dark" name="organisation" placeholder="Nom d'entreprise, d'association." pattern="^[-a-zA-Z0-9 àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$" maxlength="20" required>
            </div>
        </div>
        <div class="form-row my-1">
            <div class="col-sm-10 offset-sm-1 mb-3">
                <input type="text" class="form-control form-control-sm bg-light text-dark" name="sujet" placeholder="Sujet de votre message" pattern="^[-a-zA-Z0-9 àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$" required>
            </div>
        </div>
        <div class="form-row my-1">
            <div class="col-sm-10 offset-sm-1">
                <input type="hidden" name="raison">
                <textarea class="form-control form-control-sm bg-light text-dark" id="message" name="message" placeholder="Message" rows="4" required></textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-10 offset-sm-1">
                <button class="btn btn-outline-success btn-sm mt-4 mb-3" type="submit">Envoyer</button>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-10 offset-sm-1">
                <h6 class="textebleue mb-2 text-justify">En soumettant volontairement ce formulaire, j'accèpte que les informations saisies soient utilisées pour permettre de me recontacter.</h6>
                <h6 class="textebleue mb-2 text-justify">Ce site ne conserve aucune trace de vos informations. Elles ne feront pas l'objet d'une newsletter, d'une relation commerciale et ne seront transmises à aucun tiers.</h6>
            </div>
        </div>
    </form>

</section>