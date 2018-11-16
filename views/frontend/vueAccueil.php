

<?php foreach ($billets as $billet): ?>
    <article>
        <header>

            <h1 class="titreBillet"><?= $billet->getTitle(); ?></h1>
            </a>
            <time><?= $billet->getDateCreated(); ?></time>
        </header>

        <p><?php echo(substr($billet->getPost(),0, 1000)); ?></p>
        <a href=" <?="index.php?action=billet&id=" . $billet->getId();?>"> <span class="btn btn-success">Lire plus! </span> </a>

    </article>

    <hr />

<?php endforeach; ?>


