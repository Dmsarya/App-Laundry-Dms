<?= $this->extend('layouts/admin')?>
<?=$this->section('title')?>
 Dasboard
<?=$this->endSection('')?>

<?=$this->section('content')?>

<?php
echo "<link href=\"assets/css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\" />";
?>

<div class="row">
    <div class="text-center text-light fw-bold text-uppercase" style="margin-top: 20px; font-size: 35px; text-shadow: 2px 2px 5px white;">
        Selamat Datang <?= session()->get("username")?>
    </div>
    <br>
    <br>
</div>
<?=$this->endSection('')?>