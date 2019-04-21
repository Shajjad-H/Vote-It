#   Vote IT
Vote it est une apllication web interne à l'université de lyon. Cette application web permet de crée des votes pour proposer des modifications dans les UE (unité d'enseignement).
De plus un forum est accesssible aux elèves pour s'entre aider.
---
#   Dependaces 
 - Laravel 5.8
 - PHP7
 - Mysql ou Sqlite
 - Composer 1.8.3
 ---
#   Installation
`$ composer install `
`$ php artisan migrate`
##### `.env`
- LDAP_PORT=3389 || 389 
    - il faut mettre 3389 si on est en dehors de la fac et faire une redirection de port
      - `ssh -L3389:ldap.univ-lyon1.fr:389 xxxxx@linuxetu.univ-lyon1.fr`
      - LDAP_HOSTS=localhost
    - 389 si on est dans la fac et qu'on acess au LDAP de lyon 1
      - LDAP_HOSTS=ldap.univ-lyon1.fr
--

#   Utilisation 
 - pour tester et une demmarage rapide
   - `php artisan serve --host=localhost` 
---
# Fonctionalité
 - on essayer repecter au max les régles d'IHM
### Votes
  - Authentification CAS de lyon 1
  - Acceptation de condition d'utilisation pour avoir l'acess totale
  - Creation de vote, on peut choisir un ou plusieur UE et tagger des utilisateur
  - Supprimer un vote si on est l'auteur
  - On ne peut pas modifier un vote c'est choix de notre part
  - Etre en accored, desaccord ou neutre avec un vote
  - Un vote est annonyme mais attention on peut quand même retouver les votes si on a ccess à la BD
  - Après 60% des votes un mail est automatiquement envoyer à tous les utilisateur tagger
  - La page d'acceuille affiche les votes concernant le profile de l'uilisateur
  - Abboner aux UE
#### Pour admin et proffesseur
 - Créer un UE et importer les elèves des autres UE dèjà exsistante 
### Forum
 - Poser des question dans un UE
 - Modifier ou supprimer la question
 - Repondre un une question poser et modifier ou supprimer la reponse



-----------