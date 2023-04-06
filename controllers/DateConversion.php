<?php
class DateConversion {
    /**
     * Afficher la nom du jour en francais
     * @param int numero du jour
     * @return string nom du jour
     */
    static public function frenchDayName($daynum) {
        $ar=array("", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
        if ($daynum>0&&$daynum<8) {
            return $ar[$daynum];
        } else {
            return $daynum;
        }
    }
 
    /**
     * Afficher le nom du mois en francais
     * @param int numero du mois
     * @return string nom du mois
     */
    static public function frenchMonthName($monthnum) {
        $ar=array("", "Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre");
        if ($monthnum>0&&$monthnum<13) {
            return $ar[$monthnum];
        } else {
            return $monthnum;
        }
    }
}
?>