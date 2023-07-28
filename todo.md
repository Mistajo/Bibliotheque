# Todo

## Pour créer une table depuis symfony

- Créer le .env.local
- Y configurer les pilotes de connexion à la base de données
- Créer la base de données : symfony console doctrine:database:create (d:d:c)
- Créer l'entité : symfony console make:entity Contact
- Rajouter les propriétés necessaires à l'entité
- Faire une migration (En se basant sur l'entité, générer le code sql permettant de créer la table)
- Migrer les données (Exécuter le code sql généré)

## Pour créer et afficher un formulaire

- Se baser sur l'entité pour créer le type du formulaire : symfony console make:form
  - Donner le nom du type
    - Préciser l'entité à laquelle sera associée ce type
- Dans la méthode prévue du contrôleur, créer le formulaire en se basant sur :
  - Le type du formulaire créé précedemment
    - L'instance de l'entité représentant le nouveau contact à ajouter
- Passer la partie visible du formulaire au template
- Dans le template, afficher les données du formulaire
