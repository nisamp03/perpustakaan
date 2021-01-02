<font color="orange">
<?php echo $this->session->flashdata('hasil'); ?>
</font>
<table border="1">
    <tr><th>ID</th><th>NAMA</th><th>NOMOR</th><th></th></tr>
    <?php
    foreach ($databuku as $buku){
        echo "<tr>
              <td>$buku->id</td>
              <td>$buku->judul</td>
              <td>$buku->penulis</td>
              <td>".anchor('buku/edit/'.$buku->id,'Edit')."
                  ".anchor('buku/delete/'.$buku->id,'Delete')."</td>
              </tr>";
    }
    ?>
</table>
<a href="http://localhost/rest-server/client/index.php/buku/create">+ Tambah data<a>