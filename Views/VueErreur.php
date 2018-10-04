
//Erreur de la vue

<?php ob_start() ?>
    <p>Une erreur est survenue : <?= $msgErreur ?></p>
<?php $post = ob_get_clean(); ?>

<?php require 'Template.php'; ?>