<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'platform';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Méthode permettant de récupérer les platform au format
     * 
     * array(
     *      1 => 'PC',
     *      2 => 'MegaDrive',
     *      3 => 'SNES',
     *      4 => 'PlayStation'
     * );
     */
    public static function getPlatformListArray() {
        // On récupère toutes les platform
        $allPlatformList = self::orderBy('name', 'asc')->get();

        // On crée un tableau qui contiendra les données formattées comme on le souhaite
        $newArrayOfPlatform = [];

        // On parcours les platforms
        foreach ($allPlatformList as $currentPlatformModel) {
            // Pour chaque platform, on ajoute dans le tableau
            $newArrayOfPlatform[$currentPlatformModel->id] = $currentPlatformModel->name;
        }
        // On retourne le tableau
        return $newArrayOfPlatform;
    }
}