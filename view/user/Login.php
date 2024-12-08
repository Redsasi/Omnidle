<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title>Login</title>
   </head>
   <body>
      <?php
         if(isset($_SESSION["userId"]))
            require '../view/layout/headerLogin.php';
         else
            require '../view/layout/headerLogout.php';
      ?>
      <form action="<?=URL_USER_LOGIN?>" method="post">
         <label for="email">Email</label>
         <input type="text" name="email" required>
         
         <label for="password">Mot de pass</label>
         <input type="password" name="password" required>
         <button type="submit">envoyer</button>
      </form>
   </body>
</html>