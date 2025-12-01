<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<?php
     include"../koneksi.php";
if(isset($_POST['btn'])){
    $a = $_POST['judul'];
    $b = $_POST['penulis'];
    $c = $_POST['tahun'];
    $d = $_POST['kategori'];
     $qry = $conn->query("INSERT INTO tb_buku(judul_buku, penulis, tahun_terbit, kategori) VALUES ('$a','$b','$c','$d')");// silahkan kalian buat query di titik-titik..
if($qry){
     echo"<script>alert('Data Berhasil diinput....')</script>";
}else{
     //echo"<script>alert('Data gagal diinput....')</script>";
     printf($conn->error);
    }      
}
?>


<form method="post">
    <label>judul buku</label>
    <input type="text" name="judul">
    <label>penulis</label>
    <input type="text" name="penulis">
    <label>tahun terbit</label>
    <input type="text" name="tahun">
    <label>kategori</label>
    <input type="text" name="kategori">
    <button type="submit" name="btn">Submit</button>
</form>

<table class="table">
<thead>
<tr>
<th scope="col">judul buku</th>
<th scope="col">penulis</th>
<th scope="col">tahun terbit</th>
<th scope="col">kategori</th>
</tr>
</thead>
<tbody>
    <?php
    $result = $conn->query("SELECT*FROM tb_buku");
    foreach($result as $data){
    ?>
<tr>
<th scope="row">1</th>
<td><?=$data['judul_buku']?></td>
<td><?=$data['penulis']?></td>
<td><?=$data['tahun_terbit']?></td>
<td><?=$data['kategori']?></td>
</tr>
<?php
    }
?>
</tbody>
</table>