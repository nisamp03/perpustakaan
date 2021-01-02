<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url() ?>asset/login.css"/>
    <title>Login Admin</title>
</head>
<body>
        <div class="container">
          <h1>Login</h1>
          <?php echo $this->session->flashdata('loginError'); ?>
            <form action="<?= site_url('login') ?>" method="POST">
                <label>Username</label><br>
                <input type="text" name="username" placeholder="Pakai username.." required /><br>
                <label>Password</label><br>
                <input type="password" name="password" placeholder="Password.." required /><br>
                <button><input type="submit" value="Login" /></button>
            </form>
        </div>     
</body>
</html>