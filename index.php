<?php
session_start();
 require_once __DIR__ . '/.src/instruction.php';
if (!isset($_GET['finish'])) {
    $_SESSION['song'] = json_decode(file_get_contents(__DIR__.'/.src/.json_model/song' . $_SESSION['step'] . '.json'), true);
    $song             = $_SESSION['song'];
    setcookie('step', $_SESSION['step'], time() + 3600 * 48);
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mini-projet Foreach</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">

    <?php if (isset($_GET['finish']) && $_GET['finish']) {
        echo '<h1> Bravo vous avez fini l\'exercice.<br>Ready for the review !!!</h1>';
    } else { ?>
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron text-center">
                    <h2>👋 Bienvenue sur l'entraineur de foreach</h2>
                    <p>
                        Le but va être de reproduire l'affichage attendu sur la droite de l'écran à chacune des étapes
                        <br>
                        Vous pouvez visualiser le tableau de données en cliquant <a target="_blank" href="display_array.php">ici</a> -
                        Ecrire votre code dans le fichier <span  class="text-monospace">function.php</span>.
                    </p>
                    <h4>Etape <?php echo $_SESSION['step'] ?> :</h4>
                    <p>
                        <?php echo $_SESSION['instruction'] ?> <br>
                        <span class="text-warning">⚠️ Attention à bien respecter les sauts de ligne.<br>
                            🙏 Pensez bien à faire un commit pour chacune des étapes.</span>
                    </p>
                </div>

                <?php if (isset($_GET['return']) && $_GET['return'] === 'success') { ?>
                    <div class="alert alert-success text-center" role="alert" id="alert">
                        ✅ OK étape suivante
                    </div>
                <?php } elseif (isset($_GET['return']) && $_GET['return'] === 'notSuccess') { ?>
                    <div class="alert alert-danger text-center" role="alert" id="alert">
                        💣 Veuillez recommencer le code n'est pas bon.
                    </div>
                <?php } else { ?>
                    <div class="alert alert-warning text-center" role="alert" id="alert">

                    </div>
                <?php } ?>

            </div>
            <div class="col-md-6">
                <div class="jumbotron text-center">
                    <h2>Votre Code</h2>
                    <div id="code">
                        <?php
                        require_once __DIR__ . '/function.php';
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-success jumbotron text-center">
                    <h2>L'affichage attendu</h2>
                    <div id="model">
                        <?php
                        if ($_SESSION['step'] === 5) {
                            require_once __DIR__ . '/.src/.modelValidation/model3_bis.php';
                        } elseif ($_SESSION['step'] === 6) {
                            require_once __DIR__ . '/.src/.modelValidation/model3_ter.php';
                        } else {
                            require_once __DIR__ . '/.src/.modelValidation/model' . ($_SESSION['step'] > 6 || $_SESSION['step'] === 4 ? '3' : $_SESSION['step']) . '.php';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center pb-4">
                <a href=".src/validate.php" class="btn btn-lg btn-primary" id="btn">Soumettre</a>
            </div>
        </div><!-- /.row -->
    <?php } ?>
</div>
<script src=".src/script.js"></script>
</body>
</html>