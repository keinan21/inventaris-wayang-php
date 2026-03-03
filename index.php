<?php

    require "./koneksi.php";
    require "./logic.php";
    $query = "SELECT * FROM proyek";
    $hasil = $koneksi->query($query);
    $IDDipilih = -1;

    if(isset($_POST["namaBaru"])){
        tambahWayang($_POST["namaBaru"], $_POST["tahunBaru"], $koneksi);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <style>
        tr button {
            display: inline;
        }
    </style>
    <main >
        <h1>Sistem Management Box Wayang</h1>
        <p>dibuat disuruh ravly bonus</p>
        <form action='' method="POST">
            <fieldset>
                <legend>Form Masukan Wayang</legend>
                <label for="nama">Nama <input type="text" name="namaBaru" required></label>
                <label for="tahun">Tahun Dibuat <input type="number" name='tahunBaru' required></label>
                <input type="submit" value="Masukan Wayang Baru">
            </fieldset>
            
        </form>
        <fieldset>
            <legend>Daftar Wayang</legend>
            <table >
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Tahun Dibuat</th>
                    <th>Sedikit Aksi</th>
                </tr>
                <?php
                    $baris = $hasil->fetch_assoc();
                    while($baris) {
                        echo "<tr key='baris[\"id\"]'>";
                        echo "<th>" . $baris["id"] . "</th>";
                        echo "<th>" . $baris["nama"] . "</th>";
                        echo '<th>' . $baris["tahun_pembuatan"] . "</th>";
                        echo "<th>
                        <a href='hapus.php?id=" . $baris["id"] . "'>
                            <button>
                                <i class='bi bi-trash-fill'></i>
                            </button>
                        </a>

                        <a onClick='openDialog({$baris["id"]}, \"{$baris["nama"]}\", {$baris["tahun_pembuatan"]})' >
                            <button><i class='bi bi-pencil-square'></i></button>
                        </a>
                        </th>";
                        echo "</tr>";
                        $baris = $hasil->fetch_assoc();
                    };
                ?>
            </table>
        </fieldset>
        
    </main>
    <dialog>
            <h2>Edit</h2>
                <label for="nama">Nama <input type="text" name="namaEdit" required></label>
                <label for="tahun">Tahun Dibuat <input type="number" name='tahunEdit' required></label>
                <input type="submit" value="Konfirmasi" id="btn-edit">
    </dialog>
</body>
<script>
    let dialog = document.querySelector("dialog")
    let inputEditNama = dialog.querySelector("input[name='namaEdit']")
    let inputEditTahun = dialog.querySelector("input[name='tahunEdit']")
    let submitEdit = dialog.querySelector("#btn-edit")
    let openDialog = (id, namaSekarang, tahunSekarang) => {
        dialog.showModal()
        inputEditNama.value = namaSekarang
        inputEditTahun.value = tahunSekarang
        submitEdit.onclick = (e) => {
            window.location.href = `edit.php?id=${id}&namaEdit=${inputEditNama.value}&tahunEdit=${inputEditTahun.value}`
        }
    }
</script>
</html>