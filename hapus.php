<?php

    require "./koneksi.php";
    require "./logic.php";
    $id = $_GET["id"];
    hapusWayang($id, $koneksi);
    