<?php
try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'yeswewebPaul');
  }

catch (Exception $e)
  {
          die('Erreur : ' . $e->getMessage());
  }

  $reponse = $bdd->query('SELECT id, pseudo, message, date_message FROM mini_chat ORDER BY ID DESC LIMIT 0, 10');
  $donnees = $reponse->fetchAll();
?>

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <div class="container">
    <div class="row  flex-column">
      <form class="col-md-4 mx-auto border border-dark" action="mini_chat_post.php" method="post">
        <input class="col-md-12 my-3" type="text" name="pseudo" placeholder="Pseudo">
        <textarea class="col-md-12 my-3" name="message" rows="4" cols="40" maxlength="120"></textarea>
        <button type="submit" name="button" class="col-md-12 btn btn-secondary my-3">Send</button>
      </form>



        <?php
          
          foreach($donnees as $val) {
            $pseudo = htmlspecialchars($val['pseudo']);
            $message = htmlspecialchars($val['message']);
            echo "<strong>" . $val['date_message'] . "<br /></strong>";
            echo "<p>message n°" . $val['id'] . "</p><br />";
            echo "<p><span style='color: blue'>Pseudo :</span>" .$pseudo . "</p><br />";
            echo "<p><strong><span style='color: red'>message :</span></strong> " . $message . "</p><br />";

        }






      ?>
    </div>
  </div>

  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
