<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title ?? "Mon site"?></title>
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body class="container-fluid">
<?php if (isset($_SESSION["user"])): ?>
    <nav>
        <h3>Bonjour <?=$_SESSION["user"]?></h3>
        <a href=<?=getLinkToRoute("logout")?> >Deconnexion</a>
        <a href=<?=getLinkToRoute("forum")?> >Forum</a>
        <?php else: ?>
            <a href=<?=getLinkToRoute("login")?> >Connexion</a>
            <a href=<?=getLinkToRoute("signup")?> >Sign-up</a>
            

        <?php endif;?>
    </nav>

        <div class="row justify-content-center">
            <div class="col-md-8 p-2">   
                <?php echo $content ?>
            </div>
        </div>
</body>
</html>