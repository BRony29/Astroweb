<?php
if (isset($action) && $action['action'] = 'citer') {
    $action = 'nouveauMessage';
    $citation = '[quote]' . $f_message->contenu . '[/quote]';
} else {
    $action = 'editMessage';
    $citation = $f_message->contenu;
}
?>

<section>
    <div class="row my-3 windowTheme">
        <div class="col-9 my-auto">
            <h1 class="titre text-uppercase text-left">forum</h1>
        </div>
    </div>
</section>

<section id="forum">
    <div class="row my-3 windowTheme">
        <div class="col-12 my-auto">
            <span>Navigation :&ensp;</span>
            <span><a href="/forum/index"><i class="fas fa-home textejaune bbb"></i></a>&ensp;</span>
            <span><i class="fas fa-caret-right"></i>&ensp;<span><a class="textejaune bbb" href="/forum/viewCategorie/<?= $donnees['categorie_id'] ?>"><?= $donnees['categorie_name'] ?></a>&ensp;</span>
            <span><i class="fas fa-caret-right"></i>&ensp;<span><a class="textejaune bbb" href="/forum/viewSouscategorie/<?= $donnees['souscategorie_id'] ?>"><?= $donnees['souscategorie_name'] ?></a>&ensp;</span>
            <span><i class="fas fa-caret-right"></i>&ensp;<span><a class="textejaune bbb" href="#">Edit Message</a></span>
        </div>
    </div>

    <div class="row my-3 windowTheme">
        <div class="col-12 my-auto">
            <form action="/forum/<?= $action ?>" method="POST">
                <div class="row">
                    <div class='col-sm-10 offset-sm-1 mb-3'>
                        <span>sujet : </span><span class="texterouge"><?= html_entity_decode($donnees['topic_sujet']) ?></span>
                        <button type="button" class="close" onclick="history.back()"><span class="texteblanc">&times;</span></button>
                    </div><br>
                    <div class='col-sm-10 offset-sm-1 mb-3'>
                        <input type="hidden" name="raison">
                        <input type="hidden" name="id_topic" value="<?= $donnees['topic_id'] ?>">
                        <input type="hidden" name="id_message" value="<?= $f_message->id ?>">
                        <label for="message">Modifier un message :</label>
                        <textarea class="form-control" id="editor" name="message"><?= html_entity_decode($citation) ?></textarea>
                    </div>
                    <div class="col-sm-7 offset-sm-1 mb-3">
                        <button type="submit" class="btn btn-outline-light btn-sm">Envoyer</button>
                    </div>
                    <div class="col-3  mb-3 text-right">
                        <button class="btn btn-outline-light btn-sm" onclick="history.back()">Annuler</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

