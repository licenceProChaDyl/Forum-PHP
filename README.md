# Forum-PHP
## 1. Navigation en tant que visiteur

Un visiteur peu naviguer dans le forum et voir les diff�rents sujets et messages post�s. 
Par ailleurs, un outil de recherche par filtre est mis � sa disposition pour faire une recerche. 
De plus, il a la possibilit� de cr�er un compte utilisateur.
Cependant, il ne peut pas poster de messages, ajouter de sujets etc ...
Si le visiteur essaie d'acceder � un contenu qui demande une authentification pr�alable un message d'erreur sp�cifique sera affich�.

Exemple : "Vous n'�tes pas autoris� � acc�der � ce contenu. Connectez-vous ou inscrivez-vous."

## 2. Cr�ation d'un compte utilisateur - Informations personnelles

La cr�ation d'un compte utilisateur se fait de fa�on tr�s simple. Pseudo, mot de passe et e-mail. 

![alt tag](documentation/version2/img/creerCompte.png)

De plus, il est possible de compl�ter son profil avec des informations suppl�mentaires : Voir partie 3.2.

## 3. Connexion au site en tant qu'utilisateur

Lorsque qu'un utilisateur se connecte au site � l�aide de ses identifiants : login et mot
de passe, vous acc�dez � la page suivante : 

![alt tag](documentation/version2/img/connUsuer.png)


### 3.2 Modification des donn�es personnelles

L'utilisateur peut modifier, s'il le souhaite ses donn�es personnelles.

![alt tag](documentation/version2/img/editCompte.png)

Et afficher son profil

![alt tag](documentation/version2/img/voirCompte.png)

## 4. Connexion au site en tant qu'administrateur

Lorsque l'administrateur se connecte au site � l�aide de ses identifiants : login et mot
de passe, il acc�de � la page suivante : 

![alt tag](documentation/version2/img/connAdmin.png)


### 4.2 Modification des donn�es personnelles

L'administrateur peut modifier, s'il le souhaite ses donn�es personnelles et celles des utilisateurs.
Par ailleurs, il peut aussi attribuer le r�le d'administrateur � un utilisateur.

![alt tag](documentation/version2/img/editAdmin.png)

Et afficher son profil

![alt tag](documentation/version2/img/voirAdmin.png)


## 5. Recherches par filtres

Il est possible de faire des recherches � l'aide d'un filtre comme ci-dessous :

![alt tag](documentation/version2/img/filtrage.png)

## 6. G�n�ration XML

Nous pouvons g�n�rer un fichier XML � partir d'une sous-cat�gorie. Un menu d�roulant avec toutes les sous-cat�gories.

![alt tag](documentation/version2/img/genererXML.png)

Fichier g�nn�r� apr�s :

![alt tag](documentation/version2/img/generationXML.png)


## 7. Diagramme de cas d'utilisation

![alt tag](documentation/version2/img/Cas d'utilisationV2.png)


## 8. Mod�le conceptuel des donn�es (MCD)

![alt tag](documentation/version2/img/MCD.png)
