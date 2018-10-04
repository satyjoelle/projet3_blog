
<?php foreach ($billets as $billet): ?>
    <article>
        <header>
            <a href="<?= "index.php?action=billet&id=" . $billet->id ?>">
                <h1 class="titreBillet"><?= $billet->title ?></h1>
            </a>
            <time><?= $billet->date_created ?></time>
        </header>
        <p><?= $billet->post ?></p>
    </article>
    <hr />
<?php endforeach; ?>