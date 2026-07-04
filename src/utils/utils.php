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


    /**
     * Transforme l'input date en retour string avec mois jour ou anné celon l'époque ou ca été crée
     * @param string $CreateAt
     * @return string $ValueCreateAt 
     */
    public static function getTimeAgo(string $CreateAt) : string
    {
        $createdAt = new DateTime($CreateAt);
        $now = new DateTime();
        $interval = $now->diff($createdAt);

        $years = $interval->y;
        $months = $interval->m;
        $days = $interval->d;

        if ($years > 0) {
            return $years . ($years > 1 ? " ans" : " an");
        } elseif ($months > 0) {
            return $months . ($months > 1 ? " mois" : " mois");
        } elseif ($days > 0) {
            return $days . ($days > 1 ? " jours" : " jour");
        } else {
            return "aujourd'hui";
        }
    }

}