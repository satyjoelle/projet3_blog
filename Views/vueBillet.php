<?php var_dump($billet) ?>
<article>
    <header>
        <h1 class ="titleBillet" ><?= $billet->getTitle() ?></h1>
        <p><?= $billet->getDateCreated()  ?></p>
    </header>
</article>

<p><?= $billet->getPost() ?> </p>

<header>
    <h1 id="titleReponses">Commentaires <?= $billet->getTitle(); ?></h1>

</header>

//boucle qui parcourt les commentaires
<?php  foreach ($commentaires as $commentaire):  ?>
    <p><?= $commentaire->author ?> dit :</p>
    <p><?= $commentaire->commentaire ?></p>
<?php endforeach; ?>



