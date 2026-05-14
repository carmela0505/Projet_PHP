<!DOCTYPE html>
<html lang="fr">

<head>
    <title><?php echo @$Titre; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vidaloka&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= PATH ?>/views/layout/style.css">

   
</head>

<body>

    <?php echo @$msg; ?>

    <div class="container-fluid"><br>
        <header>
            <div class="d-flex justify-content-center">
            <!-- <img src="app/images/logo2.jpg" alt="logo" width="100" height="70" ><br> -->
            
                <a href="?p=home">Accueil</a>
                    <button id="btnHome" class="btn">Accueil</button>
                </a>
                <a href="?p=articles">Articles</a>
                    <button id="btnArticle" class="btn">Articles</button>
                </a>
                <a href="?p=marques">Marques</a>
                    <button id="btnMarque" class="btn">Marques</button>
                </a>
                <a href="?p=bieres">Type</a>
                    <button id="btnBiere" class="btn">Type</button>
                </a>
                <a href="?p=countries">Pays</a>
                    <button id="btnCountry" class="btn">Pays</button>
                </a>
                <a href="?p=fabricants">Fabricants</a>
                    <button id="btnFabricant" class="btn"> Fabricants</button>
                </a>
                <a href="?p=continents">Continents</a>
                    <button id="btnContinent" class="btn">Continents</button>
                </a>
                <a href="?p=couleurs">Couleurs</a>
                    <button id="btnCouleurs" class="btn ">Couleurs</button>
                </a>
            </div>

    
            <header>
                <?php

                if (isset($message)) {
                    if (!isset($type_message)) {
                        $type_message = "info";
                    }
                    echo "<br><div class='alert alert-$type_message alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    $message
                </div>";
                }
                ?>
                <div class="content">
                    <?= $content ?>
                </div>
                <footer>
                    <div class="footer-copyright text-center  text-primary">©CU 2023
                    </div>
                </footer>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



    <?php $scriptJS = "<script>
     $(document).ready(function() {
            $('.btn').each(function() {
                $(this).removeClass('btn-info');
                $(this).removeClass('btn-secondary');
                if ($(this).attr('id') == '$btnId') {
                    $(this).addClass('btn-secondary ');
                } else {
                    $(this).addClass('btn-info');
                }
            });
        })
   </script>"; 
   
   echo $scriptJS;
   ?>
</body>

</html>