<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Omnidle</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  <?php include_once("include/header.php");?>
  <?php include_once("include/nav.php");?>
  <?php include_once("include/connexion.php");?>
      <main>
  <?php
    echo password_hash("pass1234", PASSWORD_DEFAULT);
  ?>
      </main>
      <?php include_once("include/footer.php");?>
  </body>
</html>