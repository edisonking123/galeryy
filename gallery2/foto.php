<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Foto</title>
    <link rel="stylesheet" href="foto.css">
    <link rel="stylesheet" href="css/stylealbum.css">
    <style>
        table{
            width: 50%;
            border-collapse:;
            margin_bottom: 20px;

        }
        th, td{
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th{
            background-color: grey;
        }
    </style>
</head>
<body>
<div class="main">
        <div class="icon">
            <h2 class="logo">E_King<a href="profil.html">👑</a></h2> <h1><center>My Foto</center></h1>
            <nav>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    </div>
    </div>

    <marquee><p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p></marquee>
  
   <center><a href="posting.php">Posting Foto</a></center>
    <br>

    <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
        <table>
          
                Judul
                &emsp; &ensp; <input type="text" name="judulfoto">
        <br>
            
                Deskripsi
                &ensp;<input type="text" name="deskripsifoto">
<br>
                Lokasi File
                <input type="file" name="lokasifile">
    <br>
                Album
          
                &emsp; &ensp;  <select name="albumid">
                    <?php
                        include "koneksi.php";
                        $userid=$_SESSION['userid'];
                        $sql=mysqli_query($conn,"select * from album where userid='$userid'");
                        while($data=mysqli_fetch_array($sql)){
                    ?>
                            <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
                    <?php
                        }
                    ?>
                    </select>
                    
            <br>
            &emsp; &ensp;  &emsp; &ensp;  &ensp;  <input type="submit" value="Tambah">
        </table>
    </form>
    <center>
<div class=tabel>
    <table border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal Unggah</th>
            <th>Lokasi File</th>
            <th>Album</th>
            <th>Disukai</th>
            <th>Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"select * from foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
            while($data=mysqli_fetch_array($sql)){
        ?>
                <tr>
                    <td><?=$data['fotoid']?></td>
                    <td><?=$data['judulfoto']?></td>
                    <td><?=$data['deskripsifoto']?></td>
                    <td><?=$data['tanggalunggah']?></td>
                    <td>
                        <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                    </td>
                    <td><?=$data['namaalbum']?></td>
                    <td>
                        <?php
                            $fotoid=$data['fotoid'];
                            $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                            echo mysqli_num_rows($sql2);
                        ?>
                    </td>
                    <td>
                        <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>">Hapus</a>
                        <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>">Edit</a>
                    </td>
                </tr>
        <?php
            }
        ?>
    </table>
        </div>
        </center>
</body>
</html>