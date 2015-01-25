<?php if (!empty($errors)): ?>
	<div class="alert alert-danger">
		<?php foreach ($errors as $v): ?>
			<p><?php echo $v ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['editerMembre'])): ?>
	<div class="alert alert-success">
		<p>Le membre a bien été édité.</p>
	</div>
<?php endif ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <fieldset>
                    <?php if (!empty($membre['idMembre'])): ?>
                        <legend class="text-center header">Edition du membre : <?php echo !empty($membre['pseudoMembre']) ? $membre['pseudoMembre'] : '' ?></legend>
					 <?php else: ?>
					 <legend class="text-center header">Ajout nouveau membre<?php echo !empty($membre['pseudoMembre']) ? $membre['pseudoMembre'] : '' ?></legend>
					 <?php endif; ?>
					 
					 <?php if(($_SESSION['estAdminMembre']==EST_ADMIN_OUI)):?>
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Pseudo</span>
                            <div class="col-md-4">
                                <input id="pseudoMembre" name="pseudoMembre" type="text" class="form-control" placeholder="Pseudo" value="<?php echo !empty($membre['pseudoMembre']) ? $membre['pseudoMembre'] : '' ?>">
                            </div>
                        </div>
                     <?php else: ?>
                     
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Pseudo</span>
                            <div class="col-md-4">
                                <input id="pseudoMembre" name="pseudoMembre" type="text" class="form-control" placeholder="Pseudo" value="<?php echo !empty($membre['pseudoMembre']) ? $membre['pseudoMembre'] : '' ?>" readonly>
                            </div>
                        </div>
                     <?php endif; ?>
                        
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Mot de passe</span>
                            <div class="col-md-4">
                                <input id="mdpMembre" name="mdpMembre" type="password" placeholder="Mot de passe" class="form-control" value="">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Prenom</span>
                            <div class="col-md-4">
                                <input id="prenomMembre" name="prenomMembre" type="text" placeholder="Prenom" class="form-control" value="<?php echo !empty($membre['prenomMembre']) ? $membre['prenomMembre'] : '' ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Nom</span>
                            <div class="col-md-4">
                                <input id="nomMembre" name="nomMembre" type="text" placeholder="Nom" class="form-control" value="<?php echo !empty($membre['nomMembre']) ? $membre['nomMembre'] : '' ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Adresse</span>
                            <div class="col-md-4">
                                <input id="adresseMembre" name="adresseMembre" type="text" placeholder="Adresse" class="form-control" value="<?php echo !empty($membre['adresseMembre']) ? $membre['adresseMembre'] : '' ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Code postal</span>
                            <div class="col-md-4">
                                <input id="cpMembre" name="cpMembre" type="text" placeholder="Code postal" class="form-control" value="<?php echo !empty($membre['cpMembre']) ? $membre['cpMembre'] : '' ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Ville</span>
                            <div class="col-md-4">
                                <input id="villeMembre" name="villeMembre" type="text" placeholder="Ville" class="form-control" value="<?php echo !empty($membre['villeMembre']) ? $membre['villeMembre'] : '' ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Email</span>
                            <div class="col-md-4">
                                <input id="mailMembre" name="mailMembre" type="text" placeholder="Email" class="form-control" value="<?php echo !empty($membre['mailMembre']) ? $membre['mailMembre'] : '' ?>">
                            </div>
                        </div>
  
  						<?php if(($_SESSION['estAdminMembre']==EST_ADMIN_OUI)):?>
                        <div class="form-group">
                         <span class="col-md-2 col-md-offset-2 text-center"> Est admin</span>
                            <div class="col-md-4">						
						    <select id="estAdminMembre" name="estAdminMembre" class="form-control">
						      <option><?php echo EST_ADMIN_OUI; ?></option>
						      <option selected><?php echo EST_ADMIN_NON; ?></option>
						    </select>
						  </div>
                        </div>
                        <?php endif; ?>
                        
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Date inscription</span>
                            <div class="col-md-4">
                                <input id="dateInscriptionMembre" name="dateInscriptionMembre" type="text" placeholder="Phone" class="form-control" value="<?php echo !empty($membre['dateInscriptionMembre']) ? $membre['dateInscriptionMembre'] :  date("Y-m-d"); ?>" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"> Nombre de messages</span>
                            <div class="col-md-4">
                                <input id="nbMessageMembre" name="nbMessageMembre" type="text" placeholder="Phone" class="form-control" value="<?php echo !empty($membre['nbMessageMembre']) ? $membre['nbMessageMembre'] :  '0' ?>" readonly>
                            </div>
                        </div>
						
						<div class="form-group">
						  <span class="col-md-2 col-md-offset-2 text-center"> Avatar</span>
						  <div class="col-md-4">
						    <input id="avatar" name="avatar" class="input-file" type="file">
						  </div>
						</div>
                        
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <input type="submit" class="btn btn-primary" value="Submit">
                                <input type="reset" class="btn btn-warning" value="Reset">
                                <input type="hidden" name="editionIdMembre" value="<?php echo !empty($membre['idMembre']) ? $membre['idMembre'] : '' ?>">
                             <?php if(($_SESSION['estAdminMembre']==EST_ADMIN_OUI)):?>   
                                <?php if (!empty($membre['idMembre'])): ?>
                                <a href="./supprimerMembre.php?idMembre=<?php echo !empty($membre['idMembre']) ? $membre['idMembre'] : '' ?>" class="btn btn-danger">
									<span class="glyphicon glyphicon-remove"> Supprimer</span> 
								</a>
                              <?php endif; ?>
                            <?php endif; ?>
                        	</div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>