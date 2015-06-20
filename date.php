<?php

class Month {
    public static $days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
    public static $months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
    
    public $dates = array();
    
    public function __construct($year, $month) {       
        $date = new DateTime($year . '-' . $month . '-01');
        $interval = new DateInterval('P1D');
        
        while($date->format('n') <= $month) {
            $d = $date->format('j');
            
            $w = str_replace('0', '7', $date->format('w'));

            $date->add($interval);
            
            $this->dates[$d] = $w;
        }
    }
}