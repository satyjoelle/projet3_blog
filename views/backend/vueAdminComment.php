
<table class="table table-striped">

    <thead>

      <tr>
        <th> ID </th>
        <th>Titre du billet</th>
        <th> Author </th>
        <th>Commentaire</th>

        <th>Actions</th>
      </tr>

    </thead>

    <tbody>


<?php//affichage de tous les commentaires signalés?>
    <?php foreach ($commentSignaled as $commentSignaled) : ?>

    <?php if($commentSignaled->getSignaled()){ ?>
     <tr>

         <td> <?=$commentSignaled->getId();?>  </td>
         <td><?=$commentSignaled->getTitleBillet();?> </td>
         <td><?=$commentSignaled->getAuthor();?> </td>
         <td> <?= $commentSignaled->getComment();?> </td>


            <td>
            <h4> Supprimer ce commentaire </h4>
               <a href="<?= "index.php?action=deleteComment&id=" . $commentSignaled->getId(); ?>"> <span class="glyphicon glyphicon-trash btn btn-danger"></span> </a>
            </td>
     </tr>
    <?php } ?>
    <?php endforeach; ?>



    </tbody>

