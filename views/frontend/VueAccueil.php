
<?php ($billets); ?>
<?php foreach ($billets as $billet): ?>
    <article>
        <header>
            <a href="<?= "index.php?action=billet&id=" . $billet->getId(); ?>">
                <h1 class="titreBillet"><?= $billet->getTitle(); ?></h1>
            </a>
            <time><?= $billet->getDateCreated(); ?></time>
        </header>
        <p><?= $billet->getPost(); ?></p>
    </article>
    <hr />
<?php endforeach; ?>



