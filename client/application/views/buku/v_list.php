<head>

</head>
<font color="orange">

</font>
<br />
<font color="orange">

</font>
<h2>DAFTAR BUKU</h2>
<a href=<?=base_url()?>index.php/buku/simpan>+ Tambah data</a>
<table class="table1">
    <tr>
        <th width=10%>No</th>
        <th width=30%>Judul Buku</th>
        <th width=20%>Penulis</th>
        <th width=20%>Tahun Terbit</th>
		<th width=20%>Penerbit</th>
		<th width=20%>Jenis Buku</th>
        <th width=20%>Aksi</th>
    </tr>
    <?php
    $i=1;
    foreach ($data as $buku) {
        echo "<tr>
              <td>$buku->id</td>
              <td>$buku->judul</td>
              <td>$buku->penulis</td>
              <td>$buku->tahun_terbit</td>
			  <td>$buku->penerbit</td>
			  <td>$buku->jenis_buku</td>
              <td>  " . anchor('buku/detail/' . $buku->id, 'Detail') . "
                    " . anchor('buku/edit/' . $buku->id, 'Edit') . "
                    " . anchor('buku/delete/' . $buku->id, 'Delete') . "</td>
              </tr>";
              $i++;
    }
    ?>
</table>
