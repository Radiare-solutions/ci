<?php

namespace App\Helpers;

class ViewHelper {
    
    const charLimit = 150;
    
    public static function convertTimeToClinicalTrialDate($date) {
        return date('F Y', strtotime($date));
    }
    
    public static function displayRevisedText($text) {
        if(strlen($text) > self::charLimit) { 
            $text = substr($text, 0, self::charLimit);
            $text.= "...&nbsp;&nbsp;<button class='btn btn-flat btn-xs btn-primary hidden-xs' href='index.html'>Read More</button>";
        }
        return $text;
    }
    
}