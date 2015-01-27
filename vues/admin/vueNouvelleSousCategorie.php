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
                   <?php if (!empty($sousCategorie['idSousCategorie'])): ?>
                        <legend class="text-center header">Edition de la sous-catégorie : <?php echo !empty($sousCategorie['nomSousCategorie']) ? $sousCategorie['nomSousCategorie'] : '' ?></legend>
					 <?php else: ?>
					 <legend class="text-center header">Création nouvelle sous-catégorie</legend>
					 <?php endif; ?>

                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Nom catégorie</span>
                            <div class="col-md-4">
                                <input id="nomSousCategorie" name="nomSousCategorie" type="text" class="form-control" placeholder="Nom catégorie" value="<?php echo !empty($sousCategorie['nomSousCategorie']) ? $sousCategorie['nomSousCategorie'] : '' ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Description</span>
                            <div class="col-md-4">
                               <textarea class="form-control" id="descriptionSousCategorie" rows="10" name="descriptionSousCategorie" placeholder="Description"><?php echo !empty($sousCategorie['descriptionSousCategorie']) ? $sousCategorie['descriptionSousCategorie'] : '' ?></textarea>
                            </div>
                        </div>

                       <div class="form-group">
                         <span class="col-md-2 col-md-offset-2 text-center"> Catégorie parente</span>
                            <div class="col-md-4">				
						    <select id="idCategorie" name="idCategorie" class="form-control">
						     <?php foreach ($allCategories as $categorie): ?>
						      		<option value="<?php echo $categorie['idCategorie'] ?>"><?php echo $categorie['nomCategorie']; ?></option>
						     	 <?php endforeach ?>
						    </select>
						  </div>
                        </div> 
                        
                       <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center">Date création</span>
                            <div class="col-md-4">
                                <input id="dateCreationSousCategorie" name="dateCreationSousCategorie" type="text" placeholder="Date création" class="form-control" value="<?php echo !empty($sousCategorie['dateCreationSousCategorie']) ? $sousCategorie['dateCreationSousCategorie'] :  date("Y-m-d"); ?>" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Nombre de sujet</span>
                            <div class="col-md-4">
                                <input id="nombreSujetSousCategorie" name="nombreSujetSousCategorie" type="text" placeholder="Nombre sujet" class="form-control" value="<?php echo !empty($sousCategorie['nombreSujetSousCategorie']) ? $sousCategorie['nombreSujetSousCategorie'] :  '0'; ?>" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Nombre de réponse</span>
                            <div class="col-md-4">
                                <input id="nombreReponseSousCategorie" name="nombreReponseSousCategorie" type="text" placeholder="Nombre réponse" class="form-control" value="<?php echo !empty($sousCategorie['nombreReponseSousCategorie']) ? $sousCategorie['nombreReponseSousCategorie'] :  '0'; ?>" readonly>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> ID membre créateur</span>
                            <div class="col-md-4">
                               <input id="idMembreCreationCategorie" name="idMembreCreationCategorie" type="text" class="form-control" value="<?php echo !empty($sousCategorie['idMembre']) ? $sousCategorie['idMembre'] :  $_SESSION['idMembre']; ?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                                <input type="submit" class="btn btn-primary" value="Submit">
                                <input type="reset" class="btn btn-warning" value="Reset">
                        </div>

                    </fieldset>
                    <input type="hidden" name="editionIdSousCategorie" id="editionIdSousCategorie" value="<?php echo !empty($sousCategorie['idSousCategorie']) ? $sousCategorie['idSousCategorie'] : '' ?>">
                    <input type="hidden" name="idMembre" value="<?php echo !empty($sousCategorie['idMembre']) ? $sousCategorie['idMembre'] : $_SESSION['idMembre']; ?>" id="idMembre">
                </form>
            </div>
        </div>
    </div>
</div>