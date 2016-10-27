clubdelopinion
==============
Application Symfony2 (version 2.8) créée pour la mise en place du site internet du Club de L'Opinion.

## Pré-requis

Composer ==> https://getcomposer.org/  
Symfony 2.8 ==> https://symfony.com/download

## Bundles

FOSUserBundle ==> http://symfony.com/doc/current/bundles/FOSUserBundle/index.html  
VichUploaderBundle ==> https://github.com/dustin10/VichUploaderBundle  
AppBundle  
ClubBundle  

## Procédure d'installation  
  
1. Pour cloner le projet, saisir dans le terminal :  
`git clone https://github.com/Maxime-Coustes/clubdelopinion.git`  
  
2. Installer composer en saisissant dans le terminal :  
`composer install`  
  
3. A la fin du composer install, configurer la base de donnée et le serveur mail 
  
4. Créer votre base de données via le terminal :  
`php app/console doctrine:database:create`  
  
5. Mettre à jour votre base de données via le terminal :  
`php app/console doctrine:schema:update --force`  
  
6. Enfin mettre les droits sur le projet en saisissant dans le terminal :  
`chmod -R 777 web/uploads/ web/images/ app/cache/ app/logs/`  
  

## Création d'un super administrateur  

1. Créer un super administrateur (ici nommé "admin") via le terminal :  
`php app/console fos:user:create admin --super-admin`  
  
2. Il vous est ensuite demandé d'indiquer un email et un mot de passe pour votre super administrateur  
  
3. Pour accéder à la partie administrable du site, ajouter /login à l'URL  
