<?php if (!empty($_REQUEST['success'])): ?>
	<div class="alert alert-success">
		<p>Sous-catégorie crée avec succès.</p>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['supprimerSousCategorie'])): ?>
	<div class="alert alert-success">
		<p>Sous-catégorie supprimée avec succès.</p>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['successEdition'])): ?>
	<div class="alert alert-success">
		<p>Sous-catégorie modifiée avec succès.</p>
	</div>
<?php endif ?>

<div class="container">
    <h3>Listes des sous-catégories</h3>
    <hr>
    <a href="nouvelleSousCategorie.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Ajouter une sous-catégorie</a>
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Sous Categorie</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Rechercher par filtre</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="Nom sous-cat" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Description" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Cat. parente" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Date création" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Nb sujets" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Nb réponses" disabled></th>
                        <th><input type="text" class="form-control" placeholder="ID du créateur" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Actions" disabled></th>
                    </tr>
                </thead>
                <tbody>
                 <?php foreach ($categoriesAndSousCategories as $categorie): ?>	
                 <?php foreach ($categorie['souscategories'] as $sousCategorie): ?>
                    <tr>
                       	<td><?php echo $sousCategorie['nomSousCategorie']; ?></td>
                        <td class="col-md-2"><?php echo $sousCategorie['descriptionSousCategorie']; ?></td>
                        <td><?php echo $categorie['nomCategorie']; ?></td>
                        <td><?php echo $sousCategorie['dateCreationSousCategorie']; ?></td>
                        <td><?php echo $sousCategorie['nombreSujetSousCategorie']; ?></td>
                        <td><?php echo $sousCategorie['nombreReponseSousCategorie']; ?></td>
                        <td><?php echo $sousCategorie['idMembre']; ?></td>
                        <td class="col-md-2">
                        <a href="./nouvelleSousCategorie.php?idSousCategorie=<?php echo $sousCategorie['idSousCategorie']; ?>" class="btn btn-warning btn-xs">
							<span class="glyphicon glyphicon-pencil"> Editer</span>
						</a> 
						<a href="./supprimerSousCategorie.php?idSousCategorie=<?php echo $sousCategorie['idSousCategorie']; ?>" class="btn btn-danger btn-xs">
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