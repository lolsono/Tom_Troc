<?php

namespace App\src\utils;
use DateTime;
/**
 * Class utils : create a multiple methode for easy utility.
 */
class Utils {
    /**
     * Systeme date convert to format : Y-m-d H:i:s.
     * @param DateTime $date : date
     * @return string : return string format
     */
    public static function convertDateToFrenchFormat(DateTime $date) : string
    {
        return $date->format('Y-m-d H:i:s');
    }

    //ajouter le système d'ajout dans le fichier upload + la lecture d'image

    /**
     * add img on upload file.
     * @param img $imgFile
     */
    public function addImgFile () : void
    {
        //prende le fichier
        //lui crée un lien et retourner le lien pour le mettre en db
        //ajout le fichier dans le fichier upload
    }

}