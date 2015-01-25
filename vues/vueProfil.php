<?php if (!empty($_REQUEST['successEdition'])): ?>
	<div class="alert alert-success">
		<p>Votre profil a bien été mis à jour.</p>
	</div>
<?php endif ?>

<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $membre['pseudoMembre'];?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img height="130" width="130" alt="Avatar utilisateur" src="<?php echo !empty($membre['lienAvatarMembre']) ? $membre['lienAvatarMembre'] : './assets/img/avatar.jpg' ?>" class="img-circle"> </div>
                
               
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Pseudo :</td>
                        <td><?php echo $membre['pseudoMembre'];?></td>
                      </tr>
                       <tr>
                        <td>Grade :</td>
                        <td><?php echo $nomGrade['nomGrade'];?></td>
                      </tr>
                      <tr>
                        <td>Date d'inscription:</td>
                        <td><?php echo $membre['dateInscriptionMembre'];?></td>
                      </tr>
                      <tr>
                        <td>Nom :</td>
                        <td><?php echo $membre['nomMembre'];?></td>
                      </tr>
                    <tr>
                        <td>Prénom :</td>
                        <td><?php echo $membre['prenomMembre'];?></td>
                    </tr>
                     <tr>
                        <td>Adresse mail :</td>
                        <td><?php echo $membre['mailMembre'];?></td>
                     </tr>
                     <tr>
                        <td>Adresse :</td>
                        <td><?php echo $membre['adresseMembre'];?></td>
                     </tr>
                     <tr>
                        <td>Code Postal :</td>
                        <td><?php echo $membre['cpMembre'];?></td>
                     </tr>
                     <tr>
                        <td>Ville :</td>
                        <td><?php echo $membre['villeMembre'];?></td>
                     </tr>
                     <tr>
                        <td>Nombre de messages postés :</td>
                        <td><?php echo $membre['nbMessageMembre'];?></td>
                     </tr>
                     
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="./editerMembre.php?idMembre=<?php echo $_SESSION['idMembre']; ?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Modifier mon profil</a>
                        </span>
                 </div>
          </div>
        </div>
      </div>
    </div>