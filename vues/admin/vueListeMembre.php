<?php if (!empty($_REQUEST['supprimerMembre'])): ?>
	<div class="alert alert-success">
		<p>Utilisateur supprimé avec succès.</p>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['successEdition'])): ?>
	<div class="alert alert-success">
		<p>Utilisateur modifié avec succès.</p>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['success'])): ?>
	<div class="alert alert-success">
		<p>Utilisateur crée avec succès.</p>
	</div>
<?php endif ?>

<div class="container">
    <h3>Listes des membres inscrits</h3>
    <hr>
    <a href="nouveauMembre.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Ajouter un membre</a>
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Membres</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Rechercher par filtre</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="Pseudo" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Mail" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Admin" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Date inscription" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Nb messages" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Actions" disabled></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($listeMembre as $membre): ?>	
                    <tr>
                       	<td><?php echo $membre['pseudoMembre']; ?></td>
                        <td><?php echo $membre['mailMembre']; ?></td>
                        <td><?php echo $membre['estAdminMembre']; ?></td>
                        <td><?php echo $membre['dateInscriptionMembre']; ?></td>
                        <td><?php echo $membre['nbMessageMembre']; ?></td>
                        <td>
                        <a href="./editerMembre.php?idMembre=<?php echo $membre['idMembre']; ?>" class="btn btn-warning btn-xs">
							<span class="glyphicon glyphicon-pencil"> Editer</span>
						</a> 
						<a href="./supprimerMembre.php?idMembre=<?php echo $membre['idMembre']; ?>" class="btn btn-danger btn-xs">
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