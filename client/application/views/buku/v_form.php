<head>
<link rel="stylesheet" href="<?php echo base_url() ?>asset/table.css"/>
<script>
    function goBack() {
        window.history.back();
    }
</script>
</head>

<font color="orange">
<?php echo $this->user_model->getSessionUser(); ?> | <a href=<?=base_url()?>index.php/login/logout>Logout</a>
</font>
<br />
<?php echo form_open_multipart('companies/input'); ?>
<h2>TAMBAH DATA PERUSAHAAN</h2>
<table class="table2">
    <tr>
        <td width=50%>Nama</td>
        <td width=2%>:</td>
        <td width=48%><?php echo form_input('nama_iuphhk'); ?></td>
    </tr>
    <tr>
        <td>Nomor SK</td>
        <td>:</td>
        <td><?php echo form_input('sk_izin'); ?></td>
    </tr>        
    <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td><?php echo form_input('tanggal_sk'); ?></td>
    </tr> 
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?php echo form_input('alamat_kantor'); ?></td>
    </tr> 
    <tr>
        <td>Telepon</td>
        <td>:</td>
        <td><?php echo form_input('telepon_kantor'); ?></td>
    </tr>
    <tr>
        <td>Nama Contact Person</td>
        <td>:</td>
        <td><?php echo form_input('pic'); ?></td>
    </tr>
    <tr>
        <td>Telepon Contact Person</td>
        <td>:</td>
        <td><?php echo form_input('telepon_pic'); ?></td>
    </tr>
    <tr>
        <td colspan="3">
            <?php echo form_submit('submit', 'Simpan'); ?>
            <?php //echo anchor('companies', 'Kembali'); ?>
            <button onclick="goBack()">Kembali</button>
        </td>
    </tr>
</table>
<?php
echo form_close();
?>