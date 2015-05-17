<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>Intranet du Laboratoire Galaxy-Swiss Bourdin</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico" />
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <section class="row-fluid panel blue reverseLink">
                <div id="header-buttons" class="closed">     
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $_SESSION['idUtilisateur'] ?>
                    <a class="closed" role="Deconnexion" href="#"> (Déconnexion)</a>
                </div>
                <h1><img alt="Gsb"src="images/logo.png"> Administration de Margo</h1>
            </section>
            <hr>
        </header>
