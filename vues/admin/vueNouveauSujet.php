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
		<p>Votre sujet a bien été crée.</p>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['successEdition'])): ?>
	<div class="alert alert-success">
		<p>Sujet mis à jour.</p>
	</div>
<?php endif ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="">
                    <fieldset>
                    <?php if (!empty($sujet['idSujet'])): ?>
                        <legend class="text-center header">Edition du sujet : <?php echo !empty($sujet['nomSujet']) ? $sujet['nomSujet'] : '' ?></legend>
					 <?php else: ?>
					 <legend class="text-center header">Création d'un nouveau sujet</legend>
					 <?php endif; ?>
					 
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Nom sujet</span>
                            <div class="col-md-4">
                                <input id="nomSujet" name="nomSujet" type="text" class="form-control" placeholder="Nom sujet" value="<?php echo !empty($sujet['nomSujet']) ? $sujet['nomSujet'] :  ''; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Message</span>
                            <div class="col-md-4">
                               <textarea class="form-control" id="messageSujet" rows="10" name="messageSujet" placeholder="Message"><?php echo !empty($sujet['messageSujet']) ? $sujet['messageSujet'] :  ''; ?></textarea>
                            </div>
                        </div>
                        
                       <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Date création sujet</span>
                            <div class="col-md-4">
                                <input id="dateCreationSujet" name="dateCreationSujet" type="text" placeholder="Date création sujet" class="form-control" value="<?php echo !empty($sujet['dateCreationSujet']) ? $sujet['dateCreationSujet'] :  date("Y-m-d"); ?>" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group">
                         <span class="col-md-2 col-md-offset-2 text-center"> Statut</span>
                            <div class="col-md-4">						
						    <select id="statutSujet" name="statutSujet" class="form-control">
						      <option><?php echo STATUT_OUVERT; ?></option>
						      <option><?php echo STATUT_CLOS; ?></option>
						    </select>
						  </div>
                        </div>    

                        <div class="form-group">
                         <span class="col-md-2 col-md-offset-2 text-center"> Sous-catégorie</span>
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
                                <input type="reset" class="btn btn-warning" value="Reset">
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