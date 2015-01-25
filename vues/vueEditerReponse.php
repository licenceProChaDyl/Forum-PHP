<div class="panel panel-default positionContainer col-sm-12 col-md-12">  
	<div class="panel-heading">
			<h2 class="panel-title">Modifier ma réponse</h2>
	</div>
</div>
	<div class="col-md-12">
			<div class="col-md-2 well well-sm" style="min-height: 300px">
				<p style="margin-top: 25px">
					<span><?php echo $_SESSION['pseudoMembre'];?></span><br> <span><?php echo $nomDuGrade['nomGrade'];?></span><br>
					<br><img height="130" width="130" alt="Avatar utilisateur" src="<?php echo $_SESSION['lienAvatarMembre'] ? $_SESSION['lienAvatarMembre'] : 'https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100' ?>" class="img-circle">
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
			       <form method="post">
			         <textarea class="form-control" id="messageReponse" rows="15" name="messageReponse" placeholder="Réponse"><?php echo $dataReponse['messageReponse'];?></textarea>
			         <input type="submit" class="btn btn-primary" value="Submit">
			         <input type="reset" class="btn btn-warning" value="reset">
			          <input type="hidden" name="editionIdReponse" value="<?php echo $dataReponse['idReponse'] ? $dataReponse['idReponse'] : '' ?>">
			       </form>
		      </div>       
			</div>
     </div>




