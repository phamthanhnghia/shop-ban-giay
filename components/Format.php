<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\components;

class Format{
    /**
     * @param: date format: 20/05/2013
     * @return: date format: 2013-05-20
     */
    public static function dateConverDmyToYmd($date,$syntax = '/')
    {
        if (empty($date)) return '';
        $date = explode($syntax, $date);
        if (count($date) > 2)
            return $date[2] . '-' . $date[1] . '-' . $date[0];
        return '';
    }
    public static function dateConverYmdToDmy($date, $format = "d/m/Y")
    {
        if ($date == '0000-00-00' || $date == '0000-00-00 00:00:00' || empty($date))
            return '';
        if (is_string($date)) {
            $date = new DateTime($date);
            return $date->format($format);
        }
    }
}