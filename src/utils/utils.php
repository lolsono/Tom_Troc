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
     * update input date and return string for day, week, month for comparete time actual.
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

    /**
     * update input date and return string for day, week, month for comparete time actual.
     * @param string $CreateAt
     * @return string $ValueCreateAt 
     */
    public static function getFomratTimeConversation(string $CreateAt) : string
    {
        $createdAt = new DateTime($CreateAt);
        $now = new DateTime();

        $diff = $now->getTimestamp() - $createdAt->getTimestamp();

        if ($diff < 60) {
            return "À l'instant";
        }

        if ($diff < 3600) {
            $minutes = floor($diff / 60);
            return $minutes . " min";
        }

        if ($diff < 86400) {
            $hours = floor($diff / 3600);
            return $hours . ($hours > 1 ? " heures" : " heure");
        }

        if ($diff < 604800) {
            $days = floor($diff / 86400);
            return $days . ($days > 1 ? " jours" : " jour");
        }

        if ($diff < 2592000) {
            $weeks = floor($diff / 604800);
            return $weeks . ($weeks > 1 ? " semaines" : " semaine");
        }

        if ($diff < 31536000) {
            $months = floor($diff / 2592000);
            return $months . " mois";
        }

        $years = floor($diff / 31536000);
        return $years . ($years > 1 ? " ans" : " an");
    }

    /**
     * Modificated format time for return message user
     * @param string $createAt
     * @return string  
     */
    public function getFormatMessageDate (string $CreateAt) : string 
    {
        $date = new DateTime($CreateAt);
        return $date->format('d.m H:i');

    }

}