<tbody>
<?php
$no = 1;
foreach ($result as $data) {
?>
<tr>
    <th scope="row"><?= $no++; ?></th>
    <td><?= $data['nis']; ?></td>
    <td><?= $data['nama']; ?></td>
    <td><?= $data['kelas']; ?></td>
</tr>
<?php } ?>
</tbody>
