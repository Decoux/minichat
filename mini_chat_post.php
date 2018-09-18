<?php
try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'yeswewebPaul');
  }

catch (Exception $e)
  {
          die('Erreur : ' . $e->getMessage());
  }
if (!empty($_POST['pseudo']) AND !empty($_POST['message'])) {
  $req = $bdd->prepare('INSERT INTO mini_chat(pseudo, message, date_message) VALUES(:pseudo, :message, NOW() )');
  $req->execute(array(

    'pseudo' => $_POST['pseudo'],
    'message' => $_POST['message']

    ));
    header('Location: index.php');

}else {
  echo "les champs sont vides";
}

  ?>
