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

    <style>
        * {
            text-align: center;
        }

        body {
            display: flex;
            flex-direction: column;
            background-color: beige;
        }

        .content {
            flex: 1;
            min-height: 86vh;
        }
        h1, h2, h6 {
           font-family: 'Vidaloka', serif;;
        }
        .btn{
            margin-left: 2px;
    

        }
    </style>
</head>

<body>

    <?php echo @$msg; ?>

    <div class="container-fluid">
        <header>
            <div class="d-flex justify-content-center">
                <a href="<?= PATH ?>/home"><br>
                    <button id="btnHome" class="btn">Accueil</button>
                </a>
                <a class="" href="<?= PATH ?>/bieres"><br>
                    <button id="btnBiere" class="btn">Type de Biere</button>
                </a>
                <a class="" href="<?= PATH ?>/countries"><br>
                    <button id="btnCountry" class="btn">Gestion des Pays</button>
                </a>
                <a class="" href="<?= PATH ?>/fabricants"><br>
                    <button id="btnFabricant" class="btn">Gestion des Fabricants</button>
                </a>
                <a class="" href="<?= PATH ?>/continents"><br>
                    <button id="btnContinent" class="btn">Gestion des Continents</button>
                </a>
                <a class="" href="<?= PATH ?>/couleurs"><br>
                    <button id="btnCouleurs" class="btn ">Gestion des Couleurs</button>
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
                    <div class="footer-copyright text-center  text-warning">©CU 2023
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