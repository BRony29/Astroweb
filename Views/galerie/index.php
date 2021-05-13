<section id="galerie">
    <div class="row my-3 windowTheme">
        <div class="col-9 my-auto">
            <h1 class="titre text-uppercase text-left">galeries</h1>
        </div>
    </div>

    <div class="row justify-content-sm-center windowTheme">
        <div class="col-sm-12 mb-2">
            <h5 class="minititre text-left textebleue">Cliquez sur une image pour l'afficher et ouvrir un carrousel.</h5>
        </div>
        <?php foreach ($galeries as $galerie) : ?>
            <div class="fancy col-sm-4">
                <a data-fancybox="gallery" href="<?= $galeriePath['galeriePath'] ?><?= $galerie->imagePath ?>" data-caption="<?= $galerie->dataCaption ?>"><img src="/public/thumb/<?= $galerie->imagePath ?>" class="img-fluid" alt="Aperçu"></a>
            </div>
        <?php endforeach ?>
    </div>
</section>