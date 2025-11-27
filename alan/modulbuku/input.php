<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    


<?php
     include "koneksi.php";
   if(isset($_POST['btn'])){
       $a = $_POST['judul'];
       $b = $_POST['penulis'];
       $c = $_POST['tahun_terbit'];
       $d = $_POST['kategori'];
        $qry = $conn->query("INSERT INTO tb_buku(judul_buku, penulis, tahun_terbit, kategoti) VALUES ('$a','$b','$c','$d')");
    if($qry == true){
        echo"<script>alert('Data Berhasil diinput....')</script>";
   }else{
        echo"<script>alert('Data gagal diinput....')</script>";
     }
   }
   ?> 
 
 <form method="post">       
    <label>judul</label>
    <input type="text" name="judul"><br>
    <label>penulis</label>
    <input type="text" name="penulis"><br>
    <label>tahun terbit</label>
    <input type="number" name="tahun terbit"><br>
    <label>kategori</label>
    <input type="text" name="kategori"><br>
    <button type="submit" name="btn">Submit</button>
</form>


       <table class="table">
       <thead>
       <tr>
       <th scope="col">No</th>
       <th scope="col">judul buku</th>
       <th scope="col">penulis</th>
       <th scope="col">tahun terbit</th>
       <th scope="col">kategori</th>
       <th>Aksi</th>

       </tr>
       </thead>
       <tbody>
          <?php
          $no = 1;
          $sqlResult = $conn->query("SELECT*FROM tb_buku");
          foreach($sqlResult as $data){
            ?>
       <tr>
       <td><?=$no++?></td>
       <td><?=$data['judul_buku']?></td>
       <td><?=$data['penulis']?></td>
       <td><?=$data['tahun_terbit']?></td>
       <td><?=$data['kategori']?></td>
       <td>
            <a href="#" class="btn btn-warning btn-sm">Edit</a>
            <a href="#" class="btn btn-danger btn-sm">Hapus</a>
        </td>
       </tr>
       
    
      
<?php
        }
?>
 </tbody>
       </table>
      
    </body>
</html>
