# Vote IT

Vote IT est une application web interne à l'Université de Lyon permettant de créer des votes collaboratifs liés aux Unités d’Enseignement (UE).  
Elle propose également un forum afin de favoriser l'entraide entre étudiants.

---

## 📚 Table des matières
1. [Aperçu](#apercu)
2. [Fonctionnalités](#fonctionnalites)
   - [Votes](#votes)
   - [Administrateurs & Enseignants](#administrateurs--enseignants)
   - [Forum](#forum)
3. [Dépendances](#dependances)
4. [Installation](#installation)
5. [Configuration LDAP](#configuration-ldap)
6. [Utilisation](#utilisation)

---

## 📝 Aperçu
<a id="apercu"></a>

Vote IT permet :
- la création et la gestion de votes concernant les UE,
- la diffusion automatique des résultats lorsque le quorum est atteint,
- l'accès à un forum interne permettant aux étudiants de poser des questions et d’y répondre.

---

## ✨ Fonctionnalités
<a id="fonctionnalites"></a>

### ✅ Votes
<a id="votes"></a>

- Authentification via CAS Lyon 1  
- Acceptation obligatoire des conditions d'utilisation
- Création de votes avec :
  - sélection d’une ou plusieurs UE,
  - possibilité de taguer des utilisateurs.
- Suppression d’un vote (par son auteur)
- Les votes sont **non modifiables** (choix de conception)
- Possibilité de voter :
  - ✅ d'accord  
  - ❌ pas d'accord  
  - ⚪ neutre
- Votes anonymes (mais consultables en base de données pour les administrateurs)
- Notification automatique par e-mail lorsque **60 %** des votants se sont exprimés
- Page d’accueil personnalisée selon le profil de l’utilisateur
- Abonnement aux UE pour suivre leurs activités

---

### ✅ Administrateurs & Enseignants
<a id="administrateurs--enseignants"></a>

- Création et gestion des UE
- Import des étudiants depuis d’autres UE existantes

---

### ✅ Forum
<a id="forum"></a>

- Publication de questions dans une UE
- Modification ou suppression de ses propres questions
- Publication, modification et suppression de réponses
- Système de discussion simple et efficace entre étudiants

---

## 🧩 Dépendances
<a id="dependances"></a>

- **Laravel 5.8**
- **PHP 7**
- **MySQL ou SQLite**
- **Composer 1.8.3**

---

## 🚀 Installation
<a id="installation"></a>

Cloner le projet et installer les dépendances :

```bash
composer install
php artisan migrate
````

Créer ou modifier le fichier **.env** en fonction de votre environnement (voir section suivante).

---

## 🔐 Configuration LDAP

<a id="configuration-ldap"></a>

Dans le fichier `.env` :

### ✅ Accès **depuis l’extérieur du campus**

* `LDAP_PORT=3389`
* Redirection de port via SSH :

  ```bash
  ssh -L3389:ldap.univ-lyon1.fr:389 xxxxx@linuxetu.univ-lyon1.fr
  ```
* `LDAP_HOSTS=localhost`

### ✅ Accès **depuis le campus**

* `LDAP_PORT=389`
* `LDAP_HOSTS=ldap.univ-lyon1.fr`

---

## ▶️ Utilisation

<a id="utilisation"></a>

Pour lancer le serveur de développement :

```bash
php artisan serve --host=localhost
```

L’application sera disponible à l’adresse :

```
http://localhost:8000
```

---

## 📄 Licence

Projet interne à l’Université de Lyon — utilisation restreinte.
