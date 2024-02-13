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
    <title>Halaman Album</title>
    <link rel="stylesheet" href="css/stylealbum.css">
    <link rel="stylesheet" href="foto.css">
    <style>
    </style>
</head>
<body>
    <div class="main">
        <div class="icon">
            <h2 class="logo">E_King<a href="profil.html">👑</a></h2> <h1><center>My Album</center></h1>
            <nav>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>
    </div>
    </div>
    <marquee><p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p></marquee>
    
   

    <form action="tambah_album.php" method="post">
     
                    <tr>
                <td>Nama Album</td>
                &ensp;<td><input type="text" name="namaalbum"></td>
            </tr>
           
            <br>
            <tr>
                <td>Deskripsi</td>
                &ensp; &emsp;  <td><input type="text" name="deskripsi"></td>
            </tr>
            <br>
          
            <tr>
                <td></td>
                &ensp; &ensp;&ensp;&ensp;   &ensp;&emsp; &ensp;&emsp; &ensp;<td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
<nav>
    <table border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Tanggal dibuat</th>
            <th>Aksi</th>
        </tr>
    
        <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"select * from album where userid='$userid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
                <tr>
                    <td><?=$data['albumid']?></td>
                    <td><?=$data['namaalbum']?></td>
                    <td><?=$data['deskripsi']?></td>
                    <td><?=$data['tanggaldibuat']?></td>
                    <td>
                        <a href="hapus_album.php?albumid=<?=$data['albumid']?>">Hapus</a>
                        <a href="edit_album.php?albumid=<?=$data['albumid']?>">Edit</a>
                    </td>
                </tr>
        <?php
            }
        ?>
    </table>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <small>
            <buttom>
    @copyright EdisonKING
        </buttom>
    <small>
</body>
</html>