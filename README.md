# Astroweb
 Espace et Astronomie

Technical features :
- MVC Architecture.
- Object Oriented Programming php.
- HTML5, CSS3 & SASS, Javascript.
- MySQL database and Design Pattern Singleton.
- Framework Bootstrap 5.
- Library Font Awesome.
- Responsive Design.

Liste des fonctionnalités :

- Gestion des adhérents du club sur quatre niveaux de sécurité : visiteur, adhérent, modérateur et administrateur.
    * Les visiteurs ont accès au site web et un accès très limité aux applications web. Ils peuvent poster un commentaire dans le livre d'or, lire le forum et utiliser le formulaire de contact.
    * Les adhérents peuvent publier des articles et modifier les articles qu'ils ont rédigé, ajouter des images dans la bibliothèque d'images, soumettre des photos pour la galerie, participer au forum, accéder au calendrier, à la mini messagerie, à l'annuaire et bien sûr gérer leur profil.
    * Les modérateurs peuvent en plus publier les photos soumises par les adhérents dans la galerie, gérer les articles et la bibliothèque d'images, modérer le forum, gérer les adhérents, ajouter des actualités et des évènements dans le calendrier.
    * L'administrateur a en plus la gestion du profil administrateur, des modérateurs et des paramètres du site : taille maximales des photos et images, délai de time out de session, nombre d'echec maximum possible lors du login...
    * Un compte Super Admin existe afin de remettre par défaut le login de l'administrateur en cas de perte de ses identifiants. C'est la seule fonction de ce compte, il ne permet pas de naviguer sur le site.
- Publication d'articles grâce à un un éditeur de bb-code. Personnalisation d'un parser php afin d’interpréter le bb-code et afficher les articles dans les pages Web.
- Bibliothèques d'images afin de pouvoir illustrer les articles.
- Gestion d'actualités. De plus, publier un article génère automatiquement une actualité.
- Calendrier avec gestion d'évènements.
- Développement d'un forum, avec catégories, sous-catégories et topics.
- Galerie de photos utilisant un Carrousel d'images. Les adhérents proposent des images, les modérateurs et administrateurs valident et publient ou non l'image dans la galerie.
- Formulaire de contact.
- Formulaire de mot de passe oublié : vérification que l'adesse mail de l'adhérent existe, envoi de mail avec code secret, redirection sur une page demandant le code secret puis changement du pot de passe.
- Livre d'or.
- Zone de recherche permettant d’effectuer des recherches dans les articles, les actualités, les évènements et les messages du forum.
- Annuaire des membres du site.
- Système de mini messages internes entre adhérents et mémos (un mémo = un message envoyé à soi même).
- Système de notifications pour les modérateurs lorsque qu'un adhérent ajoute du contenu au site.
- Zone d'administration permettant de gérer les adhérents (CRUD) et toutes les fonctionnalités du site.
- Menu latéral permettant de naviguer rapidement sur le site.
- Respect de la réglementation RGPD, cookies... avec l'API « Tarte au citron ».