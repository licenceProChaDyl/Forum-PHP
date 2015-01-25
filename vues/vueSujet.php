<?php if (!empty($_REQUEST['erreur'])): ?>
	<div class="alert alert-danger">
		<p>Vous n'êtes pas autorisé à accéder à ce contenu. Connectez-vous ou inscrivez-vous.</p>
	</div>
<?php endif ?>

<?php if (!empty($errors)): ?>
	<div class="alert alert-danger">
		<?php foreach ($errors as $v): ?>
			<p><?php echo $v ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['success'])): ?>
	<div class="alert alert-success">
		<p>Votre réponse a bien été crée.</p>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['successEdition'])): ?>
	<div class="alert alert-success">
		<p>Votre réponse a bien été modifiée.</p>
	</div>
<?php endif ?>

<?php if (!empty($_REQUEST['supprimerReponse'])): ?>
	<div class="alert alert-success">
		<p>Votre réponse a bien été supprimée.</p>
	</div>
<?php endif ?>


<?php foreach ($dataSujetDemande as $sujet): ?>
<div class="panel panel-default col-sm-12 col-md-12"
	style="padding-right: 0px; padding-left: 0px;">

	<div class="panel-heading">
		<h2 class="panel-title"><?php echo $sujet['nomSujet'];?>  </h2>
	</div>

	<div class="col-xs-12 toggle-header">
		<div class="col-xs-8">
			<?php if ($sujet['statutSujet']== STATUT_OUVERT):?>
			<a class="btn btn-primary btn-sm hidden-xs" href="reponses.php?reponseSujet=<?php echo $sujet['idSujet'];?>">Ecrire une réponse</a>
			<?php else: ?>
		 <a class="btn btn-danger btn-sm hidden-xs">Sujet clos</a>
		 <?php endif; ?>

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
					<?php echo $sujet['messageSujet'];?>
				</p>
				<?php if ($sujet['statutSujet']== STATUT_OUVERT):?>	
				<ul style="float:right">
					<li class="menuReponse"><a class="btn btn-warning" href="nouveauSujet.php?idSujet=<?php echo $sujet['idSujet'];?>">Modifier</a></li>
					<li class="menuReponse"><a class="btn btn-danger" href="supprimerSujet.php?idSujet=<?php echo $sujet['idSujet'];?>">Supprimer</a></li>
				</ul>
				<?php endif; ?>
			</div>
		</div>
</div>
</div>
<?php endforeach ?>
