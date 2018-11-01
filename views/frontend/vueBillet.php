<article>

    <div class="container">
        <button type="button" class="btn"><a href="http://localhost/projet3_blog/" class="text-right"> Retour aux Articles </a>          </button>
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

//boucle qui parcourt les commentaires

<?php  foreach ($commentaires as $commentaire):  ?>
    <p><?= $commentaire->getAuthor(); ?> dit :</p>
    <p><?= $commentaire->getComment(); ?></p>

<b>Cliquer ici pour signaler un commentatire abusif</b>
    <form action="index.php?action=signaled" method="post">
        <input type="hidden" name="id" id=""  value="<?= $commentaire->getId(); ?>">
        <input type="hidden" name="signaled" id=""  value="<?= $commentaire->getSignaled(); ?>">
       <button class="btn btn-warning" type="submit" class="btn btn-default">Signaler</button>
    </form>
<?php endforeach; ?>

<form method="post" action="index.php?action=commenter">
    <input id="auteur" name="author" type="text" placeholder="Votre pseudo"
           required /><br />
    <textarea  name="comment" rows="4" placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="idBillet" value="<?= $billet->getId(); ?>" />
    <input type="submit" value=" Valider votre commentaire" />
</form>

