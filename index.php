
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h1>Form Coba</h1>
    <form action="#" method="post" target="_self" enctype="multipart/form-data">
        <label for="nama">Masukkan Nama Anda  : </label><br>
        <input type="text" name="nama" placeholder="Isi Nama disini"><br>
        <label for="nama">Masukkan Umur Anda  : </label><br>
        <input type="number" name="umur" placeholder="Isi Umur disini"><br>
        <label for="alamat">Masukkan Alamat Rumah :</label><br>
        <textarea name="alamat" rows="1" cols="20" placeholder="Isi alamat disini"></textarea><br>
        <input type="submit" value="kirim">
    </form>
    <hr>
</body>
</html>
<?php
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