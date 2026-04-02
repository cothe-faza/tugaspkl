<?php
     include"koneksi.php";
if(isset($_POST['btn'])){
    $a = $_POST['kode'];
    $b = $_POST['nama'];
    $c = $_POST['harga'];
    $d = $_POST['jumlah'];
    $e = $_POST['kondisi'];
     $qry = $conn->query("INSERT INTO tb_barang(kode_brg, nama_brg, harga_brg, jumlah_brg, kondisi_brg) VALUES ('$a','$b','$c','$d','$e')");// silahkan kalian buat query di titik-titik..
if($qry){
     echo"<script>alert('Data Berhasil diinput....')</script>";
}else{
     //echo"<script>alert('Data gagal diinput....')</script>";
     printf($conn->error);
    }      
}
?>


<form method="post">
    <label>kode barang</label>
    <input type="text" name="kode">
    <label>nama barang</label>
    <input type="text" name="nama">
    <label>harga barang</label>
    <input type="text" name="harga">
    <label>jumlah barang</label>
    <input type="text" name="jumlah">
    <label>kondisi barang</label>
    <input type="text" name="kondisi">
    <button type="submit" name="btn">Submit</button>
</form>

<table class="table">
<thead>
<tr>
<th scope="col">kode</th>
<th scope="col">nama</th>
<th scope="col">harga</th>
<th scope="col">jumlah</th>
<th scope="col">kondisi</th>
</tr>
</thead>
<tbody>
    <?php
    $result = $conn->query("SELECT*FROM tb_barang");
    foreach($result as $data){
    ?>
<tr>
<th scope="row">1</th>
<td><?=$data['kode_brg']?></td>
<td><?=$data['nama_brg']?></td>
<td><?=$data['harga_brg']?></td>
<td><?=$data['jumlah_brg']?></td>
<td><?=$data['kondisi_brg']?></td>
</tr>
<?php
    }
?>
</tbody>
</table>