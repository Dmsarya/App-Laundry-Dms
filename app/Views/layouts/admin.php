<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Loundry</title>
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@600&display=swap" rel="stylesheet">
</head>
<body style="background: #1a2226;"> 
    <?= $this->include('layouts/components/navbar') ?>
    <div class="container-fluid" >
        <div class="row">
            <?= $this->include('layouts/components/sidebar') ?>
            <div class="col-lg-10 col-md-10">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>
    
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.mask.min.js"></script>
    <?= $this->renderSection('script') ?>
</body>
</html>