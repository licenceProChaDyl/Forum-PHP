<?php if (!empty($_REQUEST['erreur'])): ?>
	<div class="alert alert-danger">
		<p>Vous n'êtes pas autorisé à accéder à ce contenu.</p>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['pasLogged'])): ?>
	<div class="alert alert-danger">
		<p>Vous n'êtes pas autorisé à accéder à ce contenu. Connectez-vous ou inscrivez-vous.</p>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['okInscription'])): ?>
	<div class="alert alert-success">
		<p>Votre inscription est validé, vous pouvez vous connecter.</p>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['koInscription'])): ?>
	<div class="alert alert-danger">
		<p>Veuillez saisir une adresse mail valide.</p>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['deconnexion'])): ?>
	<div class="alert alert-success">
		<p>Vous êtes à présent déconnecté.</p>
	</div>
<?php endif ?>
	
  <?php foreach ($categoriesAndSousCategories as $categorie): ?>	
<div class="container">
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $categorie['nomCategorie'];?></h3>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="Forum" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Discussions" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Messages" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Dernier message" disabled></th>
                    </tr>
                </thead>
                <tbody>
                 <?php foreach ($categorie['souscategories'] as $souscategories): ?>	
                    <tr>
                       <td class="col-md-4"> <a href="sousCategories.php?idSousCategorie=<?php echo $souscategories['idSousCategorie'];?>"><?php echo $souscategories['nomSousCategorie']; ?></a><br>
                       <p><?php echo $souscategories['descriptionSousCategorie']; ?></p>
                       </td>
                        <td><?php echo $souscategories['nombreSujetSousCategorie']; ?></td>
                        <td><?php echo $souscategories['nombreReponseSousCategorie']; ?></td>
                        <td><?php echo !empty($souscategories['dateDernierMessage']) ? $souscategories['dateDernierMessage']. ' par ' : '' ?><?php echo !empty($souscategories['pseudoDernierMessage']) ? $souscategories['pseudoDernierMessage'] : 'Aucune info.' ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php endforeach ?>
<script type="text/javascript" src="./assets/js/rechercheFiltre.js"></script>