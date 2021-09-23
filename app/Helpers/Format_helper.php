<?php

function rp($rp)
{
    if ($rp <> "-") 
    {
        return number_format($rp, 0, '.', '.');
    } 
    else 
    {
        return $rp;
    }
}

function tanggal_Y($tgl)
{
    if ($tgl == '0000-00-00')
    {
        return "";
    } 
    else
    {
        return date('Y', strtotime($tgl));
    }
}

function tanggal_m($tgl)
{
    if ($tgl == '0000-00-00')
    {
        return "";
    } 
    else
    {
        return date('m', strtotime($tgl));
    }
}

function tanggal_Ymd($tgl)
{
    if ($tgl == '0000-00-00')
    {
        return "";
    } 
    else
    {
        return date('Y-m-d', strtotime($tgl));
    }
}

function tanggal_dMY($tgl)
{
    if ($tgl == '0000-00-00' || empty($tgl))
    {
        return "";
    } 
    else
    {
        return date('d M Y', strtotime($tgl));
    }
}

function tanggal_dFY($tgl)
{
    return date('d F Y', strtotime($tgl));
}

function jam_Hi($tgl)
{
    return date('H:i', strtotime($tgl));
}

function nama_bulan_indo($bln)
{
    switch ($bln)
    {
        case '1':
            return "Jan";
            break;
        case '2':
            return "Feb";
            break;
        case '3':
            return "Mar";
            break;
        case '4':
            return "Apr";
            break;
        case '5':
            return "Mei";
            break;
        case '6':
            return "Jun";
            break;
        case '7':
            return "Jul";
            break;
        case '8':
            return "Agu";
            break;
        case '9':
            return "Sep";
            break;
        case '10':
            return "Okt";
            break;
        case '11':
            return "Nov";
            break;
        case '12':
            return "Des";
            break;
        default:
            return $bln;
            break;
    }
}