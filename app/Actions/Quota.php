<?php
namespace App\Actions;

use ErrorException;
class Quota{

    /**
     * function qui prend en parametre un nombre et retourne le quota que doit recevoir un distributer
     * @param  $qte
     * @return float
     */
    static function  getQuota($qte){
        $temp = 0;
        
        if($qte < 0){
            throw new ErrorException("the qte must be > 0");
        }
        if(5 <= $qte and $qte <=10){
            $temp = 5;
        }else if(11 <= $qte and $qte <=20){
            $temp = 10;
        }else if(21 <=$qte and $qte <=30){
            $temp = 15;
        }else if($qte >= 31){
            $temp = 30;
        }
        return $temp/100;
    }
}