<h2> Administration des commentaires</h2>
<table class="table table-striped">

    <thead>

      <tr>
        <th> ID </th>
        <th>Titre du billet</th>
        <th> Author </th>
        <th>Commentaire</th>
        <th>Etat du commentaire </th>
        <th>Actions</th>
      </tr>

    </thead>

    <tbody>


//affichage de tous les commentaires
    <?php foreach ($commentSignaled as $commentSignaled) : ?>
        <tr>
         <td> <?=$commentSignaled->getId();?>  </td>
        <td><?=$commentSignaled->getTitleBillet();?> </td>
         <td><?=$commentSignaled->getAuthor();?> </td>
         <td> <?= $commentSignaled->getComment();?> </td>
         <td>
             <?php
                if($commentSignaled->getSignaled()){
                    echo'<b class="text-danger">Signalé</b>';
                }else{
                    echo'<b class="text-success">Autorisé</b>';

                }
             ?>
         </td>

            <td>
            <h4> Supprimer ce commentaire </h4>
               <a href="<?= "index.php?action=deleteComment&id=" . $commentSignaled->getId(); ?>"> <span class="glyphicon glyphicon-trash btn btn-danger"></span> </a>
            </td>
    <?php endforeach; ?>

        </tr>

    </tbody>

