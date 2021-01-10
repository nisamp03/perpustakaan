<head>
<link rel="stylesheet" href="<?php echo base_url() ?>asset/table.css"/>
<script>
    function goBack() {
        window.history.back();
    }
</script>
</head>

<font color="orange">
<?php //echo $this->user_model->getSessionUser(); ?> | <a href=<? //=base_url()?>index.php/login/logout>Logout</a>
</font>
<br />
<?php echo form_open('buku/detail'); ?>
<?php echo form_hidden('id', $data[0]->id); ?>
<h2>DETAIL DATA BUKU</h2>
<table class="table2">
    <tr>
        <td width=50%>Judul</td>
        <td width=2%>:</td>
        <td width=48%><?php echo $data[0]->judul; ?></td>
    </tr>
    <tr>
        <td>Penulis</td>
        <td>:</td>
        <td><?php echo $data[0]->penulis; ?></td>
    </tr>
    <tr>
        <td>Tahun Terbit</td>
        <td>:</td>
        <td><?php echo $data[0]->tahun_terbit; ?></td>
    </tr>
    <tr>
        <td>Penerbit</td>
        <td>:</td>
        <td><?php echo $data[0]->penerbit; ?></td>
    </tr>
    <tr>
        <td>Jenis Buku</td>
        <td>:</td>
        <td><?php echo $data[0]->jenis_buku; ?></td>
    </tr>
    <tr>
        <td colspan="3"><button onclick="goBack()">Kembali</button></td>
    </tr>
</table>
<?php
echo form_close();
?>