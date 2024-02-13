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
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<link rel="stylesheet" href="stylemu.css">
    <link rel="stylesheet" href="css/stylealbum.css">

    
    <style>
    </style>
</head>
<body>
    <div class="main">
        <div class="icon">
            <h2 class="logo">E_King<a href="profil.html">👑<a></h2> <h1><center>Beranda</center></h1>
            </div>
    </div>
    <nav>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    
    <marquee><p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p></marquee>
    <div class="content">
      <h1>Web Dsainer &<br><span>Development</span><br>caourse</h1>
      <p class="par">semoga para pembaca dapat penikmati web kami dan enjoy</p>
      <button class="cn"><a href="#">Join</a></button>
    </div>
<center>
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Uploader</th>
            <th>Jumlah Like</th>
            <th>like</th>
            <th>Komentar</th>
        </tr>
        <?php
            include "koneksi.php";
            $sql=mysqli_query($conn,"select * from foto,user where foto.userid=user.userid");
            while($data=mysqli_fetch_array($sql)){
        ?>
            <tr>
                <td><?=$data['fotoid']?></td>
                <td><?=$data['judulfoto']?></td>
                <td><?=$data['deskripsifoto']?></td>
                <td>
                    <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                </td>
                <td><?=$data['namalengkap']?></td>
                <td>
                    <?php
                        $fotoid=$data['fotoid'];
                        $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                        echo mysqli_num_rows($sql2);
                    ?>
                </td>
                <td>
                <div class='middle-wrapper'>
        <div class='like-wrapper'>
          <a class='like-button' href="like.php?fotoid=<?=$data['fotoid']?>">
            <span class='like-icon'>
              <div class='heart-animation-1'></div>
              <div class='heart-animation-2'></div>
            </span>
            Like
          </a>
            </td>
<td>
                <?php
                       $fotoid=$data['fotoid'];
                       $sql2=mysqli_query($conn,"select * from komentarfoto where fotoid='$fotoid'"); 
                     
                    ?>
                    <a href="komentar.php?fotoid=<?=$data['fotoid']?>">komentar (<?php echo mysqli_num_rows($sql2)?>)</a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
    <script src="main.js" crossorigin=""></script>
</body>
</html>
  </body>
  </html>
