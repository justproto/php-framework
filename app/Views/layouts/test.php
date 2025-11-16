<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Default :: <?= $title ?? ''; ?></title>
    <link rel="stylesheet" href="<?= PATH ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="<?= PATH ?>/images/framework.png">
</head>
<body>
<h2>test layout</h2>

<?= $this->content; ?>

</body>
</html><?php
