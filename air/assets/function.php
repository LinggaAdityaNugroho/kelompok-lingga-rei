<?php
class air
{
    function connect()
    {
        $db = mysqli_connect('localhost', 'user_air', '#Us3r_A1r_2024#', 'air');
        return $db;
    }

    function tipeUser($sesiUser)
    {
        $q = mysqli_query($this->connect(), "SELECT tipe_user FROM user WHERE username = '$sesiUser'");
        $d = mysqli_fetch_row($q);
        return $d[0];
    }

    function dataUser($sesiUser)
    {
        $q = mysqli_query($this->connect(), "SELECT nik, nama, tipe_user FROM user WHERE username = '$sesiUser'");
        $d = mysqli_fetch_row($q);
        return $d;
    }
}
