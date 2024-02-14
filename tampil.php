<?php
    // if(isset($_REQUEST['nama']) && isset($_REQUEST['umur']) && isset($_REQUEST['alamat'])) {

    //     echo '<h1>Selamat datang</h1>';
    //     echo 'Nama Anda: ' . $_REQUEST['nama'] . '<br>';
    //     echo 'Umur Anda: ' . $_REQUEST['umur'] . '<br>';
    //     echo 'Alamat Anda: ' . $_REQUEST['alamat'];
    // }

    $nama   ="";
    $alamat = "";
    $umur   = 0;
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nama   = anti_inject($_POST['nama']);
        $alamat = anti_inject($_POST['alamat']);
        $umur   = anti_inject($_POST['umur']);
    }
    function anti_inject($data){
        $data = trim($data); //mengahpus spasi kosong kanan kiri data
        $data = stripslashes($data); //menghilangkan karakter /\
        $data = htmlspecialchars($data); //menghilangkan simbol khusus
        $data = preg_replace("/[^a-zA-Z0-9 ]/", "", $data); //mengkonformasi agar yang akan muncul hanya A-Z, a-z, 0-9, Tamabahkan juga spasi 1x agar dapat mmembaca spasi

        return $data;
    }

    echo"Nama kamu        :" . $nama ."<br>";
    echo"Alamat kamu      :" . $alamat ."<br>";
    echo"Umur kamu        :" . $umur ." tahun";
?>
