<?php

function btn_add($url)
{
    return '<a href="' . $url . '" class="btn btn-primary btn-sm" ><span class="mdi mdi-file-check"></span> Data Baru</a>';
}

function btn_edit($url)
{
    return '<a data-toggle="tooltip" title="klik untuk mengubah" class="btn btn-outline-secondary btn-sm btn-icon" href="' . $url . '"><i class="fas fa-edit"></i></a>';
}

function btn_delete($url)
{
    return '<a data-toggle="tooltip" onclick="return konfirmasi(' . "'" . $url . "'" . ')" title="klik untuk menghapus" class="btn btn-outline-secondary btn-sm btn-icon" href="' . $url . '"><i class="fas fa-trash"></i></a>';
}

function btn_detail($url)
{
    return '<a data-toggle="tooltip" title="klik untuk melihat detail infonya" class="btn btn-outline-secondary btn-sm btn-icon " href="' . $url . '"><i class="fas fa-info-circle"></i></a>';
}

function flash_info()
{
    if(session('flash_info')) :
        return "<div class='alert mb-3 alert-".session('flash_class')."' role='alert'>
            <strong>Informasi</strong>. ".session('flash_info')."
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>";
    endif;
}

function yatidak($obj)
{
    if ($obj == 1)
    {
        return "<span class='badge badge-success badge-pill'>Ya</span>";
    } 
    else if ($obj == 0)
    {
        return "<span class='badge badge-danger badge-pill'>Tidak</span>";
    }
    else
    {
        return "-";
    }
}

function yt($obj)
{
    if ($obj == 'ya')
    {
        return "<span class='badge badge-success badge-pill'>Ya</span>";
    }
    else if ($obj == 'tidak')
    {
        return "<span class='badge badge-danger badge-pill'>Tidak</span>";
    } 
    else
    {
        return "-";
    }
}


function status_skp($obj)
{
    if ($obj == 'Ya')
    {
        return "<span class='badge badge-success badge-pill'>Ya</span>";
    }
    else if ($obj == 'Tidak')
    {
        return "<span class='badge badge-danger badge-pill'>Tidak</span>";
    } 
    else
    {
        return "<span class='badge badge-info badge-pill'>Belum</span>";
    }
}

function status_bl($obj)
{
    if ($obj == 'Ya')
    {
        return "bl-success";
    }
    else if ($obj == 'Tidak')
    {
        return "bl-danger";
    } 
    else
    {
        return "bl-info";
    }
}