<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Videogame;
use App\Models\Platform;




class MainController extends Controller {

    // Méthode pour la route /
    public function homeAction(Request $request) {
        // On récupère la donnée "order" en GET, 
        // et on lui donne une valeur par défaut => false
        $order = $request->input('order', false);
        // dump($order);

        // On récupère toutes les jeux vidéos en Base De Données
        // $results = DB::select('SELECT * FROM videogame');
        // dump($results);
        // Bien mais pas top car les résultats dans des objets anonymes (stdClass)

        // On utilise désormais Eloquent et les Models correspondants
        if ($order == 'name') {
            $results = Videogame::orderBy('name', 'asc')->get();
        } else if ($order == 'editor') {
            $results = Videogame::orderBy('editor', 'asc')->get();
        } else {
            $results = Videogame::all();
        }

        // dump($results);

        /* foreach ($results as $currentVideogame) {
            // dump($currentVideogame);
            // echo $currentVideogame->name . ' par ' . $currentVideogame->editor . ' sorti le ' . $currentVideogame->release_date . ' sur ' . $currentVideogame->platform_id . ' <br> ';
        } */
        // On récupère un tableau contenant id=> name pourchaque plateforme
        $platformList = Platform::getPlatformListArray();

        // Challenge E01 - afficher la view home
        return view('home', [
            'videogameList' => $results,
            'platformList' => $platformList
        ]);
    }

    // Méthode pour la route /admin
    public function adminAction() {
        // Challenge E01 - afficher la view admin
        return view('admin', [
            'platformList' => Platform::orderBy('name', 'asc')->get()
        ]);
    }

    public function adminPostAction(Request $request) {
        // Récupération des valeurs du formulaire dans des variables
        // $name = isset($_POST['name']) ? $_POST['name'] : '';
        $name = $request->input('name', '');
        // $editor = isset($_POST['editor']) ? $_POST['editor'] : '';
        $editor = $request->input('editor', '');
        // $release_date = isset($_POST['release_date']) ? $_POST['release_date'] : '';
        $release_date = $request->input('release_date', '');
        // $platform = isset($_POST['platform']) ? intval($_POST['platform']) : 0;
        $platform = $request->input('platform', 0);

        // DEBUG
        // dump($name, $editor, $release_date, $platform);

        // On valide les données
        $errorList = [];
        if (empty($name)) {
            $errorList[] = 'Le nom est vide';
        }
        if (empty($editor)) {
            $errorList[] = 'L\'éditeur est vide';
        }
        if (empty($release_date)) {
            $errorList[] = 'La date de sortie est vide';
        }
        if (empty($platform)) {
            $errorList[] = 'La console/support n\'a pas été sélectionné';
        }

        // Si ok, on ajoute à la base de données
        if (count($errorList) == 0) {
            // Je peux créer le Model
            $videogame = new Videogame();
            $videogame->name = $name;
            $videogame->editor = $editor;
            $videogame->release_date = $release_date;
            $videogame->platform_id = $platform;

            // Et l'ajouter en DB
            $videogame->save();

            // Puis rediriger vers la home
            return redirect()->route('home');
        }

        // sinon, j'affiche la page d'admin classique
        return view('admin', [
            'platformList' => Platform::orderBy('name', 'asc')->get(),
            'errorList' => $errorList
        ]);
    }
}