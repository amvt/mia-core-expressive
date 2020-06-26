<?php

namespace Mobileia\Expressive\Helper;

/**
 * Description of DateHelper
 *
 * @author matiascamiletti
 */
class DateHelper 
{
    public static function toMySQL($string)
    {
        $date = substr($string, 0, 10);
        $time = '';
        if(strlen($string) > 11){
            $time = ' ' . substr($string, 11);
        }
        
        return self::parseOnlyDate($date) . $time;
    }
    
    public static function parseOnlyDate($string)
    {
        if(stripos($string, '/') !== false){
            $hasBarra = true;
        }
        if($hasBarra){
            return substr($string, 6) . '-' . substr($string, 3, 2) . '-' . substr($string, 0, 2);
        }
        
        return $string;
    }
}
