<?php
/*
 * Contoleur profil, recupere les infos sur un membre pour l'affichage sur la vue Profil
 */
$membre = $modeleMembre->getMembre($_SESSION['idMembre']);
$nomGrade= $modeleMembre->getGradeMembre($membre['idMembre']);