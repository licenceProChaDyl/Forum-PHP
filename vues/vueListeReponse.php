<?php foreach ($reponses as $cle => $reponse): ?>	
<div class="container">
	<div class="panel panel-default positionContainer col-md-12">
		
		<div class="panel-heading">
			<h2 class="panel-title">Réponse postée le - <?php echo $reponse['dateCreationReponse'];?></h2>
		</div>
	
		<div class="col-xs-12 toggle-header">
			<div class="col-xs-8">
				<a class="btn btn-primary btn-sm hidden-xs" href="reponses.php?reponseSujet=<?php echo $reponse['idSujet'];?>">Ecrire une réponse</a>
			</div>
		</div>		
			<div class="col-md-12">
				<div class="col-md-2 well well-sm" style="min-height: 300px">
					<p style="margin-top: 25px">
					 
						<span><?php echo $reponse['pseudoMembre'];?></span>
						<?php if($reponse['estAdminMembre']==EST_ADMIN_OUI):?>
							<br><span><?php echo 'Administrateur';?></span><br>
						<?php else: ?>	 
						<br><span><?php echo 'Membre lambda';?></span><br>
						<?php endif; ?>	 
						<br><img height="130" width="130" alt="Avatar utilisateur" src="<?php echo !empty($reponse['lienAvatarMembre']) ? $reponse['lienAvatarMembre'] : './assets/img/avatar.jpg' ?>" class="img-circle">			
						<div class="hrSeparateur"></div>
						<span>Date d'inscription :</span><br>
						<span><?php echo $reponse['dateInscriptionMembre'];?></span><br>
		
						<div class="hrSeparateur"></div>
						<span>Nombre de messages :</span><br>
						<span><?php echo $reponse['nbMessageMembre'];?></span><br>
					
					</p>
				</div>
							        
				<div class="col-md-10 well">
					<span style="float:right">#<?php echo $reponse['idReponse'];?></span>
					<p style="margin-top:25px;height:265px;"><?php echo $reponse['messageReponse'];?></p>
						<ul style="float:right">
							<li class="menuReponse"><a class="btn btn-warning" href="editerReponse.php?idReponse=<?php echo $reponse['idReponse'];?>">Modifier</a></li>
							<li class="menuReponse"><a class="btn btn-danger" href="supprimerReponse.php?idReponse=<?php echo $reponse['idReponse'];?>">Supprimer</a></li>
						</ul>
				</div>
			 </div>
	</div>
</div>
<?php endforeach ;?>	 
