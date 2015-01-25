<?php if (!empty($_REQUEST['success'])): ?>
	<div class="alert alert-success">
		<p>Catégorie crée avec succès.</p>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['supprimerCategorie'])): ?>
	<div class="alert alert-success">
		<p>Catégorie supprimée avec succès.</p>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['successEdition'])): ?>
	<div class="alert alert-success">
		<p>Catégorie modifiée avec succès.</p>
	</div>
<?php endif ?>

<div class="container">
    <h3>Listes des catégories</h3>
    <hr>
    <a href="nouvelleCategorie.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Ajouter une catégorie</a>
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Catégories</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Rechercher par filtre</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="Nom catégorie" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Description" disabled></th>
                         <th><input type="text" class="form-control" placeholder="Nb sous-categories" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Date création" disabled></th>
                        <th><input type="text" class="form-control" placeholder="ID du créateur" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Actions" disabled></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($listeCategorie as $categorie): ?>	
                    <tr>
                       	<td><?php echo $categorie['nomCategorie']; ?></td>
                        <td><?php echo $categorie['descriptionCategorie']; ?></td>
                        <td><?php echo $categorie['nombreSousCategorie']; ?></td>
                        <td><?php echo $categorie['dateCreationCategorie']; ?></td>
                        <td><?php echo $categorie['idMembre']; ?></td>
                        <td>
                        <a href="./nouvelleCategorie.php?idCategorie=<?php echo $categorie['idCategorie']; ?>" class="btn btn-warning btn-xs">
							<span class="glyphicon glyphicon-pencil"> Editer</span>
						</a> 
						<a href="./supprimerCategorie.php?idCategorie=<?php echo $categorie['idCategorie']; ?>" class="btn btn-danger btn-xs">
							<span class="glyphicon glyphicon-remove"> Delete</span> 
						</a>
                        </td>
                    </tr>
                   <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="./assets/js/rechercheFiltre.js"></script>