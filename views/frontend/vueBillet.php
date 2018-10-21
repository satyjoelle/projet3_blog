<article>
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

<?php endforeach; ?>




<form method="post" action="index.php?action=commenter">
    <input id="auteur" name="author" type="text" placeholder="Votre pseudo"
           required /><br />
    <textarea id="txtCommentaire" name="comment" rows="4"
              placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="idBillet" value="<?= $billet->getId(); ?>" />
    <input type="submit" value=" Valider votre commentaire" />
</form>

