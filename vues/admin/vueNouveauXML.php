<?php if (!empty($errors)): ?>
	<div class="alert alert-danger">
		<?php foreach ($errors as $v): ?>
			<p><?php echo $v ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['erreur'])): ?>
	<div class="alert alert-danger">
		<p>Vous n'êtes pas autorisé à accéder à ce contenu. Connectez-vous ou inscrivez-vous.</p>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['success'])): ?>
	<div class="alert alert-success">
		<p>Votre XML a bien été crée. Vous pouvez le télécharger <a target="_blank" href="xml/mesreponses.xml">ici</a>.</p>
	</div>
<?php endif ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="">
                    <fieldset>
					 <legend class="text-center header">Générer nouveau XML</legend>

                        <div class="form-group">
                         <span class="col-md-3 col-md-offset-1 text-center"><span class="glyphicon glyphicon-save"></span> Choix de la sous-catégorie</span>
                            <div class="col-md-4">				
						    <select id="idSousCategorie" name="idSousCategorie" class="form-control">
						     <?php foreach ($allCategories as $categorie): ?>
						      	<?php foreach ($categorie['souscategories'] as $souscategories): ?>	
						      		<option value="<?php echo $souscategories['idSousCategorie'] ?>"><?php echo $categorie['nomCategorie']; ?> - <?php echo $souscategories['nomSousCategorie']; ?></option>
						     	 <?php endforeach ?>
						      <?php endforeach ?>
						    </select>
						  </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                             <input type="submit" class="btn btn-primary" value="Submit">
                        	</div>
                        </div>
                    </fieldset>
                    <input type="hidden" name="editionIdSujet" id="editionIdSujet" value="<?php echo !empty($sujet['idSujet']) ? $sujet['idSujet'] : '' ?>">
                    <input type="hidden" name="idMembre" value="<?php echo !empty($sujet['idMembre']) ? $sujet['idMembre'] : $_SESSION['idMembre'] ?>" id="idMembre">
                </form>
            </div>
        </div>
    </div>
</div>