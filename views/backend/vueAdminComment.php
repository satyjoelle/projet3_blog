<h2> Administration des commentaires</h2>



<table class="table table-striped">

    <thead>

      <tr>
        <th> id </th>
        <th> idBillet</th>
        <th> Author </th>
        <th>Commentaire</th>
        <th>Signalé</th>
        <th>Actions</th>
      </tr>

    </thead>

    <tbody>

    <?php foreach ($commentSignaled as $commentSignaled) : ?>
        <tr>
         <td> <?=$commentSignaled->getId();?>  </td>
        <td><?=$commentSignaled->getidBillet();?> </td>
         <td><?=$commentSignaled->getAuthor();?> </td>
         <td> <?= $commentSignaled->getComment();?> </td>
         <td>
             <?php
                if($commentSignaled->getSignaled()){
                    echo'<b class="text-danger">Abusé</b>';
                }else{
                    echo'<b class="text-success">Autorisé</b>';

                }
             ?>
         </td>


            <td>
            <h4> Signaler ce commentaire </h4>
            <label class="checkbox-inline"><input type="checkbox" value=""> Oui </label>
            <label class="checkbox-inline"><input type="checkbox" value=""> Non</label>
            </td>
    <?php endforeach; ?>

        </tr>>

    </tbody>

