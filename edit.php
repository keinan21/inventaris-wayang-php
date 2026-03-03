<?php

require "./koneksi.php";
require "./logic.php";

editWayang($_GET["id"], $_GET["namaEdit"], $_GET["tahunEdit"], $koneksi);