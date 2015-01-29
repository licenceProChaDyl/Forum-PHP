<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>phpForum</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
    
     <!-- CSS pour les tables -->
	<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/shieldui-all.min.css" />
	<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
	
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</head>
<body>
<div class="container-fluid positionContainer">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="./"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>       
              
              <?php if (isset($_SESSION['estAdminMembre']) && (($_SESSION['estAdminMembre'])==EST_ADMIN_OUI)):  ?>  
                
               	<li><a href="listeMembre.php"><span class="glyphicon glyphicon-align-left"></span> Gérer les membres</a></li>   
              	<li><a href="listeCategorie.php"><span class="glyphicon glyphicon-align-left"></span> Gérer les catégories</a></li>              
            	<li><a href="listeSousCategorie.php"><span class="glyphicon glyphicon-align-left"></span></span> Gérer les sous-catégories</a></li> 
             	<li><a href="listeSujet.php"><span class="glyphicon glyphicon-align-left"></span> Gérer les sujets</a></li> 
              	<li><a href="genererXML.php"><span class="glyphicon glyphicon-align-center"></span> Générer un XML</a></li> 
              <?php endif; ?>   
            </ul>
             <ul class="nav navbar-nav navbar-right">
            <?php if (!isset($_SESSION['idMembre'])): ?>
            		 <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
	                    class="glyphicon glyphicon-search"></span> Créer un compte <b class="caret"></b></a>
	                    <ul class="dropdown-menu" style="min-width: 200px;">
	                        <li>
	                            <div class="row">
	                                <div class="col-md-12">
	                                    <form method="POST" class="navbar-form navbar-left" action="inscription.php">
		                                    <div class="input-group">
		                                        <input class="form-control" style="margin-bottom: 10px;" type="text" placeholder="Pseudo" id="pseudoMembre" name="pseudoMembre" required>
												<input class="form-control" style="margin-bottom: 10px;" type="password" placeholder="Mot de pass" id="mdpMembre" name="mdpMembre" required>
		                                        <input class="form-control" style="margin-bottom: 10px;" type="email" placeholder="Email" id="emailMembre" name="emailMembre" required>
		                                       	<span class="input-group-btn" style="float:left">
		                                            <input type="submit" class="btn btn-primary" value="Valider" />
		                                        </span>
		                                    </div>
	                                    </form>
	                                </div>
	                            </div>
	                        </li>
	                    </ul>
                	</li>      	
                  	 <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
	                    class="glyphicon glyphicon-search"></span> Connexion <b class="caret"></b></a>
	                    <ul class="dropdown-menu">
	                        <li>
	                            <div class="row">
	                                <div class="col-md-12">
	                                    <form class="navbar-form navbar-left" method="POST" action="connexion.php">
	                                    <div class="input-group">
	                                        <input class="form-control" style="margin-bottom: 10px;" type="text" placeholder="Pseudo" id="pseudo" name="pseudo">
											<input class="form-control" style="margin-bottom: 10px;" type="password" placeholder="Mot de pass" id="motdepass" name="motdepass">
	                                        
	                                       	<span class="input-group-btn" style="float:left">
	                                             <input type="submit" class="btn btn-primary" value="Valider" />
	                                        </span>
	                                    </div>
	                                    </form>
	                                </div>
	                            </div>
	                        </li>
	                    </ul>
                	</li>
                	<?php else: ?>             	
                  	<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> Mon compte <b class="caret"></b></a>
	                    <ul class="dropdown-menu">
	                        <li><a href="./profil.php"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
	                        <li class="divider"></li>
	                        <li><a href="./deconnexion.php"><span class="glyphicon glyphicon-off"></span> Déconnexion</a></li>
	                    </ul>
                	</li>
                	<?php endif; ?>             
            </ul>
          </div>
        </div>
      </nav>
</div>

<div class="container">