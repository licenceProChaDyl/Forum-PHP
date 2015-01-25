<?php if (!empty($errors)): ?>
	<div class="alert alert-danger">
		<?php foreach ($errors as $v): ?>
			<p><?php echo $v ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['success'])): ?>
	<div class="alert alert-success">
		<p>Votre sujet a bien été crée.</p>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['successEdition'])): ?>
	<div class="alert alert-success">
		<p>Catégorie mise à jour.</p>
	</div>
<?php endif ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                   <?php if (!empty($categorie['idCategorie'])): ?>
                        <legend class="text-center header">Edition de la catégorie : <?php echo !empty($categorie['nomCategorie']) ? $categorie['nomCategorie'] : '' ?></legend>
					 <?php else: ?>
					 <legend class="text-center header">Création nouvelle catégorie</legend>
					 <?php endif; ?>

                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Nom catégorie</span>
                            <div class="col-md-4">
                                <input id="nomCategorie" name="nomCategorie" type="text" class="form-control" placeholder="Nom catégorie" value="<?php echo !empty($categorie['nomCategorie']) ? $categorie['nomCategorie'] : '' ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Description</span>
                            <div class="col-md-4">
                               <textarea class="form-control" id="descriptionCategorie" rows="10" name="descriptionCategorie" placeholder="Description"><?php echo !empty($categorie['descriptionCategorie']) ? $categorie['descriptionCategorie'] : '' ?></textarea>
                            </div>
                        </div>
                        
                       <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Date création</span>
                            <div class="col-md-4">
                                <input id="dateCreationCategorie" name="dateCreationCategorie" type="text" placeholder="Date création" class="form-control" value="<?php echo !empty($categorie['dateCreationCategorie']) ? $categorie['dateCreationCategorie'] :  date("Y-m-d"); ?>" readonly>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Créer par</span>
                            <div class="col-md-4">
                               <input id="idMembreCreationCategorie" name="idMembreCreationCategorie" type="text" class="form-control" value="<?php echo !empty($categorie['idMembre']) ? $categorie['idMembre'] :  $_SESSION['idMembre']; ?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                                <input type="submit" class="btn btn-primary" value="Submit">
                                <input type="reset" class="btn btn-warning" value="Reset">
                        </div>

                    </fieldset>
                    <input type="hidden" name="editionIdCategorie" id="editionIdCategorie" value="<?php echo !empty($categorie['idCategorie']) ? $categorie['idCategorie'] : '' ?>">
                    <input type="hidden" name="idMembre" value="<?php echo !empty($categorie['idMembre']) ? $categorie['idMembre'] : $_SESSION['idMembre']; ?>" id="idMembre">
                </form>
            </div>
        </div>
    </div>
</div>