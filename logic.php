<?php 

    function tambahWayang($namaBaru, $tahunBaru, $koneksi) {
        $query = "INSERT INTO proyek (nama, tahun_pembuatan) VALUES ('$namaBaru', '$tahunBaru')";
        $koneksi->query($query);
        header("Location: index.php");
    }

    function hapusWayang($id, $koneksi) {
        $query = "DELETE FROM proyek WHERE id='$id'";
        $koneksi->query($query);
        header("Location: index.php");
    }

    function editWayang($id, $namaBaru, $tahunBaru, $koneksi) {
        $query = "UPDATE proyek SET nama='$namaBaru', tahun_pembuatan='$tahunBaru' WHERE id='$id'";
        $koneksi->query($query);
        header("Location: index.php");
    }

?>