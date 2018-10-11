


<h2> Page d'administration</h2>
<div> <a href="index.php?action=addForm"> <span class="glyphicon glyphicon-plus btn btn-warning" >  </span> </a> </div>
<table class="table table-striped">
    <thead>
        <tr>
            <th> id </th>
            <th> Titre </th>
            <th> Contenu </th>
            <th>Date de Création </th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>
    <?php foreach ($billets as $billet): ?>
        <tr>

            <td> <?= $billet->getId(); ?> </td>
            <td> <?= $billet->getTitle(); ?> </td>
            <td> <?= $billet->getPost(); ?> </td>
            <td> <?= $billet->getDateCreated(); ?> </td>
            <td>
                <a href="<?= "index.php?action=edit&id=" . $billet->getId(); ?>"> <span class="glyphicon glyphicon-pencil btn btn-success"></span> </a>
                <a href="<?= "index.php?action=delete&id=" . $billet->getId(); ?>"> <span class="glyphicon glyphicon-trash btn btn-danger"></span> </a>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>

</table>
