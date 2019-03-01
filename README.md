# Lumen's challenge :heart_eyes:

Si tout va bien, aujourd'hui nous avons eu le temps de regarder les Classes principales fournies par _Lumen_ et nous permettant de mettre en place rapidement un projet MVC.

On a même commencé ce projet _Videogame_. Mais il reste encore beaucoup à faire.

<details><summary>Documentation Lumen</summary>

- [installation](https://lumen.laravel.com/docs/5.4/installation)
- [configuration](https://lumen.laravel.com/docs/5.4/configuration#environment-configuration)
- [routing](https://lumen.laravel.com/docs/5.4/routing)
- [views](https://lumen.laravel.com/docs/5.1/views)
- [controller](https://lumen.laravel.com/docs/5.4/controllers)
- [named routes](https://lumen.laravel.com/docs/5.4/routing#named-routes)
- [requests](https://lumen.laravel.com/docs/5.4/requests)
- [responses](https://lumen.laravel.com/docs/5.4/responses)
- [errors](https://lumen.laravel.com/docs/5.4/errors)

</details>

## Projet :video_game:

### Original :older_man:

- [dépôt original](../../../S04-E06-challenge-pdo-videogame)
- tout se déroulait sur 1 seule page
- la liste à gauche affichait tous les jeux video en base de données
- le formulaire à droite permettait d'ajouter un jeu vidéo en base de données
- la liste à gauche pouvait être triée par nom ou par éditeur

### Nouvelle version :baby:

- on veut qu'il y ait désormais 2 pages :
    - **home** avec la liste à gauche
    - **admin** avec le formulaire d'ajout
- un lien vers la page **admin** apparait sur la page **home**
- un lien de retour à la **home** apparait sur la page **admin**
- une fois le formulaire soumis et le jeu vidéo ajouté en base de donnée, on doit rediriger vers la **home**

## Développements :sparkles:

## Page `/admin`

Comme prévu, on doit séparer la partie "Ajout" de la template fournie et la placer dans une page à part.  
Pour cela, on va devoir créer la route, la méthode de controller et la view.

Si tu veux y aller la tête dans le guidon, vas-y :bicyclist:  
Pour les autres, vous avez des explications sur la marche à suivre ci-dessous :arrow_down:

<details><summary>Créer la page</summary>

- ajouter la méthode de Controller dans le `MainController`
    - suggestion : nommer la méthode `admin`
- ajouter la nouvelle route dans `routes/web.php` et lui donner le nom `admin`
- ajouter un petit `echo` des familles dans la méthode, afin de tester dans le navigateur que la route est fonctionnelle
    - info : peu importe la chaine de caractères affichée, de toute façon, ce qui compte, c'est les valeurs :joy:

</details>

<details><summary>Sortie HTML</summary>

- la route et la méthode de Controller sont ok :heavy_check_mark:
- on va donc s'occuper de la view
- créer la vue dans le répertoire `resources/views`
    - suggestion : nommer le fichier de vue `admin.php`
- récupérer le code HTML du support original
- intégrer ce code dans la view
    - retirer ou commenter les bouts de code PHP qui vont générer des erreurs
    - attention, les commentaires HTML ne vont pas empêcher l'exécution des bouts de code PHP
- définir la view à afficher dans la méthode de controller
    - fonction `view()`
- vérifier que la page s'affiche correctement
- retirer la liste des jeux vidéos
    - on ne veut garder que le formulaire d'ajout

</details>

<details><summary>Bouton vers la page d'accueil</summary>

- ajouter un bouton dans la page `admin`
- utiliser le générateur d'URL de Lumen pour générer automatiquement l'URL
    - [doc named routes](https://lumen.laravel.com/docs/5.4/routing#named-routes)
    - penser à nommer la route de la home si ce n'est pas fait :wink:

</details>

## Page `/`

Encore une fois, tu peux y aller la tête dans le guidon :bicyclist:  
Sâche qu'il faudra aussi revenir sur la page `admin` pour gérer le formulaire. Mais pour l'instant, on s'occupe des pages et d'afficher le code HTML :muscle:

<details><summary>Route de la page d'accueil</summary>

- si la page d'accueil n'utilise pas de méthode de Controller mais une _Closure_
- ou si elle n'est pas nommée
    - on va réécrire la route plus proprement
    - comme pour `/admin`
    - nommée `home`
    - et définir une méthode de Controller, par exemple `homeAction` dans `MainController`

</details>

<details><summary>Controller & View</summary>

- au sein de la méthode de `MainController` (ou autre) s'occupant de la page `home`
- appeler la fonction `view` afin de définir la view de la page
- penser à créer le fichier de view dans `resources/views`
- penser aussi à récupérer le code HTML original et retirer le formulaire :wink:

</details>

<details><summary>Factoriser le code HTML</summary>

- _Lumen_ ne nous force pas à suivre une nomenclature précise pour gérer le layout
- on est libre de faire ce que l'on veut avec le code PHP exécuté dans les views
- suggestion d'organisation :
    - sous-dossier `layout` pour les "sous-views" gérant le gabarit de la page
        - fichier `header.php`
        - fichier `footer.php`
    - sous-dossier `partials`pour les sous-parties des pages
        - par exemple la nav mais pas obligatoire ici
    - modifier les views existantes pour inclure `layout/header.php` et `layout/footer.php`

</details>

<details><summary>Bouton vers la page /admin</summary>

- utiliser le générateur d'URL de Lumen pour générer automatiquement l'URL
    - [doc named routes](https://lumen.laravel.com/docs/5.4/routing#named-routes)

</details>

<details><summary>3 boutons de tri</summary>

- dans le code original, les liens amenaient sur `index.php`
- ce n'est plus valable
- on a 2 possibilités :
    - `<a href="?param=value">mon lien</a>` qui définie un paramètre d'URL (GET) à la page courante
    - remplacer `index.php` par la génération de l'URL de la home à partir du nom de la route

</details>

## BONUS : Paramètres GET/POST

C'est le moment où ça se corse un peu :scream:

Le tri sélectionné est envoyé en paramètre d'URL (en GET). On doit donc récupérer la donnée.

Pour cela, _Lumen_ met à disposition la Classe _Request_.

:warning: on a pas encore vu la connexion à la base de données et l'exécution de requête. Donc on se garde ça sous le coude pour la prochaine journée de cours :wink:

### Home

- dans la méthode de Controller (la partie du code _logique_), récupérer la donnée `order` de l'URL
- :warning: il est désormais interdit d'utiliser $_GET
- on est là pour apprendre _Lumen_, alors utilisons les outils qu'il nous donne

<details><summary>Aide / Spoiler</summary>

- n'oublies pas de demander un objet de type `Illuminate\Http\Request` en paramètre de la méthode

<details><summary>Structure de ta méthode</summary>

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller {

    // [...]

    public function homeAction(Request $request) {
        // TODO récupérer la valeur en GET grâce à $request


        return view('home');
    }
}
```

</details>

<details><summary>Réponse</summary>

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller {

    // [...]

    public function homeAction(Request $request) {
        // TODO récupérer la valeur en GET grâce à $request
        $order = $request->input('order');
        var_dump($order); // on ne fait que tester pour l'instant
        
        return view('home');
    }
}
```

</details>


</details>

### Admin

On fait comme pour la page _Home_, mais pour les données du formulaire d'ajout :muscle:

Hop ! On valide le formulaire !  
:scream: 404 :skull:

Mais c'est bien normal, la route pour la page `admin` a été définie en GET et le formulaire est envoyé en ... 


<details><summary>Réponse</summary>

POST :tada:

</details>

---

- Qu'à cela ne tienne, on va de suite créer une nouvelle route, sur la même URL mais en POST !!  
- Et tu lui attribue une nouvelle méthode de `MainController`
- Maintenant, dans cette méthode, tu peux récupérer les données envoyées en POST comme pour `order` sur la `home`

<details><summary>Code original sans Framework</summary>

```php
// Récupération des valeurs du formulaire dans des variables
$name = isset($_POST['name']) ? $_POST['name'] : '';
$editor = isset($_POST['editor']) ? $_POST['editor'] : '';
$release_date = isset($_POST['release_date']) ? $_POST['release_date'] : '';
$platform = isset($_POST['platform']) ? intval($_POST['platform']) : 0;
```

</details>

<details><summary>Aide / Spoiler</summary>

- n'oublies pas de demander un objet de type `Illuminate\Http\Request` en paramètre de la méthode

<details><summary>Structure de ta méthode</summary>

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller {

    // [...]

    public function adminPostAction(Request $request) {
        // TODO récupérer les données en POST grâce à $request
    }
}
```

</details>

<details><summary>Réponse</summary>

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller {

    // [...]

    public function adminPostAction(Request $request) {
        // $name = isset($_POST['name']) ? $_POST['name'] : '';
        $name = $request->input('name', '');
        // $editor = isset($_POST['editor']) ? $_POST['editor'] : '';
        $editor = $request->input('editor', '');
        // $release_date = isset($_POST['release_date']) ? $_POST['release_date'] : '';
        $release_date = $request->input('release_date', '');
        // $platform = isset($_POST['platform']) ? intval($_POST['platform']) : 0;
        $platform = $request->input('platform', 0);

        // on ne fait que tester pour l'instant
        echo '<h3>$name</h3>';
        var_dump($name);
        echo '<h3>$editor</h3>';
        var_dump($editor);
        echo '<h3>$release_date</h3>';
        var_dump($release_date);
        echo '<h3>$platform</h3>';
        var_dump($platform);
    }
}
```

</details>

</details>

## BONUS : Eloquent

Quelques lectures pour préparer la prochaine journée :

- [Définition de ORM chez wikipédia](https://fr.wikipedia.org/wiki/Mapping_objet-relationnel)
- [Documentation ORM Eloquent](https://laravel.com/docs/5.7/eloquent)
