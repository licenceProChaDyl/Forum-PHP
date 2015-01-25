<div class="panel panel-default positionContainer col-sm-12 col-md-12">  
<div class="panel-heading">
		<h2 class="panel-title">Ecrire une réponse au sujet</h2>
</div>
</div>
<div class="col-md-12">
			<div class="col-md-2 well well-sm" style="min-height: 300px">
				<p style="margin-top: 25px">
					<span><?php echo $_SESSION['pseudoMembre'];?></span><br> <span><?php echo $nomDuGrade['nomGrade'];?></span><br>
					<br><img height="130" width="130" alt="Avatar utilisateur" src="<?php echo $_SESSION['lienAvatarMembre'] ? $_SESSION['lienAvatarMembre'] : './assets/img/avatar.jpg' ?>" class="img-circle">
					<div class="hrSeparateur"></div>
					<span>Date d'inscription :</span><br>
					<span><?php echo $_SESSION['dateInscriptionMembre'];?></span><br>
	
					<div class="hrSeparateur"></div>
					<span>Nombre de messages :</span><br>
					<span><?php echo $_SESSION['nbMessageMembre'];?></span><br>
				</p>
			</div>

<div class="form-group">
       <div class="col-md-10 text-center">
	       <form method="post" action="reponses.php">
	         <textarea class="form-control" id="messageReponse" rows="15" name="messageReponse" placeholder="Réponse"></textarea>
	         <input type="submit" class="btn btn-primary" value="Submit">
	         <input type="reset" class="btn btn-warning" value="Reset">
	        <input type="hidden" name="idSujet" value="<?php echo $dataSujetDemande[0]['idSujet'];?>">
	       </form>
      </div>       
</div>
                        
     <div class="panel panel-default positionContainer col-sm-12 col-md-12">        		
	<?php foreach ($dataSujetDemande as $sujet): ?>

	<div class="panel-heading">
		<h2 class="panel-title"><?php echo $sujet['nomSujet'];?>  </h2>
	</div>

	<div class="col-xs-12 toggle-header">
		<div class="col-xs-8">
		</div>
	</div>
			<div class="col-md-12">
			<div class="col-md-2 well well-sm" style="min-height: 300px">
				<p style="margin-top: 25px">
					<span><?php echo $membre['pseudoMembre'];?></span><br> <span><?php echo $nomGrade['nomGrade'];?></span><br>
					<br><img height="130" width="130" alt="Avatar utilisateur" src="<?php echo !empty($membre['lienAvatarMembre']) ? $membre['lienAvatarMembre'] : './assets/img/avatar.jpg' ?>" class="img-circle">			
					<div class="hrSeparateur"></div>
					<span>Date d'inscription :</span><br>
					<span><?php echo $membre['dateInscriptionMembre'];?></span><br>
	
					<div class="hrSeparateur"></div>
					<span>Nombre de messages :</span><br>
					<span><?php echo $membre['nbMessageMembre'];?></span><br>
				</p>
			</div>
							        
		<div class="col-md-10 well">
			<span style="float:right">#<?php echo $sujet['idSujet'];?></span>
				<p style="margin-top:25px;height:265px;">							  			
				<?php echo $sujet['messageSujet']; ?>"
				</p>
			<ul style="float:right">
				<li class="menuReponse"><a class="btn btn-warning" href="nouveauSujet.php?idReponse=<?php echo $sujet['idSujet'];?>">Modifier</a></li>
				<li class="menuReponse"><a class="btn btn-danger" href="supprimerSujet.php?idReponse=<?php echo $sujet['idSujet'];?>">Supprimer</a></li>
			</ul>
		</div>					        		
	</div>
</div>

</div>
<?php endforeach ?>

