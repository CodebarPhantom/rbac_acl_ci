<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function dateDiff($startDate, $endDate) {
    // Parse dates for conversion
//    $startArry = date_parse($startDate);
//    $endArry = date_parse($endDate);
//
//    // Convert dates to Julian Days
//    $start_date = gregoriantojd($startArry["month"], $startArry["day"], $startArry["year"]);
//    $end_date = gregoriantojd($endArry["month"], $endArry["day"], $endArry["year"]);
//
//    // Return difference
//    return round(($end_date - $start_date), 0);
$end = strtotime("$endDate 00:00:00");
$start = strtotime("$startDate 00:00:00");
 return  round(abs($end-$start)/60/60/24) ;    
    

    
}

//
 function date_mysql_to_php($tgl) {
    //put your code here
    $tahun = substr($tgl,0,4);
    $bulan = substr($tgl,5,2);
    $tanggal = substr($tgl,8,2);
    return $tanggal.'-'.$bulan.'-'.$tahun;
}

function date_php_to_mysql($tgl) {
    //put your code here
    $tahun = substr($tgl,6,4);
    $bulan = substr($tgl,3,2);
    $tanggal = substr($tgl,0,2);
    return $tahun.'-'.$bulan.'-'.$tanggal;
}

//

function format_date_time($tgl)
{
    return (date('d M Y H:i', strtotime($tgl )));
}
function get_weektype($date) {
    $day = date('D', strtotime($date));
    if ($day == "Fri" || $day == "Sat") {
        return "WE";
    } else {
        return "WD";
    }
}

function formatdate_DdMY($date) {
    return date('D, d M Y', strtotime($date));
}

function formatdate_dMY($date) {
    return date('d M Y', strtotime($date));
}

function formatdate_dFY($date) {
    return date('d F Y', strtotime($date));
}

function formatdate_mysql($date) {
    return date('Y-m-d', strtotime($date));
}

function mytimestamp() {
    $time = time();
    $seconds = true;
    $fmt = "eu";
    $r = date('Y', $time) . '-' . date('m', $time) . '-' . date('d', $time) . ' ';

    if ($fmt == 'us') {
        $r .= date('h', $time) . ':' . date('i', $time);
    } else {
        $r .= date('H', $time) . ':' . date('i', $time);
    }

    if ($seconds) {
        $r .= ':' . date('s', $time);
    }

    if ($fmt == 'us') {
        $r .= ' ' . date('A', $time);
    }

    return $r;
}

function date_i($datestart, $i) {
    $date = date('D, d M', strtotime($datestart . "+$i day"));
    return $date;
}

function date_imysql($datestart, $i) {
    $date = date('Y-m-d', strtotime($datestart . "+$i day"));
    return $date;
}

function tanggal_mysql_to_php($tgl) {
    //put your code here
    $tahun = substr($tgl,0,4);
    $bulan = substr($tgl,5,2);
    $tanggal = substr($tgl,8,2);
    return $tanggal.'-'.$bulan.'-'.$tahun;
}

?>
