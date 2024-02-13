<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
</body>
</html>