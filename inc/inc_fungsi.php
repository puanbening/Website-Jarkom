<?php

function url_dasar(){
    //$_SERVER['SERVER_NAME'] : alamat website
    //$_SERVER['SCRIPT_NAME'] : direktori website
    $url_dasar = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']);
    return $url_dasar;
}

function ambil_gambar($ID_tulisan){
    global $conn;
    $sql1   = "select * from halaman where ID = '$ID_tulisan'";
    $q1     = mysqli_query($conn, $sql1);
    $r1     = mysqli_fetch_array($q1);
    $text   = $r1['Isi'];
    
    preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $text, $img);
    $gambar = $img[1];
    $gambar = str_replace("../gambar/", url_dasar()."/gambar/", $gambar);
    return $gambar;
}

function ambil_kutipan($ID_tulisan){
    global $conn;
    $sql1   = "select * from halaman where ID = '$ID_tulisan'";
    $q1     = mysqli_query($conn, $sql1);
    $r1     = mysqli_fetch_array($q1);
    $text   = $r1['Kutipan'];
    return $text;

}

function ambil_judul($ID_tulisan){
    global $conn;
    $sql1   = "select * from halaman where ID = '$ID_tulisan'";
    $q1     = mysqli_query($conn, $sql1);
    $r1     = mysqli_fetch_array($q1);
    $text   = $r1['Judul'];
    return $text;

}

function ambil_Isi($ID_tulisan){
    global $conn;
    $sql1   = "select * from halaman where ID = '$ID_tulisan'";
    $q1     = mysqli_query($conn, $sql1);
    $r1     = mysqli_fetch_array($q1);
    $text   = strip_tags($r1['Isi']);
    return $text;

}