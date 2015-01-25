<?php if (!empty($_REQUEST['successEdition'])): ?>
	<div class="alert alert-success">
		<p>Votre sujet a bien été modifié.</p>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['success'])): ?>
	<div class="alert alert-success">
		<p>Votre sujet a bien été crée.</p>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['supprimerSujet'])): ?>
	<div class="alert alert-success">
		<p>Votre sujet a bien été supprimé.</p>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['erreur'])): ?>
	<div class="alert alert-danger">
		<p>Vous n'êtes pas autorisé à accéder à ce contenu. Connectez-vous ou inscrivez-vous.</p>
	</div>
<?php endif ?>

<div class="container">
    <h3>Tous les sujets de la catégorie</h3>
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
                        <th><input type="text" class="form-control" placeholder="Sujet" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Messages" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Statut" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Dernier message" disabled></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($listeSujets as $sujet): ?>	
                    <tr>
                       <td><span class="glyphicon glyphicon-comment" style="margin-right:10px"></span><a href="sujets.php?idSujet=<?php echo $sujet['idSujet'];?>"> <?php echo $sujet['nomSujet'];?></a></td>
                        <td><?php echo $sujet['nombreReponseSujet'];?></td>
                        <?php if ($sujet['statutSujet']==STATUT_OUVERT): ?>
                         <td><span class="glyphicon glyphicon-lock" style="color:green;"></span></td>
                         <?php else: ?>
                         <td><span class="glyphicon glyphicon-lock" style="color:red;"></span></td>
                        <?php endif; ?>
                        <td><?php echo !empty($sujet['dateDernierMessage']) ? $sujet['dateDernierMessage']. ' par ' : '' ?><?php echo !empty($sujet['pseudoDernierMessage']) ? $sujet['pseudoDernierMessage'] : 'Aucune info.' ?></td>

                    </tr>
                   <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="./assets/js/rechercheFiltre.js"></script>