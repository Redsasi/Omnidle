<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title>Sign in</title>
   </head>
   <body>
      <?php
         if(isset($_SESSION["userId"]))
            require '../view/layout/headerLogin.php';
         else
            require '../view/layout/headerLogout.php';
      ?>
    <form action="<?=URL_USER_SINGUP?>" method="post">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" required>
        
        <label for="email">Email</label>
        <input type="text" name="email" required>
        
        <label for="password">Mot de pass</label>
        <input type="password" name="password" required>
        <button type="submit">envoyer</button>
    </form>
   </body>
</html>