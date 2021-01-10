<head>
<link rel="stylesheet" href="<?php echo base_url() ?>asset/table.css"/>
<script>
    function goBack() {
        window.history.back();
    }
</script>
</head>
<br />
<?php echo form_open_multipart('buku/simpan'); ?>
<h2>TAMBAH DATA BUKU</h2>
<table class="table2">
    <tr>
        <td width=50%>Judul</td>
        <td width=2%>:</td>
        <td width=48%><?php echo form_input('judul'); ?></td>
    </tr>
    <tr>
        <td>Penulis</td>
        <td>:</td>
        <td><?php echo form_input('penulis'); ?></td>
    </tr>        
    <tr>
        <td>Tahun Terbit</td>
        <td>:</td>
        <td><?php echo form_input('tahun_terbit'); ?></td>
    </tr> 
    <tr>
        <td>Penerbit</td>
        <td>:</td>
        <td><?php echo form_input('penerbit'); ?></td>
    </tr> 
    <tr>
        <td>Jenis Buku</td>
        <td>:</td>
        <td><?php echo form_input('jenis_buku'); ?></td>
    </tr>
    <tr>
        <td colspan="3">
            <?php echo form_submit('submit', 'Simpan'); ?>
            <?php// echo anchor('buku', 'Kembali'); ?>
            <button onclick="goBack()">Kembali</button>
        </td>
    </tr>
</table>
<?php
echo form_close();
?>