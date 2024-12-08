<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title>Omnidle</title>
   </head>
   <body>
      <?php
         if(isset($_SESSION["userId"]))
            require '../view/layout/headerLogin.php';
         else
            require '../view/layout/headerLogout.php';
      ?>
      <form action="<?=URL_QUIZZES_CREATE?>" method="post" enctype="multipart/form-data">
         <label for="name">Name</label>
         <input type="text" name="name" required>
         
         <label for="description">Description</label>
         <input type="text" name="description" required>
         
         <label for="image">Image</label>
         <input type="file" id="image" name="image" accept="image/*">

         <button type="submit">envoyer</button>
      </form>
   </body>
</html>