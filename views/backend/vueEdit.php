

<h2>Formulaire d'édition de billet </h2>
<p></p>
<form action="" method="post">

    <div class="form-group">
        <label for="title">Titre:</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $billet->getTitle(); ?>">
    </div>
    <div class="form-group">
        <label for="post">Contenu:</label>
        <textarea class="form-control" rows="5" id="post" name="post"><?= $billet->getPost(); ?></textarea>
    </div>
    <div class="form-group">
            <input type="hidden" name="idBillet" value="<?= $billet->getId(); ?>" />
            <button type="submit" class="btn btn-primary" name="submit">Modifier</button>

    </div>
</form>

