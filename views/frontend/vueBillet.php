<article>

    <div class="container">
        <button type="button" class="btn"><a href="/" class="text-right"> Retour aux Articles </a> </button>
    </div>

    <header>
        <h1 class ="titleBillet" ><?= $billet->getTitle(); ?></h1>
        <p><?= $billet->getDateCreated();  ?></p>
    </header>
</article>

<p><?= $billet->getPost() ?> </p>

<header>
    <h1 id="titleReponses">Commentaires <?= $billet->getTitle(); ?></h1>

</header>

<?//boucle qui parcourt les commentaires?>

<?php  foreach ($commentaires as $commentaire):  ?>
    <p><?= $commentaire->getAuthor(); ?> dit :</p>
    <p><?= $commentaire->getComment(); ?></p>

<b>Cliquer ici pour signaler un commentatire abusif</b> </br>
    <form action="index.php?action=signaled" method="post">
        <input type="hidden" name="id" id="" class="" value="<?= $commentaire->getId(); ?>">
        <input type="hidden" name="signaled" id=""  value="<?= $commentaire->getSignaled(); ?>">
       <button class="btn btn-warning" type="submit" onclick="alert('Votre commentaire a été signalé!')"> Signaler</button>
    </form>
<?php endforeach; ?>


<div class="row col-md-6">
    <h2 class="">Ajoutez votre commentaire</h2>
    <form method="post" action="index.php?action=commenter">
        <div class="form-group">
            <input id="auteur" class="form-control" name="author" type="text" placeholder="Votre pseudo"
               required />
        </div>
        <div class="form-group">
            <textarea  name="comment" class="form-control" rows="4" placeholder="Votre commentaire" required></textarea>
        </div>
            <input type="hidden" name="idBillet" value="<?= $billet->getId(); ?>" />
        <div class="form-group">
            <button type="submit" class="btn btn-info">Valider votre commentaire</button>
        </div>
    </form>
</div>

