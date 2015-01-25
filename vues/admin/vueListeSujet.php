<?php if (!empty($_REQUEST['success'])): ?>
	<div class="alert alert-success">
		<p>Sujet crée avec succès.</p>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['supprimerSujet'])): ?>
	<div class="alert alert-success">
		<p>Sujet supprimé avec succès.</p>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['successEdition'])): ?>
	<div class="alert alert-success">
		<p>Sujet modifié avec succès.</p>
	</div>
<?php endif ?>

<div class="container">
    <h3>Liste des sujets</h3>
    <hr>
    <a href="nouveauSujet.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Ajouter un sujet</a>
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Sujets</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Rechercher par filtre</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="Titre sujet" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Description" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Sous-catégorie" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Date création" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Statut" disabled></th>
                        <th><input type="text" class="form-control" placeholder="ID du créateur" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Actions" disabled></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($sousCategoriesAndSujets as $sousCategorie): ?>
                 <?php foreach ($sousCategorie['sujets'] as $sujet): ?>		
                    <tr>
                       	<td><?php echo $sujet['nomSujet']; ?></td>
                        <td><?php echo $sujet['messageSujet']; ?></td>
                        <td><?php echo $sousCategorie['nomSousCategorie']; ?></td>
                        <td><?php echo $sujet['dateCreationSujet']; ?></td>
                        <td><?php echo $sujet['statutSujet']; ?></td>
                        <td><?php echo $sujet['idMembre']; ?></td>
                        <td>
                        <a href="./nouveauSujet.php?idSujet=<?php echo $sujet['idSujet']; ?>" class="btn btn-warning btn-xs">
							<span class="glyphicon glyphicon-pencil"> Editer</span>
						</a> 
						<a href="./supprimerSujet.php?idSujet=<?php echo $sujet['idSujet']; ?>" class="btn btn-danger btn-xs">
							<span class="glyphicon glyphicon-remove"> Delete</span> 
						</a>
                        </td>
                    </tr>
                   <?php endforeach ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="./assets/js/rechercheFiltre.js"></script>