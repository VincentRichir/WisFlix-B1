<!DOCTYPE html>
<html>

<head>
    <title>Page films WIS B1</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <section class="jumbotron text-center">
        <?php
        function card($titre, $image, $description, $lien)
        {
            echo "<div class=\"col-lg-3 col-sm-12 col-md-6\">
       <div class=\"card\">
        <img class=\"card-img-top\" src=\"$image\" alt=\"Card image\">
            <div class=\"card-body\">
            <h4 class=\"card-title\">$titre</h4>
            <p class=\"card-text\">$description</p>
            <a href=\"$lien\" class=\"btn btn-primary\">Voir le film</a>
            <span class=\"badge badge-dark\">New</span>
         </div> </div> </div>";
        }
        ?>
        <div class="container">
            <h1 class="jumbotron-heading">
                <?php
                $site = "WISflix";
                echo $site;
                ?>
            </h1>
            <h2>Bienvenue frero, pose pas de question y'a pas de reponses</h2>
        </div>
        <p class="lead text-muted">TOUMDOUM </p>
    </section>

    <div class="container">
        <div class="row">

            <?php
            require("parametres.php");
            $dbh = new PDO("mysql:host=$host;dbname=$dbname",$login,$password);
            if (array_key_exists ("annee", $_GET)){
                $annee = $_GET["annee"];
                $req = $dbh -> prepare("SELECT * FROM film WHERE annee=:annee");
                $req -> bindParam(":annee",$annee);
                $req -> execute();
                $films=$req;
            }

            else {

            $req = $dbh -> query ("SELECT * FROM film WHERE 1");
            $films=$req;}
            ;

            foreach ($films as $film) {

                card($film["titre"], $film["image"], $film["description"], $film["lien"]);
            }


            ?>

        </div>
    </div>

    <script type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>