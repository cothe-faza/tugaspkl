<?php
     include"koneksi.php";
if(isset($_POST['btn'])){
    $a = $_POST['nis'];
    $b = $_POST['nama'];
    $c = $_POST['kelas'];
     $qry = $conn->query("nis,nama,kelas");
if($qry == true){
     echo"<script>alert('Data Berhasil diinput....')</script>";
}else{
     echo"<script>alert('Data gagal diinput....')</script>";
    }      
}
?>
<table class="table">
<thead>
<tr>
<th scope="col">No</th>
<th scope="col">NIS</th>
<th scope="col">Nama</th>
<th scope="col">Kelas</th>
</tr>
</thead>
<tbody>
<tr>
<th scope="row">1</th>
<td><?=$data['nis']?></td>
<td><?=$data['nama']?></td>
<td><?=$data['kelas']?></td>
</tr>
</tbody>
</table>
